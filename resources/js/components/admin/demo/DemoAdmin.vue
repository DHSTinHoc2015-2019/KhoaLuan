<template>
	<div class="content-page">
		<!-- Start content -->
        <div class="content">
			<div class="container-fluid">

				<div class="row">
						<div class="col-xl-12">
								<div class="breadcrumb-holder">
										<h1 class="main-title float-left">Blank Page</h1>
										<ol class="breadcrumb float-right">
											<li class="breadcrumb-item">Home</li>
											<li class="breadcrumb-item active">Blank Page</li>
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
                                    <h3><i class="fa fa-table"></i> Child rows (show extra / detailed information)</h3>
                                    The DataTables API has a number of methods available for attaching child rows to a parent row in the DataTable. This can be used to show additional information about a row, useful for cases where you wish to convey more information about a row than there is space for in the host table. <a target="_blank" href="https://datatables.net/examples/api/row_details.html">(more info)</a>
                                </div>
                                    
                                <div class="card-body">
                                    
                                    <div class="table-responsive">
                                    <table id="example2" class="table table-bordered table-hover display">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Salary</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Salary</th>
                                            </tr>
                                        </tfoot>
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