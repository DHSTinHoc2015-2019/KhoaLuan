<template>
	<div class="content-page">
		<!-- Start content -->
        <div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12">
						<div class="breadcrumb-holder">
							<h1 class="main-title float-left font-weight-bold text-uppercase">Thông tin chung website</h1>
							<ol class="breadcrumb float-right">
								<li class="breadcrumb-item">Admin</li>
								<li class="breadcrumb-item active">Thông tin chung website</li>
							</ol>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<!-- end row -->
				
				<div class="row mb-3">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-12">                      
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="fa fa-book"></i> Thông tin đầu trang<button type="button" class="btn btn-success float-right" v-if="!showheaderinfo" v-on:click="showHeader()"><span class="btn-label"><i class="fa fa-pencil"></i></span> Chỉnh sửa</button></h3>
                        </div>
                            
                        <div class="card-body">
                        	<form v-on:submit.prevent="editHeaderInfo">
                            <div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="font-weight-bold">Tiêu đề</label>
										<input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập tiêu đề" required="" v-model="homes.header" readonly="" v-if="!showheaderinfo">
										<input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập tiêu đề" required="" v-model="homes.header" v-if="showheaderinfo">
									</div>
									<div class="form-group">
										<label class="font-weight-bold">Nội dung</label>
										<textarea class="form-control" rows="6" v-model="homes.header_content" readonly="" v-if="!showheaderinfo"></textarea>
										<textarea class="form-control" rows="6" v-model="homes.header_content" v-if="showheaderinfo"></textarea>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="font-weight-bold">Danh sách trong phần hiệu ứng</label>
										<p>
											<button class="btn btn-primary" type="button"data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
											Xem danh sách
											</button>
										</p>
										<div class="collapse" id="collapseExample">
											<div class="card card-body">
												<ul class="list-group">
													<li class="list-group-item">First item</li>
													<li class="list-group-item">Second item</li>
													<li class="list-group-item">Third item</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<!-- Lưu -->
								<div class="col-md-3"></div>
								<div class="col-md-3">
									<button type="submit" class="btn btn-primary float-right" v-if="showheaderinfo"><span class="btn-label"><i class="fa fa-save"></i></span> Lưu lại</button>
								</div>
								<div class="col-md-6">
									<router-link :to="{ name: 'AdminLibraryVideo'}" class="btn btn-danger" v-if="showheaderinfo"><span class="btn-label"><i class="fa fa-times"></i></span>Hủy bỏ</router-link>
								</div>
								<!-- end lưu -->
                            </div> <!-- end row -->

                            </form>
                        </div>  <!-- end card-body -->                        
                    </div><!-- end card-->                  
                </div>
			</div>
			<!-- end row -->
			<div class="row mb-3">
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">                      
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="fa fa-book"></i> Thông tin liên hệ<button type="button" class="btn btn-success float-right" v-if="!showcontactinfo" v-on:click="showContact()"><span class="btn-label"><i class="fa fa-pencil"></i></span> Chỉnh sửa</button></h3>
                        </div>
                            
                        <div class="card-body">
                        	<form v-on:submit.prevent="createLibraryVideo">
                            <div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="font-weight-bold">Email</label>
										<input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập tiêu đề" required="" v-model="homes.email">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="font-weight-bold">Điện thoại</label>
										<input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập tiêu đề" required="" v-model="homes.phone">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="font-weight-bold">Địa chỉ</label>
										<input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập tiêu đề" required="" v-model="homes.address">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="font-weight-bold">Fax</label>
										<input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập tiêu đề" required="" v-model="homes.fax">
									</div>
								</div>
								<!-- Lưu -->
								<div class="col-md-3"></div>
								<div class="col-md-3">
									<button type="submit" class="btn btn-primary float-right"><span class="btn-label"><i class="fa fa-save"></i></span> Lưu</button>
								</div>
								<div class="col-md-6">
									<router-link :to="{ name: 'AdminLibraryVideo'}" class="btn btn-danger"><span class="btn-label"><i class="fa fa-times"></i></span>Hủy</router-link>
								</div>
								<!-- end lưu -->
                            </div> <!-- end row -->

                            </form>
                        </div>  <!-- end card-body -->                        
                    </div><!-- end card-->                  
                </div>

				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">                      
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="fa fa-book"></i> Website liên kết</h3>
                        </div>
                            
                        <div class="card-body">
							<table class="table table-bordered">
							    <thead>
							      <tr>
							        <th>Số thứ tự</th>
							        <th>Tên trang web</th>
							        <th>Link</th>
							      </tr>
							    </thead>
							    <tbody>
							      <tr>
							        <td>John</td>
							        <td>Doe</td>
							        <td>john@example.com</td>
							      </tr>
							    </tbody>
							  </table>

                        </div>  <!-- end card-body -->                        
                    </div><!-- end card-->                  
                </div>

			</div>
			<!-- end row -->

			<div class="row mb-5">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-12">                      
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="fa fa-book"></i> Liên kết mạng xã hội</h3>
                        </div>
                            
                        <div class="card-body">
                        	<form v-on:submit.prevent="createLibraryVideo">
                            <div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="font-weight-bold">Facebook</label>
										<input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập tiêu đề" required="" v-model="homes.facebook">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="font-weight-bold">Twitter</label>
										<input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập tiêu đề" required="" v-model="homes.twitter">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="font-weight-bold">Linkedin</label>
										<input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập tiêu đề" required="" v-model="homes.linkedin">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="font-weight-bold">Youtube</label>
										<input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập tiêu đề" required="" v-model="homes.youtube">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="font-weight-bold">Link video youtube</label>
										<input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập tiêu đề" required="" v-model="homes.video_youtube_intro">
									</div>
								</div>
								<!-- Lưu -->
								<div class="col-md-3"></div>
								<div class="col-md-3">
									<button type="submit" class="btn btn-primary float-right"><span class="btn-label"><i class="fa fa-save"></i></span> Lưu lại</button>
								</div>
								<div class="col-md-6">
									<router-link :to="{ name: 'AdminLibraryVideo'}" class="btn btn-danger"><span class="btn-label"><i class="fa fa-times"></i></span>Hủy bỏ</router-link>
								</div>
								<!-- end lưu -->
                            </div> <!-- end row -->

                            </form>
                        </div>  <!-- end card-body -->                        
                    </div><!-- end card-->                  
                </div>
			</div>
			<!-- end row -->

			
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
				library_video: {},
				homes: {},
				showheaderinfo: false
			}
		},
		created(){
			axios.defaults.headers.common['Content-Type'] = 'application/json'
			axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')
			this.axios.get('/api/listhomeinfo').then((response) => {
				console.log(response.data)
				this.homes = response.data.homes
				// 
			}).catch((error) => {
				console.log(error)
			})
		},
		methods: {
			showHeader(){
				this.showheaderinfo = !this.showheaderinfo
			},
			editHeaderInfo(){
				this.showheaderinfo = !this.showheaderinfo
			},
			createLibraryVideo(){				
				axios.defaults.headers.common['Content-Type'] = 'multipart/form-data'
				axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')
				// let uri = `/api/library/video/create`;
				// this.axios.post(uri, this.library_video).then((response) => {
				// 	// console.log(response.data)
				// 	if(response.data.status){
				// 		alertify.set('notifier','position', 'buttom-right');
		 	// 			alertify.success(response.data.message);
				// 		this.$router.push({ name: 'AdminLibraryVideo'})
				// 	} else {
				// 		alertify.set('notifier','position', 'buttom-right');
		 	// 			alertify.error(response.data.message);
				// 	}
				// }).catch((error) => {
				// 	console.log(error)
				// })
			}
		}
	}
</script>

<style scoped>
	.hidden{display:none;}
</style>