<template>
	<div class="container" style="background-color: white; border-radius: 0.5rem;">
		<div class="row">
			<div class="col-md-12">
				<!-- post widget -->
				<div class="aside-widget wow fadeInRight animated" data-wow-duration="500ms" data-wow-delay="300ms">
					<div class="section-title pt-4" style="border-bottom: 1px solid #ccc">
						<h2><b class="blog-title">NỔI BẬT</b></h2>
					</div>

					<div class="container">
						<div class="post post-widget pt-4 pb-4" v-for="(value, index) in news" v-if="index != news.length - 1">
							<a class="post-img imgover-small" href="javascript:void(0)" v-if="!checkImageSVG(index)">
								<img v-bind:src="`images/news/${value.news_image}`" alt="" style="max-height: 200px">
							</a>
							<a class="post-img imgover" href="javascript:void(0)" v-if="checkImageSVG(index)" v-html="value.news_image">
							</a>
							<div class="post-body">
								<router-link :to="{ name: 'NewsDetails', params: { id: value.id }}">
									<h3 class="post-title">{{ value.title }}</h3>
								</router-link>
							</div>
						</div>

						<div class="post post-widget pt-4 pb-4" style="border-bottom: 0px;" v-for="(value, index) in news" v-if="index == news.length - 1">
							<a class="post-img imgover-small" href="javascript:void(0)" v-if="!checkImageSVG(index)">
								<img v-bind:src="`images/news/${value.news_image}`" alt="" style="max-height: 200px">
							</a>
							<a class="post-img imgover" href="javascript:void(0)" v-if="checkImageSVG(index)" v-html="value.news_image" style="max-height: 100px; max-width: 100px;border-right: 8px solid black;border-bottom: 8px solid black;">
							</a>
							<div class="post-body">
								<router-link :to="{ name: 'NewsDetails', params: { id: value.id }}">
									<h3 class="post-title">{{ value.title }}</h3>
								</router-link>
							</div>
						</div>

					</div>
				</div>
				<!-- /post widget -->
			</div>
		</div>
	</div>

</template>
<script>
	export default {
		data(){
			return {
				news: {}
			}
		},
		created(){
			this.axios.get('/api/news/featured').then((response) => {
				// console.log(response.data)
				this.news = response.data
				
			}).catch((error) => {
				console.log(error)
			})
		},
		methods: {
			checkImageSVG(index){
				if(this.news.length > 0){
					if('news_image' in this.news[index]){
						return this.news[index].news_image.toString().indexOf('<svg') != -1
					}
				}
				return false;
			},
		}
	}
</script>
<style scoped>
	.imgover-small {
		display:inline-block; 
		position:relative; 
		max-width:100%;
	}
	.imgover-small::before, .imgover-small::after {
		display:block; 
		position:absolute; 
		content:""; 
		text-align:center; 
		opacity:0; 
		transition: all .5s ease-in-out;
	}
	.imgover-small::before {
		top:0; 
		right:0; 
		bottom:0; 
		left:0;
	}
	.imgover-small::after {
		top:50%; 
		left:50%; 
		width:50px; 
		height:50px; 
		line-height:50px; 
		margin: -12px 0 0 -28px;
		font:normal normal normal 14px/1 FontAwesome; 
		font-weight:900; 
		content:"\f06e";
		font-size:20px;
	}
	.imgover-small:hover::before, .imgover-small:hover::after {
		opacity:1;
	}
	.imgover-small:hover::before {
		background:rgba(0,0,0,.55);
	}
	.imgover-small, .imgover-small:hover::after {
		/*color:#95103B;*/
		color:#02bdd5;
	}
	.blog-title {
        color: #231557; text-transform: uppercase;
    }
    .section .section-title {
    	margin-bottom: 0px;
    }
    
    .post {
    	margin-bottom: 0px;
    }
    .post.post-widget {
    	border-bottom: 1px solid #ccc;
    }
    .aside-widget{
    	margin-bottom: 0px;
    }
</style>