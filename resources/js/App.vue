<template>
 	<div>
 		<router-view></router-view>
	 	<!-- SCROLL TOP BUTTON -->
		<a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
		<!-- END SCROLL TOP BUTTON -->
 	</div>
</template>

<style>
	.scrollToTop {
	    background: #f9f9f9 none repeat scroll 0 0;
	    border-radius: 50%;
	    bottom: 60px;
	    display: none;
	    /*display: block;*/
	    font-size: 25px;
	    height: 55px;
	    line-height: 50px;
	    position: fixed;
	    right: 50px;
	    text-align: center;
	    text-decoration: none;
	    width: 55px;
	    -webkit-transition: all 0.5s;
	    -o-transition: all 0.5s;
	    transition: all 0.5s;
	    z-index: 999;
	    color: #00d999;
	}
</style>
<script>
	export default {
		name: 'app',
		mounted(){
			/* ----------------------------------------------------------- */
			/*  6. SCROLL TOP BUTTON
			/* ----------------------------------------------------------- */

			//Check to see if the window is top if not then display button

			jQuery(window).scroll(function(){
				if ($(this).scrollTop() > 300) {
					$('.scrollToTop').fadeIn();
				} else {
					$('.scrollToTop').fadeOut();
				}
			});

			//Click event to scroll to top

			jQuery('.scrollToTop').click(function(){
				$('html, body').animate({scrollTop : 0},800);
				return false;
			});
		}
	}
</script>