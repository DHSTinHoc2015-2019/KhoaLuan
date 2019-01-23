<template>
	<footer>
        <section class="nb-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 wow fadeInLeft animated mt-5" data-wow-duration="500ms" data-wow-delay="400ms">
                        <div class="card pt-4 pb-4 pr-5 pl-5 mb-4">
                            <div class="card-block" style="min-height: 300px;">
                                <!--Title-->
                                <h3 class="text-center font-up font-bold pink-text pb-2"><strong>Facebook</strong></h3>

                                <!-- <div class="embed-responsive embed-responsive-16by9"> -->
                                   <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ffacebook&tabs=timeline&width=450&height=600&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="450" height="300" style="border:3px solid #e91e63;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                                <!-- </div> -->
                            </div>
                        </div>
                        
                    </div>

                    <div class="col-md-6 col-sm-6 wow fadeInLeft animated mt-5" data-wow-duration="500ms" data-wow-delay="400ms">
                        <div class="card pt-4 pb-4 pr-5 pl-5 mb-4">
                            <div class="card-block" style="min-height: 300px;">
                                <!--Title-->
                                <h3 class="text-center font-up font-bold pink-text pb-2"><strong style="color: #02bdd5">YouTube</strong></h3>

                                <!-- <div class="embed-responsive embed-responsive-16by9"> -->
                                   <iframe style="border: 3px solid #02bdd5;" width="450" height="300" src="https://www.youtube.com/embed/yMQiHJsePOM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="400ms">
                        <div class="footer-single">
                            <div class="dummy-logo">
                                <div class="icon float-left brand">
                                    <i class="fa fa-globe"></i>
                                </div>
                                <h2>TPACK</h2>
                                <p>Another responsive footer</p>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus felis diam, vulputate in risus eu, porttitor condimentum purus. Phasellus ullamcorper, odio id feugiat bibendum.</p>
                            <a href="" class="btn btn-footer">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="800ms">
                        <div class="footer-single useful-links">
                            <div class="footer-title">
                                <h2>Menu</h2>
                            </div>
                            <ul class="list-unstyled">
	                            <li><a href="#">Trang chủ <i class="fa fa-angle-right float-right"></i></a></li>
	                            <li><a href="#">Giới thiệu <i class="fa fa-angle-right float-right"></i></a></li>
	                            <li><a href="#">Bản tin <i class="fa fa-angle-right float-right"></i></a></li>
	                            <li><a href="#">Tài liệu <i class="fa fa-angle-right float-right"></i></a></li>
	                            <li><a href="#">Thảo luận <i class="fa fa-angle-right float-right"></i></a></li>
	                            <li><a href="#">Liên hệ <i class="fa fa-angle-right float-right"></i></a></li>
                          	</ul>
                        </div>
                    </div>
                   
                    <div class="col-md-4 col-sm-6 wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="1200ms">
                        <div class="footer-single">
                            <div class="footer-title">
                                <h2>Liên hệ</h2>
                            </div>
                            <address>
                                <i class="fa fa-map-marker"></i><span> Địa chỉ:</span> abc TP Huế<br>
                                <i class="fa fa-phone"></i><span> Điện thoại:</span> 0876543210 <br>
                                <i class="fa fa-fax"></i><span> Fax:</span> 012 123 2345<br>
                                <i class="fa fa-envelope"></i><span> Email:</span> email@gmail.com<br>
                            </address>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        <section id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="300ms">
                        <p class="copyright">Copyright: <span>2019</span> Design and Developed by <a href="" target="_blank">TPACK</a>.</p>
                    </div>
                    <div class="col-md-4 wow fadeInRight animated" data-wow-duration="500ms" data-wow-delay="300ms">
                        <ul class="faico float-right">
	                        <li><a class="faicon-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
	                        <li><a class="faicon-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
	                        <li><a class="faicon-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
	                        <li><a class="faicon-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
	                    </ul>
                    </div>
                </div>
            </div>
        </section> 
    </footer>
</template>

<style>


#footer {
    background: #fff;
    padding: 5px 0 25px 0;
    color: #555;
}

.cd-headline.slide .cd-words-wrapper {
    color: #02bdd5;
}

.nb-footer {
    background: #02bdd5;
    padding-bottom: 30px;
}

