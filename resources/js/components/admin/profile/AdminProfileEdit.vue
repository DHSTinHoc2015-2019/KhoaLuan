<template>
	<div class="content-page">
		<!-- Start content -->
        <div class="content">
			<div class="container-fluid">

				<div class="row">
					<div class="col-xl-12">
						<div class="breadcrumb-holder">
							<h1 class="main-title float-left">Giới thiệu</h1>
							<ol class="breadcrumb float-right">
								<li class="breadcrumb-item">Home</li>
								<li class="breadcrumb-item active">Giới thiệu</li>
								<li class="breadcrumb-item active">Chỉnh sửa</li>
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
                                <h3><i class="fa fa-pencil"></i> Chỉnh sửa</h3>
                            </div>
                                
                            <div class="card-body">
                            	<form v-on:submit.prevent="updateIntro">
                                <div class="row">
                                	<div class="col-md-12">
										<div class="form-group">
											<textarea name="contentintro" cols="30" rows="50">
												{{ intros.introduction_content }}
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
										<button v-on:click="destroy" class="btn btn-danger" type="button"><span class="btn-label"><i class="fa fa-times"></i></span>Hủy bỏ</button>
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
				intros: {}
			}
		},
		created(){
			this.axios.get('/api/introduction').then((response) => {
				this.intros = response.data
			}).catch((error) => {
				console.log(error)
			})
		},
		beforeUpdate(){
			var content = this.intros.introduction_content
			$(document).ready(function() {
				if( tinymce.editors.length > 0 ){
					for( i = 0; i < tinymce.editors.length; i++ ){
            			tinymce.editors[ i ].remove();
         			}
      			}
				tinymce.init({
					selector: "textarea",
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

				tinymce.get('contentintro').setContent(content);
			});
		},
		methods: {
			updateIntro(){
				var contentpost = tinymce.get('contentintro').getContent();
				axios.defaults.headers.common['Content-Type'] = 'application/json'
				axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')
				let uri = `/api/introduction/update`;
				// console.log(this.intros.introduction_content)
				this.axios.post(uri, { contentpost: contentpost }).then((response) => {
					if(response.data.status){
						alertify.set('notifier','position', 'buttom-right');
		 				alertify.success(response.data.message);
						this.$router.push({ name: 'AdminIntro'})
					} else {
						alertify.set('notifier','position', 'buttom-right');
		 				alertify.error(response.data.message);
					}
				}).catch((error) => {
					console.log(error)
				})
			},
			destroy(){
				this.$router.push({name: 'AdminIntro'});
			}
		}
	}
</script>

<style scoped>
	.hidden{display:none;}
</style>