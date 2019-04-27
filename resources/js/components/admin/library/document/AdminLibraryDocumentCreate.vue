<template>
	<div class="content-page">
		<!-- Start content -->
        <div class="content">
			<div class="container-fluid">

				<div class="row">
					<div class="col-xl-12">
						<div class="breadcrumb-holder">
							<h1 class="main-title float-left font-weight-bold text-uppercase">Thư viện - tài liệu</h1>
							<ol class="breadcrumb float-right">
								<li class="breadcrumb-item">Admin</li>
								<li class="breadcrumb-item">Thư viện tài liệu</li>
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
                            <h3><i class="fa fa-plus"></i> Đăng tài liệu mới</h3>
                        </div>
                            
                        <div class="card-body">
                        	<form v-on:submit.prevent="createLibraryDocument">
                            <div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="font-weight-bold">Tiêu đề</label>
										<input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập tiêu đề" required="" v-model="library_document.title">
									</div>
								</div>
							 	<div class="col-md-6">
        							<label class="font-weight-bold">Chọn tài liệu</label>
        							<div class="form-group">
	    								<input type="file" id="file" v-on:change="onFileChange()"/>
        							</div>
      							</div>
								<!-- Lưu -->
								<div class="col-md-3"></div>
								<div class="col-md-3">
									<button type="submit" class="btn btn-primary float-right"><span class="btn-label"><i class="fa fa-save"></i></span> Lưu lại</button>
								</div>
								<div class="col-md-6">
									<router-link :to="{ name: 'AdminLibraryDocument'}" class="btn btn-danger"><span class="btn-label"><i class="fa fa-times"></i></span>Hủy bỏ</router-link>
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
				library_document: {},
				file: '',
				user: null,
			}
		},
		created(){
			this.user = JSON.parse(localStorage.getItem('tpack.user'))
			this.library_document.id_user = this.user.id
		},
		mounted(){

		},
		methods: {
			onFileChange(){
			    var fileInput = document.getElementById('file');
			    var filePath = fileInput.value;
			    var allowedExtensions = /(\.doc|\.docx|\.pdf|\.txt|\.ppt|\.pptx)$/i;
			    if(!allowedExtensions.exec(filePath)){
		            alertify.set('notifier','position', 'buttom-right');
                    alertify.error('Vui lòng đăng tài liệu với đuôi .doc/.docx/.txt/.pdf/.ppt/.pptx');
			        fileInput.value = '';
			    }else{
			        //Image preview
			        if (fileInput.files && fileInput.files[0]) {
			            var reader = new FileReader();
			            reader.readAsDataURL(fileInput.files[0]);
			            this.file = fileInput.files[0]
			        }
			    }
			},
			createLibraryDocument(){
				this.library_document.file = this.file

				let formData = new FormData();
                formData.append('file', this.library_document.file);
                formData.append('title', this.library_document.title);
                formData.append('id_user', this.library_document.id_user);

    //            for (let [key, value] of formData.entries()) {
				// 	console.log(key + ' : ' + value)
				// }
				
				axios.defaults.headers.common['Content-Type'] = 'multipart/form-data'
				axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')
				let uri = `/api/library/document/create`;
				this.axios.post(uri, formData).then((response) => {
					// console.log(response.data)
					if(response.data.status){
						alertify.set('notifier','position', 'buttom-right');
		 				alertify.success(response.data.message);
						this.$router.push({ name: 'AdminLibraryDocument'})
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