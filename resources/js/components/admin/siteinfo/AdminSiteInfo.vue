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
										<input type="text" class="form-control" aria-describedby="" placeholder="Nhập tiêu đề" required="" v-model="homes.header" readonly="" v-if="!showheaderinfo">
										<input type="text" class="form-control" aria-describedby="" placeholder="Nhập tiêu đề" required="" v-model="homes.header" v-if="showheaderinfo">
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
												<input type="text" class="form-control" v-model="contentanimation">
												<button type="button" class="btn btn-primary mt-2 mb-2" disabled="" v-if="!showlistani"></span> THÊM </button>
												<button type="button" class="btn btn-primary mt-2 mb-2" v-if="showlistani" v-on:click="addAnimation()"></span> THÊM </button>
												<ul class="list-group" v-for="(value, index) in objheaderanimation">
													<li class="list-group-item">
														<div class="row">
															<div class="col-md-10">
																<input type="text" class="form-control" v-model="value.val" v-if="!showlistani" readonly="">
																<input type="text" class="form-control" v-model="value.val" v-if="showlistani">
															</div>
															<div class="col-md-2">
																<button type="button" class="btn btn-danger btn-small" disabled="" v-if="!showlistani" v-on:click="removeElement(index)"><i class="fa fa-times"></i></button>
																<button type="button" class="btn btn-danger btn-small" v-if="showlistani" v-on:click="removeElement(index)"><i class="fa fa-times"></i></button>
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
									<a href="javascript:void(0)" class="btn btn-danger" v-if="showheaderinfo" v-on:click="showHeader()"><span class="btn-label"><i class="fa fa-times"></i></span>Hủy bỏ</a>
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
										<input type="email" class="form-control" aria-describedby="" placeholder="Nhập email" required="" v-model="homes.email" readonly="" v-if="!showcontactinfo">
										<input type="text" class="form-control" aria-describedby="" placeholder="Nhập email" required="" v-model="homes.email" v-if="showcontactinfo">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="font-weight-bold">Điện thoại</label>
										<input type="text" class="form-control" aria-describedby="" placeholder="Nhập số điện thoại" required="" v-model="homes.phone" readonly="" v-if="!showcontactinfo">
										<input type="text" class="form-control" aria-describedby="" placeholder="Nhập số điện thoại" required="" v-model="homes.phone" v-if="showcontactinfo">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="font-weight-bold">Địa chỉ</label>
										<input type="text" class="form-control" aria-describedby="" placeholder="Nhập địa chỉ" required="" v-model="homes.address" readonly="" v-if="!showcontactinfo">
										<input type="text" class="form-control" aria-describedby="" placeholder="Nhập địa chỉ" required="" v-model="homes.address" v-if="showcontactinfo">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="font-weight-bold">Fax</label>
										<input type="text" class="form-control" aria-describedby="" placeholder="Nhập fax" required="" v-model="homes.fax" readonly="" v-if="!showcontactinfo">
										<input type="text" class="form-control" aria-describedby="" placeholder="Nhập fax" required="" v-model="homes.fax" v-if="showcontactinfo">
									</div>
								</div>
								<!-- Lưu -->
								<div class="col-md-3"></div>
								<div class="col-md-3">
									<button type="submit" class="btn btn-primary float-right" v-if="showcontactinfo"><span class="btn-label"><i class="fa fa-save"></i></span> Lưu</button>
								</div>
								<div class="col-md-6">
									<a href="javascript:void(0)" class="btn btn-danger" v-if="showcontactinfo" v-on:click="showContact()"><span class="btn-label"><i class="fa fa-times"></i></span>Hủy bỏ</a>
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
										<input type="text" class="form-control" aria-describedby="" placeholder="Nhập địa chỉ facebook" required="" v-model="homes.facebook" readonly="" v-if="!showsocialinfo">
										<input type="text" class="form-control" aria-describedby="" placeholder="Nhập địa chỉ facebook" required="" v-model="homes.facebook" v-if="showsocialinfo">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="font-weight-bold">Twitter</label>
										<input type="text" class="form-control" aria-describedby="" placeholder="Nhập địa chỉ twitter" required="" v-model="homes.twitter" readonly="" v-if="!showsocialinfo">
										<input type="text" class="form-control" aria-describedby="" placeholder="Nhập địa chỉ twitter" required="" v-model="homes.twitter" v-if="showsocialinfo">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="font-weight-bold">Linkedin</label>
										<input type="text" class="form-control" aria-describedby="" placeholder="Nhập địa chỉ linkedin" required="" v-model="homes.linkedin" readonly="" v-if="!showsocialinfo">
										<input type="text" class="form-control" aria-describedby="" placeholder="Nhập địa chỉ linkedin" required="" v-model="homes.linkedin" v-if="showsocialinfo">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="font-weight-bold">Youtube</label>
										<input type="text" class="form-control" aria-describedby="" placeholder="Nhập địa chỉ youtube" required="" v-model="homes.youtube" readonly="" v-if="!showsocialinfo">
										<input type="text" class="form-control" aria-describedby="" placeholder="Nhập địa chỉ youtube" required="" v-model="homes.youtube" v-if="showsocialinfo">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="font-weight-bold">Link video youtube</label>
										<input type="text" class="form-control" aria-describedby="" placeholder="Nhập link youtube giới thiệu tpack" required="" v-model="homes.video_youtube_intro" readonly="" v-if="!showsocialinfo">
										<input type="text" class="form-control" aria-describedby="" placeholder="Nhập link youtube giới thiệu tpack" required="" v-model="homes.video_youtube_intro" v-if="showsocialinfo">
									</div>
								</div>
								<!-- Lưu -->
								<div class="col-md-3"></div>
								<div class="col-md-3">
									<button type="submit" class="btn btn-primary float-right" v-if="showsocialinfo"><span class="btn-label"><i class="fa fa-save"></i></span> Lưu lại</button>
								</div>
								<div class="col-md-6">
									<a href="javascript:void(0)" class="btn btn-danger" v-if="showsocialinfo" v-on:click="showSocial()"><span class="btn-label"><i class="fa fa-times"></i></span>Hủy bỏ</a>
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
										<button type="button" class="btn btn-danger btn-small" style="display: block; margin-left: auto; margin-right: auto;" v-on:click="deleteLink(value.id, index)"><span><i class="fa fa-times"></i></span></button>
										</td>
									</tr>
								</tbody>
							</table>
							
	                    </div>  <!-- end card-body -->
	                    <div class="card-footer">
	                    	<form v-on:submit.prevent="createLinks">
	                        	<div class="row">
	                        		<div class="col-md-3">
	                        			<div class="form-group">
											<label class="font-weight-bold">Tên trang web</label>
											<input type="text" class="form-control" aria-describedby="" placeholder="Nhập tên trang web" required="" v-model="website_name">
										</div>
	                        		</div>
	                        		<div class="col-md-6">
	                        			<div class="form-group">
											<label class="font-weight-bold">Link trang web</label>
											<input type="text" class="form-control" aria-describedby="" placeholder="Nhập link trang web" required="" v-model="website_link">
										</div>
	                        		</div>
	                        		<div class="col-md-3">
	                    				<button type="submit" class="btn btn-primary btn-small mt-4"><span class="btn-label"><i class="fa fa-plus"></i></span>Thêm trang liên kết</button>
	                        		</div>
	                        	</div>
	                    	</form>
	                    </div>                   
	                </div><!-- end card-->
                </div>       
            </div>
			<!-- end row -->

			<div class="row mb-5">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="fa fa-book"></i> Server NodeJS<button type="button" class="btn btn-success float-right btn-small" v-if="!showcontactinfo" v-on:click="showLinkNode()"><span class="btn-label btn-small"><i class="fa fa-pencil"></i></span> Chỉnh sửa</button></h3>
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
									<button type="submit" class="btn btn-primary float-right" v-if="showlinknodejs"><span class="btn-label"><i class="fa fa-save"></i></span> Lưu</button>
								</div>
								<div class="col-md-6">
									<a href="javascript:void(0)" class="btn btn-danger" v-if="showlinknodejs" v-on:click="showLinkNode()"><span class="btn-label"><i class="fa fa-times"></i></span>Hủy bỏ</a>
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
				contentanimation: '',
				homes: {},
				showlistani: false,
				showheaderinfo: false,
				showcontactinfo: false,
				showsocialinfo: false,
				showlinknodejs: false,
				objheaderanimation: [],
				links: {},
				website_name: '',
				website_link: ''
			}
		},
		created(){
			this.getData()
		},
		methods: {
			addAnimation(){
				if(this.contentanimation.trim().length != 0){
					this.objheaderanimation.push({"val": this.contentanimation})
					this.contentanimation = ''
				}
			},
			removeElement(ind){
				this.objheaderanimation.splice(ind, 1)
			},
			showHeader(){
				this.showheaderinfo = !this.showheaderinfo
				this.showlistani = !this.showlistani
			},
			showContact(){
				this.showcontactinfo = !this.showcontactinfo
			},
			showSocial(){
				this.showsocialinfo = !this.showsocialinfo
			},
			showLinkNode(){
				this.showlinknodejs = !this.showlinknodejs
			},
			editHeaderInfo(){
				var ani = ''
				for(var i = 0; i < this.objheaderanimation.length; i++){
					if(i == this.objheaderanimation.length - 1){
						ani += this.objheaderanimation[i].val
					} else ani += this.objheaderanimation[i].val + ','
				}
				let obj = {}
				obj.header = this.homes.header
				obj.header_content = this.homes.header_content
				obj.header_animation = ani
				// console.log(obj)
				axios.defaults.headers.common['Content-Type'] = 'application/json'
				axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')
				let uri = '/api/homes/edit/headers';
				this.axios.post(uri, obj).then((response) => {
					if(response.data.status){
						alertify.set('notifier','position', 'buttom-right');
		 				alertify.success(response.data.message);
						this.showHeader()
					} else {
						alertify.set('notifier','position', 'buttom-right');
		 				alertify.error(response.data.message);
					}
				}).catch((error) => {
					console.log(error)
				})				
			},
			editContactInfo(){
				let obj = {}
				obj.email = this.homes.email
				obj.phone = this.homes.phone
				obj.address = this.homes.address
				obj.fax = this.homes.fax
				// console.log(obj)
				axios.defaults.headers.common['Content-Type'] = 'application/json'
				axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')
				let uri = '/api/homes/edit/contact';
				this.axios.post(uri, obj).then((response) => {
					if(response.data.status){
						alertify.set('notifier','position', 'buttom-right');
		 				alertify.success(response.data.message);
						this.showContact()
					} else {
						alertify.set('notifier','position', 'buttom-right');
		 				alertify.error(response.data.message);
					}
				}).catch((error) => {
					console.log(error)
				})	
			},
			editSocialInfo(){
				let obj = {}
				obj.facebook = this.homes.facebook
				obj.twitter = this.homes.twitter
				obj.linkedin = this.homes.linkedin
				obj.youtube = this.homes.youtube
				obj.video_youtube_intro = this.homes.video_youtube_intro
				// console.log(obj)
				axios.defaults.headers.common['Content-Type'] = 'application/json'
				axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')
				let uri = '/api/homes/edit/social';
				this.axios.post(uri, obj).then((response) => {
					if(response.data.status){
						alertify.set('notifier','position', 'buttom-right');
		 				alertify.success(response.data.message);
						this.showSocial()
					} else {
						alertify.set('notifier','position', 'buttom-right');
		 				alertify.error(response.data.message);
					}
				}).catch((error) => {
					console.log(error)
				})	
			},
			createLinks(){
				axios.defaults.headers.common['Content-Type'] = 'application/json'
				axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')
				let obj = {}
				obj.name = this.website_name
				obj.link = this.website_link
				let uri = '/api/links/create';
				this.axios.post(uri, obj).then((response) => {
					if(response.data.status){
						alertify.set('notifier','position', 'buttom-right');
		 				alertify.success(response.data.message);
						this.getData()
						this.website_name = ''
						this.website_link = ''
					} else {
						alertify.set('notifier','position', 'buttom-right');
		 				alertify.error(response.data.message);
					}
				}).catch((error) => {
					console.log(error)
				})	
			},
			getData(){
				this.axios.get('/api/listhomeinfo').then((response) => {
					// console.log(response.data)
					this.homes = response.data.homes
					this.links = response.data.links
					var res = response.data.homes.header_animation.split(",")
					for(var i = 0; i < res.length; i++){
						this.objheaderanimation.push({"val": res[i]})
					}
				}).catch((error) => {
					console.log(error)
				})
			},
			deleteLink(id, index){
				axios.defaults.headers.common['Content-Type'] = 'application/json'
				axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')
				this.axios.get('/api/links/delete/' + id).then((response) => {
					if(response.data.status){
						alertify.set('notifier','position', 'buttom-right');
		 				alertify.success(response.data.message);
						this.links.splice(index, 1)
					} else {
						alertify.set('notifier','position', 'buttom-right');
		 				alertify.error(response.data.message);
					}
				}).catch((error) => {
					console.log(error)
				})	
			},
			editLinkNodeJS(){
				let obj = {}
				obj.link_serve_nodejs = this.homes.link_serve_nodejs
				axios.defaults.headers.common['Content-Type'] = 'application/json'
				axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')
				let uri = '/api/homes/edit/linknodejs';
				this.axios.post(uri, obj).then((response) => {
					if(response.data.status){
						alertify.set('notifier','position', 'buttom-right');
		 				alertify.success(response.data.message);
						this.showLinkNode()
					} else {
						alertify.set('notifier','position', 'buttom-right');
		 				alertify.error(response.data.message);
					}
				}).catch((error) => {
					console.log(error)
				})	
			}
		}
	}
</script>

<style scoped>
	.hidden{display:none;}
</style>