<template>
	<div id="login">
	<!-- 	<app-navbar-component></app-navbar-component> -->
		<div class="limiter">
			<div class="container-login100" style="background-image: url('images/bglogin.jpg');">
				<div class="wrap-login100 p-l-60 p-r-60 p-t-30 p-b-33">
					<form class="login100-form validate-form flex-sb flex-w" v-on:submit.prevent="handleSubmit">
						<span class="login100-form-title p-b-30">
							ĐĂNG KÝ
						</span>

						<a href="javascript:void(0)" class="btn-face m-b-20">
							<i class="fa fa-facebook-official"></i>
							Facebook
						</a>

						<a href="javascript:void(0)" class="btn-google m-b-20">
							<img src="images/icons/icon-google.png" alt="">
							Google
						</a>
						
						<div class="p-t-25 p-b-9">
							
							<span class="txt1">
								Tên đăng nhập
							</span>
						</div>
						<div class="wrap-input100 validate-input" :data-validate = "validation.name.data_validate">
							<input class="input100" type="text" v-model="name">
							<span class="focus-input100"></span>
						</div>
						
						<div class="p-t-13 p-b-9">
							<span class="txt1">
								Email
							</span>
						</div>
						<div class="wrap-input100 validate-input" :data-validate="validation.email.data_validate">
							<input class="input100" type="email" v-model="email">
							<span class="focus-input100"></span>
						</div>

						<div class="p-t-13 p-b-9">
							<span class="txt1">
								Mật khẩu
							</span>
						</div>
						<div class="wrap-input100 validate-input" :data-validate="validation.password.data_validate">
							<input class="input100" type="password" v-model="password">
							<span class="focus-input100"></span>
						</div>
						
						<div class="p-t-13 p-b-9">
							<span class="txt1">
								Nhập lại mật khẩu
							</span>
						</div>
						<div class="wrap-input100 validate-input" :data-validate="validation.password_again.data_validate">
							<input class="input100" type="password" v-model="password_confirmation">
							<span class="focus-input100"></span>
						</div>

						<div class="container-login100-form-btn m-t-17" v-if="check">
							<button type="submit" class="login100-form-btn btn-success">
								Đăng ký
							</button>
						</div>

						<div class="container-login100-form-btn m-t-17" v-if="!check">
							<p class="login100-form-btn-wait btn-success">Vui lòng chờ giây lát......</p>
						</div>

						<div class="w-full text-center p-t-25">
							<span class="txt2">
								Bạn đã có tài khoản?
							</span>

							<router-link to="/login" class="txt2 bo1">
								Đăng nhập
							</router-link>
						</div>
					</form>

					<button class="btn btn-primary" v-on:click="checkAll()">Click</button>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
    export default {
        data() {
            return {
            	check: true,
	            name : "",
	            email : "",
	            password : "",
	            password_confirmation : "",
	            input: document.getElementsByClassName("wrap-input100"),
	            validation:{
	            	email: {
	            		check: false, data_validate: ''
	            	},
	            	name: {
	            		check: false, data_validate: ''
	            	},
	            	password: {
	            		check: false, data_validate: ''
	            	},
	            	password_again: {
	            		check: false, data_validate: ''
	            	}
	            }
            }
        },
        methods: {
           handleSubmit() {
	            if(!this.checkAll()){
	            	return
	            }
	            this.check = false;
	            let name = this.name
	            let email = this.email
	            let password = this.password
	            let c_password = this.password_confirmation
	            var vm = this
	            axios.post('api/register', {name, email, password, c_password}).then(response => {
	                let data = response.data
	                console.log(data)
	                localStorage.setItem('tpack.user', JSON.stringify(data.user))
	                localStorage.setItem('tpack.jwt', data.token)
	                if (localStorage.getItem('tpack.jwt') != null) {
	                    this.$emit('loggedIn')
	                    alertify.set('notifier','position', 'top-center');
	 					alertify.success("Đăng ký tài khoản thành công\nVui lòng kiểm tra email để kích hoạt tài khoản");
	                    let nextUrl = this.$route.params.nextUrl
	                    this.$router.push((nextUrl != null ? nextUrl : '/'))
	                }
	            }).catch(function(error) {
	            	vm.check = true;
	            	alertify.set('notifier','position', 'top-center');
					return alertify.error("Đăng ký tài khoản thất bại");
	            })
	        },
	        checkAll(){
   				// var input = document.getElementsByClassName("wrap-input100");

   				if(this.input[1].getElementsByTagName('input')[0].value == ''){
   					this.validation.email.check = false
   					this.showValidate(1)
   					this.validation.email.data_validate = 'Bạn chưa nhập Email'
   				} else {
   					if(this.checkEmail()){
	   					this.validation.email.check = true
	   					this.validation.email.data_validate = ''
	   					this.hideValidate(1)
	   				} else {
	   					this.validation.email.check = false
	   					this.showValidate(1)
	   					this.validation.email.data_validate = 'Email nhập không đúng định dạng'
	   				}
   				}

   				// Username
   				if(this.input[0].getElementsByTagName('input')[0].value == ''){
   					this.validation.name.check = false
   					this.showValidate(0)
   					this.validation.name.data_validate = 'Bạn chưa nhập tên đăng nhập'
   				} else {
   					if(this.checkName()){
	   					this.validation.name.check = true
	   					this.validation.name.data_validate = ''
	   					this.hideValidate(0)
	   				} else {
	   					this.validation.name.check = false
	   					this.showValidate(0)
	   					this.validation.name.data_validate = 'Tên đăng nhập chỉ gồm chữ cái, chữ số, dấu gạch dưới và độ dài từ 6-30 ký tự'
	   				}
   				}
   				//Password
   				if(this.input[2].getElementsByTagName('input')[0].value == ''){
   					this.validation.password.check = false
   					this.showValidate(2)
   					this.validation.password.data_validate = 'Bạn chưa nhập mật khẩu'
   				} else {
   					if(this.checkPassword()){
	   					this.validation.password.check = true
	   					this.validation.password.data_validate = ''
	   					this.hideValidate(2)
	   				} else {
	   					this.validation.password.check = false
	   					this.showValidate(2)
	   					this.validation.password.data_validate = 'Mật khẩu phải dài từ 6 ký tự trở lên'
	   				}
   				}

   				//PasswordAgain
   				if(this.input[3].getElementsByTagName('input')[0].value == ''){
   					this.validation.password_again.check = false
   					this.showValidate(3)
   					this.validation.password_again.data_validate = 'Bạn chưa nhập mật khẩu'
   				} else {
   					if(this.checkPasswordAgain()){
	   					this.validation.password_again.check = true
	   					this.validation.password_again.data_validate = ''
	   					this.hideValidate(3)
	   				} else {
	   					this.validation.password_again.check = false
	   					this.showValidate(3)
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
   				
   				return this.validation.email.check && this.validation.name.check && this.validation.password.check && this.validation.password_again.check
   			},
   			checkEmail(){
   				if(this.input[1].getElementsByTagName('input')[0].value.trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
   					return false
   				}
   				return true
   			},
   			checkName(){
   				if(this.input[0].getElementsByTagName('input')[0].value.trim().match(/^[a-zA-Z0-9_]{6,30}$/) == null) {
   					return false
   				}
   				return true
   			},
   			checkPassword(){
   				return this.input[2].getElementsByTagName('input')[0].value.length >= 6
   			},
   			checkPasswordAgain(){
   				return this.input[3].getElementsByTagName('input')[0].value.length >= 6
   			},
   			checkSamePassword(){
   				return this.input[2].getElementsByTagName('input')[0].value == this.input[3].getElementsByTagName('input')[0].value
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