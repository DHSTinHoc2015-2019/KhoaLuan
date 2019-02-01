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
								<h3><i class="fa fa-table"></i> {{ discussion.title }}
									<router-link class="btn btn-success btn-sm float-right" :to="{ name: 'AdminDiscussionEdit', params: { id: `${this.$route.params.id}`}}">Chỉnh sửa</router-link></h3>
							</div>

							<div class="card-body">
								<div class="row">
									<div class="col-md-12">
										<div v-html="discussion.discussion_content"></div>
									</div>
								</div>
							</div>														
						</div><!-- end card-->					
					</div>
				</div>

				<div class="row mb-5">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-12">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-comment"></i> 3 comments</h3>
							</div>

							<div class="card-body">
								<div class="row">
									<div class="col-md-12">
					<div class="jquery-comments">
						<!-- conment cuối cùng -->
			            <div class="commenting-field main">
			                <div style="background-image: url(&quot;images/users/avatar.jpg&quot;);" class="profile-picture round"></div>
			                <div class="textarea-wrapper">
			                    <span class="close inline-button" style="display: none;">
			                    	<span class="left"></span>
			                    	<span class="right"></span>
			                    </span>
		                    	<div class="textarea" data-placeholder="Add a comment" style="min-height: 2.2em;" contenteditable="true">
		                    	</div>
			                    <!-- <div class="control-row" style="display: none;"> -->
			                    <div class="control-row">
			                    	<span class="send save highlight-background enabled">Đăng bình luận</span>
			                    	<span class="delete enabled" style="background-color: rgb(201, 48, 44);" v-on:click="onDestroy(1)">Hủy</span>
			                    </div>
			                </div>
			            </div>

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
            <div class="comment-wrapper" v-if="!edit">
                <div style="background-image: url(&quot;images/users/avatar.jpg&quot;);" class="profile-picture round"></div>
                <time>20/01/2019</time>
                <div class="name"><span>{{ value_comment.name }}</span></div>
                <div class="wrapper">
                    <div class="content">
                    	<p>{{ value_comment.comment_discussion_content }}</p>
                    </div>
                    <span class="actions">
                    	<button class="action reply" type="button" v-on:click="onReply(1)">Trả lời</button>
                    	<span class="separator">·</span>
                    	<button class="action upvote highlight-font">
                    		<span class="upvote-count">2</span>
                    		<i class="fa fa-thumbs-up"></i>
                    	</button>
                    	<span class="separator">·</span>
                    	<button class="action edit" v-on:click="onEdit(1)">Sửa</button>
                    	<span class="separator">·</span>
                    	<button class="action delete enabled">Xóa</button>
                    </span>
                </div>
            </div>
            <!-- Sửa comment -->
            <div class="commenting-field" v-if="edit">
            	<div style="background-image: url(&quot;images/users/avatar.jpg&quot;);" class="profile-picture round" data-user-id="1"></div>
            	<div class="textarea-wrapper">
            		<span class="close inline-button" v-on:click="onDestroy(1)">
            			<span class="left"></span>
            			<span class="right"></span>
            		</span>
            		<div class="textarea" data-placeholder="Add a comment" style="min-height: 5.1em;" contenteditable="true">
            			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis accusamus a, labore quis rem. Asperiores quos, consectetur beatae hic ipsa aliquid libero, voluptas sapiente rerum incidunt eveniet nostrum voluptatum facere.</p>
            		</div>
            		<div class="control-row">
            			<span class="update save highlight-background enabled">Lưu</span>
            			<span class="delete enabled" style="background-color: rgb(201, 48, 44);" v-on:click="onDestroy(1)">Hủy</span>
            		</div>
        		</div>
        	</div>
        	<!-- end Sửa comment -->

            <ul class="child-comments" v-for="(value_detail, index_detail) in commentdetail">
                <li class="comment" v-if="value_detail.id_comment_discussion == value_comment.id">
                    <div class="comment-wrapper">
                        <div style="background-image: url(&quot;images/users/avatar.jpg&quot;);" class="profile-picture round"></div>
                        <time>22/01/2019</time>
                        <div class="name"><span>{{ value_detail.name }}</span></div>
                        <div class="wrapper">
                            <div class="content">
                            	<p>{{ value_detail.comment_detail_discussion_content }}</p>
                            </div>
                            <div class="actions">
                            	<button class="action upvote"><span class="upvote-count">0</span><i class="fa fa-thumbs-up"></i></button>
                            	<span class="separator">·</span>
                    			<button class="action edit">Sửa</button>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="child-comments" v-if="traloi">
                <div class="commenting-field">
                    <div style="background-image: url(&quot;images/users/avatar.jpg&quot;);" class="profile-picture round"></div>
                    <div class="textarea-wrapper">
                        <span class="close inline-button" v-on:click="onDestroy(1)">
                        	<span class="left"></span>
                        	<span class="right"></span>
                        </span>
                        <div class="textarea" data-placeholder="Add a comment" style="min-height: 3.65em;" contenteditable="true"></div>
                        <div class="control-row">
                        	<span class="send save highlight-background enabled">Đăng bình luận</span>
                        	<span class="delete enabled" style="background-color: rgb(201, 48, 44);" v-on:click="onDestroy(1)">Hủy</span>
                        </div>
                    </div>
                </div>
            </ul>
        </li>

        <!-- comment 2 -->
    </ul>
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
	export default {
		data(){
			return {
				discussion: {},
				comment: {},
				commentdetail: {},
				traloi: false,
				edit: false
			}
		},
		created(){
			axios.defaults.headers.common['Content-Type'] = 'application/json'
			axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')
			this.axios.get(`/api/discussion/showwithcomment/${this.$route.params.id}`).then((response) => {
				console.log(response.data.commentdetail)
				this.discussion = response.data.discussion
				this.comment = response.data.comment
				this.commentdetail = response.data.commentdetail
			}).catch((error) => {
				console.log(error)
			})
		},
		methods:{
			onReply(idcomment){
				this.onDestroy(idcomment)
				this.traloi = true
			},
			onDestroy(idcomment){
				this.traloi = false;
				this.edit = false;
			},
			onEdit(idcomment){
				this.onDestroy(idcomment)
				this.edit = true;
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
    .content-page .content {
    	margin-top: 0px;
    }
</style>