<template>
	    <div class="content-page">

		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
							
				<div class="row">
					<div class="col-xl-12">
						<div class="breadcrumb-holder">
							<h1 class="main-title float-left font-weight-bold text-uppercase">Người dùng</h1>
							<ol class="breadcrumb float-right">
								<li class="breadcrumb-item">Admin</li>
								<li class="breadcrumb-item active">Người dùng</li>
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
								<h3><i class="fa fa-address-card"></i> Người dùng
									<router-link class="btn btn-primary btn-sm float-right" :to="{ name: 'AdminAccountCreate' }">Thêm</router-link></h3>
							</div>

							<div class="card-body">
								<div class="table-responsive">
								<table id="example1" class="table table-bordered table-hover display">
									<thead>
										<tr>
											<th>ID</th>
											<th></th>
											<th>Ngày sinh</th>
											<th>Tên hiển thị</th>
											<th>SDT</th>
											<th style="min-width: 5em;">Tùy chọn</th>
										</tr>
									</thead>										
									<tbody>
										<tr v-for="(value, index) in users">
											<td>{{ value.id }}</td>
											<td style="min-width: 250px;">
												<span style="float: left; margin-right:10px;">
													<img v-if="value.user_image == null" alt="image" style="width:150px; height:auto;" src="https://via.placeholder.com/150">
													<img v-else alt="image" style="width:150px; height:auto;" :src="'/images/users/' + value.user_image">
												</span>
												<strong>{{ value.name }}</strong>							<br>
												<small>{{ value.email }}</small><br>
												<small>{{ value.gender }}</small><br>
												<small>{{ value.address }}</small><br>
											</td>
											<td>
												{{ convertDate(value.birthday)}}
											</td>
											<td>
												{{ value.display_name }}
											</td>
											<td>
												{{ value.phone }}
											</td>
											<td>
												<router-link :to="{ name: 'AdminAccountEdit', params: {id: value.id }}" class="btn btn-success btn-sm">
													<i class="fa fa-pencil"></i>
												</router-link>
												<button role="button" v-on:click="deleteUser(index, value.id)" class="btn btn-danger btn-sm">
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
				users: []
			}
		},
		created: function(){
			axios.defaults.headers.common['Content-Type'] = 'application/json'
			axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')
            this.axios.get('/api/users/index').then((response) => {
            	// console.log(response.data)
				this.users = response.data
			}).catch(error => {
                console.error(error);
            }) 
		},
		updated: function(){
			$(document).ready(function() {
				$('#example1').DataTable();
			} );
		},
		methods:{
			deleteUser(index, id){
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
				this.axios.get(`/api/users/delete/${id}`).then((response) => {
					if(response.data.status){
						alertify.set('notifier','position', 'buttom-right');
						alertify.success(response.data.message)
						this.users.splice(index, 1)
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