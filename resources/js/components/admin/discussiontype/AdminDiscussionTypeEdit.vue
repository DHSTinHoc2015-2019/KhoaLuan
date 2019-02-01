<template>
	<div class="content-page">
		<!-- Start content -->
        <div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12">
						<div class="breadcrumb-holder">
							<h1 class="main-title float-left font-weight-bold text-uppercase">Đề tài thảo luận</h1>
							<ol class="breadcrumb float-right">
								<li class="breadcrumb-item">Admin</li>
								<li class="breadcrumb-item">Đề tài thảo luận</li>
								<li class="breadcrumb-item active">Sửa</li>
							</ol>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<!-- end row -->
				
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-12">                      
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3><i class="fa fa-pencil"></i> Chỉnh sửa</h3>
                            </div>
                                
                            <div class="card-body">
                            	<form v-on:submit.prevent="updateDiscussionType">
                                <div class="row">
                                	<div class="col-md-12">
										<div class="form-group">
											<label class="font-weight-bold">Tên đề tài thảo luận</label>
											<input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập tên đề tài thảo luận" v-model="discussiontype.name_discussion_type" required="">
										</div>
									</div>
									<!-- Lưu -->
									<div class="col-md-3"></div>
									<div class="col-md-3">
										<button type="submit" class="btn btn-primary float-right"><span class="btn-label"><i class="fa fa-save"></i></span> Lưu lại</button>
									</div>
									<div class="col-md-6">
										<router-link :to="{ name: 'AdminDiscussionType'}" class="btn btn-danger"><span class="btn-label"><i class="fa fa-times"></i></span>Hủy bỏ</router-link>
									</div>
									<!-- end lưu -->

                                </div> <!-- end row -->

                                </form>
                            </div>  <!-- end card-body -->                        
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
				discussiontype: {}
			}
		},
		created: function(){
			axios.defaults.headers.common['Content-Type'] = 'application/json'
			axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')
			this.axios.get(`/api/discussiontype/show/${this.$route.params.id}`).then((response) =>{
				this.discussiontype = response.data
			}).catch(function(error){
				console.log(error)
			})
		},
		methods: {
			updateDiscussionType(){
				axios.defaults.headers.common['Content-Type'] = 'application/json'
				axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')
				var vm = this
				this.axios.post(`/api/discussiontype/update/${this.$route.params.id}`, this.discussiontype).then((response) => {
					if(response.data.status){
						alertify.set('notifier','position', 'buttom-right');
		 				alertify.success(response.data.message);
						this.$router.push({ name: 'AdminDiscussionType'})
					} else {
						alertify.set('notifier','position', 'buttom-right');
		 				alertify.error(response.data.message);
					}
				}).catch((error) => {
					console.log(error)
				})
			}
		}

	}
</script>