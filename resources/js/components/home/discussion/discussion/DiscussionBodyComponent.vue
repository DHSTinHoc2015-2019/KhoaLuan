<template>
	<div style="padding-bottom: 40px;" class="wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="300ms">		
		<section>
			<div class="container">
				<div class="row">
					<div class="col-md-12 pt-4">
						<div class="row">
							<div class="col-md-4 col-lg-4 col-xs-12"> </div>
	                    <div class="col-md-4 col-lg-4 col-xs-12 p-4 wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="500ms">
			                <div class="abcd">
			                	<div class="media">
				                    <div class="media-body">
				                    	<div class="icon mb-3">
				                            CK
				                        </div>
				                        <h4 class="media-heading">Kiến thức về nội dung chuyên môn</h4>
				                    </div>
				                </div>
			                </div>
			            </div>
			            <div class="col-md-4 col-lg-4 col-xs-12"> </div>
						</div>
	                </div>
					<div class="col-md-12 pt-4">
						<div id="accordions">
    <div class="card">
        <div class="card-header" id="heading-2">
            <h5 class="mb-0">
                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                Item 2
                </a>
            </h5>
        </div>
        <div id="collapse-2" class="collapse" data-parent="#accordions" aria-labelledby="heading-2">
            <div class="card-body">
                Text 2
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="heading-3">
            <h5 class="mb-0">
                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                Item 3
                </a>
            </h5>
        </div>
        <div id="collapse-3" class="collapse" data-parent="#accordions" aria-labelledby="heading-3">
            <div class="card-body">
                Text 3
            </div>
        </div>
    </div>
</div>
					</div>
				</div>
				
			</div><!-- container -->
		</section>
	</div>
</template>

<script>
	export default {
		mounted (){
			
		}
	}
</script>

<style scoped>
	.blog-title {
        color: #231557; text-transform: uppercase;
    }
    .abcd {
		display: inline;
		float: left;
		margin-bottom: 15px;
		padding: 25px 20px;
		position: relative;
		text-align: left;
		width: 100%;
		-w-webkit-transition: all 0.5s;
		-moz-transition: all 0.5s;
		-ms-transition: all 0.5s;
		-o-transition: all 0.5s;
		transition: all 0.5s;
	    border-bottom: 30px solid #00d999;
	    background-image: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
		color: #fff;
	}

	.abcd .media {
		margin: 0px 0 70px 0;
	}

	.abcd h3 {
		color: #222222;
		text-transform: uppercase;
		text-align: center;
		margin: 0;
		font-weight: 400;
		font-family: "Roboto", sans-serif;
	}

	.abcd p {
		color: #777777;
		font-family: "Roboto", sans-serif;
		font-weight: 300;
	}

	.abcd .icon {
	    margin-right: auto;
	    margin-left: auto;
	    display: block;
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
	.abcd .media {
		margin: 0;
	}
	.abcd .media-heading {
		font-family: 'Roboto Condensed', sans-serif; 
		margin-top: 0;
		margin-bottom: 5px;
		line-height: 1.1;
		text-align: center;
	    min-height: 2.1em;
	}
	.abcd .section-heading {
		text-align: center;
		margin-bottom: 65px;
	}

	.abcd .section-heading p {
		font-weight: 300;
		color: #727272;
		line-height: 20px;
	}

	.abcd .title {
		font-size: 2.5em;
		line-height: 1.1;
		font-weight: 300;
		color: #231557;
		text-transform: uppercase;
		margin-bottom: 20px;
	}
	.mb-0 > a {
		display: block;
		position: relative;
	}
	.mb-0 > a:after {
		content: "\f078"; /* fa-chevron-down */
		font-family: 'FontAwesome';
		position: absolute;
		right: 0;
	}
	.mb-0 > a[aria-expanded="true"]:after {
  		content: "\f077"; /* fa-chevron-up */
	}
</style>