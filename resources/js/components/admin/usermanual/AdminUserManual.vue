<template>
	    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
							
				<div class="row">
					<div class="col-xl-12">
						<div class="breadcrumb-holder">
							<h1 class="main-title float-left font-weight-bold text-uppercase">Hướng dẫn sử dụng</h1>
							<ol class="breadcrumb float-right">
								<li class="breadcrumb-item">Admin</li>
								<li class="breadcrumb-item active">Hướng dẫn sử dụng</li>
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
								<h3><i class="fa fa-address-card"></i> Danh sách hướng dẫn
									<router-link class="btn btn-primary btn-sm float-right" :to="{ name: 'AdminUserManualCreate' }">Thêm</router-link></h3>
							</div>

							<div class="card-body">
								<div class="table-responsive">
								<table id="example1" class="table table-bordered table-hover display">
									<thead>
										<tr>
											<th>ID</th>
											<th>Hướng dẫn</th>
											<th style="min-width: 5em;">Tùy chọn</th>
										</tr>
									</thead>										
									<tbody>
										<tr v-for="(value, index) in usermanuals">
											<td>{{ value.id }}</td>
											<td>
												<a href="javascript:void(0)">
													<h4>{{ value.title }}</h4>
												</a>
												<div v-html="substr(value.user_manual_content)"></div>
												<a href="javascript:void(0)">Xem thêm</a>
											</td>
											<td>
												<router-link :to="{ name: 'AdminUserManualEdit', params: {id: value.id }}" class="btn btn-success btn-sm">
													<i class="fa fa-pencil"></i>
												</router-link>
												<button role="button" v-on:click="deleteUserManual(index, value.id)" class="btn btn-danger btn-sm">
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
				usermanuals: {}
			}
		},
		created: function(){
            this.axios.get('/api/usermanual/getlist').then((response) => {
				// console.log(response.data)
				this.usermanuals = response.data				
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
			substr(str){
				return str.substring(0, 200)
			},
			deleteUserManual(index, id){
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
				this.axios.get(`/api/usermanuals/delete/${id}`).then((response) => {
					if(response.data.status){
						alertify.set('notifier','position', 'buttom-right');
						alertify.success(response.data.message)
						this.usermanuals.splice(index, 1)
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