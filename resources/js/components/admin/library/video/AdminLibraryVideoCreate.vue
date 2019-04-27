<template>
	<div class="content-page">
		<!-- Start content -->
        <div class="content">
			<div class="container-fluid">

				<div class="row">
					<div class="col-xl-12">
						<div class="breadcrumb-holder">
							<h1 class="main-title float-left font-weight-bold text-uppercase">Thư viện video</h1>
							<ol class="breadcrumb float-right">
								<li class="breadcrumb-item">Admin</li>
								<li class="breadcrumb-item">Thư viện video</li>
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
                            <h3><i class="fa fa-plus"></i> Đăng video mới</h3>
                        </div>
                            
                        <div class="card-body">
                        	<form v-on:submit.prevent="createLibraryVideo">
                            <div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="font-weight-bold">Tiêu đề</label>
										<input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập tiêu đề" required="" v-model="library_video.title">
									</div>
								</div>
							 	<div class="col-md-6">
									<div class="form-group">
										<label class="font-weight-bold">Link video</label>
										<input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập đường dẫn" required="" v-model="library_video.file_name">
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
				user: null,
			}
		},
		created(){
			this.user = JSON.parse(localStorage.getItem('tpack.user'))
			this.library_video.id_user = this.user.id
		},
		methods: {
			createLibraryVideo(){				
				axios.defaults.headers.common['Content-Type'] = 'multipart/form-data'
				axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')
				let uri = `/api/library/video/create`;
				this.axios.post(uri, this.library_video).then((response) => {
					// console.log(response.data)
					if(response.data.status){
						alertify.set('notifier','position', 'buttom-right');
		 				alertify.success(response.data.message);
						this.$router.push({ name: 'AdminLibraryVideo'})
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