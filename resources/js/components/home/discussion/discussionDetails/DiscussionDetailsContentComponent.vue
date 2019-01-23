<template>
	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<div class="section-title wow fadeInDown" data-wow-delay=".3s">
						<h2>CÂU HỎI Ở ĐÂY</h2>
					</div>
				</div>
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

			            <div class="data-container">
			                <ul id="comment-list" class="main">
			                    <li class="comment by-current-user">
			                        <div class="comment-wrapper" v-if="!edit">
			                            <div style="background-image: url(&quot;images/users/avatar.jpg&quot;);" class="profile-picture round"></div>
			                            <time>20/01/2019</time>
			                            <div class="name"><span>Tên người dùng đang đăng nhập</span></div>
			                            <div class="wrapper">
			                                <div class="content">
			                                	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A perferendis ipsum incidunt enim non quos dolores itaque animi doloremque dolore, facilis, impedit eius blanditiis unde praesentium fugit debitis sequi fuga.</p>
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
			                        <ul class="child-comments">
			                            <li class="comment">
			                                <div class="comment-wrapper">
			                                    <div style="background-image: url(&quot;images/users/avatar.jpg&quot;);" class="profile-picture round"></div>
			                                    <time>22/01/2019</time>
			                                    <div class="name"><span>Tên người dùng</span></div>
			                                    <div class="wrapper">
			                                        <div class="content">
			                                        	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas laborum commodi doloremque tempore quo laudantium quasi impedit, maxime alias aut nulla quisquam repellat distinctio quidem minus quod aliquid, vero voluptatum.</p>
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

			                    <!-- <li class="comment by-admin">
			                        <div class="comment-wrapper">
			                            <div style="background-image: url(&quot;images/users/avatar.jpg&quot;);" class="profile-picture round" data-user-id="5"></div>
			                            <time data-original="2015-01-02">2/1/2015</time>
			                            <div class="name highlight-font-bold"><span data-user-id="5">Administrator</span></div>
			                            <div class="wrapper">
			                                <div class="content">Sed posuere interdum sem. Quisque ligula eros ullamcorper quis, lacinia quis facilisis sed sapien. Mauris varius diam vitae arcu.</div>
			                                <span class="actions"><button class="action reply" type="button">Reply</button><span class="separator">·</span><button class="action upvote"><span class="upvote-count">2</span><i class="fa fa-thumbs-up"></i></button></span>
			                            </div>
			                        </div>
			                        <ul class="child-comments">
			                            <div class="commenting-field">
			                                <div style="background-image: url(&quot;images/users/avatar.jpg&quot;);" class="profile-picture round"></div>
			                                <div class="textarea-wrapper">
			                                    <span class="close inline-button"><span class="left"></span><span class="right"></span></span>
			                                    <div class="textarea" data-placeholder="Add a comment" style="min-height: 3.65em;" data-parent="2" contenteditable="true"></div>
			                                    <div class="control-row"><span class="send save highlight-background">Send</span><span class="enabled upload"><i class="fa fa-paperclip"></i><input type="file" data-role="none" multiple="multiple"></span></div>
			                                </div>
			                            </div>
			                        </ul>
			                    </li> -->

			                    <!-- comment 3 -->

			                    <!-- <li class="comment">
			                        <div class="comment-wrapper">
			                            <div style="background-image: url(&quot;images/users/avatar.jpg&quot;);" class="profile-picture round" data-user-id="6"></div>
			                            <time data-original="2015-01-01">1/1/2015</time>
			                            <div class="name"><span data-user-id="6">Simon Powell</span></div>
			                            <div class="wrapper">
			                                <div class="content">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Sed posuere interdum sem. Quisque ligula eros ullamcorper quis, lacinia quis facilisis sed sapien. Mauris varius diam vitae arcu.</div>
			                                <span class="actions"><button class="action reply" type="button">Reply</button><span class="separator">·</span><button class="action upvote"><span class="upvote-count">3</span><i class="fa fa-thumbs-up"></i></button></span>
			                            </div>
			                        </div>
			                        <ul class="child-comments">
			                            <li class="toggle-all highlight-font-bold"><span class="text">View all 5 replies</span><span class="caret"></span></li>
			                            <li class="comment hidden-reply">
			                                <div class="comment-wrapper">
			                                    <div style="background-image: url(&quot;images/users/avatar.jpg&quot;);" class="profile-picture round" data-user-id="2"></div>
			                                    <time data-original="2015-01-06">6/1/2015</time>
			                                    <div class="name"><span data-user-id="2">Jack Hemsworth</span></div>
			                                    <div class="wrapper">
			                                        <div class="content">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Sed posuere interdum sem. Quisque ligula eros ullamcorper quis, lacinia quis facilisis sed sapien. Mauris varius diam vitae arcu.</div>
			                                        <span class="actions"><button class="action reply" type="button">Reply</button><span class="separator">·</span><button class="action upvote"><span class="upvote-count">1</span><i class="fa fa-thumbs-up"></i></button></span>
			                                    </div>
			                                </div>
			                            </li>
			                            <li class="comment by-admin hidden-reply">
			                                <div class="comment-wrapper">
			                                    <div style="background-image: url(&quot;images/users/avatar.jpg&quot;);" class="profile-picture round" data-user-id="5"></div>
			                                    <time data-original="2015-01-07">7/1/2015</time>
			                                    <div class="name highlight-font-bold"><span data-user-id="5">Administrator</span></div>
			                                    <div class="wrapper">
			                                        <div class="content">Sed posuere interdum sem. Quisque ligula eros ullamcorper quis, lacinia quis facilisis sed sapien. Mauris varius diam vitae arcu. Sed arcu lectus auctor vitae, consectetuer et venenatis eget velit.</div>
			                                        <span class="actions"><button class="action reply" type="button">Reply</button><span class="separator">·</span><button class="action upvote"><span class="upvote-count">0</span><i class="fa fa-thumbs-up"></i></button></span>
			                                    </div>
			                                </div>
			                            </li>
			                            <li class="comment by-current-user hidden-reply">
			                                <div class="comment-wrapper">
			                                    <div style="background-image: url(&quot;images/users/avatar.jpg&quot;);" class="profile-picture round" data-user-id="1"></div>
			                                    <time data-original="2015-01-08">8/1/2015</time>
			                                    <div class="name"><span data-user-id="1">You</span><span class="reply-to" data-user-id="2"><i class="fa fa-share"></i>Jack Hemsworth</span></div>
			                                    <div class="wrapper">
			                                        <div class="content">Sed posuere interdum sem. Quisque ligula eros ullamcorper quis, lacinia quis facilisis sed sapien. Mauris varius diam vitae arcu.</div>
			                                        <span class="actions"><button class="action reply" type="button">Reply</button><span class="separator">·</span><button class="action upvote"><span class="upvote-count">0</span><i class="fa fa-thumbs-up"></i></button><span class="separator">·</span><button class="action edit">Edit</button></span>
			                                    </div>
			                                </div>
			                            </li>
			                            <li class="comment">
			                                <div class="comment-wrapper">
			                                    <div style="background-image: url(&quot;images/users/avatar.jpg&quot;);" class="profile-picture round" data-user-id="7"></div>
			                                    <time data-original="2015-01-09">9/1/2015</time>
			                                    <div class="name"><span data-user-id="7">Bryan Connery</span><span class="reply-to" data-user-id="1"><i class="fa fa-share"></i>You</span></div>
			                                    <div class="wrapper">
			                                        <div class="content">Quisque ligula eros ullamcorper quis, lacinia quis facilisis sed sapien. Mauris varius diam vitae arcu. Sed arcu lectus auctor vitae, consectetuer et venenatis eget velit.<time class="edited" data-original="2015-01-10">Edited 10/1/2015</time></div>
			                                        <span class="actions"><button class="action reply" type="button">Reply</button><span class="separator">·</span><button class="action upvote"><span class="upvote-count">0</span><i class="fa fa-thumbs-up"></i></button></span>
			                                    </div>
			                                </div>
			                            </li>
			                            <li class="comment by-current-user edit">
			                                <div class="comment-wrapper">
			                                    <div style="background-image: url(&quot;images/users/avatar.jpg&quot;);" class="profile-picture round" data-user-id="1"></div>
			                                    <time data-original="2015-01-10">10/1/2015</time>
			                                    <div class="name"><span data-user-id="1">You</span><span class="reply-to" data-user-id="7"><i class="fa fa-share"></i>Bryan Connery</span></div>
			                                    <div class="wrapper">
			                                        <div class="content">Quisque ligula eros ullamcorper quis, lacinia quis facilisis sed sapien. Mauris varius diam vitae arcu. Sed arcu lectus auctor vitae, consectetuer et venenatis eget velit.</div>
			                                        <span class="actions"><button class="action reply" type="button">Reply</button><span class="separator">·</span><button class="action upvote"><span class="upvote-count">0</span><i class="fa fa-thumbs-up"></i></button><span class="separator">·</span><button class="action edit">Edit</button></span>
			                                    </div>
			                                    <div class="commenting-field">
			                                        <div style="background-image: url(&quot;images/users/avatar.jpg&quot;);" class="profile-picture round" data-user-id="1"></div>
			                                        <div class="textarea-wrapper">
			                                            <span class="close inline-button"><span class="left"></span><span class="right"></span></span>
			                                            <div class="textarea" data-placeholder="Add a comment" style="min-height: 3.65em;" data-parent="9" data-comment="10" contenteditable="true"><input class="tag reply-to" type="button" data-role="none" value="@Bryan Connery" data-value="7" data-user-id="7">&nbsp;Quisque ligula eros ullamcorper quis, lacinia quis facilisis sed sapien. Mauris varius diam vitae arcu. Sed arcu lectus auctor vitae, consectetuer et venenatis eget velit.</div>
			                                            <div class="control-row"><span class="update save highlight-background">Save</span><span class="delete enabled" style="background-color: rgb(201, 48, 44);">Delete</span></div>
			                                        </div>
			                                    </div>
			                                </div>
			                            </li>
			                        </ul>
			                    </li> -->
			                </ul>
			            </div>

			            <!-- <div class="data-container" data-container="attachments" style="display: none;">
			                <ul id="attachment-list" class="main">
			                    <li data-id="4" class="comment">
			                        <div class="comment-wrapper">
			                            <div style="background-image: url(&quot;images/users/avatar.jpg&quot;);" class="profile-picture round" data-user-id="4"></div>
			                            <time data-original="2015-01-04">4/1/2015</time>
			                            <div class="name"><span data-user-id="4">Todd Brown</span><span class="new highlight-background">New</span></div>
			                            <div class="wrapper">
			                                <div class="content">
			                                    <a class="attachment" href="http://www.w3schools.com/html/mov_bbb.mp4" target="_blank">
			                                        <video src="http://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4" controls="controls"></video>
			                                    </a>
			                                </div>
			                                <span class="actions"><button class="action reply" type="button">Reply</button><span class="separator">·</span><button class="action upvote"><span class="upvote-count">0</span><i class="fa fa-thumbs-up"></i></button></span>
			                            </div>
			                        </div>
			                    </li>
			                </ul>
			                <div class="no-attachments no-data"><i class="fa fa-paperclip fa-2x"></i><br>No attachments</div>
			            </div> -->


			            <!-- Xem sau -->
			            <!-- <div class="droppable-overlay" style="display: none;">
			                <div class="droppable-container">
			                    <div class="droppable">
			                        <i class="fa fa-paperclip fa-4x"></i>
			                        <div>Drop files here</div>
			                    </div>
			                </div>
			            </div>
			            <ul class="dropdown autocomplete" id="textcomplete-dropdown-2" style="display: none; left: 0px; position: absolute; z-index: 100;"></ul>
			            <ul class="dropdown autocomplete" id="textcomplete-dropdown-3" style="display: none; left: 0px; position: absolute; z-index: 100;"></ul> -->
			        </div>
			        <!-- end comments -->
				</div>
				<!-- end .col -->

				<!-- <div class="col-md-4">
					<app-blog-all-right-component></app-blog-all-right-component>
				</div> -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	
	</div>
	<!-- /section -->
</template>

<script>
	export default {
		data(){
			return {
				traloi: false,
				edit: false
			}
		},
		mounted(){
			$( document ).ready(function() {
			    $('textarea').each(function () {
				  this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
				}).on('input', function () {
				  this.style.height = 'auto';
				  this.style.height = (this.scrollHeight) + 'px';
				});
			});
			
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
</style>
