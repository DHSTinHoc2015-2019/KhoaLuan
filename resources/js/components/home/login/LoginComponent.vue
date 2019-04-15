<template>
	<div id="login">
	<!-- 	<app-navbar-component></app-navbar-component> -->
		<div class="limiter">
			<div class="container-login100" style="background-image: url('images/bglogin.jpg');">
				<div class="wrap-login100 p-l-60 p-r-60 p-t-30 p-b-33">
					<form class="login100-form validate-form flex-sb flex-w" v-on:submit.prevent="handleSubmit">
						<span class="login100-form-title p-b-30">
							ĐĂNG NHẬP
						</span>

						<a href="javascript:void(0)" class="btn-face m-b-20" v-on:click="loginFacebook()">
							<i class="fa fa-facebook-official"></i>
							Facebook
						</a>

						<a href="javascript:void(0)" class="btn-google m-b-20">
							<img src="images/icons/icon-google.png" alt="">
							Google
						</a>
						
						<div class="p-t-25 p-b-9">
							
							<span class="txt1">
								Tên đăng nhập hoặc Email
							</span>
						</div>
						<div class="wrap-input100 validate-input" :data-validate = "validation.name.data_validate">
							<input class="input100" type="text" v-model="email">
							<span class="focus-input100"></span>
						</div>
						
						<div class="p-t-13 p-b-9">
							<span class="txt1">
								Mật khẩu
							</span>

							<router-link :to="{ name: 'ForgetPassword'}" class="txt2 bo1 m-l-5">
								Quên mật khẩu?
							</router-link>
						</div>
						<div class="wrap-input100 validate-input" :data-validate="validation.password.data_validate">
							<input class="input100" type="password" v-model="password">
							<span class="focus-input100"></span>
						</div>

						<div class="container-login100-form-btn m-t-17" v-if="check">
							<button type="submit" class="login100-form-btn btn-success">
								Đăng nhập
							</button>
						</div>

						<div class="container-login100-form-btn m-t-17" v-if="!check">
							<p class="login100-form-btn-wait btn-success">Vui lòng chờ giây lát......</p>
						</div>

						<div class="w-full text-center p-t-25">
							<span class="txt2">
								Bạn chưa có tài khoản?
							</span>

							<router-link to="/register" class="txt2 bo1">
								Đăng ký ngay
							</router-link>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
    export default {
        data() {
            return {
                email: "",
                password: "",
                input: document.getElementsByClassName("wrap-input100"),
                check: true,
                validation:{
	            	name: {
	            		check: false, data_validate: ''
	            	},
	            	password: {
	            		check: false, data_validate: ''
	            	}
	            }
            }
        }, 
        methods: {
        	loginFacebook(){
        		axios.defaults.headers.get['Accepts'] = 'application/json';
        		axios.defaults.headers.common['Content-Type'] = 'application/json'
				axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
				axios.defaults.headers.common['Access-Control-Allow-Headers'] = 'Origin, X-Requested-With, Content-Type, Accept';
        		this.axios.get('redirect/facebook').then((response) => {
        			console.log('ok')
        		})
        	},
            handleSubmit() {
            	if(!this.checkAll()){
	            	return
	            }

                this.check = false;

                let email = this.email
                let password = this.password
                var vm = this
                axios.post('api/login', {email, password}).then(response => {
                    let user = response.data.user
                    let is_admin = user.is_admin
                    localStorage.setItem('tpack.user', JSON.stringify(user))
                    localStorage.setItem('tpack.jwt', response.data.token)
                    if (localStorage.getItem('tpack.jwt') != null) {
                    	alertify.set('notifier','position', 'buttom-right');
		 				alertify.success("Chúc mừng " + user.name + " đăng nhập thành công");
                        this.$emit('loggedIn')
                        if (this.$route.params.nextUrl != null) {
                            this.$router.push(this.$route.params.nextUrl)
                        } else {
                            this.$router.push((is_admin == 1 ? 'admin' : '/'))
                        }
                    }
                }).catch(function (error) {
				    vm.check = true;
				    alertify.set('notifier','position', 'top-center');
				    alertify.error("Đăng nhập thất bại. Vui lòng kiểm tra lại");
				});
            },
            showValidate(index){
   				this.input[index].classList.add('alert-validate')
   			},
   			checkAll(){
   				// Username
   				if(this.input[0].getElementsByTagName('input')[0].value == ''){
   					this.validation.name.check = false
   					this.showValidate(0)
   					this.validation.name.data_validate = 'Bạn chưa nhập tên đăng nhập'
   				} else {
   					this.validation.name.check = true
   					this.validation.name.data_validate = ''
   					this.hideValidate(0)
   				}

   				//Password
   				if(this.input[1].getElementsByTagName('input')[0].value == ''){
   					this.validation.password.check = false
   					this.showValidate(1)
   					this.validation.password.data_validate = 'Bạn chưa nhập mật khẩu'
   				} else {
   					if(this.checkPassword()){
	   					this.validation.password.check = true
	   					this.validation.password.data_validate = ''
	   					this.hideValidate(1)
	   				} else {
	   					this.validation.password.check = false
	   					this.showValidate(1)
	   					this.validation.password.data_validate = 'Mật khẩu phải dài từ 6 ký tự trở lên'
	   				}
   				}
   				return this.validation.name.check && this.validation.password.check
   			},
   			hideValidate(index){
   				this.input[index].classList.remove('alert-validate')
   			},
   			checkPassword(){
   				return this.input[1].getElementsByTagName('input')[0].value.length >= 6
   			},
        }
    }
</script>