<template>
	<div id="login">
		<div class="limiter">
			<div class="container-login100" style="background-image: url('images/bglogin.jpg');">
				<div class="wrap-login100 p-l-60 p-r-60 p-t-30 p-b-33">
					<form class="login100-form validate-form flex-sb flex-w" v-on:submit.prevent="handleSubmit">
						<span class="login100-form-title p-b-30">
							QUÊN MẬT KHẨU
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
								Nhập email đã đăng ký
							</span>
						</div>
						<div class="wrap-input100 validate-input" :data-validate = "validation.email.data_validate">
							<input class="input100" type="text" v-model="email">
							<span class="focus-input100"></span>
						</div>
						
						<div class="container-login100-form-btn m-t-17" v-if="check">
							<button type="submit" class="login100-form-btn btn-success">
								Nhận mã xác minh
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

							<span>
								<router-link to="/login" class="txt2 bo1">
									Đăng nhập
								</router-link>
							</span>
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
                email : "",
                input: document.getElementsByClassName("wrap-input100"),
                check: true,
                validation:{
	            	email: {
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
                var vm = this
                let email = this.email
                axios.get('api/finduserwithemail/' + email).then(response => {
                	
                	if(this.isEmpty(response.data)){
                		alertify.set('notifier','position', 'top-center');
				    	alertify.error("Email bạn nhập không có. Vui lòng kiểm tra lại");
                	} else {
                		this.$router.push({name: 'ForgetActivePassword', params: { email: this.email}})
                	}
                }).catch(function (error) {
				    vm.check = true;
				    alertify.set('notifier','position', 'top-center');
				    alertify.error("Email bạn nhập không có. Vui lòng kiểm tra lại");
				});
            },
            showValidate(index){
   				this.input[index].classList.add('alert-validate')
   			},
   			checkAll(){
   				if(this.input[0].getElementsByTagName('input')[0].value == ''){
   					this.validation.email.check = false
   					this.showValidate(0)
   					this.validation.email.data_validate = 'Bạn chưa nhập Email'
   				} else {
   					if(this.checkEmail()){
	   					this.validation.email.check = true
	   					this.validation.email.data_validate = ''
	   					this.hideValidate(0)
	   				} else {
	   					this.validation.email.check = false
	   					this.showValidate(0)
	   					this.validation.email.data_validate = 'Email nhập không đúng định dạng'
	   				}
   				}
   				return this.validation.email.check				
   			},
   			hideValidate(index){
   				this.input[index].classList.remove('alert-validate')
   			},
   			checkEmail(){
   				if(this.input[0].getElementsByTagName('input')[0].value.trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
   					return false
   				}
   				return true
   			},
   			loginFacebook(){
   				alert('Chức năng đang được cập nhật')
   			},
   			isEmpty(obj) {
			    for(var key in obj) {
			        if(obj.hasOwnProperty(key))
			            return false;
			    }
			    return true;
			}
        }
    }
</script>