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
								Email
							</span>
						</div>
						<div class="wrap-input100 validate-input" data-validate = "Vui lòng nhập tên đăng nhập hoặc email">
							<input class="input100" type="text" v-model="email">
							<span class="focus-input100"></span>
						</div>
						
						<div class="p-t-13 p-b-9">
							<span class="txt1">
								Mật khẩu
							</span>

							<a href="#" class="txt2 bo1 m-l-5">
								Quên mật khẩu?
							</a>
						</div>
						<div class="wrap-input100 validate-input" data-validate="Vui lòng nhập mật khẩu">
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
                check: true
            }
        }, 
        methods: {
            handleSubmit() {
                // e.preventDefault()
                this.check = false;
                if (this.password.length > 0) {
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
					    // console.log(error.response.data);
					    // console.log(error.response.status);
					    vm.check = true;
					    alertify.set('notifier','position', 'top-center');
					    alertify.error("Đăng nhập thất bại. Vui lòng kiểm tra lại");
					});
                }
            }
        },
        mounted: function(){
        	(function ($) {
			    "use strict";
			    /*==================================================================
			    [ Validate ]*/
			    var input = $('.validate-input .input100');

			    $('.validate-form').on('submit',function(){
			        var check = true;

			        for(var i=0; i<input.length; i++) {
			            if(validate(input[i]) == false){
			                showValidate(input[i]);
			                check=false;
			            }
			        }

			        return check;
			    });


			    $('.validate-form .input100').each(function(){
			        $(this).focus(function(){
			           hideValidate(this);
			        });
			    });

			    function validate (input) {
			        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
			            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
			                return false;
			            }
			        }
			        else {
			            if($(input).val().trim() == ''){
			                return false;
			            }
			        }
			    }

			    function showValidate(input) {
			        var thisAlert = $(input).parent();

			        $(thisAlert).addClass('alert-validate');
			    }

			    function hideValidate(input) {
			        var thisAlert = $(input).parent();

			        $(thisAlert).removeClass('alert-validate');
			    }
			})(jQuery);
        }
    }
</script>