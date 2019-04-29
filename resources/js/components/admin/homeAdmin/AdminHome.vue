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
                            <h6 class="text-white text-uppercase m-b-20">Người dùng</h6>
                            <h1 class="m-b-20 text-white counter" id="sumuser">0</h1>
                            <span class="text-white" style="display: none">{{sumuser}} người dùng mới</span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box noradius noborder bg-warning">
                            <i class="fa fa-bar-chart float-right text-white"></i>
                            <h6 class="text-white text-uppercase m-b-20">Bài viết</h6>
                            <h1 class="m-b-20 text-white counter" id="sumblog">0</h1>
                            <!-- <span class="text-white">Tăng: 25%</span> -->
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box noradius noborder bg-default">
                            <i class="fa fa-file-text-o float-right text-white"></i>
                            <h6 class="text-white text-uppercase m-b-20">Tài liệu</h6>
                            <h1 class="m-b-20 text-white counter" id="sumdocument">0</h1>
                            <!-- <span class="text-white">15 phản hồi mới</span> -->
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box noradius noborder bg-danger">
                            <i class="fa fa-bell-o float-right text-white"></i>
                            <h6 class="text-white text-uppercase m-b-20">Phản hồi</h6>
                            <h1 class="m-b-20 text-white counter" id="sumfeedback">0</h1>
                            <!-- <span class="text-white">5 thảo luận mới</span> -->
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <div class="row pb-5">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">      
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3><i class="fa fa-line-chart"></i> <b>Thảo luận trong 30 ngày qua</b></h3>
                            </div>
                                
                            <div class="card-body">
                                <canvas id="lineChart"></canvas>
                            </div>                          
                            <div class="card-footer small text-muted">Cập nhật vào {{date}}/{{month}}/{{year}}</div>
                        </div><!-- end card-->                  
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">      
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3><i class="fa fa-line-chart"></i> <b>Bài viết trong 30 ngày qua</b></h3>
                            </div>
                                
                            <div class="card-body">
                                <canvas id="lineChart1"></canvas>
                            </div>                          
                            <div class="card-footer small text-muted">Cập nhật vào {{date}}/{{month}}/{{year}}</div>
                        </div><!-- end card-->                  
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
        data(){
            return {
                sumuser: 0,
                sumblog: 0,
                sumfeedback: 0,
                sumdocument: 0,
                blog30days: {},
                countblogs: [],
                dateblogs: [],
                discussion30days: {},
                countdiscussions: [],
                datediscussions: [],
                date : '',
                month : '',
                year : '',
            }
        },
        created(){
            axios.defaults.headers.common['Content-Type'] = 'application/json'
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('tpack.jwt')
            this.axios.get(`/api/homeadmin`).then((response) =>{
                // console.log(response.data)
                this.sumuser = response.data.sumuser
                this.sumblog = response.data.sumblog
                this.sumfeedback = response.data.sumfeedback
                this.sumdocument = response.data.sumdocument
                this.blog30days = response.data.blog30days
                this.discussion30days = response.data.discussion30days

                for(var i = 0; i < this.blog30days.length; i++){
                    this.countblogs.push(this.blog30days[i].countblogs)
                    this.dateblogs.push(this.blog30days[i].dateblogs)
                }

                for(var i = 0; i < this.discussion30days.length; i++){
                    this.countdiscussions.push(this.discussion30days[i].countdiscussions)
                    this.datediscussions.push(this.discussion30days[i].datediscussions)
                }
                // console.log(this.dateblogs)
            }).catch((error) => {
                console.log(error)
            })
        },
        mounted(){
            var time = new Date()
            this.date = time.getDate()
            this.month = time.getMonth() + 1 //Be careful! January is 0 not 1
            this.year = time.getFullYear()
        },
        beforeUpdate(){
            // $(document).ready(function() {                      
               //  // counterup
               // $('.counter').each(function() {
               //      var $this = $(this), countTo = $this.attr('data-count');
  
               //      $({ countNum: $this.text()}).animate({
               //          countNum: countTo
               //      },
               //      {
               //          duration: 8000,
               //          easing:'linear',
               //          step: function() {
               //              $this.text(Math.floor(this.countNum));
               //          },
               //          complete: function() {
               //              $this.text(this.countNum);
               //              //alert('finished');
               //          }
               //      });  
               //  });
            var countTo;
                    
            countTo = this.sumuser;
            $({ countNum: $('#sumuser').text()}).animate({
                    countNum: countTo
            },
            {
                duration: 5000,
                easing:'linear',
                step: function() {
                    $('#sumuser').text(Math.floor(this.countNum));
                },
                complete: function() {
                    $('#sumuser').text(this.countNum);
                }
            });

            countTo = this.sumblog;
            $({ countNum: $('#sumblog').text()}).animate({
                    countNum: countTo
            },
            {
                duration: 5000,
                easing:'linear',
                step: function() {
                    $('#sumblog').text(Math.floor(this.countNum));
                },
                complete: function() {
                    $('#sumblog').text(this.countNum);
                }
            });

            countTo = this.sumfeedback;
            $({ countNum: $('#sumfeedback').text()}).animate({
                    countNum: countTo
            },
            {
                duration: 5000,
                easing:'linear',
                step: function() {
                    $('#sumfeedback').text(Math.floor(this.countNum));
                },
                complete: function() {
                    $('#sumfeedback').text(this.countNum);
                }
            });

            countTo = this.sumdocument;
            $({ countNum: $('#sumdocument').text()}).animate({
                    countNum: countTo
            },
            {
                duration: 5000,
                easing:'linear',
                step: function() {
                    $('#sumdocument').text(Math.floor(this.countNum));
                },
                complete: function() {
                    $('#sumdocument').text(this.countNum);
                }
            });

            var ctx1 = document.getElementById("lineChart").getContext('2d');
            var lineChart = new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: this.datediscussions,
                    datasets: [{
                            label: 'Số lượng thảo luận',
                            backgroundColor: '#ffb1c1',
                            data: this.countdiscussions,
                        }]
                },
                options: {
                    tooltips: {
                        mode: 'index',
                        intersect: false
                    },
                    responsive: true,
                    scales: {
                        xAxes: [{
                            stacked: true,
                        }],
                        yAxes: [{
                            stacked: true
                        }]
                    }
                }
            });

            var ctx2 = document.getElementById("lineChart1").getContext('2d');
            var lineChart1 = new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: this.dateblogs,
                    datasets: [{
                            label: 'Số lượng bài viết',
                            backgroundColor: '#3EB9DC',
                            data: this.countblogs,
                        }]
                },
                options: {
                    tooltips: {
                        mode: 'index',
                        intersect: false
                    },
                    responsive: true,
                    scales: {
                        xAxes: [{
                            stacked: true,
                        }],
                        yAxes: [{
                            stacked: true
                        }]
                    }
                }
            });
        },
    }
</script>