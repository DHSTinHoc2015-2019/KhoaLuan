<template>
	    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
							
				<div class="row">
						<div class="col-xl-12">
								<div class="breadcrumb-holder">
										<h1 class="main-title float-left">Data Tables</h1>
										<ol class="breadcrumb float-right">
											<li class="breadcrumb-item">Home</li>
											<li class="breadcrumb-item active">Data Tables</li>
										</ol>
										<div class="clearfix"></div>
								</div>
						</div>
				</div>
				<!-- end row -->

				<div class="row">
				
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-12">						
							<div class="card mb-3">

								<div class="card-header">
									<h3><i class="fa fa-table"></i> Người dùng</h3>
									Mô tả về table <span class="counter">1,234,567.00</span>
								</div>

								<div class="card-body">
									<div class="table-responsive">
									<table id="example1" class="table table-bordered table-hover display">
										<thead>
											<tr>
												<th>Name</th>
												<th>Position</th>
												<th>Office</th>
												<th>Age</th>
												<th>Start date</th>
												<th>Salary</th>
											</tr>
										</thead>										
										<tbody>
											<tr v-for="user in user">
												<td>{{ user.id}}</td>
												<td>{{ user.name}}</td>
												<td>Edinburgh</td>
												<td>61</td>
												<td>2011/04/25</td>
												<td>
													<router-link :to="{name: 'DemoUserEdit', params: { id: user.id }}" class="btn btn-success btn-sm">
														<i class="fa fa-pencil"></i>
													</router-link>
													<a role="button" href="#" class="btn btn-danger btn-sm">
														<i class="fa fa-trash-o"></i>
													</a>
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
		data: function() {
			return {
				user: []
			}
		},
		mounted: function(){

		},
		created: function(){
			axios.get('api/userAll').then((response) => {
				this.user = response.data;
			});
		},
		updated: function(){
			// START CODE FOR BASIC DATA TABLE 
			$(document).ready(function() {
				$('#example1').DataTable();
			} );
			// END CODE FOR DATA TABLE 	
		}
	}
</script>