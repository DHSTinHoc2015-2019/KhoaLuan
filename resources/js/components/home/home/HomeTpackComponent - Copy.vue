<template>
	<section id="feature">
	    <div class="container">
	        <div class="section-heading">
	            <h1 class="title font-weight-bold wow fadeInDown" data-wow-delay=".3s">Các thành phần của mô hình TPACK</h1>
	            <p class="wow fadeInDown" data-wow-delay=".5s">
	               Trung tâm của khuôn mẫu TPACK là sự tương tác phức tạp giữa ba dạng kiến thức chính: <br> Kiến thức công nghệ(TK), phương pháp sư phạm (PK)và nội dung chuyên môn(CK)
	            </p>
	        </div>
	        <div class="row">
	            <div class="col-md-6 col-lg-6 col-xs-12">
	                <div class="media wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="300ms">
	                    <div class="media-left">
	                        <div class="icon">
	                            CK
	                        </div>
	                    </div>
	                    <div class="media-body">
	                        <h4 class="media-heading">Kiến thức về nội dung chuyên môn</h4>
	                        <p>Kiến thức nội dung chuyên môn (Content Knowledge): là những kiến thức về các vấn đề thực tế được học hoặc giảng dạy.</p>
	                    </div>
	                </div>
	            </div>
	            <div class="col-md-6 col-lg-6 col-xs-12">
	                <div class="media wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="600ms">
	                    <div class="media-left">
	                        <div class="icon">
	                            PCK
	                        </div>
	                    </div>
	                    <div class="media-body">
	                        <h4 class="media-heading">Kiến thức nội dung phương pháp</h4>
	                        <p>Kiến thức phương pháp sư phạm sử dụng trong lĩnh vực dạy-học (Pedagogical Content Knowledge)</p>
	                    </div>
	                </div>
	            </div>
	            <div class="col-md-6 col-lg-6 col-xs-12">
	                <div class="media wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="900ms">
	                    <div class="media-left">
	                        <div class="icon">
	                           PK
	                        </div>
	                    </div>
	                    <div class="media-body">
	                        <h4 class="media-heading">Kiến thức phương pháp sư phạm</h4>
	                        <p>Kiến thức sư phạm (Pedagogical Knowledge): là kiến thức sâu về các quy trình, thói quen hoặc các phương pháp giảng dạy, học tập và cách thức để đạt được mục đích giáo dục, các giá trị và mục tiêu tổng thể.</p>
	                    </div>
	                </div>
	            </div>
	            <div class="col-md-6 col-lg-6 col-xs-12">
	                <div class="media wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="1200ms">
	                    <div class="media-left">
	                        <div class="icon">
	                            TCK
	                        </div>
	                    </div>
	                    <div class="media-body">
	                        <h4 class="media-heading">Kiến thức nội dung công nghệ </h4>
	                        <p>Kiến thức về các công cụ CNTT chuyên dùng trong lĩnh vực dạy-học (Technological Content Knowledge)</p>
	                    </div>
	                </div>
	            </div>
	            <div class="col-md-6 col-lg-6 col-xs-12">
	                <div class="media wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="1500ms">
	                    <div class="media-left">
	                        <div class="icon">
	                            TK
	                        </div>
	                    </div>
	                    <div class="media-body">
	                        <h4 class="media-heading">Kiến thức công nghệ</h4>
	                        <p>Kiến thức công nghệ (Technological Knowledge): là kiến thức về những công nghệ tiêu chuẩn như sách, phấn viết và tấm bảng đen, cũng như nhiều kỹ thuật tiên tiến hơn như Internet và video kĩ thuật số.</p>
	                    </div>
	                </div>
	            </div>
	            <div class="col-md-6 col-lg-6 col-xs-12">
	                <div class="media wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="1800ms">
	                    <div class="media-left">
	                        <div class="icon">
	                            TPK
	                        </div>
	                    </div>
	                    <div class="media-body">
	                        <h4 class="media-heading">Kiến thức phương pháp công nghệ </h4>
	                        <p>Kiến thức về các công cụ CNTT hỗ trợ những ý tưởng, phương pháp dạy-học cụ thể (Technological Pedagogical Knowledge)</p>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>
</template>

<script>
	export default {
		data(){
			return {
				hometpack: []
			}
		},
		created(){
			var vm = this
			this.axios.get('/api/listhometpack').then(function(response){
				vm.hometpack = response.data
			}).catch(function(error){
				console.log(error)
			})
		},
        mounted() {
        	
            // jQuery(document).ready(function(){
            // "use strict";
            // new WOW().init();
            // });
        }
    }
</script>

