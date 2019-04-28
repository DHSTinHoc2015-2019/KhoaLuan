<template>
	<div>
		<div v-if="!complete" class="pt-5" style="min-height: 50vh">
            <div class="loading-spinner"></div>
        </div>
        <!-- section -->
		<div class="section pb-3 pt-3" v-if="complete">
			<!-- container -->
			<div class="container emp-profile">
			    <form method="post">
			        <div class="row">
			            <div class="col-md-4">
			                <div class="profile-img">
			                    <img :src="'images/users/' + users.user_image" alt="avatar"/>
			                    <div class="file btn btn-lg btn-primary">
			                        Thay đổi ảnh đại diện
			                        <input type="file" name="file"/>
			                    </div>
			                </div>
			            </div>
			            <div class="col-md-6">
			                <div class="profile-head">
			                    <h2>
			                        {{ users.name }}
			                    </h2>
			                    <h6>
			                        Ngày tham gia: {{ convertDate(users.created_at)}}
			                    </h6>
			                    <p class="proile-rating">Điểm : <span>Đang cập nhật</span></p>
			                    <ul class="nav nav-tabs" id="myTab" role="tablist">
			                        <li class="nav-item">
			                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Thông tin</a>
			                        </li>
			                        <li class="nav-item">
			                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Hoạt động</a>
			                        </li>
			                        <li class="nav-item">
			                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#statistical" role="tab" aria-controls="statistical" aria-selected="false">Thống kê</a>
			                        </li>
			                    </ul>
			                </div>
			            </div>
			            <div class="col-md-2">
			                <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Sửa thông tin"/>
			            </div>
			        </div>
			        <div class="row">
			            <div class="col-md-4">
			                <div class="profile-work">
			                   <!--  <p>WORK LINK</p>
			                    <a href="">Website Link</a><br/>
			                    <a href="">Bootsnipp Profile</a><br/>
			                    <a href="">Bootply Profile</a> -->
			                    <!-- <p>SKILLS</p>
			                    <a href="">Web Designer</a><br/>
			                    <a href="">Web Developer</a><br/>
			                    <a href="">WordPress</a><br/>
			                    <a href="">WooCommerce</a><br/>
			                    <a href="">PHP, .Net</a><br/> -->
			                </div>
			            </div>
			            <div class="col-md-8">
			                <div class="tab-content profile-tab" id="myTabContent">
			                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
			                        <div class="row">
			                            <div class="col-md-6">
			                                <label>Tên tài khoản</label>
			                            </div>
			                            <div class="col-md-6">
			                                <p>{{ users.name }}</p>
			                            </div>
			                        </div>
			                        <div class="row">
			                            <div class="col-md-6">
			                                <label>Họ và tên</label>
			                            </div>
			                            <div class="col-md-6" v-if="users.display_name != null">
			                                <p>{{users.display_name}}</p>
			                            </div>
			                            <div class="col-md-6" v-else>
			                                <p>Đang cập nhật</p>
			                            </div>
			                        </div>
			                        <div class="row">
			                            <div class="col-md-6">
			                                <label>Ngày sinh</label>
			                            </div>
			                            <div class="col-md-6" v-if="users.birthday != null">
			                                <p>{{users.birthday}}</p>
			                            </div>
			                            <div class="col-md-6" v-else>
			                                 <p>Đang cập nhật</p>
			                            </div>
			                        </div>
			                        <div class="row">
			                            <div class="col-md-6">
			                                <label>Giới tính</label>
			                            </div>
			                            <div class="col-md-6" v-if="users.gender != null">
			                                <p>{{users.gender}}</p>
			                            </div>
			                            <div class="col-md-6" v-else>
			                                 <p>Đang cập nhật</p>
			                            </div>
			                        </div>
			                        <div class="row">
			                            <div class="col-md-6">
			                                <label>Email</label>
			                            </div>
			                            <div class="col-md-6">
			                                <p>{{ users.email }}</p>
			                            </div>
			                        </div>
			                        <div class="row">
			                            <div class="col-md-6">
			                                <label>Điện thoại</label>
			                            </div>
			                            <div class="col-md-6" v-if="users.phone != null">
			                                 <p>{{users.phone}}</p>
			                            </div>
			                            <div class="col-md-6" v-else>
			                                 <p>Đang cập nhật</p>
			                            </div>
			                        </div>
			                        <div class="row">
			                            <div class="col-md-6">
			                                <label>Địa chỉ</label>
			                            </div>
			                            <div class="col-md-6" v-if="users.address != null">
			                                 <p>{{users.address}}</p>
			                            </div>
			                            <div class="col-md-6" v-else>
			                                 <p>Đang cập nhật</p>
			                            </div>
			                        </div>
			                    </div>
			                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
			                        <div class="row">
			                            <div class="col-md-6">
			                                <label>Đang cập nhật</label>
			                            </div>
			                            <div class="col-md-6">
			                                <p>Đang cập nhật</p>
			                            </div>
			                        </div>
			                    </div>
			                    <div class="tab-pane fade" id="statistical" role="tabpanel" aria-labelledby="profile-tab">
			                        <div class="row">
			                            <div class="col-md-6">
			                                <label>Bài viết</label>
			                            </div>
			                            <div class="col-md-6">
			                                <p>Đang cập nhật</p>
			                            </div>
			                        </div>
			                        <div class="row">
			                            <div class="col-md-6">
			                                <label>Hình ảnh</label>
			                            </div>
			                            <div class="col-md-6">
			                                <p>Đang cập nhật</p>
			                            </div>
			                        </div>
			                        <div class="row">
			                            <div class="col-md-6">
			                                <label>Video</label>
			                            </div>
			                            <div class="col-md-6">
			                                <p>Đang cập nhật</p>
			                            </div>
			                        </div>
			                        <div class="row">
			                            <div class="col-md-6">
			                                <label>Lượt thích</label>
			                            </div>
			                            <div class="col-md-6">
			                                <p>Đang cập nhật</p>
			                            </div>
			                        </div>
			                        <div class="row">
			                            <div class="col-md-6">
			                                <label>Tài liệu</label>
			                            </div>
			                            <div class="col-md-6">
			                                <p>Đang cập nhật</p>
			                            </div>
			                        </div>
			                    </div>
			                </div>
			            </div>
			        </div>

			        <div class="row pt-3">
			        	<div class="col-md-4"></div>
			        	<div class="col-md-8 pt-3" style="border-top: 1px solid #ccc">
			        		<form v-on:submit.prevent="changePassword">
			        			<div class="row">
				        			<div class="col-md-12">
				        				<h4 style="text-align: center;">ĐỔI MẬT KHẨU</h4>
				        			</div>
				        			<div class="col-md-6">
						        		<div class="form-group">
											<label class="font-weight-bold">Mật khẩu mới</label>
											<input type="password" class="form-control" aria-describedby="" placeholder="Nhập mật khẩu" required="" v-model="password">
										</div>
						        	</div>
						        	<div class="col-md-6">
						        		<div class="form-group">
											<label class="font-weight-bold">Nhập lại mật khẩu mới</label>
											<input type="password" class="form-control" aria-describedby="" placeholder="Nhập mật khẩu" required="" v-model="password_again">
										</div>
						        	</div>
						        	<div class="col-md-3"></div>
						        	<div class="col-md-3">
						        		<button type="submit" class="btn btn-primary float-right"><span class="btn-label"><i class="fa fa-save"></i></span> Lưu lại</button>
						        	</div>
						        	<div class="col-md-3"></div>
						        	<div class="col-md-3"></div>
				        		</div>
			        		</form>
			        	</div>
			        </div>
			    </form>
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->
	</div>
	
