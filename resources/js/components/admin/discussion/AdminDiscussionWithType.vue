<template>
	    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
							
				<div class="row">
					<div class="col-xl-12">
						<div class="breadcrumb-holder">
							<h1 class="main-title float-left font-weight-bold text-uppercase">Thảo luận</h1>
							<ol class="breadcrumb float-right">
								<li class="breadcrumb-item">Admin</li>
								<li class="breadcrumb-item active">Thảo luận</li>
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
								<h3><i class="fa fa-table"></i> Thảo luận
									<router-link class="btn btn-primary btn-sm float-right" :to="{ name: 'AdminDiscussionCreate' }"><span><i class="fa fa-plus mr-2" aria-hidden="true"></i></span>Thêm</router-link></h3>
							</div>

							<div class="card-body">
								<div class="table-responsive">
									<table id="example1" class="table table-bordered table-hover display">
										<thead>
											<tr>
												<th>ID</th>
												<th></th>
												<th>Đề tài <br>thảo luận</th>
												<th>Lượt xem</th>
												<th style="min-width: 4em;">Tùy chọn</th>
											</tr>
										</thead>										
										<tbody>
											<tr v-for="(value, index) in discussion">
												<td>{{ value.id }}</td>
												<td>
													<h4>{{ value.title }}</h4>
													<p class="home-blog-author">Đăng bởi <a href="#">{{ value.name }}</a> ngày <span>{{ convertDate(value.created_at) }}</span></p>
													<p>{{ value.discussion_content }}<span class="ml-2">
													<router-link :to="{ name: 'AdminBlogMore', params: {id: value.id }}">
														Xem thêm
													</router-link></span>
													</p>
												</td>
												<td>{{ value.name_discussion_type }}</td>
												<td>{{ value.discussion_view }}</td>
												<td>
													<router-link :to="{ name: 'AdminDiscussionEdit', params: {id: value.id }}" class="btn btn-success btn-sm">
														<i class="fa fa-pencil"></i>
													</router-link>
													<button role="button" v-on:click="deleteDiscussion(index, value.id)" class="btn btn-danger btn-sm">
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

<style scoped>
	.home-blog-author{
        font-size: 0.9em;
        font-style: italic;
    }
</style>

<script>
	export default {
		data(){
			return {
				discussion: {}
			}
		},
		created(){
			axios.defaults.headers.common['Content-Type'] = 'application/json'
			axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')
			this.axios.get(`/api/discussion/showwithtype/${this.$route.params.id}`).then((response) =>{
				this.discussion = response.data
			}).catch(function(error){
				console.log(error)
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
			deleteDiscussion(index, id){
				var vm = this
				alertify.confirm('Thông báo', 'Bạn muốn xóa dữ liệu?', function(){ 
					vm.deleteSuccess(index, id)
				}, function(){ 
					vm.deleteError()
				})
			},
			deleteSuccess(index, id){
				axios.defaults.headers.common['Content-Type'] = 'application/json'
				axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')
				this.axios.get(`/api/discussion/delete/${id}`).then((response) => {
					if(response.data.status){
						alertify.set('notifier','position', 'buttom-right');
						alertify.success(response.data.message)
						this.discussion.splice(index, 1)
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
			},
			pad(s){
                return (s < 10) ? '0' + s : s;
            },
            convertDate(inputFormat) {
              var d = new Date(inputFormat);
              return [this.pad(d.getDate()), this.pad(d.getMonth()+1), d.getFullYear()].join('/');
            }
		}
	}
</script>