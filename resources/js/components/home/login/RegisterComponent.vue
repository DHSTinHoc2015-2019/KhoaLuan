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
						<div class="wrap-input100 validate-input" data-validate = "Vui lòng nhập tên đăng nhập">
							<input class="input100" type="text" v-model="name">
							<span class="focus-input100"></span>
						</div>
						
						<div class="p-t-13 p-b-9">
							<span class="txt1">
								Email
							</span>
						</div>
						<div class="wrap-input100 validate-input" data-validate="Vui lòng nhập email">
							<input class="input100" type="email" v-model="email">
							<span class="focus-input100"></span>
						</div>

						<div class="p-t-13 p-b-9">
							<span class="txt1">
								Mật khẩu
							</span>
						</div>
						<div class="wrap-input100 validate-input" data-validate="Vui lòng nhập mật khẩu">
							<input class="input100" type="password" v-model="password">
							<span class="focus-input100"></span>
						</div>
						
						<div class="p-t-13 p-b-9">
							<span class="txt1">
								Nhập lại mật khẩu
							</span>
						</div>
						<div class="wrap-input100 validate-input" data-validate="Vui lòng nhập lại mật khẩu">
							<input class="input100" type="password" v-model="password_confirmation">
							<span class="focus-input100"></span>
						</div>

						<div class="container-login100-form-btn m-t-17">
							<button type="submit" class="login100-form-btn btn-success" @click="handleSubmit">
								Đăng ký
							</button>
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
				</div>
			</div>
		</div>
	</div>
</template>

<script>
    export default {
        data() {
            return {
            name : "",
            email : "",
            password : "",
            password_confirmation : ""
            }
        },
        methods: {
           handleSubmit(e) {
	            // console.log("da click")
	            // e.preventDefault()
	            if (this.password !== this.password_confirmation) {
	                this.password = ""
	                this.password_confirmation = ""
	                alertify.set('notifier','position', 'top-center');
					return alertify.error("Mật khẩu không khớp");
	            }
	            let name = this.name
	            let email = this.email
	            let password = this.password
	            let c_password = this.password_confirmation
	            axios.post('api/register', {name, email, password, c_password}).then(response => {
	                let data = response.data
	                localStorage.setItem('tpack.user', JSON.stringify(data.user))
	                localStorage.setItem('tpack.jwt', data.token)
	                if (localStorage.getItem('tpack.jwt') != null) {
	                    this.$emit('loggedIn')
	                    alertify.set('notifier','position', 'top-center');
	 					alertify.success("Đăng ký tài khoản thành công");
	                    let nextUrl = this.$route.params.nextUrl
	                    this.$router.push((nextUrl != null ? nextUrl : '/'))
	                }
	            }).catch(function(error) {
	            	alertify.set('notifier','position', 'top-center');
					return alertify.error("Đăng ký tài khoản thất bại");
	            })
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