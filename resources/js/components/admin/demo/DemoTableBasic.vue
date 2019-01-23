<template>
	    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
							
				<div class="row">
						<div class="col-xl-12">
								<div class="breadcrumb-holder">
										<h1 class="main-title float-left font-weight-bold text-uppercase">Data Tables</h1>
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
									Mô tả về table
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
											<tr>
												<td>Tiger Nixon</td>
												<td>System Architect</td>
												<td>Edinburgh</td>
												<td>61</td>
												<td>2011/04/25</td>
												<td>
													<a role="button" href="#" class="btn btn-success btn-sm">
														<i class="fa fa-pencil"></i>
													</a>
													<a role="button" href="#" class="btn btn-danger btn-sm">
														<i class="fa fa-trash-o"></i>
													</a>
												</td>
											</tr>
											<tr>
												<td>Garrett Winters</td>
												<td>Accountant</td>
												<td>Tokyo</td>
												<td>63</td>
												<td>2011/07/25</td>
												<td>
													<a role="button" href="#" class="btn btn-success btn-sm">
														<i class="fa fa-pencil"></i>
													</a>
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
		mounted: function(){
			// START CODE FOR BASIC DATA TABLE 
			$(document).ready(function() {
				$('#example1').DataTable();
			} );
			// END CODE FOR DATA TABLE 	
		}
	}
</script>