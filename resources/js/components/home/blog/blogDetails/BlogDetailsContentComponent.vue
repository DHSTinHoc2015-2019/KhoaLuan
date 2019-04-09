<template>
	<!-- section -->
	<div class="section mb-3">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8 p-4" style="background-color: white; border-radius: 0.5rem;">
					<div class="row">
						<div class="col-md-12">
							<div class="section-title wow fadeInDown" data-wow-delay=".3s">
								<h2 class="text-uppercase font-weight-bold">{{ blogs.title }}</h2>
								<div class="post-meta" style="font-size: 0.9em">
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
										<i class="fa fa-eye" aria-hidden="true"></i> 
										<span class="mr-2"> {{ blogs.blog_view }}</span>
									</span>
									<span>
										<span style="font-weight: bold;" class="mr-2">·</span>
										<i class="fa fa-thumbs-up" style="color: #2793e6;" v-if="isLikeBlog" v-on:click="ClickLikeBlog(isLikeBlog)"></i>
										<i class="fa fa-thumbs-up" v-if="!isLikeBlog" v-on:click="ClickLikeBlog(isLikeBlog)"></i>
										<span> {{ countLikeBlog }}</span>
									</span>
								</div>
							</div>
						</div>
						<div class="col-md-12 wow fadeInDown animated mb-3" data-wow-duration="500ms" data-wow-delay="300ms" style="text-align:justify">
							{{ blogs.blog_content}}
						</div>

						<div class="col-md-12">
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
						</div>
						<!-- /author -->

						<!-- Comment -->
						<div class="col-md-12" style="font-size: 0.8em">
					<div class="jquery-comments">

						<!-- Thanh navbar comment -->
			            <ul class="navigation">
			                <div class="navigation-wrapper">
			                    <li class="active">Mới nhất</li>
			                </div>
			            </ul>

