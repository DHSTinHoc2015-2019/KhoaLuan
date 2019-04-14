<template>
	<div>
		<app-user-discussion-create-breadcrumb-component></app-user-discussion-create-breadcrumb-component>
		<div v-if="!complete" class="pt-5" style="min-height: 50vh">
            <div class="loading-spinner"></div>
        </div>
		<section style="padding-bottom: 40px; background: #ececec" class="pt-5 wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="300ms" v-if="complete">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-12">                      
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3><i class="fa fa-plus" aria-hidden="true"></i> Tạo thảo luận mới</h3>
                            </div>
                                
                            <div class="card-body">
                            	<form v-on:submit.prevent="createDiscussion">
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
											<router-link :to="{ name: 'Discussion'}" class="btn btn-danger"><span class="btn-label"><i class="fa fa-times"></i></span>Hủy bỏ</router-link>
										</div>
										<!-- end lưu -->
	                                	
	                                </div> <!-- end row -->

                                </form>
                            </div>  <!-- end card-body -->                        
                        </div><!-- end card-->                  
                    </div>
				</div>
			</div><!-- container -->
    	</section>
	</div>
</template>

<script>
	import UserDiscussionCreateBreadcrumbComponent from './UserDiscussionCreateBreadcrumbComponent.vue';
	export default {
		components:{
			appUserDiscussionCreateBreadcrumbComponent: UserDiscussionCreateBreadcrumbComponent
		},
		data(){
			return {
				discussion: {},
				discussiontype: {},
				user: null,
				complete: false
			}
		},
		created(){
			this.axios.get('/api/discussiontype').then((response) => {
				this.discussiontype = response.data
				this.complete = true
			}).catch((error) => {
				console.log(error)
			})
			this.user = JSON.parse(localStorage.getItem('tpack.user'))
			this.discussion.id_user = this.user.id
		},
		methods: {
			createDiscussion(){
				axios.defaults.headers.common['Content-Type'] = 'application/json'
				axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')
				this.axios.post('/api/discussion/create', this.discussion).then((response) => {
					if (response.data.status) {
						alertify.set('notifier','position', 'buttom-right');
		 				alertify.success('Tạo thảo luận thành công');
						this.$router.push({ name: 'Discussion'})
					} else {
						alertify.set('notifier','position', 'buttom-right');
		 				alertify.error('Tạo thảo luận thất bại');
					}
				}).catch((error) => {
					console.log(error)
				})
			}
		}
	}
</script>