<template>
	<div style="margin-top: 5em">
		<div class="container mt-5 mb-4">
			<div class="row mt-5">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							
						</div>
						<div class="card-body" v-if="active">
							<h3 class="text-center">Tài khoản của bạn đã được kích hoạt. Chuyển hướng đến trang chủ trong {{ count }}s</h3>
						</div>
						<div class="card-body" v-if="!active">
							<h3>Tài khoản chưa được kích hoạt</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				count: 0,
				active: false
			}
		},
		created(){
			this.axios.get(`/api/active/${this.$route.params.id}/${this.$route.params.activation_code}`).then((response) => {
				// console.log(response.data.status)
				this.active = response.data.status
				console.log(this.active)
				if(this.active){
					this.nextpage()
				} else {
					this.active = false
				}
			} )
		},
		mounted(){
			
		},
		methods:{
			nextpage(){
				this.count = 10
				var interval = setInterval(() => {
					this.count--
					if(this.count == 0) {
						clearInterval(interval)
						this.$router.push({ path : '/'})
					}
		        }, 1000)
			}
		}
	}
</script>