<template>
	    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
							
				<div class="row">
					<div class="col-xl-12">
						<div class="breadcrumb-holder">
							<h1 class="main-title float-left font-weight-bold text-uppercase">Tin tức</h1>
							<ol class="breadcrumb float-right">
								<li class="breadcrumb-item">Admin</li>
								<li class="breadcrumb-item active">Tin tức</li>
							</ol>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<!-- end row -->

				<div class="row mb-5">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-12">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-table"></i> Tin tức
									<router-link class="btn btn-primary btn-sm float-right" :to="{ name: 'NewsCreate' }">Thêm</router-link></h3>
							</div>

							<div class="card-body">
								<div class="table-responsive">
								<table id="example1" class="table table-bordered table-hover display">
									<thead>
										<tr>
											<th>ID</th>
											<th style="min-width: 4em;">Nổi bật</th>
											<th></th>
											<th style="min-width: 4em;">Tùy chọn</th>
										</tr>
									</thead>										
									<tbody>
										<tr v-for="(value, index) in news">
											<td>{{ value.id }}</td>
											<td v-if="value.featured == true">
												<button class="btn btn-danger btn-block btn-sm">Có</button>
											</td>
											<td v-else>
											</td>
											<td>
												<span style="float: left; margin-right:10px;" v-if="!checkImageSVG(index)">
													<a href=""><img v-bind:src="`images/news/${value.news_image}`" alt="" style="max-width: 10em">
													</a>
												</span>
												<span style="float: left; margin-right:10px;" v-if="checkImageSVG(index)">
													<div v-html="value.news_image" style="max-width: 10em;"></div>
												</span>
												<router-link :to="{ name: 'NewsMore', params: {id: value.id }}">
													<h4 class="font-weight-bold">{{ value.title }}</h4>
												</router-link>
												<p>{{ value.description }}<span>
												<router-link :to="{ name: 'NewsMore', params: {id: value.id }}">
													Xem thêm
												</router-link></span>
												</p>
											</td>
											<td>
												<router-link :to="{ name: 'NewsEdit', params: {id: value.id }}" class="btn btn-success btn-sm">
													<i class="fa fa-pencil"></i>
												</router-link>
												<button role="button" v-on:click="deleteNews(index, value.id)" class="btn btn-danger btn-sm">
													<i class="fa fa-trash-o"></i>
												</button>
											</td>
										</tr>
									</tbody>
								</table>
								</div>
								
							</div>														
						</div><!-- end card-->					
					</div>
				</div>
            </div>
			<!-- END container-fluid -->
		</div>
		<!-- END content -->
    </div>
	<!-- END content-page -->
</template>

<script>
	export default {
		data(){
			return {
				news: []
			}
		},
		created: function(){
			this.axios.get('/api/news/showall').then((response) => {
				this.news = response.data
			}).catch(error => {
                console.error(error);
            }) 
		},
		updated: function(){
			// START CODE FOR BASIC DATA TABLE 
			$(document).ready(function() {
				$('#example1').DataTable();
			} );
			// END CODE FOR DATA TABLE 
		},
		methods:{
			checkImageSVG(index){
				if(this.news.length > 0){
					if('news_image' in this.news[index]){
						return this.news[index].news_image.toString().indexOf('<svg') != -1
					}
				}
				return false;
			},
			deleteNews(index, id){
				var vm = this
				alertify.confirm('Thông báo', 'Bạn muốn xóa dữ liệu?', function(){ 
					vm.deleteSuccess(index, id)
				}, function(){ 
					vm.deleteError()
				})
			},
			deleteSuccess(index, id){
				var vm = this
				axios.defaults.headers.common['Content-Type'] = 'application/json'
				axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')
				this.axios.get(`/api/news/delete/${id}`).then((response) => {
					if(response.data.status){
						alertify.set('notifier','position', 'buttom-right');
						alertify.success(response.data.message)
						vm.news.splice(index, 1)
					} else {
						alertify.set('notifier','position', 'buttom-right');
						alertify.error(response.data.message)
					}
				}).catch((error) => {
					console.log(error)
				})
				
			},
			deleteError(){
				alertify.set('notifier','position', 'buttom-right');
				alertify.error('Dữ liệu của bạn không thay đổi')
			}
		}
	}
</script>