</template>

<script>
	export default {
		data() {
			return {
				users: {},
				complete: false,
				password: '',
				password_again: ''
			}
		},
		created(){
			this.users = JSON.parse(localStorage.getItem('tpack.user'))
			// console.log(this.users)
			this.complete = true
		},
		methods:{
			pad(s){
                return (s < 10) ? '0' + s : s;
            },
            convertDate(inputFormat) {
              var d = new Date(inputFormat);
              return [this.pad(d.getDate()), this.pad(d.getMonth()+1), d.getFullYear()].join('/');
            },
            changePassword(){
            	if((this.password.length < 6) || (this.password_again.length < 6 )){
            		alertify.set('notifier','position', 'buttom-right');
	 				alertify.error('Mật khẩu phải dài từ 6 ký tự trở lên');
            		this.password_again = ''
            		this.password = ''
            	} else {
            		if(this.password_again == this.password){
            			axios.defaults.headers.common['Content-Type'] = 'application/json'
						axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')
            			this.axios.post('/api/changepassword/' + this.users.id, {password: this.password}).then((response) => {
            				// console.log(response.data)
            				if(response.data.status){
								alertify.set('notifier','position', 'buttom-right');
				 				alertify.success(response.data.message);
							} else {
								alertify.set('notifier','position', 'buttom-right');
				 				alertify.error(response.data.message);
							}
            			})
            			this.password_again = ''
            			this.password = ''
            		} else {
            			alertify.set('notifier','position', 'buttom-right');
		 				alertify.error('Mật khẩu không khớp');
            			this.password_again = ''
        				this.password = ''
            		}
            		
            	}
            	
            },
		}
	}
