<template>
	<div class="content-page">
		<!-- Start content -->
        <div class="content">
			<div class="container-fluid">

				<div class="row">
					<div class="col-xl-12">
						<div class="breadcrumb-holder">
							<h1 class="main-title float-left font-weight-bold text-uppercase">Thảo luận</h1>
							<ol class="breadcrumb float-right">
								<li class="breadcrumb-item">Admin</li>
								<li class="breadcrumb-item">Thảo luận</li>
								<li class="breadcrumb-item active">Chỉnh sửa</li>
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
                            	<form v-on:submit.prevent="updateDiscussion">
	                                <div class="row">
	                                	<div class="col-md-6">
											<div class="form-group">
												<label class="font-weight-bold">Tiêu đề</label>
												<input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập tiêu đề" required="" v-model="discussion.title">
											</div>
										</div>
	                                	<div class="col-md-6">
											<div class="form-group">
												<label class="font-weight-bold">Đề tài thảo luận</label>
												<select class="form-control" v-model="discussion.id_discussion_type" required="">
													<!-- <option value="" selected="">Chọn</option> -->
													<option v-for="(value, index) in discussiontype" v-bind:value="value.id">{{ value.name_discussion_type }}</option>
												</select>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label class="font-weight-bold">Nội dung</label>
											    <textarea class="form-control" rows="3" v-model="discussion.discussion_content" required=""></textarea>
											</div>
										</div>
										<!-- <div class="col-md-6"></div> -->
										<!-- Lưu -->
										<div class="col-md-3"></div>
										<div class="col-md-3">
											<button type="submit" class="btn btn-primary float-right"><span class="btn-label"><i class="fa fa-save"></i></span> Lưu lại</button>
										</div>
										<div class="col-md-6">
											<router-link :to="{ name: 'AdminDiscussion'}" class="btn btn-danger"><span class="btn-label"><i class="fa fa-times"></i></span>Hủy bỏ</router-link>
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
				discussion: {},
				discussiontype: {},
				user: null
			}
		},
		created(){
			this.axios.get('/api/discussiontype').then((response) => {
				this.discussiontype = response.data
			}).catch((error) => {
				console.log(error)
			})
			this.user = JSON.parse(localStorage.getItem('tpack.user'))
			this.discussion.id_user = this.user.id

			axios.defaults.headers.common['Content-Type'] = 'application/json'
			axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')
			this.axios.get(`/api/discussion/show/${this.$route.params.id}`).then((response) =>{
				// console.log(response.data)
				this.discussion = response.data
			}).catch(function(error){
				console.log(error)
			})
		},
		methods: {
			updateDiscussion(){
				axios.defaults.headers.common['Content-Type'] = 'application/json'
				axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')
				var vm = this
				this.axios.post(`/api/discussion/update/${this.$route.params.id}`, this.discussion).then((response) => {
					if(response.data.status){
						alertify.set('notifier','position', 'buttom-right');
		 				alertify.success(response.data.message);
						this.$router.push({ name: 'AdminDiscussion'})
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