.nb-footer .footer-single {
    margin-top: 30px;
}

.nb-footer .footer-title {
    display: block;
    margin: 10px 0 25px 0;
    border-bottom: 1px dotted white;
}

.nb-footer .footer-single a {
    text-decoration: none;
}

.nb-footer .footer-single h2 {
    color: white;
    /*font-size: 18px;*/
    display: inline-block;
    font-weight: bold;
    border-bottom: 3px solid #2A00FF;
    padding-bottom: 5px;
    margin-bottom: -2px;
    font-family: 'Roboto Condensed', sans-serif;
}

.nb-footer .footer-single li {
    border-top: solid 1px white;
}

.nb-footer .footer-single li:first-child {
    border-top: none;
}

.nb-footer .footer-single li a {
    color: white;
    padding: 6px 0px;
    display: block;
    transition: all 0.4s ease-in-out;
}

.nb-footer .footer-single li a:hover {
    color: blue;
}

.nb-footer .footer-single li a:hover i {
    color: blue;
}

.nb-footer .dummy-logo {
    margin-top: 11px;
    padding-bottom: 9px;
}

.nb-footer .dummy-logo .icon {
    margin-right: 10px;
    border-radius: 20px;
    margin-top: 5px;
}

.nb-footer .brand {
    background-image: linear-gradient(to right, #6a11cb 0%, #2575fc 100%);
}

.nb-footer .dummy-logo i {
    font-size: 50px;
    color: #fff;
    padding: 5px;
}

.nb-footer .dummy-logo p {
    color: #999;
    font-size: 12px;
}

.nb-footer .dummy-logo h2 {
    border-bottom: none;
    color: black;
    padding: 5px 0;
}

.nb-footer .btn-footer {
    border: 1px solid blue;
    margin-top: 10px;
    color: blue;
}

.nb-footer .btn-footer:hover {
    background-image: linear-gradient(to right, #6a11cb 0%, #2575fc 100%);
    color: #fff;
    transition: all 0.4s ease-in-out;
}

.nb-footer .useful-links li a {
    text-transform: uppercase;
}

.nb-footer .footer-project a {
    font-size: 13px;
}

.nb-footer .footer-project img {
    margin-bottom: 20px;
    border: 1px solid #666;
    border-radius: 6px;
    padding: 1px;
    opacity: 0.7;
    transition: all 0.4s ease-in-out;
}

.nb-footer .footer-project img:hover {
    opacity: 1.0;
    cursor: pointer;
}

.nb-footer .footer-project .footer-title {
    margin-top: 0;
}

.nb-footer .footer-single p,
.footer-single address {
    color: white;
    /*font-size: 14px;*/
    margin-top: 5px;
    /*line-height: 22px;*/
}

.footer-single address br {
    margin: 8px;
}

.footer-single address i {
    padding-right: 5px;
}

.footer-single address span {
    font-weight: bold;
}


/* ---------------------------
/*Font Awesome Social Icons
--------------------------- */

.faico {
    margin: 0;
    padding: 0;
    list-style: none;
}

.faico li {
    display: inline-block;
    margin: 8px 5px 0 0;
    padding: 0;
    line-height: normal;
}

.faico li:last-child {
    margin-right: 0;
}

.faico a {
    display: inline-block;
    width: 36px;
    height: 36px;
    line-height: 36px;
    font-size: 18px;
    text-align: center;
    color: #02bdd5;
    border-radius: 50%;
}

.faicon-dribble:hover {
    background-color: #EA4C89;
    color: white;
}

.faicon-facebook:hover {
    background-color: #3B5998;
    color: white;
}

.faicon-google-plus:hover {
    background-color: #DB4A39;
    color: white;
}

.faicon-linkedin:hover {
    background-color: #0E76A8;
    color: white;
}

.faicon-twitter:hover {
    background-color: #00ACEE;
    color: white;
}

.faicon-vk:hover {
    background-color: #4E658E;
    color: white;
}

#footer .copyright {
    margin-bottom: 0;
    padding-top: 15px;
}

#footer .copyright a {
    color: #02bdd5;
}

#copyright a:hover {
    color: #e4e4e4 !important;
    text-decoration: none;
}

#copyright a {
    text-decoration: none;
}


</style>

<script>
	export default {
		mounted() {

		}
	}
</script>