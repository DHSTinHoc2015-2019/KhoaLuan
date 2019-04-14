<template>
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-holder">
                            <h1 class="main-title float-left">Quản lý hệ thống</h1>
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item">Admin</li>
                                <li class="breadcrumb-item active">Quản lý hệ thống</li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                
               <div class="row">

                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box noradius noborder bg-info">
                            <i class="fa fa-user-o float-right text-white"></i>
                            <h6 class="text-white text-uppercase m-b-20">Tổng số người dùng</h6>
                            <h1 class="m-b-20 text-white counter" data-count="6200">0</h1>
                            <span class="text-white">25 người dùng mới</span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box noradius noborder bg-warning">
                            <i class="fa fa-bar-chart float-right text-white"></i>
                            <h6 class="text-white text-uppercase m-b-20">Bài viết tháng này</h6>
                            <h1 class="m-b-20 text-white counter" data-count="600">0</h1>
                            <span class="text-white">Tăng: 25%</span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box noradius noborder bg-default">
                            <i class="fa fa-file-text-o float-right text-white"></i>
                            <h6 class="text-white text-uppercase m-b-20">Tổng phản hồi</h6>
                            <h1 class="m-b-20 text-white counter" data-count="6200">0</h1>
                            <span class="text-white">15 phản hồi mới</span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box noradius noborder bg-danger">
                            <i class="fa fa-bell-o float-right text-white"></i>
                            <h6 class="text-white text-uppercase m-b-20">Tổng thảo luận</h6>
                            <h1 class="m-b-20 text-white counter" data-count="6200">0</h1>
                            <span class="text-white">5 thảo luận mới</span>
                        </div>
                    </div>

                </div>
                <!-- end row -->
                
            </div>
            <!-- END container-fluid -->
        </div>
        <!-- END content -->
    </div>
    <!-- END content-page -->
</template>

<script>
    export default {
        mounted(){
            $(document).ready(function() {                        
                // counterup
               $('.counter').each(function() {
                    var $this = $(this), countTo = $this.attr('data-count');
  
                    $({ countNum: $this.text()}).animate({
                        countNum: countTo
                    },
                    {
                        duration: 8000,
                        easing:'linear',
                        step: function() {
                            $this.text(Math.floor(this.countNum));
                        },
                        complete: function() {
                            $this.text(this.countNum);
                            //alert('finished');
                        }
                    });  
                });
            });
        }
    }
</script>