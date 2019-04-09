<template>
	<!-- section -->
	<div class="section mb-5">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- <div class="col-md-12 wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="300ms" v-html="intros.introduction_content"> -->
				<div class="col-md-12 wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="300ms">
					<div class="btn btn-primary" v-on:click="clickSendMail()">Click gửi mail</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
</template>

<script>
	export default {
		data() {
			return {
				demoemail: {}
			}
		},
		created(){
			this.axios.get('/api/demoemail').then((response) => {
				console.log(response.data)
				// this.demoemail = response.data
			})
		},
		methods:{
			clickSendMail(){
				this.axios.get('/api/demosendemail').then((response) => {
					console.log(response.data)
				// this.demoemail = response.data
			})
			}
		}
	}
</script>