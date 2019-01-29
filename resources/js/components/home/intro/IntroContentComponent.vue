<template>
	<!-- section -->
	<div class="section mb-5">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12 wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="300ms" v-html="intros.introduction_content">
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
				intros: {}
			}
		},
		created(){
			this.axios.get('/api/introduction').then((response) => {
				this.intros = response.data
			})
		}
	}
</script>