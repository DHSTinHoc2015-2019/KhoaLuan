<template>
	<div class="content-page">
		<!-- Start content -->
        <div class="content">
			<div class="container-fluid">

				<div class="row">
					<div class="col-xl-12">
						<div class="breadcrumb-holder">
							<h1 class="main-title float-left font-weight-bold text-uppercase">Tin tức</h1>
							<ol class="breadcrumb float-right">
								<li class="breadcrumb-item">Admin</li>
								<li class="breadcrumb-item">Tin tức</li>
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
                                <h3><i class="fa fa-pencil"></i> Thêm</h3>
                            </div>
                                
                            <div class="card-body">
                            	<form v-on:submit.prevent="createNews" enctype="multipart/form-data">
                                <div class="row">
                                	<div class="col-md-12">
										<div class="form-group">
											<label class="font-weight-bold">Tiêu đề</label>
											<input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập tiêu đề" required="" v-model="news.title">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<div class="form-group">
												<label class="font-weight-bold">Mô tả</label>
												<textarea class="form-control" id="" rows="10" v-model="news.description"></textarea>
											</div>
										</div>
									</div>
								 	<div class="col-md-6">
            							<label class="font-weight-bold">Chọn ảnh</label>
            							<div class="form-group">
              								<input type="file" name="file" id="profile-img" v-on:change="onImageChange"> 
              								<img v-bind:src="news.news_image" id="profile-img-tag" style="display: block; margin-left: auto; margin-right: auto; max-width: 200px" />                                        
            							</div>
          							</div>
      
									<div class="col-md-12">
										<div class="form-group">
											<label class="font-weight-bold">Nội dung</label>
											<textarea cols="30" rows="50" id="news_content">
												{{ news.news_content }}
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
										<router-link :to="{ name: 'News'}" class="btn btn-danger"><span class="btn-label"><i class="fa fa-times"></i></span>Hủy bỏ</router-link>
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
				news: {}
			}
		},
		mounted(){
			$(document).ready(function() {
				if( tinymce.editors.length > 0 ){
					for( i = 0; i < tinymce.editors.length; i++ ){
            			tinymce.editors[ i ].remove();
         			}
      			}
				tinymce.init({
					selector: "#news_content",
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
			onImageChange(e){
                this.news.news_image = e.target.files[0];
                var input = document.getElementById('profile-img')
                if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = function (e) {
						$('#profile-img-tag').attr('src', e.target.result);
					}
					reader.readAsDataURL(input.files[0]);
				}
            },
			createNews(){
				axios.defaults.headers.common['Content-Type'] = 'multipart/form-data'
				axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')

				var contentpost = tinymce.get("news_content").getContent();

				let formData = new FormData();
                formData.append('news_image', this.news.news_image);
                formData.append('title', this.news.title);
                formData.append('news_content', contentpost);
                formData.append('description', this.news.description);
				// console.log(formData)
				let uri = `/api/news/create`;
				this.axios.post(uri, formData).then((response) => {
					// console.log(response.data)
					if(response.data.status){
						alertify.set('notifier','position', 'buttom-right');
		 				alertify.success(response.data.message);
						this.$router.push({ name: 'News'})
					} else {
						alertify.set('notifier','position', 'buttom-right');
		 				alertify.error(response.data.message);
					}
				}).catch((error) => {
					console.log(error)
				})
			},
			destroy(){
				this.$router.push({name: 'News'});
			}
		}
	}
</script>

<style scoped>
	.hidden{display:none;}
</style>