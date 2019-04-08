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
                				<img :src="'images/library/images/' + value.file_name" class="image card-img-top" height="150">
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
                <div class="col-md-3 col-sm-3 wow fadeInLeft animated mt-3" data-wow-duration="500ms" data-wow-delay="400ms" v-for="(value, index) in video">
                    <div class="card p-2">
                       <div class="card">
            				<iframe style="border: 3px solid #02bdd5; width: 100%" height="" :src="value.file_name" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
                images: {},
                video: {},
                document: {}
		    }
	  	},
		created(){
            this.axios.get('/api/library/all').then((response) => {
                // console.log(response.data)
                this.images = response.data.image
                this.video = response.data.video
                this.document = response.data.document

                for (var i = this.video.length - 1; i >= 0; i--) {
                    this.video[i].file_name = this.video[i].file_name.replace("watch?v=", "embed/")
                }
            }).catch((error) => {
                console.log(error)
            })
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