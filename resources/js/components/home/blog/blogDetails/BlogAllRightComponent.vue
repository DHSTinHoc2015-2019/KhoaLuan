<template>
	<div class="container" style="background-color: white; border-radius: 0.5rem;">
		<div class="row">
			<div class="col-md-12">
				<!-- post widget -->
				<div class="aside-widget wow fadeInRight animated" data-wow-duration="500ms" data-wow-delay="300ms">
					<div class="section-title pt-4" style="border-bottom: 1px solid #ccc">
						<h2><b class="blog-title">BÀI VIẾT XEM NHIỀU</b></h2>
					</div>

					<div class="container">
						<div class="post post-widget pt-4 pb-4" v-for="(value, index) in blogMostView" v-if="index != blogMostView.length - 1">
							<a class="post-img imgover-small" href="javascript:void(0)" v-if="!checkImageSVGMostView(index)">
								<img v-bind:src="`images/blog/${value.blog_image}`" alt="" style="max-height: 200px">
							</a>
							<a class="post-img imgover" href="javascript:void(0)" v-if="checkImageSVGMostView(index)" v-html="value.blog_image" style="max-height: 100px; max-width: 100px;border-right: 8px solid black;border-bottom: 8px solid black;">
							</a>
							<div class="post-body">
								<router-link :to="{ name: 'BlogDetails', params: { id: value.id }}">
									<h3 class="post-title">{{ value.title }}</h3>
								</router-link>
							</div>
						</div>

						<div class="post post-widget pt-4 pb-4" style="border-bottom: 0px;" v-for="(value, index) in blogMostView" v-if="index == blogMostView.length - 1">
							<a class="post-img imgover-small" href="javascript:void(0)" v-if="!checkImageSVGMostView(index)">
								<img v-bind:src="`images/blog/${value.blog_image}`" alt="" style="max-height: 200px">
							</a>
							<a class="post-img imgover" href="javascript:void(0)" v-if="checkImageSVGMostView(index)" v-html="value.blog_image" style="max-height: 100px; max-width: 100px;border-right: 8px solid black;border-bottom: 8px solid black;">
							</a>
							<div class="post-body">
								<router-link :to="{ name: 'BlogDetails', params: { id: value.id }}">
									<h3 class="post-title">{{ value.title }}</h3>
								</router-link>
							</div>
						</div>
					</div>
				</div>
		<!-- /post widget -->

		<!-- catagories -->
		<!-- <div class="aside-widget wow fadeInRight animated" data-wow-duration="500ms" data-wow-delay="600ms">
			<div class="section-title">
				<h2>Danh mục</h2>
			</div>
			<div class="category-widget">
				<ul>
					<li><a href="#" class="cat-3">Tên danh mục<span>35</span></a></li>
					<li><a href="#" class="cat-3">Tên danh mục<span>35</span></a></li>
					<li><a href="#" class="cat-3">Tên danh mục<span>35</span></a></li>
					<li><a href="#" class="cat-3">Tên danh mục<span>35</span></a></li>
					<li><a href="#" class="cat-3">Tên danh mục<span>35</span></a></li>
					<li><a href="#" class="cat-3">Tên danh mục<span>35</span></a></li>
				</ul>
			</div>
		</div> -->
		<!-- /catagories -->
		
		<!-- tags -->
		<!-- <div class="aside-widget wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="900ms">
			<div class="tags-widget">
				<ul>
					<li><a href="#">hashtag</a></li>
					<li><a href="#">hashtag</a></li>
					<li><a href="#">hashtag</a></li>
					<li><a href="#">hashtag</a></li>
					<li><a href="#">hashtag</a></li>
					<li><a href="#">hashtag</a></li>
					<li><a href="#">hashtag</a></li>
					<li><a href="#">hashtag</a></li>
					<li><a href="#">hashtag</a></li>
					<li><a href="#">hashtag</a></li>
					
				</ul>
			</div>
		</div> -->
		<!-- /tags -->
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		data(){
			return {
				blogMostView: {}
			}
		},
		created(){
			this.getData()
		},
		watch: {
			'$route' (to, from) {
				console.log(this.$route.params.id)
				this.getData()
			}
		},
		methods: {
			checkImageSVGMostView(index){
				if(this.blogMostView.length > 0){
					if('blog_image' in this.blogMostView[index]){
						return this.blogMostView[index].blog_image.toString().indexOf('<svg') != -1
					}
				}
				return false;
			},
			getData(){
				axios.get('/api/blog/mostview').then((response) => {
					// console.log(response.data)
					this.blogMostView = response.data
					
				}).catch((error) => {
					console.log(error)
				})
			}
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