<style scoped>
    #feature {
		padding: 80px 0;
		/*background-color: #f4f4f4;*/
		background-color: white;
	}

	#feature .media {
		margin: 0px 0 70px 0;
	}

	#feature .media .media-left {
	  padding-right: 25px;
	}

	#feature h3 {
		color: #222222;
		/*font-size: 18px;*/
		text-transform: uppercase;
		text-align: center;
		margin-bottom: 20px;
		margin: 0px 0px 15px;
		font-weight: 400;
		font-family: "Roboto", sans-serif;
	}

	#feature p {
		/*line-height: 25px;*/
		/*font-size: 14px;*/
		color: #777777;
		font-family: "Roboto", sans-serif;
		font-weight: 300;
	}

	#feature .icon {
		text-decoration: none;
		color: #fff;
		background-color: #02bdd5;
		height: 100px;
		text-align: center;
		width: 100px;
		font-size: 50px;
		line-height: 100px;
		overflow: hidden;
		-webkit-border-radius: 50%;
		-moz-border-radius: 50%;
		-ms-border-radius: 50%;
		-o-border-radius: 50%;
		text-shadow: #00a4ba 1px 1px, #00a4ba 2px 2px, #00a4ba 3px 3px, #00a4ba 4px 4px, #00a4ba 5px 5px, #00a4ba 6px 6px, #00a4ba 7px 7px, #00a4ba 8px 8px, #00a4ba 9px 9px, #00a4ba 10px 10px, #00a4ba 11px 11px, #00a4ba 12px 12px, #00a4ba 13px 13px, #00a4ba 14px 14px, #00a4ba 15px 15px, #00a4ba 16px 16px, #00a4ba 17px 17px, #00a4ba 18px 18px, #00a4ba 19px 19px, #00a4ba 20px 20px, #00a4ba 21px 21px, #00a4ba 22px 22px, #00a4ba 23px 23px, #00a4ba 24px 24px, #00a4ba 25px 25px, #00a4ba 26px 26px, #00a4ba 27px 27px, #00a4ba 28px 28px, #00a4ba 29px 29px, #00a4ba 30px 30px, #00a4ba 31px 31px, #00a4ba 32px 32px, #00a4ba 33px 33px, #00a4ba 34px 34px, #00a4ba 35px 35px, #00a4ba 36px 36px, #00a4ba 37px 37px, #00a4ba 38px 38px, #00a4ba 39px 39px, #00a4ba 40px 40px, #00a4ba 41px 41px, #00a4ba 42px 42px, #00a4ba 43px 43px, #00a4ba 44px 44px, #00a4ba 45px 45px, #00a4ba 46px 46px, #00a4ba 47px 47px, #00a4ba 48px 48px, #00a4ba 49px 49px, #00a4ba 50px 50px, #00a4ba 51px 51px, #00a4ba 52px 52px, #00a4ba 53px 53px, #00a4ba 54px 54px, #00a4ba 55px 55px, #00a4ba 56px 56px, #00a4ba 57px 57px, #00a4ba 58px 58px, #00a4ba 59px 59px, #00a4ba 60px 60px, #00a4ba 61px 61px, #00a4ba 62px 62px, #00a4ba 63px 63px, #00a4ba 64px 64px, #00a4ba 65px 65px, #00a4ba 66px 66px, #00a4ba 67px 67px, #00a4ba 68px 68px, #00a4ba 69px 69px, #00a4ba 70px 70px, #00a4ba 71px 71px, #00a4ba 72px 72px, #00a4ba 73px 73px, #00a4ba 74px 74px, #00a4ba 75px 75px, #00a4ba 76px 76px, #00a4ba 77px 77px, #00a4ba 78px 78px, #00a4ba 79px 79px, #00a4ba 80px 80px, #00a4ba 81px 81px, #00a4ba 82px 82px, #00a4ba 83px 83px, #00a4ba 84px 84px, #00a4ba 85px 85px, #00a4ba 86px 86px, #00a4ba 87px 87px, #00a4ba 88px 88px, #00a4ba 89px 89px, #00a4ba 90px 90px, #00a4ba 91px 91px, #00a4ba 92px 92px, #00a4ba 93px 93px, #00a4ba 94px 94px, #00a4ba 95px 95px, #00a4ba 96px 96px, #00a4ba 97px 97px, #00a4ba 98px 98px, #00a4ba 99px 99px, #00a4ba 100px 100px;
	}
	#feature .media {
		margin: 0px 0px 35px;
	}
	#feature .media-heading {
		font-family: 'Roboto Condensed', sans-serif; 
		/*font-size: 18px;*/
		margin-top: 0;
		margin-bottom: 5px;
		line-height: 1.1;
	}
	#feature .section-heading {
		text-align: center;
		margin-bottom: 65px;
	}

	#feature .section-heading p {
		/*font-size: 14px;*/
		font-weight: 300;
		color: #727272;
		line-height: 20px;
	}

	#feature .title {
		/*font-size: 30px;*/
		font-size: 2.5em;
		line-height: 1.1;
		font-weight: 300;
		color: #231557;
		text-transform: uppercase;
		margin-bottom: 20px;
	}
</style>
