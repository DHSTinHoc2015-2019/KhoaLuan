<template>
	<section class="p-t-40" id="content-contact">
		<div class="container">
			<div class="row">
			
				<div class="col-sm-12 col-md-8">
					<h3><b style="color: #005c5c;">GỬI TIN NHẮN ĐẾN CHÚNG TÔI</b></h3>
					<p class="mb-30 mr-100 mr-sm-0">Chúng tôi rất thích nghe ý kiến ​​của bạn - vui lòng liên hệ để nhận xét, yêu cầu, quan hệ đối tác quảng cáo hoặc yêu cầu công việc.</p>
					<form class="form-block form-bold form-mb-20 form-h-35 form-brdr-b-grey pr-50 pr-sm-0" v-on:submit.prevent="createContact">
						<div class="row">
						
							<div class="col-sm-6">
								<p class="color-ash">Tên đầy đủ*</p>
								<div class="pos-relative">
									<!-- <input class="pr-20" type="text" value="Tên người gửi..." > -->
									<input class="pr-20" type="text" required="" v-model="contact.name">
									<!-- <i class="abs-tbr lh-35 font-13 color-green fa fa-check"></i> -->
								</div><!-- pos-relative -->
							</div><!-- col-sm-6 -->
							
							<div class="col-sm-6">							
								<p class="color-ash">Email*</p>
								<div class="pos-relative">
									<input class="pr-20" required="" type="email" v-model="contact.email">
									<i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
								</div><!-- pos-relative -->
							</div><!-- col-sm-6 -->
							
							<div class="col-sm-6">	
								<p class="color-ash">Số điện thoại*</p>
								<div class="pos-relative">
									<input class="pr-20" type="text" required=""  v-model="contact.phone">
									<i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
								</div><!-- pos-relative -->
							</div><!-- col-sm-6 -->
							
							<div class="col-sm-6">	
								<p class="color-ash">Công ty / Tổ chức*</p>
								<div class="pos-relative">
									<input class="pr-20" type="text" required="" v-model="contact.company">
									<i class="dplay-none abs-tbr lh-35 font-13 color-green ion-android-done"></i>
								</div><!-- pos-relative -->
							</div><!-- col-sm-6 -->
							
							<div class="col-sm-12">
								<div class="pos-relative pr-80">
									<p class="color-ash">Nội dung tin nhắn*</p>
									<textarea class="mb-0"  v-model="contact.content"></textarea>
									<button class="abs-br font-20 plr-15 btn-fill-primary" type="submit"><i class="fa fa-telegram"></i></button>
								</div><!-- pos-relative -->
							</div><!-- col-sm-6 -->
							
						</div><!-- row -->
					</form>
				</div><!-- col-md-6 -->
				
				<div class="col-sm-12 col-md-4">
					<h3 class="mb-20 mt-sm-50"><b style="color: #005c5c;">THÔNG TIN LIÊN HỆ</b></h3>
					
					Địa chỉ: abc TP Huế
					Điện thoại: 0876543210
					Fax: 012 123 2345
					Email: email@gmail.com


				</div><!-- col-md-6 -->
			</div><!-- row -->
		</div><!-- container -->
	</section>
</template>

<script>
	export default {
		data(){
			return {
				contact: {}
			}
		},
		mounted(){
			$( document ).ready(function() {
			    $('textarea').each(function () {
				  this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
				}).on('input', function () {
				  this.style.height = 'auto';
				  this.style.height = (this.scrollHeight) + 'px';
				});
			});
		},
		methods:{
			createContact(){
				axios.defaults.headers.common['Content-Type'] = 'application/json'
				axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')
				// console.log(this.contact)
				this.axios.post('/api/contact/create', this.contact).then((response) => {
					// console.log(response.data)
					if (response.data.status) {
						alertify.set('notifier','position', 'buttom-right');
		 				alertify.success(response.data.message);
						this.$router.push({ path: '/'})
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
	#content-contact {
		background-color: white;
		padding-bottom: 40px;
	}
	/* FORM INPUT STYLING */

.nwsltr-primary-1{ position: relative; }
	
.nwsltr-primary-1 input{ height: 45px; display: block; width: 100%; padding: 0 65px 0 20px; 
	border: 1px solid #F9B500; }

.nwsltr-primary-1 button{ position: absolute; top: 1px; bottom: 1px; right: 1px; width: 45px; text-align: center; 
	background: #F9B500; color: #000; }

.nwsltr-primary-1 button i{ font-size: 1.3em; }

.nwsltr-primary-1 button:hover{ background: #000; color: #fff; }


.form-block input { display: block; width: 100%; }
.form-block textarea{ display: block; width: 90%; }

.form-bold input,
.form-bold textarea{ font-weight: 700; }

.form-plr-15 input,
.form-plr-15 textarea{ padding: 0 15px; }

.form-h-35 input{ height: 35px; }
.form-h-40 input{ height: 40px; }
.form-h-45 input{ height: 45px; }

.form-mb-20 input,
.form-mb-20 textarea{ margin-bottom: 20px; }

.form-brdr-grey input,
.form-brdr-grey textarea{ border: 1px solid #ccc; }

.form-brdr-lite-white input,
.form-brdr-lite-white textarea{ border: 1px solid #ddd; }

.form-brdr-b-grey input { outline: 0; border: 0px; border-bottom: 1px solid #ccc; }
.form-brdr-b-grey textarea{ outline: 0; border: 1px solid #ccc; }

.form-brdr-b-grey input:focus{ 
	border-bottom: 1px solid red; 
	/*border-bottom: 1px solid #583ee0; */
	/*border-bottom: 1px solid #E700FF; */
}
.form-brdr-b-grey textarea:focus{ 
	border: 1px solid red; 
	/*border: 1px solid #583ee0; */
	/*border: 1px solid #E700FF; */
}
/* POSITION */

.pos-relative{ position: relative; z-index: 1; }

.abs-tlr{ position: absolute; top: 0; left: 0; right: 0; z-index: 1; }
.abs-blr{ position: absolute; bottom: 0; left: 0; right: 0; z-index: 1; }
.abs-tl{ position: absolute; top: 0; left: 0; z-index: 1; }
.abs-br{ position: absolute; bottom: 0; right: 0; z-index: 1; }
.abs-tbr{ position: absolute; top: 0; bottom: 0; right: 0; z-index: 1; }
.abs-tblr{ position: absolute; top: 0; bottom: 0; left: 0; right: 0; z-index: 1; }

.z--1{ z-index: -1; }
.btn-fill-primary{ 
	text-align: center; 
	height: 45px; 
	line-height: 43px;
	border: 1px solid #000000;
    background: #00e0f9;
	/*border: 1px solid #F9B500; 
	background: #F9B500;*/ 
	border-radius: 2px; 
	color: #111; 
	font-size: 2em;
}
.btn-fill-primary:hover{ background: none; }
</style>