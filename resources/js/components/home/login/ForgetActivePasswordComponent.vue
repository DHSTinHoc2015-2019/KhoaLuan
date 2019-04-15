<template>
	<div id="login">
		<div class="limiter">
			<div class="container-login100" style="background-image: url('images/bglogin.jpg');">
				<div class="wrap-login100 p-l-60 p-r-60 p-t-30 p-b-33">
					<form class="login100-form validate-form flex-sb flex-w" v-on:submit.prevent="handleSubmit">
						<span class="login100-form-title p-b-30">
							NHẬP MÃ XÁC NHẬN
						</span>

						<!-- <a href="javascript:void(0)" class="btn-face m-b-20" v-on:click="loginFacebook()">
							<i class="fa fa-facebook-official"></i>
							Facebook
						</a> -->

						<!-- <a href="javascript:void(0)" class="btn-google m-b-20">
							<img src="images/icons/icon-google.png" alt="">
							Google
						</a> -->
						
						<div class="p-t-25 p-b-9">
							
							<span class="txt1">
								Nhập mã xác nhận
							</span>
						</div>
						<div class="wrap-input100 validate-input" data-validate = "">
							<input class="input100" type="text" v-model="token_reset">
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

						<!-- <div class="w-full text-center p-t-25">
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
						</div> -->
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
                token_reset : "",
                input: document.getElementsByClassName("wrap-input100"),
                check: true,
            }
        },
        created(){
        	// console.log(this.$route.params.email)
        },
        methods: {
            handleSubmit() {
                this.check = false;
                let token_reset = this.token_reset;
                let email = this.$route.params.email;

                var vm = this
                axios.post('api/checktokenreset/' + email, {token_reset}).then(response => {
                	// console.log(response.data)
                	if(!response.data.status){
                		alertify.set('notifier','position', 'top-center');
				    	alertify.error("Mã xác nhận không đúng.\n Vui lòng kiểm tra lại");
                	} else {
                		// console.log('chuyển hướng')
                		this.$router.push({name: 'ForgetPasswordChange', params: {email: this.$route.params.email, token: response.data.token}})
                	}
                	vm.check = true;
                }).catch(function (error) {
				    vm.check = true;
				    alertify.set('notifier','position', 'top-center');
				    alertify.error("Email bạn nhập không có. Vui lòng kiểm tra lại");
				});
            }
        }
    }
</script>