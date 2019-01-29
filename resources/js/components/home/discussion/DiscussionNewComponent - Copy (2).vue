<template>
	<div style="padding-bottom: 40px;" class="wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="300ms">
		<section>
			<div class="container">
				<div class="row">
					<div class="col-md-12 pt-4">
	                    <h2><b class="blog-title">Thảo luận mới nhất</b></h2>
	                </div>
					<div class="col-md-12 pt-4">
						<div id="accordions">
    <div class="card">
        <div class="card-header" id="heading-2">
            <h5 class="mb-0">
                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                Item 2
                </a>
            </h5>
        </div>
        <div id="collapse-2" class="collapse" data-parent="#accordions" aria-labelledby="heading-2">
            <div class="card-body">
                Text 2
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="heading-3">
            <h5 class="mb-0">
                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                Item 3
                </a>
            </h5>
        </div>
        <div id="collapse-3" class="collapse" data-parent="#accordions" aria-labelledby="heading-3">
            <div class="card-body">
                Text 3
            </div>
        </div>
    </div>
</div>
					</div>
				</div>
				
			</div><!-- container -->
		</section>
	</div>
</template>

<script>
	export default {
		mounted (){
			// ACCORDIAN
			// if($('[data-accordian]').length > 0){
			// 	$('[data-accordian]').on('click', function(){
					
			// 		var $this = $(this),
			// 			accordianBody = $this.data('accordian');
					
			// 		$(this).find('i').toggleClass('fa-minus').toggleClass('fa-plus');
			// 		$(accordianBody).toggleClass('active');
					
			// 		return false;
			// 	});
			// }
		}
	}
</script>

<style scoped>
	.blog-title {
        color: #231557; text-transform: uppercase;
    }
    .mb-0 > a {
  display: block;
  position: relative;
}
.mb-0 > a:after {
  content: "\f078"; /* fa-chevron-down */
  font-family: 'FontAwesome';
  position: absolute;
  right: 0;
}
.mb-0 > a[aria-expanded="true"]:after {
  content: "\f077"; /* fa-chevron-up */
}
</style>

