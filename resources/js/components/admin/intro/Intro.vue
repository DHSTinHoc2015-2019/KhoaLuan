<template>
	    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
							
				<div class="row">
					<div class="col-xl-12">
						<div class="breadcrumb-holder">
							<h1 class="main-title float-left font-weight-bold text-uppercase">Giới thiệu</h1>
							<ol class="breadcrumb float-right">
								<li class="breadcrumb-item">Admin</li>
								<li class="breadcrumb-item active">giới thiệu</li>
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
								<h3><i class="fa fa-tv"></i> Giới thiệu
									<router-link class="btn btn-success btn-sm float-right" :to="{ name: 'AdminIntroEdit' }">Chỉnh sửa</router-link></h3>
							</div>

							<div class="card-body" v-html="intros.introduction_content">
								
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
				intros: {}
			}
		},
		created(){
			this.axios.get('/api/introduction').then((response) => {
				this.intros = response.data
			}).catch((error) => {
				console.log(error)
			})
		}
	}
</script>