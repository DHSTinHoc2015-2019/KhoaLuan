<template>
	<div class="content-page">
		<!-- Start content -->
        <div class="content">
			<div class="container-fluid">

				<div class="row">
					<div class="col-xl-12">
						<div class="breadcrumb-holder">
							<h1 class="main-title float-left font-weight-bold text-uppercase">Thư viện</h1>
							<ol class="breadcrumb float-right">
								<li class="breadcrumb-item">Admin</li>
								<li class="breadcrumb-item">Thư viện hình ảnh</li>
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
                            <h3><i class="fa fa-plus"></i> Đăng ảnh mới</h3>
                        </div>
                            
                        <div class="card-body">
                        	<form v-on:submit.prevent="createLibraryImage">
                            <div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="font-weight-bold">Tiêu đề</label>
										<input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập tiêu đề" required="" v-model="library_image.title">
									</div>
								</div>
							 	<div class="col-md-6">
        							<label class="font-weight-bold">Chọn ảnh</label>
        							<div class="form-group">

        								<input type="file" id="file" v-on:change="onFileChange()"/>
        								<div id="imagePreview"></div>    
        							</div>
      							</div>
								<!-- Lưu -->
								<div class="col-md-3"></div>
								<div class="col-md-3">
									<button type="submit" class="btn btn-primary float-right"><span class="btn-label"><i class="fa fa-save"></i></span> Lưu lại</button>
								</div>
								<div class="col-md-6">
									<router-link :to="{ name: 'AdminLibraryImage'}" class="btn btn-danger"><span class="btn-label"><i class="fa fa-times"></i></span>Hủy bỏ</router-link>
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
				library_image: {},
				file: '',
				user: null,
			}
		},
		created(){
			this.user = JSON.parse(localStorage.getItem('tpack.user'))
			this.library_image.id_user = this.user.id
		},
		mounted(){

		},
		methods: {
			onFileChange(){
			    var fileInput = document.getElementById('file');
			    var filePath = fileInput.value;
			    var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
			    if(!allowedExtensions.exec(filePath)){
		            alertify.set('notifier','position', 'buttom-right');
                    alertify.error('Vui lòng đăng ảnh với đuôi .jpeg/.jpg/.png');
			        fileInput.value = '';
			        document.getElementById('imagePreview').innerHTML = ""
			    }else{
			        //Image preview
			        if (fileInput.files && fileInput.files[0]) {
			            var reader = new FileReader();
			            reader.onload = function(e) {
			                document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+ '" style="display: block; margin-left: auto; margin-right: auto; max-width: 350px"' + ' />';
			            };
			            reader.readAsDataURL(fileInput.files[0]);
			            this.file = fileInput.files[0]
			        }
			    }
			},
			createLibraryImage(){
				this.library_image.file = this.file

				let formData = new FormData();
                formData.append('file', this.library_image.file);
                formData.append('title', this.library_image.title);
                formData.append('id_user', this.library_image.id_user);

    //            for (let [key, value] of formData.entries()) {
				// 	console.log(key + ' : ' + value)
				// }
				
				axios.defaults.headers.common['Content-Type'] = 'multipart/form-data'
				axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')
				let uri = `/api/library/image/create`;
				this.axios.post(uri, formData).then((response) => {
					// console.log(response.data)
					if(response.data.status){
						alertify.set('notifier','position', 'buttom-right');
		 				alertify.success(response.data.message);
						this.$router.push({ name: 'AdminLibraryImage'})
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