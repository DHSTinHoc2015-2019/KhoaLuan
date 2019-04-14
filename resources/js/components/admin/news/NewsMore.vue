<template>
	    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
							
				<div class="row">
					<div class="col-xl-12">
						<div class="breadcrumb-holder">
							<h1 class="main-title float-left font-weight-bold text-uppercase">Tin tức</h1>
							<ol class="breadcrumb float-right">
								<li class="breadcrumb-item">Admin</li>
								<li class="breadcrumb-item active">Iin tức</li>
							</ol>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<!-- end row -->

				<div class="row mb-5">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-12">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-newspaper-o"></i> {{ news.title }}
									<router-link class="btn btn-success btn-sm float-right" :to="{ name: 'NewsEdit', params: { id: `${this.$route.params.id}`}}">Chỉnh sửa</router-link></h3>
							</div>

							<div class="card-body">
								<div class="row">
									<div class="col-md-3" v-if="!checkImageSVG()">
										<img v-bind:src="`images/news/${news.news_image}`" alt="" style="max-width: 100%;">
									</div>
									<div class="col-md-3" v-if="checkImageSVG()" v-html="news.news_image">
										
									</div>
									<div class="col-md-9">
										<h3>Mô tả</h3>
										{{ news.description }}
									</div>
									<div class="col-md-12">
										<hr>
									</div>
									<div class="col-md-12">
										<h3>Nội dung</h3>
										<div v-html="news.news_content"></div>
									</div>
								</div>
							</div>														
						</div><!-- end card-->					
					</div>
				</div>
            </div>
			<!-- END container-fluid -->
		</div>
		<!-- END content -->
    </div>
	<!-- END content-page -->
</template>

<script>
	export default {
		data(){
			return {
				news: {}
			}
		},
		created(){
			this.axios.get(`/api/news/readmore/${this.$route.params.id}`).then((response) => {
				this.news = response.data
			}).catch((error) => {
				console.log(error)
			})
		},
		methods:{
			checkImageSVG(){
				if('news_image' in this.news){
					return this.news.news_image.toString().indexOf('<svg') != -1
				}
				return false;
			},
		}
	}
</script>