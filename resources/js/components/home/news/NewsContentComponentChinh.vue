<template>
	<!-- section -->
	<div class="section section-grey" id="news">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8" style="background-color: white;">
					<div class="container">
						<div class="row">
						<div class="col-md-12" style="border-bottom: 1px solid #ccc">
							<div class="section-title wow fadeInDown pt-4" data-wow-delay=".3s">
								<h2><b class="blog-title">TIN TỨC</b></h2>
							</div>
						</div>
						
						<!-- post -->
						<div class="col-md-12 wow fadeInLeft animated news-all" data-wow-duration="500ms" data-wow-delay="300ms" v-for="(value, index) in news">
							<div class="post post-row">
								<a class="post-img imgover" href="javascript:void(0)" v-if="!checkImageSVG(index)">
									<img v-bind:src="`images/news/${value.news_image}`" alt="" style="max-height: 200px">
								</a>
								<a class="post-img imgover" href="javascript:void(0)" v-if="checkImageSVG(index)" v-html="value.news_image">
								</a>
								<div class="post-body">
									
									<h3 class="post-title news-title"><a href="javascript:void(0)">{{ value.title }}</a></h3>
									<p class="news-day"><span><i class="fa fa-clock-o" aria-hidden="true"></i></span> {{ convertDate(value.created_at) }}</p>
									<p>{{ value.description }}</p>
								</div>
							</div>
						</div>

						<div class="col-md-12 wow fadeInLeft animated news-all" data-wow-duration="500ms" data-wow-delay="300ms">
							<div class="section-row">
								<button class="primary-button center-block">Xem thêm</button>
							</div>
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
        color: #231557; text-transform: uppercase;
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
	import NewsRightComponent from './NewsRightComponent.vue';

	export default {
		components: {
			appNewsRightComponent: NewsRightComponent
		},
		data(){
			return {
				news: {}
			}
		},
		created(){
			this.axios.get('/api/news/all').then((response) => {
				this.news = response.data
				// console.log(this.news)
			}).catch((error) => {
				console.log(error)
			})
		},
		methods:{
			checkImageSVG(index){
				if(this.news.length > 0){
					if('news_image' in this.news[index]){
						return this.news[index].news_image.toString().indexOf('<svg') != -1
					}
				}
				return false;
			},
			convertDate(inputFormat) {
			var d = new Date(inputFormat);
			return [this.pad(d.getDate()), this.pad(d.getMonth()+1), d.getFullYear()].join('/');
			},
			pad(s){
				return (s < 10) ? '0' + s : s;
			}
		}
	}
</script>