<div class="data-container" v-for="(value_comment, index_comment) in comment">
    <ul id="comment-list" class="main">
        <li class="comment by-current-user">
            <div class="comment-wrapper" v-if="!editComment[index_comment]">
                <div v-if="value_comment.user_image != null" v-bind:style="{'background-image': `url(images/users/${value_comment.user_image})`}" class="profile-picture round"></div>
				<div v-else v-bind:style="{'background-image': `url(images/users/avatar.jpg)`}" class="profile-picture round"></div>
               	<time>{{ convertDate(value_comment.created_at )}}</time>
				<div class="name"><span>{{ value_comment.name }}</span></div>
                <div class="wrapper">
                    <div class="content" v-html="value_comment.comment_blog_content"></div>
                    <span class="actions">
                    	<button class="action reply" type="button" v-on:click="onReplyComment(index_comment)" v-if="isLogin">Trả lời</button>
                    	<span class="separator" v-if="isLogin">·</span>
                    	<button class="action upvote highlight-font">
                    		<span class="upvote-count">2</span>
                    		<i class="fa fa-thumbs-up"></i>
                    	</button>
                    	<span class="separator" v-if="isLogin && value_comment.id_user == users.id">·</span>
                    	<button class="action edit" v-on:click="onEditComment(index_comment)" v-if="isLogin && value_comment.id_user == users.id">Sửa</button>
                    	<span class="separator" v-if="isLogin && value_comment.id_user == users.id">·</span>
                    	<button class="action delete enabled" v-if="isLogin && value_comment.id_user == users.id" v-on:click="ClickDeleteComment(value_comment.id)">Xóa</button>
                    </span>
                </div>
            </div>
            <!-- edit comment -->
            <div class="commenting-field" v-if="editComment[index_comment]">
            	<div v-if="value_comment.user_image != null" v-bind:style="{'background-image': `url(images/users/${value_comment.user_image})`}" class="profile-picture round"></div>
                <div v-else v-bind:style="{'background-image': `url(images/users/avatar.jpg)`}" class="profile-picture round"></div>
            	<div class="textarea-wrapper">
            		<span class="close inline-button" v-on:click="onDestroy()">
            			<span class="left"></span>
            			<span class="right"></span>
            		</span>
            		<div class="textarea" data-placeholder="Nhập nội dung bình luận" style="min-height: 5.1em;" contenteditable="true" id="edit_comment" v-html="value_comment.comment_blog_content"></div>
            		<div class="control-row">
            			<span class="update save highlight-background enabled" v-on:click="ClickEditComment(value_comment.id)">Lưu</span>
            			<span class="delete enabled" style="background-color: rgb(201, 48, 44);" v-on:click="onDestroy()">Hủy</span>
            		</div>
        		</div>
        	</div>
        	<!-- end edit comment -->
			
            <ul class="child-comments" v-for="(value_detail, index_detail) in commentdetail">
            	<!-- comment details -->
                <li class="comment" v-if="value_detail.id_comment_blog == value_comment.id && !editDetail[index_detail]">
                    <div class="comment-wrapper">
                        <div v-if="value_detail.user_image != null" v-bind:style="{'background-image': `url(images/users/${value_detail.user_image})`}" class="profile-picture round"></div>
                		<div v-else v-bind:style="{'background-image': `url(images/users/avatar.jpg)`}" class="profile-picture round"></div>
                        <time>{{ convertDate(value_detail.created_at )}}</time>
                        <div class="name"><span>{{ value_detail.name }}</span></div>
                        <div class="wrapper">
                            <div class="content" v-html="value_detail.comment_detail_blog_content"></div>
                            <div class="actions">
                            	<button class="action upvote"><span class="upvote-count">0</span><i class="fa fa-thumbs-up"></i></button>
                            	<span class="separator" v-if="isLogin && value_detail.id_user == users.id">·</span>
                    			<button class="action edit" v-if="isLogin && value_detail.id_user == users.id" v-on:click="onEditDetail(index_detail)">Sửa</button>
                    			<span class="separator" v-if="isLogin && value_detail.id_user == users.id">·</span>
                    			<button class="action delete enabled" v-if="isLogin && value_detail.id_user == users.id" v-on:click="ClickDeleteCommentDetail(value_detail.id)">Xóa</button>
                            </div>
                        </div>
                    </div>
                </li>

                <!-- edit commentdetails -->
                <li class="comment by-current-user edit" v-if="isLogin && value_detail.id_comment_blog == value_comment.id && value_detail.id_user == users.id && editDetail[index_detail]">
                    <div class="comment-wrapper">
                        <div class="commenting-field">
                            <div v-if="value_detail.user_image != null" v-bind:style="{'background-image': `url(images/users/${value_detail.user_image})`}" class="profile-picture round"></div>
                			<div v-else v-bind:style="{'background-image': `url(images/users/avatar.jpg)`}" class="profile-picture round"></div>
                            <div class="textarea-wrapper">
                                <span class="close inline-button" v-on:click="onDestroy()">
                                	<span class="left"></span>
                                	<span class="right"></span>
                                </span>
                                <div class="textarea" placeholder="Nhập nội dung bình luận" style="min-height: 3.65em;" contenteditable="true" id="edit_comment_detail" v-html="value_detail.comment_detail_blog_content">
                                </div>
                                <div class="control-row">
                                	<span class="update save highlight-background enabled" v-on:click="ClickEditCommentDetail(value_detail.id)">Lưu lại</span>
                                	<span class="delete enabled" style="background-color: rgb(201, 48, 44);" v-on:click="onDestroy()">Hủy</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            
            <!-- reply comment detail -->
            <ul class="child-comments" v-if="replyComment[index_comment]">
                <div class="commenting-field">
                    <div v-if="users.user_image != null" v-bind:style="{'background-image': `url(images/users/${users.user_image})`}" class="profile-picture round"></div>
                	<div v-else v-bind:style="{'background-image': `url(images/users/avatar.jpg)`}" class="profile-picture round"></div>
                    <div class="textarea-wrapper">
                        <span class="close inline-button" v-on:click="onDestroy()">
                        	<span class="left"></span>
                        	<span class="right"></span>
                        </span>
                        <div class="textarea" data-placeholder="Nhập nội dung bình luận" style="min-height: 3.65em;" contenteditable="true" id="create_comment_detail"></div>
                        <div class="control-row">
                        	<span class="send save highlight-background enabled" v-on:click="ClickCreateCommentDetail(value_comment.id)">Đăng bình luận</span>
                        	<span class="delete enabled" style="background-color: rgb(201, 48, 44);" v-on:click="onDestroy()">Hủy</span>
                        </div>
                    </div>
                </div>
            </ul>
        </li>
    </ul>
