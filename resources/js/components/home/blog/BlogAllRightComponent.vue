<template>
	<div>
		<!-- post widget -->
		<div class="aside-widget wow fadeInRight animated" data-wow-duration="500ms" data-wow-delay="300ms">
			<div class="section-title">
				<h2><b class="blog-title">TOP BLOG</b></h2>
			</div>

			<div class="post post-widget">
				<a class="post-img imgover-small" href="javascript:void(0)"><img src="images/blog/post.jpg" alt=""></a>
				<div class="post-body">
					<h3 class="post-title"><a href="javascript:void(0)">Tiêu đề bài viết</a></h3>
				</div>
			</div>
			<div class="post post-widget">
				<a class="post-img imgover-small" href="javascript:void(0)"><img src="images/blog/post.jpg" alt=""></a>
				<div class="post-body">
					<h3 class="post-title"><a href="javascript:void(0)">Tiêu đề bài viết</a></h3>
				</div>
			</div>
			<div class="post post-widget">
				<a class="post-img imgover-small" href="javascript:void(0)"><img src="images/blog/post.jpg" alt=""></a>
				<div class="post-body">
					<h3 class="post-title"><a href="javascript:void(0)">Tiêu đề bài viết</a></h3>
				</div>
			</div>
			<div class="post post-widget">
				<a class="post-img imgover-small" href="javascript:void(0)"><img src="images/blog/post.jpg" alt=""></a>
				<div class="post-body">
					<h3 class="post-title"><a href="javascript:void(0)">Tiêu đề bài viết</a></h3>
				</div>
			</div>
			<div class="post post-widget">
				<a class="post-img imgover-small" href="javascript:void(0)"><img src="images/blog/post.jpg" alt=""></a>
				<div class="post-body">
					<h3 class="post-title"><a href="javascript:void(0)">Tiêu đề bài viết</a></h3>
				</div>
			</div>
		</div>
		<!-- /post widget -->

		<!-- catagories -->
		<div class="aside-widget wow fadeInRight animated" data-wow-duration="500ms" data-wow-delay="600ms">
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
		</div>
		<!-- /catagories -->
		
		<!-- tags -->
		<div class="aside-widget wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="900ms">
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
		</div>
		<!-- /tags -->
	</div>
</template>

<style>
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
</style>