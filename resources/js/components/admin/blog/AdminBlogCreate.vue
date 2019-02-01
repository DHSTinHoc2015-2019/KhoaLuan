<template>
	<div class="content-page">
		<!-- Start content -->
        <div class="content">
			<div class="container-fluid">

				<div class="row">
					<div class="col-xl-12">
						<div class="breadcrumb-holder">
							<h1 class="main-title float-left font-weight-bold text-uppercase">Bài viết</h1>
							<ol class="breadcrumb float-right">
								<li class="breadcrumb-item">Admin</li>
								<li class="breadcrumb-item">Bài viết</li>
								<li class="breadcrumb-item active">Thêm</li>
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
                                <h3><i class="fa fa-plus" aria-hidden="true"></i> Thêm</h3>
                            </div>
                                
                            <div class="card-body">
                            	<form v-on:submit.prevent="createBlog" enctype="multipart/form-data">
                                <div class="row">
                                	<div class="col-md-12">
										<div class="form-group">
											<label class="font-weight-bold">Tiêu đề</label>
											<input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập tiêu đề" required="" v-model="blogs.title">
										</div>
									</div>
									<div class="col-md-12">
          								<div class="form-check form-group">
											<input class="form-check-input" type="checkbox" value="" id="defaultCheck1" v-model="blogs.featured">
											<label class="form-check-label font-weight-bold" v-if="blogs.featured">
											Nổi bật
											</label>
											<label class="form-check-label font-weight-bold" v-if="!blogs.featured">
											Không nổi bật
											</label>
										</div>
          							</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="font-weight-bold">Mô tả</label>
											<textarea class="form-control" id="" rows="10" v-model="blogs.description"></textarea>
										</div>
									</div>
								 	<div class="col-md-6">
            							<label class="font-weight-bold">Chọn ảnh</label>
            							<div class="form-group">
              								<input type="file" v-on:change="onFileChange" />
											<div id="preview">
												<img v-if="url" :src="url" style="display: block; margin-left: auto; margin-right: auto; max-width: 350px" />
											</div>                                        
            							</div>
          							</div>
      
									<div class="col-md-12">
										<div class="form-group">
											<label class="font-weight-bold">Nội dung</label>
											<textarea cols="30" rows="50" id="blog_content">
												{{ blogs.blog_content }}
											</textarea>

											<input name="image" type="file" id="upload" class="hidden">
										</div>
									</div>
									<!-- Lưu -->
									<div class="col-md-3"></div>
									<div class="col-md-3">
										<button type="submit" class="btn btn-primary float-right"><span class="btn-label"><i class="fa fa-save"></i></span> Lưu lại</button>
									</div>
									<div class="col-md-6">
										<router-link :to="{ name: 'AdminBlog'}" class="btn btn-danger"><span class="btn-label"><i class="fa fa-times"></i></span>Hủy bỏ</router-link>
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
		data(){
			return {
				blogs: {
					featured: false
				},
				url: null,
				user: null
			}
		},
		created(){
			this.user = JSON.parse(localStorage.getItem('tpack.user'))
			this.blogs.id_user = this.user.id
		},
		mounted(){
			$(document).ready(function() {
				if( tinymce.editors.length > 0 ){
					for( i = 0; i < tinymce.editors.length; i++ ){
            			tinymce.editors[ i ].remove();
         			}
      			}
				tinymce.init({
					selector: "#blog_content",
					theme: "modern",
					paste_data_images: true,
					plugins: [
						"advlist autolink lists link image charmap print preview hr anchor pagebreak",
						"searchreplace wordcount visualblocks visualchars code fullscreen",
						"insertdatetime media nonbreaking save table contextmenu directionality",
						"emoticons template paste textcolor colorpicker textpattern"
					],
					toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
					toolbar2: "print preview media | forecolor backcolor emoticons",
					image_advtab: true,
					file_picker_callback: function(callback, value, meta) {
						if (meta.filetype == 'image') {
							$('#upload').trigger('click');
							$('#upload').on('change', function() {
								var file = this.files[0];
								var reader = new FileReader();
								reader.onload = function(e) {
									callback(e.target.result, {
										alt: ''
									});
								};
								reader.readAsDataURL(file);
							});
						}
					},
					templates: [{
						title: 'Test template 1',
						content: 'Test 1'
					}, {
						title: 'Test template 2',
						content: 'Test 2'
					}]
				});
			});
		},
		methods: {
			onFileChange(e) {
				this.blogs.blog_image = e.target.files[0];
				this.url = URL.createObjectURL(this.blogs.blog_image);
			},
			createBlog(){
				//check file
				this.blogs.hasImage = true
				//content tinyMCE
				var contentpost = tinymce.get("blog_content").getContent();

				let formData = new FormData();
                formData.append('blog_image', this.blogs.blog_image);
                formData.append('title', this.blogs.title);
                formData.append('blog_content', contentpost);
                formData.append('featured', this.blogs.featured);
                formData.append('description', this.blogs.description);
                formData.append('hasImage', true);
                formData.append('id_user', this.user.id);

                for (let [key, value] of formData.entries()) {
					if(key == 'blog_image') {
						if(value === 'undefined' || value === null){
							this.blogs.hasImage = false
						}
					}
					// console.log(key + ' : ' + value)
				}

				if(this.blogs.hasImage){
					axios.defaults.headers.common['Content-Type'] = 'multipart/form-data'
					axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')
					let uri = `/api/blog/create`;
					this.axios.post(uri, formData).then((response) => {
						// console.log(response.data)
						if(response.data.status){
							alertify.set('notifier','position', 'buttom-right');
			 				alertify.success(response.data.message);
							this.$router.push({ name: 'AdminBlog'})
						} else {
							alertify.set('notifier','position', 'buttom-right');
			 				alertify.error(response.data.message);
						}
					}).catch((error) => {
						console.log(error)
					})
				} else {
					// console.log('khong co file')
					this.blogs.blog_content = contentpost
					var color = 'rgb(' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ')';
					this.blogs.blog_image = '<svg width="100%" height="220"><rect x="5" y="5" rx="10" ry="10" width="97%" height="210" style="fill:'+ color + ';stroke:black;stroke-width:5;"></rect> </svg>';

					axios.defaults.headers.common['Content-Type'] = 'application/json'
					axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')
					let uri = `/api/blog/create`;
					this.axios.post(uri, this.blogs).then((response) => {
						// console.log(response.data)
						if(response.data.status){
							alertify.set('notifier','position', 'buttom-right');
			 				alertify.success(response.data.message);
							this.$router.push({ name: 'AdminBlog'})
						} else {
							alertify.set('notifier','position', 'buttom-right');
			 				alertify.error(response.data.message);
						}
					}).catch((error) => {
						console.log(error)
					})
				}				
			},
			destroy(){
				this.$router.push({name: 'AdminBlog'});
			}
		}
	}
</script>

<style scoped>
	.hidden{display:none;}
</style>