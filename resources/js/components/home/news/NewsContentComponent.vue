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
						<div class="col-md-12 wow fadeInLeft animated news-all" data-wow-duration="500ms" data-wow-delay="300ms">
							<div class="post post-row">
								<a class="post-img imgover" href="javascript:void(0)"><img src="images/blog/post.jpg" alt=""></a>
								<div class="post-body">
									
									<h3 class="post-title news-title"><a href="javascript:void(0)">Tiêu đề tin tức</a></h3>
									<p class="news-day"><span><i class="fa fa-clock-o" aria-hidden="true"></i></span> 19-01-2019</p>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
								</div>
							</div>
						</div>
						<!-- /post -->
						<!-- post -->
						<div class="col-md-12 wow fadeInLeft animated news-all" data-wow-duration="500ms" data-wow-delay="500ms">
							<div class="post post-row">
								<a class="post-img imgover" href="javascript:void(0)"><img src="images/blog/post.jpg" alt=""></a>
								<div class="post-body">
									
									<h3 class="post-title"><a href="javascript:void(0)">Tiêu đề tin tức</a></h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
								</div>
							</div>
						</div>
						<!-- /post -->
						<!-- post -->
						<div class="col-md-12 wow fadeInLeft animated news-all" data-wow-duration="500ms" data-wow-delay="700ms">
							<div class="post post-row">
								<a class="post-img imgover" href="javascript:void(0)"><img src="images/blog/post.jpg" alt=""></a>
								<div class="post-body">
									
									<h3 class="post-title"><a href="javascript:void(0)">Tiêu đề tin tức</a></h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
								</div>
							</div>
						</div>
						<!-- /post -->
						<!-- post -->
						<div class="col-md-12 wow fadeInLeft animated news-all" data-wow-duration="500ms" data-wow-delay="900ms">
							<div class="post post-row">
								<a class="post-img imgover" href="javascript:void(0)"><img src="images/blog/post.jpg" alt=""></a>
								<div class="post-body">
									
									<h3 class="post-title"><a href="javascript:void(0)">Tiêu đề tin tức</a></h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
								</div>
							</div>
						</div>
						<!-- /post -->
						<!-- post -->
						<div class="col-md-12 wow fadeInLeft animated news-all" data-wow-duration="500ms" data-wow-delay="1100ms">
							<div class="post post-row">
								<a class="post-img imgover" href="javascript:void(0)"><img src="images/blog/post.jpg" alt=""></a>
								<div class="post-body">
									
									<h3 class="post-title"><a href="javascript:void(0)">Tiêu đề tin tức</a></h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
								</div>
							</div>
						</div>
						<!-- /post -->
						<!-- post -->
						<div class="col-md-12 wow fadeInLeft animated news-all" data-wow-duration="500ms" data-wow-delay="1300ms">
							<div class="post post-row">
								<a class="post-img imgover" href="javascript:void(0)"><img src="images/blog/post.jpg" alt=""></a>
								<div class="post-body">
									
									<h3 class="post-title"><a href="javascript:void(0)">Tiêu đề tin tức</a></h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
								</div>
							</div>
						</div>
						<!-- /post -->
						
						<div class="col-md-12 wow fadeInLeft animated news-all" data-wow-duration="500ms" data-wow-delay="1300ms">
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
		}
	}
</script>