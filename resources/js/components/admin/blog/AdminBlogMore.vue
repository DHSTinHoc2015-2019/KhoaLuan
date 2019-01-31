<template>
	    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
							
				<div class="row">
						<div class="col-xl-12">
								<div class="breadcrumb-holder">
										<h1 class="main-title float-left font-weight-bold text-uppercase">Bài viết</h1>
										<ol class="breadcrumb float-right">
											<li class="breadcrumb-item">Admin</li>
											<li class="breadcrumb-item active">Bài viết</li>
										</ol>
										<div class="clearfix"></div>
								</div>
						</div>
				</div>
				<!-- end row -->

				<div class="row mb-5">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-12">						
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-table"></i> {{ blogs.title }}
									<router-link class="btn btn-success btn-sm float-right" :to="{ name: 'AdminBlogEdit', params: { id: `${this.$route.params.id}`}}">Chỉnh sửa</router-link></h3>
							</div>

							<div class="card-body">
								<div class="row">
									<div class="col-md-3" v-if="!checkImageSVG()">
										<img v-bind:src="`images/blog/${blogs.blog_image}`" alt="" style="max-width: 100%;">
									</div>
									<div class="col-md-3" v-if="checkImageSVG()" v-html="blogs.blog_image">
										
									</div>
									<div class="col-md-9">
										<h3>Mô tả</h3>
										{{ blogs.description }}
									</div>
									<div class="col-md-12">
										<hr>
									</div>
									<div class="col-md-12">
										<h3>Nội dung</h3>
										<div v-html="blogs.blog_content"></div>
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
				blogs: {}
			}
		},
		created(){
			this.axios.get(`/api/blog/readmore/${this.$route.params.id}`).then((response) => {
				this.blogs = response.data
			}).catch((error) => {
				console.log(error)
			})
		},
		methods:{
			checkImageSVG(){
				if('blog_image' in this.blogs){
					return this.blogs.blog_image.toString().indexOf('<svg') != -1
				}
				return false;
			},
		}
	}
</script>