</div>



						<ul class="navigation mt-4 mb-4" v-if="isLogin">
			                <div class="navigation-wrapper">
			                </div>
			            </ul>
						<!-- create comment -->
						<div class="commenting-field main" v-if="isLogin">
			                <div v-if="users.user_image != null" v-bind:style="{'background-image': `url(images/users/${users.user_image})`}" class="profile-picture round"></div>
                			<div v-else v-bind:style="{'background-image': `url(images/users/avatar.jpg)`}" class="profile-picture round"></div>
			                <div class="textarea-wrapper">
			                    <span class="close inline-button" style="display: none;">
			                    	<span class="left"></span>
			                    	<span class="right"></span>
			                    </span>
		                    	<div class="textarea" data-placeholder="Nhập nội dung bình luận" style="min-height: 2.2em;" contenteditable="true" id="create_comment">
		                    	</div>
			                    <div class="control-row">
			                    	<span class="send save highlight-background enabled" v-on:click="ClickCreateComment()">Đăng bình luận</span>
			                    	<span class="delete enabled" style="background-color: rgb(201, 48, 44);" v-on:click="onDestroy(1)">Hủy</span>
			                    </div>
			                </div>
			            </div>
					</div>
			        <!-- end comments -->
				</div>
				<!-- end .col -->



						<!-- End Comment -->

					</div>
					<!-- end row -->
				</div>





				<div class="col-md-4">
					<!-- <app-blog-all-right-component></app-blog-all-right-component> -->
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
	import BlogAllRightComponent from './BlogAllRightComponent.vue';
	import io from 'socket.io-client';
	export default {
		components: {
			appBlogAllRightComponent: BlogAllRightComponent
		},
		data(){
            return {
                blogs: {},
                isLogin: localStorage.getItem('tpack.jwt') != null,
                comment: {},
				commentdetail: {},
				replyComment:[],
				editComment:[],
				editDetail:[],
				users: null,
				countLikeBlog: 0,
				isLikeBlog: false,
				countComment: 0,
				countLikeBlog: 0,
				socket : io(localStorage.getItem('tpack.server')),
				blogMostView: {}
            }
        },
        created(){
			this.getDataCreate()
        },
		watch: {
			'$route' (to, from) {
				// console.log(this.$route.params.id)
				this.getDataCreate()				
			}
		},
        mounted(){
        	this.socket.on('blog_create_comment', (data) => {
	            // console.log("OK -- tin_hieu_ve" + data)
				if(data == this.$route.params.id){
					this.getData()
				}
	        });

	        this.socket.on('blog_delete_comment', (data) => {
	            // console.log("OK -- tin_hieu_ve" + data)
				if(data == this.$route.params.id){
					this.getData()
				}
	        });

	        this.socket.on('blog_edit_comment', (data) => {
	            // console.log("OK -- tin_hieu_ve" + data)
				if(data == this.$route.params.id){
					this.getData()
				}
	        });

	        this.socket.on('like_blog', (data) => {
	        	// console.log("OK - tin_hieu_ve" + data)
	        	if(data == this.$route.params.id){
					this.getDataLikeBlog()
				}
	        })

	        this.socket.on('blog_create_comment_detail', (data) => {
	        	// console.log("OK - tin_hieu_ve" + data)
	        	if(data == this.$route.params.id){
					this.getData()
				}
	        })

	        this.socket.on('blog_edit_comment_detail', (data) => {
	        	// console.log("OK - tin_hieu_ve" + data)
	        	if(data == this.$route.params.id){
					this.getData()
				}
	        })

	        this.socket.on('blog_delete_comment_detail', (data) => {
	        	// console.log("OK - tin_hieu_ve" + data)
	        	if(data == this.$route.params.id){
					this.getData()
				}
	        })
        },
        methods:{
        	getDataCreate(){
	        	this.axios.get(`/api/blog/${this.$route.params.id}`).then((response) =>{
					// console.log(response.data.blog)
					this.blogs = response.data.blog
					this.checkSVG = response.data.blog.blog_image.indexOf('<svg') != -1
					if(!this.checkSVG){
						this.url = `images/blog/${this.blogs.blog_image}`
					}
				}).catch((error) => {
					console.log(error)
				})

				this.axios.get('/api/blog/mostview').then((response) => {
					// console.log(response.data)
					this.blogMostView = response.data
					
				}).catch((error) => {
					console.log(error)
				})

				this.users = JSON.parse(localStorage.getItem('tpack.user'))
				// console.log(this.users)
				this.axios.get(`/api/blog/user/${this.$route.params.id}`).then((response) => {
					// console.log(response.data)
					// this.discussion = response.data.discussion
					this.comment = response.data.comment
					this.commentdetail = response.data.commentdetail

					this.comment.forEach(() =>{
						this.replyComment.push(false)
						this.editComment.push(false)
					})

					this.commentdetail.forEach(() =>{
						this.editDetail.push(false)
					})
				})

				this.getDataLikeBlog()
	        },
        	checkImageSVGMostView(index){
				if(this.blogMostView.length > 0){
					if('blog_image' in this.blogMostView[index]){
						return this.blogMostView[index].blog_image.toString().indexOf('<svg') != -1
					}
				}
				return false;
			},
        	ClickLikeBlog(isLike){
				// console.log(isLike)
				if(this.isLogin){
					axios.defaults.headers.common['Content-Type'] = 'application/json'
					axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')
					var dataPost = {}
					dataPost.isLike = isLike
					dataPost.id_user = this.users.id
					dataPost.id_blog = this.$route.params.id
					// console.log(dataPost)
					axios.post("api/likeblog/admin/change", dataPost).then((response) =>{
						// console.log(response.data);
						if (response.data.status) {
							// alertify.set('notifier','position', 'buttom-right');
			 			// 	alertify.success(response.data.message);
							this.socket.emit("like_blog", response.data.id_blog);
						} else {
							alertify.set('notifier','position', 'buttom-right');
			 				alertify.error(response.data.message);
						}
					}).catch((error) => {
						console.log(error)
					})
				}
			},
        	ClickDeleteCommentDetail(id_comment_detail){
				// console.log(id_comment_detail)
				var vm = this
				alertify.confirm('Thông báo', 'Bạn muốn xóa dữ liệu?', function(){ 
					vm.deleteCommentDetailSuccess(id_comment_detail)
				}, function(){ 
					vm.deleteCommentError()
				})
			},
			deleteCommentDetailSuccess(id_comment_detail){
				axios.defaults.headers.common['Content-Type'] = 'application/json'
				axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')

	            axios.get("api/commentdetailblog/delete/" + id_comment_detail).then((response) =>{
					// console.log(response.data);
					if(response.data.status){
						alertify.set('notifier','position', 'buttom-right');
						alertify.success(response.data.message)
						this.socket.emit("blog_delete_comment_detail", this.$route.params.id);
					} else {
						alertify.set('notifier','position', 'buttom-right');
						alertify.error(response.data.message)
					}
				}).catch((error) => {
					console.log(error)
				})
			},
        	ClickEditCommentDetail(id_comment_detail){
				var edit_comment_detail = {}
				edit_comment_detail.comment_detail_blog_content = document.getElementById('edit_comment_detail').innerHTML
				edit_comment_detail.id_blog = this.$route.params.id
				edit_comment_detail.id_user = this.users.id
				edit_comment_detail.id_comment_detail = id_comment_detail
				// console.log(edit_comment_detail)
				axios.defaults.headers.common['Content-Type'] = 'application/json'
				axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')

	            axios.post("api/commentdetailblog/update", edit_comment_detail).then((response) =>{
					// console.log(response.data);
					if(response.data.status){
						alertify.set('notifier','position', 'buttom-right');
		 				alertify.success(response.data.message);
						this.onDestroy()
						this.socket.emit("blog_edit_comment_detail", response.data.id_blog);
					} else {
						alertify.set('notifier','position', 'buttom-right');
		 				alertify.error(response.data.message);
					}
					
				}).catch((error) => {
					console.log(error)
				})
			},
        	ClickCreateCommentDetail(id_comment){
				var create_comment_detail = {}
				create_comment_detail.comment_detail_blog_content = document.getElementById('create_comment_detail').innerHTML
				create_comment_detail.id_comment_blog = id_comment
				create_comment_detail.id_user = this.users.id
				create_comment_detail.id_blog = this.$route.params.id
				// console.log(create_comment_detail)
				axios.defaults.headers.common['Content-Type'] = 'application/json'
				axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')
				axios.post("api/commentdetailblog/create", create_comment_detail).then((response) =>{
					// console.log(response.data);
					if (response.data.status) {
						alertify.set('notifier','position', 'buttom-right');
		 				alertify.success(response.data.message);
		 				this.onDestroy()
						this.socket.emit("blog_create_comment_detail", response.data.id_blog);
					} else {
						alertify.set('notifier','position', 'buttom-right');
		 				alertify.error(response.data.message);
					}
				}).catch((error) => {
					console.log(error)
				})
				document.getElementById('create_comment').innerHTML = ""
			},
        	ClickCreateComment(){
				var create_comment = {}
				create_comment.comment_blog_content = document.getElementById('create_comment').innerHTML
				create_comment.id_blog = this.$route.params.id
				create_comment.id_user = this.users.id
				// console.log(create_comment)
				axios.defaults.headers.common['Content-Type'] = 'application/json'
				axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')

	            axios.post("api/commentblog/create", create_comment).then((response) =>{
					// console.log(response.data);
					if (response.data.status) {
						alertify.set('notifier','position', 'buttom-right');
		 				alertify.success(response.data.message);
						this.socket.emit("blog_create_comment", response.data.id_blog);
					} else {
						alertify.set('notifier','position', 'buttom-right');
		 				alertify.error(response.data.message);
					}
				}).catch((error) => {
					console.log(error)
				})
				document.getElementById('create_comment').innerHTML = ""
			},
			ClickEditComment(id_comment){
				var edit_comment = {}
				edit_comment.comment_blog_content = document.getElementById('edit_comment').innerHTML
				edit_comment.id_blog = this.$route.params.id
				edit_comment.id_user = this.users.id
				edit_comment.id_comment = id_comment
				// console.log(edit_comment)

				axios.defaults.headers.common['Content-Type'] = 'application/json'
				axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')

	            axios.post("api/commentblog/update", edit_comment).then((response) =>{
					// console.log(response.data);
					if(response.data.status){
						alertify.set('notifier','position', 'buttom-right');
		 				alertify.success(response.data.message);
						this.onDestroy()
						this.socket.emit("blog_edit_comment", response.data.id_blog);
					} else {
						alertify.set('notifier','position', 'buttom-right');
		 				alertify.error(response.data.message);
					}
					
				}).catch((error) => {
					console.log(error)
				})
			},
			ClickDeleteComment(id_comment){
				var vm = this
				alertify.confirm('Thông báo', 'Bạn muốn xóa dữ liệu?', function(){ 
					vm.deleteCommentSuccess(id_comment)
				}, function(){ 
					vm.deleteCommentError()
				})
			},
			deleteCommentSuccess(id_comment){
				axios.defaults.headers.common['Content-Type'] = 'application/json'
				axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')

	            axios.get("api/commentblog/delete/" + id_comment).then((response) =>{
					// console.log(response.data);
					if(response.data.status){
						alertify.set('notifier','position', 'buttom-right');
						alertify.success(response.data.message)
						this.socket.emit("blog_delete_comment", this.$route.params.id);
					} else {
						alertify.set('notifier','position', 'buttom-right');
						alertify.error(response.data.message)
					}
				}).catch((error) => {
					console.log(error)
				})
			},
			deleteCommentError(){
				alertify.set('notifier','position', 'buttom-right');
				alertify.error('Dữ liệu của bạn không thay đổi')
			},
        	pad(s){
                return (s < 10) ? '0' + s : s;
            },
            convertDate(inputFormat) {
              var d = new Date(inputFormat);
              return [this.pad(d.getDate()), this.pad(d.getMonth()+1), d.getFullYear()].join('/');
            },
            onReplyComment(index_comment){
				this.onDestroy()
				this.$set(this.replyComment, index_comment, true)
			},
			onDestroy(){
				for(var i = 0; i < this.replyComment.length; i++){
					this.$set(this.replyComment, i, false)
				}

				for(var i = 0; i < this.editComment.length; i++){
					this.$set(this.editComment, i, false)
				}

				for(var i = 0; i < this.editDetail.length; i++){
					this.$set(this.editDetail, i, false)
				}
			},
			onEditComment(index_comment){
				this.onDestroy()
				this.$set(this.editComment, index_comment, true)
			},
			onEditDetail(index_detail){
				this.onDestroy()
				this.$set(this.editDetail, index_detail, true)
			},
			getData(){
				this.axios.get(`/api/blog/user/${this.$route.params.id}`).then((response) => {
				// this.discussion = response.data.discussion
				this.comment = response.data.comment
				this.commentdetail = response.data.commentdetail
				}).catch((error) => {
					console.log(error)
				})
			},
			getDataLikeBlog(){
				if(this.isLogin){
					axios.defaults.headers.common['Content-Type'] = 'application/json'
					axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')
					this.axios.get(`/api/likeblog/admin/${this.users.id}/${this.$route.params.id}`).then((response)=>{
						// console.log(response.data)
						this.countLikeBlog = response.data.countLikeBlog
						this.isLikeBlog = response.data.isLikeBlog
					}).catch((error)=>{
						console.log(error)
					})
				} else {
					//Truong hop khong co dang nhap
					axios.defaults.headers.common['Content-Type'] = 'application/json'
					axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')
					this.axios.get(`/api/likeblog/user/${this.$route.params.id}`).then((response)=>{
						// console.log(response.data)
						this.countLikeBlog = response.data.countLikeBlog
						// this.isLikeDiscussion = response.data.isLikeDiscussion
					}).catch((error)=>{
						console.log(error)
					})
				}
			}
        }
	}
</script>

<style scoped>
	.jquery-comments ul.navigation li.active:after {background: #2793e6 !important;}
    .jquery-comments ul.navigation ul.dropdown li.active {background: #2793e6 !important;}
    .jquery-comments .highlight-background {background: #2793e6 !important;}
    .jquery-comments .highlight-font {color: #2793e6 !important;}
    .jquery-comments .highlight-font-bold {color: #2793e6 !important;font-weight: bold;}
    .jquery-comments ul.main li.comment .wrapper .content p{
		margin: 0;
	}
    /*.jquery-comments .textarea-wrapper .textarea {
    	overflow: hidden;
    }*/
    .wrapper .content {
    	margin-top: 0px;
    }
    .fa-thumbs-up{
    	cursor: pointer;
    }

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