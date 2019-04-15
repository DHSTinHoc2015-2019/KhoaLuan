<template>
	<div id="login">
		<div class="limiter">
			<div class="container-login100" style="background-image: url('images/bglogin.jpg');">
				<div class="wrap-login100 p-l-60 p-r-60 p-t-30 p-b-33">
					<form class="login100-form validate-form flex-sb flex-w" v-on:submit.prevent="handleSubmit">
						<span class="login100-form-title p-b-30">
							THAY ĐỔI MẬT KHẨU
						</span>
						
						<div class="p-t-10 p-b-9">
							
							<span class="txt1">
								Mật khẩu mới
							</span>
						</div>
						<div class="wrap-input100 validate-input" :data-validate = "validation.password.data_validate">
							<input class="input100" type="password" v-model="password">
							<span class="focus-input100"></span>
						</div>

						<div class="p-t-25 p-b-9">
							
							<span class="txt1">
								Nhập lại mật khẩu mới
							</span>
						</div>
						<div class="wrap-input100 validate-input" :data-validate = "validation.password_again.data_validate">
							<input class="input100" type="text" v-model="password_confirmation">
							<span class="focus-input100"></span>
						</div>
						
						<div class="container-login100-form-btn m-t-17" v-if="check">
							<button type="submit" class="login100-form-btn btn-success">
								Lưu lại
							</button>
						</div>

						<div class="container-login100-form-btn m-t-17" v-if="!check">
							<p class="login100-form-btn-wait btn-success">Vui lòng chờ giây lát......</p>
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
                token : "",
                password : "",
	            password_confirmation : "",
                input: document.getElementsByClassName("wrap-input100"),
                check: true,
                validation:{
	            	password: {
	            		check: false, data_validate: ''
	            	},
	            	password_again: {
	            		check: false, data_validate: ''
	            	}
	            }
            }
        },
        created(){
        	axios.get('api/checktoken/' + this.$route.params.email + '/' + this.$route.params.token).then(response => {
                	// console.log(response.data)
                	if(!response.data.status){
                		this.$router.push({name: 'ForgetPassword'})
                	} 
                }).catch(function (error) {
				   
				});
        	this.token = this.$route.params.token
        	this.email = this.$route.params.email
        },
        methods: {
            handleSubmit() {
               if(!this.checkAll()){
	            	return
	            }
	            this.check = false
                let token = this.token
                let email = this.email
                let password = this.password
	            var vm = this
                axios.post('api/changeforgetpassword', {email, token, password}).then(response => {
                	// console.log(response.data)
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
                	vm.check = true;
                }).catch(function (error) {
				    vm.check = true;
				    alertify.set('notifier','position', 'top-center');
				    alertify.error("Lỗi");
				});
            },
            checkAll(){
   				//Password
   				if(this.input[0].getElementsByTagName('input')[0].value == ''){
   					this.validation.password.check = false
   					this.showValidate(0)
   					this.validation.password.data_validate = 'Bạn chưa nhập mật khẩu'
   				} else {
   					if(this.checkPassword()){
	   					this.validation.password.check = true
	   					this.validation.password.data_validate = ''
	   					this.hideValidate(0)
	   				} else {
	   					this.validation.password.check = false
	   					this.showValidate(0)
	   					this.validation.password.data_validate = 'Mật khẩu phải dài từ 6 ký tự trở lên'
	   				}
   				}

   				//PasswordAgain
   				if(this.input[1].getElementsByTagName('input')[0].value == ''){
   					this.validation.password_again.check = false
   					this.showValidate(1)
   					this.validation.password_again.data_validate = 'Bạn chưa nhập mật khẩu'
   				} else {
   					if(this.checkPasswordAgain()){
	   					this.validation.password_again.check = true
	   					this.validation.password_again.data_validate = ''
	   					this.hideValidate(1)
	   				} else {
	   					this.validation.password_again.check = false
	   					this.showValidate(1)
	   					this.validation.password_again.data_validate = 'Mật khẩu phải dài từ 6 ký tự trở lên'
	   				}
   				}

   				if(this.validation.password.check && this.validation.password_again.check){
   					if(!this.checkSamePassword()){
   						alertify.set('notifier','position', 'top-center');
					    alertify.error("Mật khẩu không khớp");
					    this.validation.password.check = false
					    this.validation.password_again.check = false
   					}
   				}
   				
   				return this.validation.password.check && this.validation.password_again.check
   			},
   			checkPassword(){
   				return this.input[0].getElementsByTagName('input')[0].value.length >= 6
   			},
   			checkPasswordAgain(){
   				return this.input[1].getElementsByTagName('input')[0].value.length >= 6
   			},
   			checkSamePassword(){
   				return this.input[0].getElementsByTagName('input')[0].value == this.input[1].getElementsByTagName('input')[0].value
   			},
   			showValidate(index){
   				this.input[index].classList.add('alert-validate')
   			},
   			hideValidate(index){
   				this.input[index].classList.remove('alert-validate')
   			}
        }
    }
</script>