<template>
	<div>
    	<app-user-blog-edit-breadcrumb-component></app-user-blog-edit-breadcrumb-component>
    	<div v-if="!complete" class="pt-5" style="min-height: 50vh">
            <div class="loading-spinner"></div>
        </div>
		<div class="container mt-5" v-if="complete">

			<div class="row mb-5">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-12">                      
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="fa fa-pencil"></i> Chỉnh sửa</h3>
                        </div>
                            
                        <div class="card-body">
                        	<form v-on:submit.prevent="updateBlog">
                            <div class="row">
                            	<div class="col-md-12">
									<div class="form-group">
										<label class="font-weight-bold">Tiêu đề</label>
										<input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập tiêu đề" required="" v-model="blogs.title">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<div class="form-group">
											<label class="font-weight-bold">Mô tả</label>
											<textarea class="form-control" id="" rows="10" v-model="blogs.description"></textarea>
										</div>
									</div>
								</div>
							 	<div class="col-md-6">
        							<label class="font-weight-bold">Chọn ảnh</label>
        							<div class="form-group" v-if="!checkSVG">
        								<input type="file" ref="file" id="file" v-on:change="onFileChange" />
										<div id="preview">
											<img v-if="url" :src="url" style="display: block; margin-left: auto; margin-right: auto; max-width: 350px" />
										</div>                                        
        							</div>
        							<div class="form-group" v-if="checkSVG">
        								<input type="file" ref="file" id="file" v-on:change="onFileChange" />
										<div id="preview">
											<img v-if="url" :src="url" style="display: block; margin-left: auto; margin-right: auto; max-width: 350px" />
										</div>         
        							</div>
      							</div>

								<div class="col-md-12">
									<div class="form-group">
										<label class="font-weight-bold">Nội dung</label>
										<textarea cols="30" rows="50" id="blogs_content">
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
									<router-link :to="{ name: 'BlogDetails', params: {id: blogid }}" class="btn btn-danger"><span class="btn-label"><i class="fa fa-times"></i></span>Hủy bỏ</router-link>
								</div>
								<!-- end lưu -->
                            </div> <!-- end row -->

                            </form>
                        </div>  <!-- end card-body -->                        
                    </div><!-- end card-->                  
                </div>
			</div>
        </div>
	</div>
</template>
<script>
	import UserBlogEditBreadcrumbComponent from './UserBlogEditBreadcrumbComponent.vue';

	export default {
		components: {
            appUserBlogEditBreadcrumbComponent: UserBlogEditBreadcrumbComponent,
        },
		data(){
			return {
				blogs: {},
				url: null,
				checkSVG: null,
				file: '',
				blogid: this.$route.params.id,
				complete: false
			}
		},
		created(){
			// console.log(this.$route.params.id)
			axios.defaults.headers.common['Content-Type'] = 'application/json'
			axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')
			this.axios.get(`/api/blog/show/${this.$route.params.id}`).then((response) =>{
				// console.log(response.data)
				this.blogs = response.data
				this.complete = true
				this.checkSVG = response.data.blog_image.indexOf('<svg') != -1
				if(!this.checkSVG){
					this.url = `images/blog/${this.blogs.blog_image}`
				}
			}).catch((error) => {
				console.log(error)
			})
		},
		methods: {
			onFileChange(e) {
				this.blogs.blog_image = e.target.files[0];
				this.url = URL.createObjectURL(this.blogs.blog_image);
				this.file = this.$refs.file.files[0];
				// console.log(this.file)
			},
			updateBlog(){
				var contentpost = tinymce.get("blogs_content").getContent();

				this.blogs.hasImage = true

				let formData = new FormData();
                formData.append('blog_image', this.blogs.blog_image);
                formData.append('title', this.blogs.title);
                formData.append('blog_content', contentpost);
                formData.append('description', this.blogs.description);
                // formData.append('featured', 0);
                formData.append('hasImage', true);
                formData.append('file', this.file);

                for (let [key, value] of formData.entries()) {
					if(key == 'blog_image') {
						if(value === 'undefined' || value === null || value.toString().indexOf('<svg') != -1){
							this.blogs.hasImage = false
						}
					}
					// console.log(key + ' : ' + value)
				}

				if(this.blogs.hasImage){
					axios.defaults.headers.common['Content-Type'] = 'multipart/form-data'
					axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')
					let uri = `/api/blog/updateuser/${this.$route.params.id}`;
					this.axios.post(uri, formData, {headers: {'Content-Type': 'multipart/form-data'}}).then((response) => {
						// console.log(response.data)
						if(response.data.status){
							alertify.set('notifier','position', 'buttom-right');
			 				alertify.success(response.data.message);
							this.$router.push({ name: 'BlogDetails', params: {id: this.$route.params.id}})
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
					
					axios.defaults.headers.common['Content-Type'] = 'application/json'
					axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')
					let uri = `/api/blog/updateuser/${this.$route.params.id}`;
					this.axios.post(uri, this.blogs).then((response) => {
						// console.log(response.data)
						if(response.data.status){
							alertify.set('notifier','position', 'buttom-right');
			 				alertify.success(response.data.message);
							this.$router.push({ name: 'BlogDetails', params: {id: this.$route.params.id}})
						} else {
							alertify.set('notifier','position', 'buttom-right');
			 				alertify.error(response.data.message);
						}
					}).catch((error) => {
						console.log(error)
					})
				}
			}
		},
		beforeUpdate(){
			$(document).ready(function() {
				if( tinymce.editors.length > 0 ){
					for( var i = 0; i < tinymce.editors.length; i++ ){
            			tinymce.editors[ i ].remove();
         			}
      			}
				tinymce.init({
					selector: "#blogs_content",
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
	}
</script>

<style scoped>
	.hidden{display:none;}
</style>