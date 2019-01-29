<template>
	<div class="content-page">
		<!-- Start content -->
        <div class="content">
			<div class="container-fluid">

				<div class="row">
						<div class="col-xl-12">
								<div class="breadcrumb-holder">
										<h1 class="main-title float-left font-weight-bold text-uppercase">Thành phần Tpack</h1>
										<ol class="breadcrumb float-right">
											<li class="breadcrumb-item">Admin</li>
											<li class="breadcrumb-item">Thành phần Tpack</li>
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
                            	<form v-on:submit.prevent="updateHometpacks">
                                <div class="row">
                                	<div class="col-md-6">
										<div class="form-group">
											<label class="font-weight-bold">Viết tắt</label>
											<input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập chữ viết tắt" v-model="hometpacks.text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="font-weight-bold">Tiêu đề</label>
											<input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập tiêu đề" required="" v-model="hometpacks.title">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="font-weight-bold">Nội dung</label>
											<!-- <input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập nội dung" required="" v-model="hometpacks.content"> -->
											<textarea class="form-control" id="" rows="4" v-model="hometpacks.content"></textarea>
										</div>
									</div>
									<div class="col-md-6"></div>
									<!-- Lưu -->
									<div class="col-md-3"></div>
									<div class="col-md-3">
										<button type="submit" class="btn btn-primary float-right"><span class="btn-label"><i class="fa fa-save"></i></span> Lưu lại</button>
									</div>
									<div class="col-md-6">
										<router-link :to="{ name: 'ThanhPhanTpack'}" class="btn btn-danger"><span class="btn-label"><i class="fa fa-times"></i></span>Hủy bỏ</router-link>
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
				hometpacks: {}
			}
		},
		created: function(){
			axios.defaults.headers.common['Content-Type'] = 'application/json'
			axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')
			var vm = this
			this.axios.get(`/api/hometpack/${this.$route.params.id}`).then(function(response){
				vm.hometpacks = response.data
			}).catch(function(error){
				console.log(error)
			})
		},
		mounted: function(){
			
		},
		methods: {
			updateHometpacks(){
				axios.defaults.headers.common['Content-Type'] = 'application/json'
				axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')
				var vm = this
				this.axios.post(`/api/hometpack/update/${this.$route.params.id}`, this.hometpacks).then((response) => {
					if(response.data.status){
						alertify.set('notifier','position', 'buttom-right');
		 				alertify.success(response.data.message);
						this.$router.push({ name: 'ThanhPhanTpack'})
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