<template>
    <div>
        <div v-if="!complete" class="pt-5" style="min-height: 50vh">
            <div class="loading-spinner"></div>
        </div>
    	<div v-if="complete">
        	<section id="scroll-position">
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
          							<a href="javascript:void(0)" :title="value.title">
                        				<img :src="'images/library/images/' + value.file_name" class="image card-img-top" height="150">
                    				</a>
        						</div>
                            </div> 
                        </div>
                        <div class="col-md-12 wow fadeInLeft animated mt-3" data-wow-duration="500ms" data-wow-delay="400ms">
                            <div class="section-row">
                                <pagination-image v-bind:pagination="pagination_image" v-on:click.native="getImages(pagination_image.current_page)" :offset="4"></pagination-image>
                            </div>
                        </div>
                    </div>
                </div>
        	</section>

        	<section style="background-color: teal" id="scroll-video">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title wow fadeInDown animated mt-4" data-wow-duration="500ms" data-wow-delay="300ms">
                                <h2><b class="blog-title" style="color: white">VIDEO</b></h2>
                            </div>
                        </div>
                        <!-- <div class="col-md-1"></div> -->
                        <div class="col-md-12 wow fadeInLeft animated mt-3" data-wow-duration="500ms" data-wow-delay="400ms">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr class="table-warning d-flex">
                                        <th class="col-1">STT</th>
                                        <th class="col-sm-10">Video</th>
                                        <th class="col-sm-1">Link</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="table-light d-flex" v-for="(value, index) in videos">
                                        <td class="col-1">{{ index + 1 }}</td>
                                        <td class="col-sm-10">{{ value.title }}</td>
                                        <td class="col-sm-1">
                                            <a :href="value.file_name" target="blank">Xem</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- <div class="col-md-1"></div> -->
                        <div class="col-md-12 wow fadeInLeft animated mt-3" data-wow-duration="500ms" data-wow-delay="400ms">
                            <div class="section-row">
                                <pagination-video v-bind:pagination="pagination_video" v-on:click.native="getVideos(pagination_video.current_page)" :offset="4"></pagination-video>
                            </div>
                        </div>
                        <div class="col-md-12 mb-5"></div>
                    </div>
                </div>
            </section>

            <section style="background-color: white" id="scroll-document">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title wow fadeInDown animated mt-4" data-wow-duration="500ms" data-wow-delay="300ms">
                                <h2><b class="blog-title">TÀI LIỆU</b></h2>
                            </div>
                        </div>
                        <!-- <div class="col-md-1"></div> -->
                        <div class="col-md-12 wow fadeInLeft animated mt-3" data-wow-duration="500ms" data-wow-delay="400ms">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr class="table-primary d-flex">
                                        <th class="col-1">STT</th>
                                        <th class="col-sm-10">Tài liệu</th>
                                        <th class="col-sm-1">Link</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="table-light d-flex" v-for="(value, index) in documents">
                                        <td class="col-1">{{ index + 1 }}</td>
                                        <td class="col-sm-10">{{ value.title }}</td>
                                        <td class="col-sm-1">
                                            <a :href="'/images/library/documents/' + value.file_name" target="blank">Xem</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- <div class="col-md-1"></div> -->
                        <div class="col-md-12 wow fadeInLeft animated mt-3" data-wow-duration="500ms" data-wow-delay="400ms">
                            <div class="section-row">
                                <pagination-document v-bind:pagination="pagination_document" v-on:click.native="getDocuments(pagination_document.current_page)" :offset="4"></pagination-document>
                            </div>
                        </div>
                        <!-- <div class="col-md-12 mb-5"></div> -->
                    </div>
                </div>
            </section>

            <!-- <section style="background-color: gray">
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
        	</section> -->
    	</div>
    </div>

</template>

<script>
    import PaginationImage from './PaginationImage.vue';
    import PaginationVideo from './PaginationVideo.vue';
    import PaginationDocument from './PaginationDocument.vue';
	export default {
		data() {
		    return {
                images: {},
                videos: {},
                documents: {},
                complete: false,
                // counter: 0,
                pagination_image: {
                    total: 0,
                    per_page: 2,
                    from: 1,
                    to: 0,
                    current_page: 1
                },
                pagination_video: {
                    total: 0,
                    per_page: 2,
                    from: 1,
                    to: 0,
                    current_page: 1
                },
                pagination_document: {
                    total: 0,
                    per_page: 2,
                    from: 1,
                    to: 0,
                    current_page: 1
                },
                offset: 4,
		    }
	  	},
        components: {
            PaginationImage: PaginationImage,
            PaginationVideo: PaginationVideo,
            PaginationDocument: PaginationDocument,
        },
		created(){
            this.axios.get('/api/library/paginate/image').then((response) => {
                // console.log(response.data)
                this.images = response.data.data
                this.complete = true
            }).catch((error) => {
                console.log(error)
            })

            this.axios.get('/api/library/paginate/video').then((response) => {
                // console.log(response.data)
                this.videos = response.data.data
                this.complete = true
            }).catch((error) => {
                console.log(error)
            })

            this.axios.get('/api/library/paginate/document').then((response) => {
                console.log(response.data)
                this.documents = response.data.data
                this.complete = true
            }).catch((error) => {
                console.log(error)
            })
        },
        mounted(){
             this.getImages(this.pagination_image.current_page);
             this.getVideos(this.pagination_video.current_page);
             this.getDocuments(this.pagination_video.current_page);
        },
		methods:{
            getImages (page) {
                axios.get('/api/library/paginate/image?page='+page)
                    .then((response) => {
                        this.images = response.data.data
                        this.pagination_image = response.data
                    })
            },

            getVideos (page) {
                axios.get('/api/library/paginate/video?page='+page)
                    .then((response) => {
                        this.videos = response.data.data
                        this.pagination_video = response.data
                    })
            },

            getDocuments (page) {
                axios.get('/api/library/paginate/document?page='+page)
                    .then((response) => {
                        this.documents = response.data.data
                        this.pagination_document = response.data
                    })
            },
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
    .table-bordered > tbody > tr > td, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > td, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > thead > tr > th {
    border: 1px solid #ccc;
}
</style>