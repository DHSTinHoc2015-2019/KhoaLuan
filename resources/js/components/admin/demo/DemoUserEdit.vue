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
                                <h3><i class="fa fa-pencil"></i> Chỉnh sửa</h3>
                            </div>
                                
                            <div class="card-body">
                            	<form v-on:submit.prevent="updateUserDemo" method="POST">
                                <div class="row">
                                	<div class="col-md-6">
										<div class="form-group">
											<label>Tên</label>
											<input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập " required="" v-model="user.name">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>T</label>
											<input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập " required="">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Email</label>
											<input type="email" class="form-control" id="" aria-describedby="" placeholder="Nhập " required="" v-model="user.email">
										</div>
									</div>
									<div class="col-md-6"></div>
									<!-- Lưu -->
									<div class="col-md-3"></div>
									<div class="col-md-3">
										<button type="submit" class="btn btn-primary float-right"><span class="btn-label"><i class="fa fa-save"></i></span> Lưu lại</button>
									</div>
									<div class="col-md-6">
										<button v-on:click="destroy" class="btn btn-danger"><span class="btn-label"><i class="fa fa-times"></i></span>Hủy bỏ</button>
									</div>
									<!-- end lưu -->
									
                                	
                                </div> <!-- end row -->

                                </form>
                            </div>  <!-- end card-body -->                        
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
		data: function(){
			return{
				user: {}
			}
		},
		created: function(){
			let uri = `/api/userAll/edit/${this.$route.params.id}`;
			axios.get(uri).then((response) => {
				console.log(response.data);
				this.user = response.data;
			})
		},
		methods: {
			updateUserDemo (){
				let uri = `/api/userAll/update/${this.$route.params.id}`;
				this.axios.post(uri, this.user).then((response) => {
					this.$router.push({name: 'DemoUser'});
				})
			},
			destroy(){
				this.$router.push({name: 'DemoUser'});
			}
		}
	}
</script>