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
										<textarea class="form-control" rows="12" v-model="homes.header_content" readonly="" v-if="!showheaderinfo"></textarea>
										<textarea class="form-control" rows="12" v-model="homes.header_content" v-if="showheaderinfo"></textarea>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="font-weight-bold">Danh sách trong phần hiệu ứng</label>
										<p>
											<button class="btn btn-primary" type="button"data-toggle="collapse" data-target="#collapseExample" aria-expanded="true" aria-controls="collapseExample">
											Xem danh sách
											</button>
										</p>
										<div class="collapse" id="collapseExample">
											<div class="card card-body">
												<input type="text" class="form-control">
												<button type="button" class="btn btn-primary mt-2 mb-2"></span> THÊM </button>
												<ul class="list-group" v-for="(value, index) in objheadercontent">
													<li class="list-group-item">
														<div class="row">
															<div class="col-md-10">
																<input type="text" class="form-control" v-model="value.val">
															</div>
															<div class="col-md-2">
																<button type="button" class="btn btn-danger btn-small"><i class="fa fa-times"></i></button>
															</div>
														</div>
													</li>
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
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="fa fa-book"></i> Thông tin liên hệ<button type="button" class="btn btn-success float-right" v-if="!showcontactinfo" v-on:click="showContact()"><span class="btn-label"><i class="fa fa-pencil"></i></span> Chỉnh sửa</button></h3>
                        </div>
                            
                        <div class="card-body">
                        	<form v-on:submit.prevent="editContactInfo">
                            <div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="font-weight-bold">Email</label>
										<input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập email" required="" v-model="homes.email" readonly="" v-if="!showcontactinfo">
										<input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập email" required="" v-model="homes.email" v-if="showcontactinfo">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="font-weight-bold">Điện thoại</label>
										<input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập số điện thoại" required="" v-model="homes.phone" readonly="" v-if="!showcontactinfo">
										<input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập số điện thoại" required="" v-model="homes.phone" v-if="showcontactinfo">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="font-weight-bold">Địa chỉ</label>
										<input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập địa chỉ" required="" v-model="homes.address" readonly="" v-if="!showcontactinfo">
										<input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập địa chỉ" required="" v-model="homes.address" v-if="showcontactinfo">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="font-weight-bold">Fax</label>
										<input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập fax" required="" v-model="homes.fax" readonly="" v-if="!showcontactinfo">
										<input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập fax" required="" v-model="homes.fax" v-if="showcontactinfo">
									</div>
								</div>
								<!-- Lưu -->
								<div class="col-md-3"></div>
								<div class="col-md-3">
									<button type="submit" class="btn btn-primary float-right" v-if="showcontactinfo"><span class="btn-label"><i class="fa fa-save"></i></span> Lưu</button>
								</div>
								<div class="col-md-6">
									<router-link :to="{ name: 'AdminLibraryVideo'}" class="btn btn-danger" v-if="showcontactinfo"><span class="btn-label"><i class="fa fa-times"></i></span>Hủy</router-link>
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
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-12">                      
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="fa fa-book"></i> Liên kết mạng xã hội<button type="button" class="btn btn-success float-right" v-if="!showsocialinfo" v-on:click="showSocial()"><span class="btn-label"><i class="fa fa-pencil"></i></span> Chỉnh sửa</button></h3>
                        </div>
                            
                        <div class="card-body">
                        	<form v-on:submit.prevent="editSocialInfo">
                            <div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="font-weight-bold">Facebook</label>
										<input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập địa chỉ facebook" required="" v-model="homes.facebook" readonly="" v-if="!showsocialinfo">
										<input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập địa chỉ facebook" required="" v-model="homes.facebook" v-if="showsocialinfo">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="font-weight-bold">Twitter</label>
										<input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập địa chỉ twitter" required="" v-model="homes.twitter" readonly="" v-if="!showsocialinfo">
										<input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập địa chỉ twitter" required="" v-model="homes.twitter" v-if="showsocialinfo">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="font-weight-bold">Linkedin</label>
										<input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập địa chỉ linkedin" required="" v-model="homes.linkedin" readonly="" v-if="!showsocialinfo">
										<input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập địa chỉ linkedin" required="" v-model="homes.linkedin" v-if="showsocialinfo">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="font-weight-bold">Youtube</label>
										<input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập địa chỉ youtube" required="" v-model="homes.youtube" readonly="" v-if="!showsocialinfo">
										<input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập địa chỉ youtube" required="" v-model="homes.youtube" v-if="showsocialinfo">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="font-weight-bold">Link video youtube</label>
										<input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập link youtube giới thiệu tpack" required="" v-model="homes.video_youtube_intro" readonly="" v-if="!showsocialinfo">
										<input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập link youtube giới thiệu tpack" required="" v-model="homes.video_youtube_intro" v-if="showsocialinfo">
									</div>
								</div>
								<!-- Lưu -->
								<div class="col-md-3"></div>
								<div class="col-md-3">
									<button type="submit" class="btn btn-primary float-right" v-if="showsocialinfo"><span class="btn-label"><i class="fa fa-save"></i></span> Lưu lại</button>
								</div>
								<div class="col-md-6">
									<router-link :to="{ name: 'AdminLibraryVideo'}" class="btn btn-danger" v-if="showsocialinfo"><span class="btn-label"><i class="fa fa-times"></i></span>Hủy bỏ</router-link>
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
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-12">                      
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="fa fa-book"></i> Website liên kết</h3>
                        </div>
                            
                        <div class="card-body">
							<table class="table table-bordered">
							    <thead>
							      <tr>
							        <th>STT</th>
							        <th>Tên trang web</th>
							        <th>Link</th>
							        <th>Tùy chọn</th>
							      </tr>
							    </thead>
							    <tbody>
							      <tr v-for="(value, index) in links">
							        <td>{{index + 1}}</td>
							        <td>{{value.name}}</td>
							        <td>{{value.link}}</td>
							        <td>
							        	<button type="button" class="btn btn-danger btn-small" style="display: block; margin-left: auto; margin-right: auto;"><span><i class="fa fa-times"></i></span></button>
							        </td>
							      </tr>
							    </tbody>
							  </table>
							
                        </div>  <!-- end card-body -->
                        <div class="card-footer">
                        	<button type="button" class="btn btn-primary btn-small"><span class="btn-label"><i class="fa fa-plus"></i></span>Thêm trang liên kết</button>
                        </div>                   
                    </div><!-- end card-->                  
                </div>
			</div>
			<!-- end row -->
			
			<div class="row mb-5">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="fa fa-book"></i> Server NodeJS<button type="button" class="btn btn-success float-right btn-small" v-if="!showcontactinfo" v-on:click="showContact()"><span class="btn-label btn-small"><i class="fa fa-pencil"></i></span> Chỉnh sửa</button></h3>
                        </div>
                            
                        <div class="card-body">
                        	<form v-on:submit.prevent="editLinkNodeJS">
                            <div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="font-weight-bold">Đường dẫn liên kết</label>
										<input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập liên kết" required="" v-model="homes.link_serve_nodejs" readonly="" v-if="!showlinknodejs">
										<input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập đường dẫn liên kết" required="" v-model="homes.link_serve_nodejs" v-if="showlinknodejs">
									</div>
								</div>
								<!-- Lưu -->
								<div class="col-md-3"></div>
								<div class="col-md-3">
									<button type="submit" class="btn btn-primary float-right" v-if="showcontactinfo"><span class="btn-label"><i class="fa fa-save"></i></span> Lưu</button>
								</div>
								<div class="col-md-6">
									<router-link :to="{ name: 'AdminLibraryVideo'}" class="btn btn-danger" v-if="showcontactinfo"><span class="btn-label"><i class="fa fa-times"></i></span>Hủy</router-link>
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
				showheaderinfo: false,
				showcontactinfo: false,
				showsocialinfo: false,
				showlinknodejs: false,
				objheadercontent: [],
				links: {}
			}
		},
		created(){
			axios.defaults.headers.common['Content-Type'] = 'application/json'
			axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')
			this.axios.get('/api/listhomeinfo').then((response) => {
				console.log(response.data)
				this.homes = response.data.homes
				this.links = response.data.links
				var res = response.data.homes.header_animation.split(",")
				for(var i = 0; i < res.length; i++){
					this.objheadercontent.push({"val": res[i]})
				}
				// 
				// this.$set(this.replyComment, i, false)
			}).catch((error) => {
				console.log(error)
			})
		},
		methods: {
			showHeader(){
				this.showheaderinfo = !this.showheaderinfo
			},
			showContact(){
				this.showcontactinfo = !this.showcontactinfo
			},
			showSocial(){
				this.showsocialinfo = !this.showsocialinfo
			},
			editHeaderInfo(){
				this.showheaderinfo = !this.showheaderinfo
			},
			editContactInfo(){
				this.showcontactinfo = !this.showcontactinfo
			},
			editSocialInfo(){
				this.showsocialinfo = !this.showsocialinfo
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