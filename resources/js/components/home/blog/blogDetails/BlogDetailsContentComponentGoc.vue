<template>
	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">
					<div class="row">
						<div class="col-md-12">
							<div class="section-title wow fadeInDown" data-wow-delay=".3s">
								<h2 class="text-uppercase font-weight-bold">{{ blogs.title }}</h2>
								<div class="post-meta" style="font-size: 0.8em">
									<a class="post-category cat-3" href="javascript:void(0)">Tên danh mục</a>
									<span>
										<i class="fa fa-user-circle-o" aria-hidden="true"></i> 
										<a href="javascript:void(0)" class="mr-2">{{ blogs.name }}</a>
									</span>
									<span>
										<span style="font-weight: bold;" class="mr-2">·</span>
										<i class="fa fa-clock-o" aria-hidden="true"></i> 
										<span class="mr-2"> {{ convertDate(blogs.created_at) }}</span>
									</span>
									<span>
										<span style="font-weight: bold;" class="mr-2">·</span>
										<i class="fa fa-thumbs-up" style="color: #2793e6;" v-if="isLikeBlog" v-on:click="ClickLikeDiscussion(isLikeBlog)"></i>
										<i class="fa fa-thumbs-up" v-if="!isLikeBlog" v-on:click="ClickLikeDiscussion(isLikeBlog)"></i>
										<span>123123</span>
										<!-- <span> {{ countLikeDiscussion }}</span> -->
									</span>
								</div>
							</div>
						</div>
						<div class="col-md-12 wow fadeInDown animated mb-3" data-wow-duration="500ms" data-wow-delay="300ms">
							{{ blogs.blog_content}}
						</div>

						<div class="section-row" style="border-top: 1px solid black">
							<div class="post-author pt-3">
								<div class="media">
									<div class="media-left">
										<img class="media-object" :src="'images/users/' + blogs.user_image" alt="" v-if="blogs.user_image != null">
										<img class="media-object" :src="'images/users/author.png'" alt="" v-else>
									</div>
									<div class="media-body">
										<div class="media-heading">
											<a href="javascript:void(0)"> <h3>{{ blogs.name }}</h3></a>
											<!-- <router-link :to="{ name: 'BlogDetails', params: {id: value.id }}" :title="value.title">
				                                <h3 class="font-weight-bold">{{ blogs.name }}</h3>
				                            </router-link> -->
										</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									</div>
								</div>
							</div>
						</div>
						<!-- /author -->





						<!-- comments -->
						<div class="section-row">
							<div class="section-title">
								<h2>3 Comments</h2>
							</div>

							<div class="post-comments">
								<!-- comment -->
								<div class="media">
									<div class="media-left">
										<img class="media-object" src="images/users/avatar.jpg" alt="">
									</div>
									<div class="media-body">
										<div class="media-heading">
											<h5>Tên user</h5>
											<span class="time">09/01/2017</span>
											<a href="javascript:void(0)" class="reply">Trả lời</a>
										</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

										<!-- comment -->
										<div class="media">
											<div class="media-left">
												<img class="media-object" src="images/users/avatar.jpg" alt="">
											</div>
											<div class="media-body">
												<div class="media-heading">
													<h5>Tên user</h5>
													<span class="time">09/01/2017</span>
													<a href="javascript:void(0)" class="reply">Trả lời</a>
												</div>
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
											</div>
										</div>
										<!-- /comment -->
									</div>
								</div>
								<!-- /comment -->

								<!-- comment -->
								<div class="media">
									<div class="media-left">
										<img class="media-object" src="images/users/avatar.jpg" alt="">
									</div>
									<div class="media-body">
										<div class="media-heading">
											<h5>Tên user</h5>
											<span class="time">09/01/2017</span>
											<a href="javascript:void(0)" class="reply">Trả lời</a>
										</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									</div>
								</div>
								<!-- /comment -->
							</div>
						</div>
						<!-- /comments -->

						<!-- reply -->
						<div class="section-row" style="width: 100%;">
							<div class="section-title">
								<h3>Đăng bình luận</h3>
							</div>
							<form class="post-reply">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<textarea class="input" name="message" placeholder="Message"></textarea>
										</div>
										<button class="primary-button">Submit</button>
									</div>
								</div>
							</form>
						</div>
						<!-- /reply -->

					</div>
				</div>

				<div class="col-md-4">
					<app-blog-all-right-component></app-blog-all-right-component>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	
	</div>
	<!-- /section -->
</template>

<script>

	// chỗ lấy file
	import BlogAllRightComponent from '../BlogAllRightComponent.vue';

	export default {
		components: {
			appBlogAllRightComponent: BlogAllRightComponent
		},
		data(){
            return {
                blogs: {},
                isLikeBlog: true
            }
        },
        created(){
        	this.axios.get(`/api/blog/${this.$route.params.id}`).then((response) =>{
				console.log(response.data.blog)
				this.blogs = response.data.blog
				this.checkSVG = response.data.blog.blog_image.indexOf('<svg') != -1
				if(!this.checkSVG){
					this.url = `images/blog/${this.blogs.blog_image}`
				}
			}).catch((error) => {
				console.log(error)
			})
        },
        methods:{
        	pad(s){
                return (s < 10) ? '0' + s : s;
            },
            convertDate(inputFormat) {
              var d = new Date(inputFormat);
              return [this.pad(d.getDate()), this.pad(d.getMonth()+1), d.getFullYear()].join('/');
            }
        }
	}
</script>