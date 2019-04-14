<template>
	    <div class="content-page">
		<!-- Start content -->
        <div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12">
						<div class="breadcrumb-holder">
							<h1 class="main-title float-left font-weight-bold text-uppercase">Thảo luận</h1>
							<ol class="breadcrumb float-right">
								<li class="breadcrumb-item">Admin</li>
								<li class="breadcrumb-item active">Thảo luận</li>
							</ol>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<!-- end row -->

				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-12">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-commenting-o"></i> {{ discussion.title }}
									<router-link class="btn btn-success btn-sm float-right" :to="{ name: 'AdminDiscussionEdit', params: { id: `${this.$route.params.id}`}}">Chỉnh sửa</router-link></h3>
							</div>

							<div class="card-body">
								<div class="row">
									<div class="col-md-12">
										<div v-html="discussion.discussion_content"></div>
									</div>
								</div>
							</div>
							<div class="card-footer">
								<p style="color: #999;">
									<span>
										<i class="fa fa-user-circle-o" aria-hidden="true"></i> 
										<a href="#" class="mr-2">{{ discussion.name }}</a>
									</span>
									<span>
										<span style="font-weight: bold;" class="mr-2">·</span>
										<i class="fa fa-clock-o" aria-hidden="true"></i> 
										<span class="mr-2"> {{ convertDate(discussion.created_at) }}</span>
									</span>
									<span>
										<span style="font-weight: bold;" class="mr-2">·</span>
										<i class="fa fa-eye" aria-hidden="true"></i> 
										<span class="mr-2"> {{ discussion.discussion_view }}</span>
									</span>
									<span>
										<span style="font-weight: bold;" class="mr-2">·</span>
										<i class="fa fa-thumbs-up" style="color: #2793e6;" v-if="isLikeDiscussion" v-on:click="ClickLikeDiscussion(isLikeDiscussion)"></i>
										<i class="fa fa-thumbs-up" v-if="!isLikeDiscussion" v-on:click="ClickLikeDiscussion(isLikeDiscussion)"></i>
										<span> {{ countLikeDiscussion }}</span>
									</span>
								</p>
							</div>													
						</div><!-- end card-->					
					</div>
				</div>

				<div class="row mb-5">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-12">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-comment"></i> {{ countComment }} bình luận</h3>
							</div>

							<div class="card-body">
								<div class="row">
									<div class="col-md-12">
					<div class="jquery-comments">
						<!-- Create Comment -->
			            <!-- End Create Comment -->

						<!-- Thanh navbar comment -->
			            <ul class="navigation">
			                <div class="navigation-wrapper">
			                    <li class="active">Mới nhất</li>
			                    <li>Cũ nhất</li>
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
                    <div class="content" v-html="value_comment.comment_discussion_content"></div>
                    <span class="actions">
                    	<button class="action reply" type="button" v-on:click="onReplyComment(index_comment)">Trả lời</button>
                    	<!-- <span class="separator">·</span>
                    	<button class="action upvote highlight-font">
                    		<span class="upvote-count">2</span>
                    		<i class="fa fa-thumbs-up"></i>
                    	</button> -->
                    	<span class="separator" v-if="value_comment.id_user == users.id">·</span>
                    	<button class="action edit" v-on:click="onEditComment(index_comment)" v-if="value_comment.id_user == users.id">Sửa</button>
                    	<span class="separator">·</span>
                    	<button class="action delete enabled" v-on:click="ClickDeleteComment(value_comment.id)">Xóa</button>
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
            		<div class="textarea" data-placeholder="Nhập nội dung bình luận" style="min-height: 5.1em;" contenteditable="true" id="edit_comment" v-html="value_comment.comment_discussion_content"></div>
            		<div class="control-row">
            			<span class="update save highlight-background enabled" v-on:click="ClickEditComment(value_comment.id)">Lưu</span>
            			<span class="delete enabled" style="background-color: rgb(201, 48, 44);" v-on:click="onDestroy()">Hủy</span>
            		</div>
        		</div>
        	</div>
        	<!-- end edit comment -->

            <ul class="child-comments" v-for="(value_detail, index_detail) in commentdetail">
            	<!-- commentdetail -->
                <li class="comment" v-if="value_detail.id_comment_discussion == value_comment.id && !editDetail[index_detail]">
                    <div class="comment-wrapper">
                        <div v-if="value_detail.user_image != null" v-bind:style="{'background-image': `url(images/users/${value_detail.user_image})`}" class="profile-picture round"></div>
                		<div v-else v-bind:style="{'background-image': `url(images/users/avatar.jpg)`}" class="profile-picture round"></div>
                        <time>{{ convertDate(value_detail.created_at )}}</time>
                        <div class="name"><span>{{ value_detail.name }}</span></div>
                        <div class="wrapper">
                            <div class="content" v-html="value_detail.comment_detail_discussion_content"></div>
                            <div class="actions">
                            	<!-- <button class="action upvote"><span class="upvote-count">0</span><i class="fa fa-thumbs-up"></i></button>
                            	<span class="separator" v-if="value_detail.id_user == users.id">·</span> -->
                    			<button class="action edit" v-if="value_detail.id_user == users.id" v-on:click="onEditDetail(index_detail)">Sửa</button>
                    			<span class="separator">·</span>
                    			<button class="action delete enabled" v-on:click="ClickDeleteCommentDetail(value_detail.id)">Xóa</button>
                            </div>
                        </div>
                    </div>
                </li>

				<!-- edit commentdetails -->
                <li class="comment by-current-user edit" v-if="value_detail.id_comment_discussion == value_comment.id && value_detail.id_user == users.id && editDetail[index_detail]">
                    <div class="comment-wrapper">
                        <div class="commenting-field">
                            <div v-if="value_detail.user_image != null" v-bind:style="{'background-image': `url(images/users/${value_detail.user_image})`}" class="profile-picture round"></div>
                			<div v-else v-bind:style="{'background-image': `url(images/users/avatar.jpg)`}" class="profile-picture round"></div>
                            <div class="textarea-wrapper">
                                <span class="close inline-button" v-on:click="onDestroy()">
                                	<span class="left"></span>
                                	<span class="right"></span>
                                </span>
                                <div class="textarea" placeholder="Nhập nội dung bình luận" style="min-height: 3.65em;" contenteditable="true" id="edit_comment_detail" v-html="value_detail.comment_detail_discussion_content">
                                	<!-- <input type="button" data-role="none">ggg -->
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
        <!-- comment 2 -->
    </ul>
