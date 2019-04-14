<template>
    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12">
						<div class="breadcrumb-holder">
							<h1 class="main-title float-left font-weight-bold text-uppercase">Phản hồi người dùng</h1>
							<ol class="breadcrumb float-right">
								<li class="breadcrumb-item">Admin</li>
								<li class="breadcrumb-item active">Phản hồi người dùng</li>
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
								<h3><i class="fa fa-telegram"></i> Phản hồi người dùng</h3>
							</div>

							<div class="card-body">
								<div class="table-responsive">
								<table id="example1" class="table table-bordered table-hover display">
									<thead>
										<tr>
											<th>ID</th>
											<th>Chi tiết người gửi</th>
											<th style="text-align: center">Nội dung</th>
											<th style="min-width: 4em;">Xóa</th>
										</tr>
									</thead>										
									<tbody>
										<tr v-for="(value, index) in contact">
											<td>{{ value.id }}</td>
											<td>
												{{ value.name }} </br>
												{{ value.email }} </br>
												{{ value.phone }} </br>
												{{ value.company }}
											</td>
											<td style="text-align:justify">
												{{ value.content }}
											</td>
											<td>
												<button role="button" v-on:click="deleteContact(index, value.id)" class="btn btn-danger btn-sm">
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
				contact: [],
				Dtable: null
			}
		},
		created: function(){
            this.getData()
		},
		updated: function(){
			// START CODE FOR BASIC DATA TABLE 
			$(document).ready(function() {
				this.Dtable = $('#example1').DataTable();
			} );
			// END CODE FOR DATA TABLE 
		},
		watch: {
			'$route' (to, from) {
				this.getData()
			}
		},
		methods:{
			deleteContact(index, id){
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
				var vm = this
				this.axios.get(`/api/contact/delete/${id}`).then((response) => {
					if(response.data.status){
						alertify.set('notifier','position', 'buttom-right');
						alertify.success(response.data.message)
						// var hang = $('#example1 tbody tr').each(function(){
				  //   		if($(this).find('td:first-child').text() == id){
				  //   			$(this).find('td').remove();
				  //   		}
				  //   	});
						vm.contact.splice(index, 1)
						vm.Dtable.draw()
						// vm.Dtable.row(vm.Dtable.data().length).remove().draw(false);

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
			getData(){
				this.axios.get('/api/contact/index').then((response) =>{
	            	// console.log(response.data)
					this.contact = response.data
					// console.log(response.data)
				}).catch(error => {
	                console.error(error);
	            }) 
			}
		}
	}
</script>