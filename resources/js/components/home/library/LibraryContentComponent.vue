<template>
	<div>
		<section>
		<div class="container mt-5 mb-5">
            <div class="row" v-viewer>
            	<div class="col-md-12">
                    <div class="section-title wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="300ms">
                        <h2><b class="blog-title">HÌNH ẢNH</b></h2>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 wow fadeInLeft animated mt-3" data-wow-duration="500ms" data-wow-delay="400ms" v-for="(value, index) in images">
                    <div class="card p-2">
                       <div class="card">
  							<a href="javascript:void(0)" title="mô tả">
                				<img :src="value" class="image card-img-top" height="150">
            				</a>
						</div>
                    </div> 
                </div>
            </div>
        </div>
	</section>

	<section style="background-color: gray">
		<div class="container">
            <div class="row" v-viewer>
            	<div class="col-md-12">
                    <div class="section-title wow fadeInDown animated mt-4" data-wow-duration="500ms" data-wow-delay="300ms">
                        <h2><b class="blog-title">VIDEO</b></h2>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 wow fadeInLeft animated mt-3" data-wow-duration="500ms" data-wow-delay="400ms" v-for="(value, index) in images">
                    <div class="card p-2">
                       <div class="card">
  							<!-- <a href="javascript:void(0)" title="mô tả">
                				<img :src="value" class="image card-img-top" height="150">
            				</a> -->
            				<!-- <iframe style="border: 3px solid #02bdd5; width: 100%" height="" src="https://www.youtube.com/embed/yMQiHJsePOM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
						</div>
                    </div> 
                </div>
                <div class="col-md-12 mb-5"></div>
            </div>

        </div>
	</section>
	</div>

</template>

<script>
	export default {
		data() {
		    return {
				images: [
		      		'images/library/images/1.png',
		      		'images/library/images/2.png',
		      		'images/library/images/3.jpg',
		      		'images/library/images/4.png',
		        	'images/library/images/5.jpg',
		        	'images/library/images/6.jpg',
		        	'images/library/images/7.png',
		        	'images/library/images/anh.jpg',
		        	'images/library/images/6.jpg',
		        	'images/library/images/6.jpg',
		        	'images/library/images/6.jpg',
		        	'images/library/images/6.jpg',
		      	]
		    }
	  	},
		mounted(){

		},
		methods:{

		}
	}
</script>

<style scoped>
	.image {
    cursor: pointer;
  }
  .blog-title {
        color: #231557; text-transform: uppercase;
    }
</style>