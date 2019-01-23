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
					<div id="comments-container" class="jquery-comments">
			            <div class="commenting-field main">
			                <div style="background-image: url(&quot;images/users/avatar.jpg&quot;);" class="profile-picture round"></div>
			                <div class="textarea-wrapper">
			                    <span class="enabled upload inline-button"><i class="fa fa-paperclip"></i><input type="file" data-role="none" multiple="multiple"></span><span class="close inline-button" style="display: none;"><span class="left"></span><span class="right"></span></span>
			                    <div>
			                    	<div class="textarea" data-placeholder="Add a comment" style="min-height: 2.2em;" contenteditable="true">
			                    	</div>
			                    </div>
			                    <div class="control-row" style="display: none;"><span class="send save highlight-background">Send</span><span class="enabled upload"><i class="fa fa-paperclip"></i><input type="file" data-role="none" multiple="multiple"></span></div>
			                </div>
			            </div>
			            <ul class="navigation">
			                <div class="navigation-wrapper">
			                    <li data-sort-key="newest" data-container-name="comments" class="active">Newest</li>
			                    <li data-sort-key="oldest" data-container-name="comments">Oldest</li>
			                    <li data-sort-key="popularity" data-container-name="comments">Popular</li>
			                </div>
			                <div class="navigation-wrapper responsive">
			                    <li class="title active">
			                        <header>Newest</header>
			                    </li>
			                    <ul class="dropdown" style="display: none;">
			                        <li data-sort-key="newest" data-container-name="comments" class="active">Newest</li>
			                        <li data-sort-key="oldest" data-container-name="comments">Oldest</li>
			                        <li data-sort-key="popularity" data-container-name="comments">Popular</li>
			                    </ul>
			                    <li data-sort-key="attachments" data-container-name="attachments"><i class="fa fa-paperclip"></i>Attachments</li>
			                </div>
			            </ul>
			            <div class="data-container" data-container="comments">
			                <ul id="comment-list" class="main">
			                    <li data-id="3" class="comment by-current-user">
			                        <div class="comment-wrapper">
			                            <div style="background-image: url(&quot;images/users/avatar.jpg&quot;);" class="profile-picture round" data-user-id="1"></div>
			                            <time data-original="2015-01-03">3/1/2015</time>
			                            <div class="name"><span data-user-id="1">You</span></div>
			                            <div class="wrapper">
			                                <div class="content"><input class="tag ping" type="button" data-role="none" value="@Hank Smith" data-value="3" data-user-id="3"> sed posuere interdum sem.
			                                    Quisque ligula eros ullamcorper <a href="https://www.google.com/" target="_blank">https://www.google.com/</a> quis, lacinia quis facilisis sed sapien. Mauris varius diam vitae arcu. Sed arcu lectus auctor vitae, consectetuer et venenatis eget <input class="tag hashtag" type="button" data-role="none" value="#velit" data-value="velit">.
			                                </div>
			                                <span class="actions"><button class="action reply" type="button">Reply</button><span class="separator">·</span><button class="action upvote highlight-font"><span class="upvote-count">2</span><i class="fa fa-thumbs-up"></i></button><span class="separator">·</span><button class="action edit">Edit</button></span>
			                            </div>
			                        </div>
			                        <ul class="child-comments">
			                            <li data-id="5" class="comment">
			                                <div class="comment-wrapper">
			                                    <div style="background-image: url(&quot;images/users/avatar.jpg&quot;);" class="profile-picture round" data-user-id="3"></div>
			                                    <time data-original="2015-01-05">5/1/2015</time>
			                                    <div class="name"><span data-user-id="3">Hank Smith</span><span class="reply-to" data-user-id="4"><i class="fa fa-share"></i>Todd Brown</span><span class="new highlight-background">New</span></div>
			                                    <div class="wrapper">
			                                        <div class="content">Quisque ligula eros ullamcorper quis, lacinia quis facilisis sed sapien. Mauris varius diam vitae arcu. Sed arcu lectus auctor vitae, consectetuer et venenatis eget velit.</div>
			                                        <span class="actions"><button class="action reply" type="button">Reply</button><span class="separator">·</span><button class="action upvote"><span class="upvote-count">0</span><i class="fa fa-thumbs-up"></i></button></span>
			                                    </div>
			                                </div>
			                            </li>
			                        </ul>
			                    </li>
			                    <li data-id="2" class="comment by-admin">
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
			                    </li>
			                    <li data-id="1" class="comment">
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
			                            <li data-id="6" class="comment hidden-reply">
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
			                            <li data-id="7" class="comment by-admin hidden-reply">
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
			                            <li data-id="8" class="comment by-current-user hidden-reply">
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
			                            <li data-id="9" class="comment">
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
			                            <li data-id="10" class="comment by-current-user edit">
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
			                    </li>
			                </ul>
			                <div class="no-comments no-data"><i class="fa fa-comments fa-2x"></i><br>No comments</div>
			            </div>
			            <div class="data-container" data-container="attachments" style="display: none;">
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
			            </div>
			            <div class="droppable-overlay" style="display: none;">
			                <div class="droppable-container">
			                    <div class="droppable">
			                        <i class="fa fa-paperclip fa-4x"></i>
			                        <div>Drop files here</div>
			                    </div>
			                </div>
			            </div>
			            <ul class="dropdown autocomplete" id="textcomplete-dropdown-2" style="display: none; left: 0px; position: absolute; z-index: 100;"></ul>
			            <ul class="dropdown autocomplete" id="textcomplete-dropdown-3" style="display: none; left: 0px; position: absolute; z-index: 100;"></ul>
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
<style scoped>
	.jquery-comments ul.navigation li.active:after {background: #2793e6 !important;}
    .jquery-comments ul.navigation ul.dropdown li.active {background: #2793e6 !important;}
    .jquery-comments .highlight-background {background: #2793e6 !important;}
    .jquery-comments .highlight-font {color: #2793e6 !important;}
    .jquery-comments .highlight-font-bold {color: #2793e6 !important;font-weight: bold;}
    /*.jquery-comments .textarea-wrapper .textarea {
    	overflow: hidden;
    }*/
</style>
<script>
	// import BlogAllRightComponent from '../BlogAllRightComponent.vue';

	export default {
		mounted(){
			$( document ).ready(function() {
			    $('textarea').each(function () {
				  this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
				}).on('input', function () {
				  this.style.height = 'auto';
				  this.style.height = (this.scrollHeight) + 'px';
				});
			});
			
		}
	}
</script>