<template>
	<div>
		<div v-if="!complete" class="pt-5" style="min-height: 50vh">
            <div class="loading-spinner"></div>
        </div>

        <!-- section -->
		<div class="section section-grey pb-5" id="news" style="background: #ececec" v-if="complete">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-8" style="border-radius: 0.5rem; background: #fff;border-width: 1px; border-style: solid; border-top-color: #dfdfdf; border-right-color: #d8d8d8; border-bottom-color: #cbcbcb;border-left-color: #d8d8d8;">
						<div class="container">
							<div class="row">
								<div class="col-md-12" style="border-bottom: 1px solid #ccc">
									<div class="section-title wow fadeInDown pt-4" data-wow-delay=".3s">
										<h2><b class="blog-title">{{ news.title }}</b></h2>
									</div>
								</div>

								<div class="col-md-12 wow fadeInLeft animated mt-3" data-wow-duration="500ms" data-wow-delay="300ms" style="text-align:justify" v-html="news.news_content">
								</div>

							</div>
						</div>
					</div>

					<div class="col-md-4">
						<app-news-right-component></app-news-right-component>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->

	</div>
	
</template>
<style scoped>
	.imgover {
		border-bottom-left-radius: 0.25rem;
		border-bottom-right-radius: 0.25rem;
	}

	.imgover img {
        -webkit-transition: opacity 1s,
         -webkit-transform 1s;
        transition: opacity 1s, transform 1s;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
    }
    .imgover:hover img {
        -webkit-transform: scale3d(1.1,1.1,1);
        transform: scale3d(1.1,1.1,1);
        opacity: 0.4;
        transition: all .5s ease-in-out;
    }
    .blog-title {
        color: #005c5c; text-transform: uppercase;
    }
    .news-all {
    	border-bottom: 1px solid #ccc;
    	margin-top: 2em;
    }
	.section .section-title {
		margin-bottom: 0px;
	}
	.post-title a{
		font-size: 1.5em;
	}
	.news-day{
		font-style: italic;
		color: #0b6271;
		margin-bottom: 5px;
	}
	#news .news-title {
		margin-bottom: 0px;
	}
</style>

<script>

	// chỗ lấy file
	import NewsRightComponent from '../NewsRightComponent.vue';

	export default {
		components: {
			appNewsRightComponent: NewsRightComponent,
		},
		data(){
			return {
				news: {},
				complete: false
			}
		},
		created(){
            this.getData()
        },
		watch: {
			'$route' (to, from) {
				this.getData()
			}
		},
		methods:{
			// checkImageSVG(){
			// 	return this.news.news_image.toString().indexOf('<svg') != -1
			// },
			convertDate(inputFormat) {
			var d = new Date(inputFormat);
			return [this.pad(d.getDate()), this.pad(d.getMonth()+1), d.getFullYear()].join('/');
			},
			pad(s){
				return (s < 10) ? '0' + s : s;
			},
			getData(){
				this.axios.get(`/api/news/readmore/${this.$route.params.id}`).then((response) =>{
	                // console.log(response.data)
	                this.news = response.data
	                this.complete = true
	            }).catch((error) => {
	                // alert(error.response.status)
	            })
			}
		}
	}
</script>