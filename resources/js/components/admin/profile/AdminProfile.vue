<template>
	    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
							
				<div class="row">
						<div class="col-xl-12">
								<div class="breadcrumb-holder">
										<h1 class="main-title float-left font-weight-bold text-uppercase">Trang các nhân</h1>
										<ol class="breadcrumb float-right">
											<li class="breadcrumb-item">Admin</li>
											<li class="breadcrumb-item active">Trang cá nhân</li>
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
								<h3><i class="fa fa-table"></i> Trang cá nhân
									<router-link class="btn btn-success btn-sm float-right" :to="{ name: 'AdminIntroEdit' }">Chỉnh sửa</router-link></h3>
							</div>

							<div class="card-body">												
								<form action="#" method="post" enctype="multipart/form-data">
									<div class="row">	
										<div class="col-lg-9 col-xl-9">
											<div class="row">				
												<div class="col-lg-6">
												<div class="form-group">
												<label>Full name (required)</label>
												<input class="form-control" name="name" type="text" value="Administrator" required />
												</div>
												</div>

												<div class="col-lg-6">
												<div class="form-group">
												<label>Valid Email (required)</label>
												<input class="form-control" name="email" type="email" value="office@website.com" required />
												</div>
												</div>  
											</div>
											
											<div class="row">				
												<div class="col-lg-6">
												<div class="form-group">
												<label>Password (leave empty not to change)</label>
												<input class="form-control" name="password" type="password" value="" />
												</div>
												</div>              			                                
												
												<div class="col-lg-6">
												<div class="form-group">
												<label>Skype</label>
												<input class="form-control" name="skype" type="text" value="skypeid" />
												</div>
												</div>   
											</div>
											
											<div class="row">
												<div class="col-lg-12">
												<button type="button" class="btn btn-primary">Edit profile</button>
												</div>
											</div>
										
										</div>
																		
										<div class="col-lg-3 col-xl-3 border-left">
											<b>Lần hoạt động cuối</b>: Đang cập nhật	
											<br />
											<b>Ngày đăng ký </b>: {{ convertDate(users.created_at) }}	
											<br />											
											<div class="m-b-10"></div>
											
											<div id="avatar_image">
												<img :src="'images/users/' + users.user_image" alt="avatar"style="max-width: 100px; height: auto;"/>
												<br />
												<!-- <i class="fa fa-trash-o fa-fw"></i> <a class="delete_image" href="#">Remove avatar</a> -->
															
											</div>  
											<div id="image_deleted_text"></div>                      

											
											<div class="m-b-10"></div>
											
											<div class="form-group">
											<label>Thay đổi ảnh đại diện</label> 
											<input type="file" name="image" class="form-control">
											</div>
											
										</div>
									</div>								
								
								</form>										
								
							</div>	
							<!-- end card-body -->												
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
		data() {
			return {
				users: {}
			}
		},
		created(){
			this.users = JSON.parse(localStorage.getItem('tpack.user'))
			console.log(this.users)
		},
		methods:{
			pad(s){
                return (s < 10) ? '0' + s : s;
            },
            convertDate(inputFormat) {
              var d = new Date(inputFormat);
              return [this.pad(d.getDate()), this.pad(d.getMonth()+1), d.getFullYear()].join('/');
            },
		}
	}
</script>