</div>
						

						<ul class="navigation mt-4 mb-4">
			                <div class="navigation-wrapper">
			                </div>
			            </ul>
						<!-- create comment -->
						<div class="commenting-field main">
			                <div v-if="users.user_image != null" v-bind:style="{'background-image': `url(images/users/${users.user_image})`}" class="profile-picture round"></div>
                			<div v-else v-bind:style="{'background-image': `url(images/users/avatar.jpg)`}" class="profile-picture round"></div>
			                <div class="textarea-wrapper">
			                    <span class="close inline-button" style="display: none;">
			                    	<span class="left"></span>
			                    	<span class="right"></span>
			                    </span>
		                    	<div class="textarea" data-placeholder="Nhập nội dung bình luận" style="min-height: 2.2em;" contenteditable="true" id="create_comment">
		                    	</div>
			                    <!-- <div class="control-row" style="display: none;"> -->
			                    <div class="control-row">
			                    	<span class="send save highlight-background enabled" v-on:click="ClickCreateComment()">Đăng bình luận</span>
			                    	<span class="delete enabled" style="background-color: rgb(201, 48, 44);" v-on:click="onDestroy(1)">Hủy</span>
			                    </div>
			                </div>
			            </div>

			        </div>
			        <!-- end comments -->
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
	import io from 'socket.io-client';
	export default {
		data(){
			return {
				discussion: {},
				comment: {},
				commentdetail: {},
				users: null,
				replyComment:[],
				editComment:[],
				editDetail:[],
				countComment: 0,
				countLikeDiscussion: 0,
				isLikeDiscussion: false,
				socket : io(localStorage.getItem('tpack.server'))
			}
		},
		created(){
			this.users = JSON.parse(localStorage.getItem('tpack.user'))
			axios.defaults.headers.common['Content-Type'] = 'application/json'
			axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')
			this.axios.get(`/api/discussion/showwithcomment/${this.$route.params.id}`).then((response) => {
				// console.log(response.data.comment)
				this.discussion = response.data.discussion
				this.comment = response.data.comment
				this.commentdetail = response.data.commentdetail
				this.countComment = response.data.countComment

				this.comment.forEach(() =>{
					this.replyComment.push(false)
					this.editComment.push(false)
				})

				this.commentdetail.forEach(() =>{
					this.editDetail.push(false)
				})
			}).catch((error) => {
				console.log(error)
			})

			this.getDataLikeDiscussion()
		},
		mounted(){
			this.socket.on('create_comment', (data) => {
	            // console.log("OK -- tin_hieu_ve" + data)
	            //Kiem tra xem dang delete voi id_discussion nao de render lai giao dien do
				if(data == this.$route.params.id){
					this.getData()
				}
	        });

	        this.socket.on('delete_comment', (data) => {
	            // console.log("OK -- tin_hieu_ve" + data)
				if(data == this.$route.params.id){
					this.getData()
				}
	        });

	        this.socket.on('edit_comment', (data) => {
	            // console.log("OK -- tin_hieu_ve" + data)
				if(data == this.$route.params.id){
					this.getData()
				}
	        });

	        this.socket.on('like_discussion', (data) => {
	        	// console.log("OK - tin_hieu_ve" + data)
	        	if(data == this.$route.params.id){
					this.getDataLikeDiscussion()
				}
	        })

	        this.socket.on('create_comment_detail', (data) => {
	        	// console.log("OK - tin_hieu_ve" + data)
	        	if(data == this.$route.params.id){
					this.getData()
				}
	        })

	        this.socket.on('edit_comment_detail', (data) => {
	        	// console.log("OK - tin_hieu_ve" + data)
	        	if(data == this.$route.params.id){
					this.getData()
				}
	        })

	        this.socket.on('delete_comment_detail', (data) => {
	        	// console.log("OK - tin_hieu_ve" + data)
	        	if(data == this.$route.params.id){
					this.getData()
				}
	        })
		},
		methods:{
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

	            axios.get("api/commentdetaildiscussion/delete/" + id_comment_detail).then((response) =>{
					// console.log(response.data);
					if(response.data.status){
						alertify.set('notifier','position', 'buttom-right');
						alertify.success(response.data.message)
						this.socket.emit("delete_comment_detail", this.$route.params.id);
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
				edit_comment_detail.comment_detail_discussion_content = document.getElementById('edit_comment_detail').innerHTML
				edit_comment_detail.id_discussion = this.$route.params.id
				edit_comment_detail.id_user = this.users.id
				edit_comment_detail.id_comment_detail = id_comment_detail
				// console.log(edit_comment_detail)
				axios.defaults.headers.common['Content-Type'] = 'application/json'
				axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')

	            axios.post("api/commentdetaildiscussion/update", edit_comment_detail).then((response) =>{
					// console.log(response.data);
					if(response.data.status){
						// alertify.set('notifier','position', 'buttom-right');
		 			// 	alertify.success(response.data.message);
						this.onDestroy()
						this.socket.emit("edit_comment_detail", response.data.id_discussion);
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
				create_comment_detail.comment_detail_discussion_content = document.getElementById('create_comment_detail').innerHTML
				create_comment_detail.id_comment_discussion = id_comment
				create_comment_detail.id_user = this.users.id
				create_comment_detail.id_discussion = this.$route.params.id
				// console.log(create_comment_detail)
				axios.defaults.headers.common['Content-Type'] = 'application/json'
				axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')
				axios.post("api/commentdetaildiscussion/create", create_comment_detail).then((response) =>{
					// console.log(response.data);
					if (response.data.status) {
						// alertify.set('notifier','position', 'buttom-right');
		 			// 	alertify.success(response.data.message);
		 				this.onDestroy()
						this.socket.emit("create_comment_detail", response.data.id_discussion);
					} else {
						alertify.set('notifier','position', 'buttom-right');
		 				alertify.error(response.data.message);
					}
				}).catch((error) => {
					console.log(error)
				})
				document.getElementById('create_comment').innerHTML = ""
			},
			ClickLikeDiscussion(isLike){
				// console.log(isLike)
				axios.defaults.headers.common['Content-Type'] = 'application/json'
				axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')
				var dataPost = {}
				dataPost.isLike = isLike
				dataPost.id_user = this.users.id
				dataPost.id_discussion = this.$route.params.id
				axios.post("api/likediscussion/admin/change", dataPost).then((response) =>{
					// console.log(response.data);
					if (response.data.status) {
						// alertify.set('notifier','position', 'buttom-right');
		 			// 	alertify.success(response.data.message);
						this.socket.emit("like_discussion", response.data.id_discussion);
					} else {
						alertify.set('notifier','position', 'buttom-right');
		 				alertify.error(response.data.message);
					}
				}).catch((error) => {
					console.log(error)
				})
			},
			ClickCreateComment(){
				var create_comment = {}
				create_comment.comment_discussion_content = document.getElementById('create_comment').innerHTML
				create_comment.id_discussion = this.$route.params.id
				create_comment.id_user = this.users.id

				axios.defaults.headers.common['Content-Type'] = 'application/json'
				axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')

	            axios.post("api/commentdiscussion/create", create_comment).then((response) =>{
					// console.log(response.data);
					if (response.data.status) {
						// alertify.set('notifier','position', 'buttom-right');
		 			// 	alertify.success(response.data.message);
						this.socket.emit("create_comment", response.data.id_discussion);
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
				edit_comment.comment_discussion_content = document.getElementById('edit_comment').innerHTML
				edit_comment.id_discussion = this.$route.params.id
				edit_comment.id_user = this.users.id
				edit_comment.id_comment = id_comment
				// console.log(edit_comment)
				axios.defaults.headers.common['Content-Type'] = 'application/json'
				axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')

	            axios.post("api/commentdiscussion/update", edit_comment).then((response) =>{
					// console.log(response.data);
					if(response.data.status){
						alertify.set('notifier','position', 'buttom-right');
		 				alertify.success(response.data.message);
						this.onDestroy()
						this.socket.emit("edit_comment", response.data.id_discussion);
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

	            axios.get("api/commentdiscussion/delete/" + id_comment).then((response) =>{
					// console.log(response.data);
					if(response.data.status){
						alertify.set('notifier','position', 'buttom-right');
						alertify.success(response.data.message)
						this.socket.emit("delete_comment", this.$route.params.id);
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
			onEditComment(index_comment){
				this.onDestroy()
				this.$set(this.editComment, index_comment, true)
			},
			onEditDetail(index_detail){
				this.onDestroy()
				this.$set(this.editDetail, index_detail, true)
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
			getData(){
				axios.defaults.headers.common['Content-Type'] = 'application/json'
				axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')
				axios.get(`/api/discussion/showwithcomment/${this.$route.params.id}`).then((response) => {
					this.discussion = response.data.discussion
					this.comment = response.data.comment
					this.commentdetail = response.data.commentdetail
					this.countComment = response.data.countComment
				}).catch((error) => {
					console.log(error)
				})
			},
			getDataLikeDiscussion(){
				axios.defaults.headers.common['Content-Type'] = 'application/json'
				axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')
				this.axios.get(`/api/likediscussion/admin/${this.users.id}/${this.$route.params.id}`).then((response)=>{
					// console.log(response.data)
					this.countLikeDiscussion = response.data.countLikeDiscussion
					this.isLikeDiscussion = response.data.isLikeDiscussion
				}).catch((error)=>{
					console.log(error)
				})
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
</style>