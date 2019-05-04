<template>
	<div class="content-page">
		<!-- Start content -->
        <div class="content">
			<div class="container-fluid">

				<div class="row">
					<div class="col-xl-12">
						<div class="breadcrumb-holder">
							<h1 class="main-title float-left font-weight-bold text-uppercase">Người dùng</h1>
							<ol class="breadcrumb float-right">
								<li class="breadcrumb-item">Admin</li>
								<li class="breadcrumb-item">Người dùng</li>
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
                            	<form v-on:submit.prevent="editAccount" enctype="multipart/form-data">
                                <div class="row">
                                	<div class="col-md-6">
										<div class="form-group">
											<label class="font-weight-bold">Tên đăng nhập</label>
											<input type="text" class="form-control" aria-describedby="" placeholder="Nhập tên đăng nhập" required="" v-model="users.name">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="font-weight-bold">Email</label>
											<input type="email" class="form-control" aria-describedby="" placeholder="Nhập email" required="" v-model="users.email">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="font-weight-bold">Tên hiển thị</label>
											<input type="text" class="form-control" aria-describedby="" placeholder="Nhập tên hiển thị" required="" v-model="users.display_name">
										</div>
									</div>
									<div class="col-md-6">
          								<div class="form-check form-group">
          									<h5 class="form-check-label font-weight-bold">Loại tài khoản</h5>
											<input class="form-check-input" type="checkbox" value="" id="defaultCheck1" v-model="users.is_admin">
											<label class="form-check-label font-weight-bold" v-if="users.is_admin" style="color: red;">
											Tài khoản admin
											</label>
											<label class="form-check-label font-weight-bold" v-if="!users.is_admin" style="color: red;">
											Tài khoản user
											</label>
										</div>
          							</div>
          							<div class="col-md-6">
          								<div class="form-check form-group">
          									<h5 class="form-check-label font-weight-bold">Giới tính</h5>
											<input class="form-check-input" type="checkbox" value="" id="defaultCheck2" v-model="users.gioitinh">
											<label class="form-check-label font-weight-bold" v-if="users.gioitinh" style="color: red;">
											Nam
											</label>
											<label class="form-check-label font-weight-bold" v-if="!users.gioitinh" style="color: red;">
											Nữ
											</label>
										</div>
          							</div>

          							<div class="col-md-6">
										<div class="form-group">
											<label class="font-weight-bold">Số điện thoại</label>
											<input type="text" class="form-control" aria-describedby="" placeholder="Nhập số điện thoại" required="" v-model="users.phone">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="font-weight-bold">Địa chỉ</label>
											<input type="text" class="form-control" aria-describedby="" placeholder="Nhập địa chỉ" required="" v-model="users.address">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="font-weight-bold">Ngày sinh</label>
											<input type="date" class="form-control" aria-describedby="" placeholder="Nhập ngày sinh" required="" id="setdate">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="font-weight-bold">Giới thiệu bản thân</label>
											<textarea class="form-control" rows="10" v-model="users.introduce_yourself"></textarea>
										</div>
									</div>
								 	<div class="col-md-6">
	        							<label class="font-weight-bold">Chọn ảnh</label>
	        							<div class="form-group">

	        								<input type="file" id="file" v-on:change="onFileChange()"/>
	        								<div id="imagePreview" v-if="users.user_image != null">
	        									<img :src="'/images/users/' + users.user_image" alt="" style="display: block; margin-left: auto; margin-right: auto; max-width: 350px">
	        								</div>
	        								<div v-else id="imagePreview"></div>
	        							</div>
	      							</div>
      
									<!-- Lưu -->
									<div class="col-md-3"></div>
									<div class="col-md-3">
										<button type="submit" class="btn btn-primary float-right"><span class="btn-label"><i class="fa fa-save"></i></span> Lưu lại</button>
									</div>
									<div class="col-md-6">
										<router-link :to="{ name: 'AdminAccount'}" class="btn btn-danger"><span class="btn-label"><i class="fa fa-times"></i></span>Hủy bỏ</router-link>
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
				users:{
					gioitinh: false
				},
				file: '',
				date: ''
			}
		},
		created(){
			axios.defaults.headers.common['Content-Type'] = 'application/json'
			axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')
			this.axios.get(`/api/users/showid/${this.$route.params.id}`).then((response) =>{
				console.log(response.data.user)
				this.users = response.data.user
				if(this.users.gender == 'Nam') this.users.gioitinh = true;
				else this.users.gioitinh = false;
				this.date = this.users.birthday.toString()
			}).catch((error) => {
				console.log(error)
			})
		},
		beforeUpdate(){
			var d = this.date.split('-')[0]
			var m = this.date.split('-')[1]
			var y = this.date.split('-')[2]
			$('#setdate').val(y + '-' + m + '-' + d);
			console.log($('#setdate').val())
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
			editAccount(){
				this.users.birthday = this.convertDate($('#setdate').val())
				this.users.file = this.file
				let formData = new FormData();
                formData.append('name', this.users.name);
                formData.append('password', this.users.password);
                formData.append('email', this.users.email);
                formData.append('is_admin', this.users.is_admin);
                formData.append('display_name', this.users.display_name);
                formData.append('gender', this.users.gioitinh ? 'Nam' : 'Nữ');
                formData.append('birthday', this.users.birthday);
                formData.append('phone', this.users.phone);
                formData.append('address', this.users.address);
                formData.append('introduce_yourself', this.users.introduce_yourself);
                formData.append('file', this.users.file);

                for (let [key, value] of formData.entries()) {
					console.log(key + ' : ' + value)
				}

				axios.defaults.headers.common['Content-Type'] = 'multipart/form-data'
				axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')
				let uri = '/api/users/edit/' + this.$route.params.id;
				this.axios.post(uri, formData).then((response) => {
					if(response.data.status){
						alertify.set('notifier','position', 'buttom-right');
		 				alertify.success(response.data.message);
						this.$router.push({ name: 'AdminAccount'})
					} else {
						alertify.set('notifier','position', 'buttom-right');
		 				alertify.error(response.data.message);
					}
				}).catch((error) => {
					console.log(error)
				})				
			},
			pad(s){
                return (s < 10) ? '0' + s : s;
            },
            convertDate(inputFormat) {
              var d = new Date(inputFormat);
              return [this.pad(d.getDate()), this.pad(d.getMonth()+1), d.getFullYear()].join('-');
            }
		}
	}
</script>

<style scoped>
	.hidden{display:none;}
</style>