</script>

<style scoped>
	/*.section {
	    background: -webkit-linear-gradient(top, #3931af, #00c6ff);
	}*/
	.section {
		background-color: #c9d5e9
	}
	.emp-profile{
	    padding: 3%;
	    margin-top: 3%;
	    margin-bottom: 3%;
	    border-radius: 0.5rem;
	    background: #fff;
	}
	.profile-img{
	    text-align: center;
	}
	.profile-img img{
	    width: 70%;
	    height: 100%;
	}
	.profile-img .file {
	    position: relative;
	    overflow: hidden;
	    margin-top: -20%;
	    width: 70%;
	    border: none;
	    border-radius: 0;
	    font-size: 15px;
	    background: #212529b8;
	}
	.profile-img .file input {
	    position: absolute;
	    opacity: 0;
	    right: 0;
	    top: 0;
	}
	.profile-head h5{
	    color: #333;
	}
	.profile-head h6{
	    color: #0062cc;
	}
	.profile-edit-btn{
	    border: none;
	    border-radius: 1.5rem;
	    width: 70%;
	    padding: 2%;
	    font-weight: 600;
	    color: #6c757d;
	    cursor: pointer;
	}
	.proile-rating{
	    font-size: 12px;
	    color: #818182;
	    margin-top: 5%;
	}
	.proile-rating span{
	    color: #495057;
	    font-size: 15px;
	    font-weight: 600;
	}
	.profile-head .nav-tabs{
	    margin-bottom:5%;
	}
	.profile-head .nav-tabs .nav-link{
	    font-weight:600;
	    border: none;
	}
	.profile-head .nav-tabs .nav-link.active{
	    border: none;
	    border-bottom:2px solid #0062cc;
	}
	.profile-work{
	    padding: 14%;
	    margin-top: -15%;
	}
	.profile-work p{
	    font-size: 12px;
	    color: #818182;
	    font-weight: 600;
	    margin-top: 10%;
	}
	.profile-work a{
	    text-decoration: none;
	    color: #495057;
	    font-weight: 600;
	    font-size: 14px;
	}
	.profile-work ul{
	    list-style: none;
	}
	.profile-tab label{
	    font-weight: 600;
	}
	.profile-tab p{
	    font-weight: 600;
	    color: #0062cc;
	}
</style>