<template>
	<!-- top bar navigation -->
	<div class="headerbar">

		<!-- LOGO -->
        <div class="headerbar-left">
            <router-link to="/admin" class="logo"><img alt="logo" src="images/logo_big.png" /> <span> Admin</span></router-link>
        </div>

        <nav class="navbar-custom">

                    <ul class="list-inline float-right mb-0">

						<li class="list-inline-item dropdown notif">
                            <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="fa fa-fw fa-question-circle"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-arrow-success dropdown-lg">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5><small>Help and Support</small></h5>
                                </div>

                                <!-- item-->
                                <a target="_blank" href="https://www.pikeadmin.com" class="dropdown-item notify-item">                                    
                                    <p class="notify-details ml-0">
                                        <b>Do you want custom development to integrate this theme?</b>
                                        <span>Contact Us</span>
                                    </p>
                                </a>

                                <!-- item-->
                                <a target="_blank" href="https://www.pikeadmin.com/pike-admin-pro" class="dropdown-item notify-item">                                    
                                    <p class="notify-details ml-0">
                                        <b>Do you want PHP version of the theme that save dozens of hours of work?</b>
                                        <span>Try Pike Admin PRO</span>
                                    </p>
                                </a>                               

                                <!-- All-->
                                <a title="Clcik to visit Pike Admin Website" target="_blank" href="https://www.pikeadmin.com" class="dropdown-item notify-item notify-all">
                                    <i class="fa fa-link"></i> Visit Pike Admin Website
                                </a>

                            </div>
                        </li>
						
                        <li class="list-inline-item dropdown notif">
                            <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="fa fa-fw fa-envelope-o"></i><span class="notif-bullet"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-arrow-success dropdown-lg">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5><small><span class="label label-danger pull-xs-right">12</span>Contact Messages</small></h5>
                                </div>

                                <!-- item-->
                                <a href="#" class="dropdown-item notify-item">                                    
                                    <p class="notify-details ml-0">
                                        <b>Jokn Doe</b>
                                        <span>New message received</span>
                                        <small class="text-muted">2 minutes ago</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="#" class="dropdown-item notify-item">                                    
                                    <p class="notify-details ml-0">
                                        <b>Michael Jackson</b>
                                        <span>New message received</span>
                                        <small class="text-muted">15 minutes ago</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="#" class="dropdown-item notify-item">                                    
                                    <p class="notify-details ml-0">
                                        <b>Foxy Johnes</b>
                                        <span>New message received</span>
                                        <small class="text-muted">Yesterday, 13:30</small>
                                    </p>
                                </a>

                                <!-- All-->
                                <a href="#" class="dropdown-item notify-item notify-all">
                                    View All
                                </a>

                            </div>
                        </li>
                        
						<li class="list-inline-item dropdown notif">
                            <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="fa fa-fw fa-bell-o"></i><span class="notif-bullet"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-lg">
								<!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5><small><span class="label label-danger pull-xs-right">5</span>Allerts</small></h5>
                                </div>
								
                                <!-- item-->
                                <a href="#" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-faded">
                                        <img src="assets/images/avatars/avatar2.png" alt="img" class="rounded-circle img-fluid">
                                    </div>
                                    <p class="notify-details">
                                        <b>John Doe</b>
                                        <span>User registration</span>
                                        <small class="text-muted">3 minutes ago</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="#" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-faded">
                                        <img src="assets/images/avatars/avatar3.png" alt="img" class="rounded-circle img-fluid">
                                    </div>
                                    <p class="notify-details">
                                        <b>Michael Cox</b>
                                        <span>Task 2 completed</span>
                                        <small class="text-muted">12 minutes ago</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="#" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-faded">
                                        <img src="assets/images/avatars/avatar4.png" alt="img" class="rounded-circle img-fluid">
                                    </div>
                                    <p class="notify-details">
                                        <b>Michelle Dolores</b>
                                        <span>New job completed</span>
                                        <small class="text-muted">35 minutes ago</small>
                                    </p>
                                </a>

                                <!-- All-->
                                <a href="#" class="dropdown-item notify-item notify-all">
                                    View All Allerts
                                </a>

                            </div>
                        </li>

                        <li class="list-inline-item dropdown notif">
                            <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img v-if="user.user_image != null" v-bind:src="`images/users/${user.user_image}`" alt="Profile image" class="avatar-rounded">
                                <img v-else src="images/users/avatar.jpg" alt="Profile image" class="avatar-rounded">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="text-overflow"><small>Xin chào {{ user.name }}</small> </h5>
                                </div>

                                <!-- item-->
                                <router-link :to="{ name : 'AdminProfile' }" class="dropdown-item notify-item">
                                    <i class="fa fa-user"></i> <span>Trang cá nhân</span>
                                </router-link>

                                <!-- item-->
                                <a href="javascript:void(0)" class="dropdown-item notify-item" v-on:click="logout">
                                    <i class="fa fa-power-off"></i> <span>Đăng xuất</span>
                                </a>

								<!-- item-->
                                <a target="_blank" href="https://www.pikeadmin.com" class="dropdown-item notify-item">
                                    <i class="fa fa-external-link"></i> <span>Pike Admin</span>
                                </a>
                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left">
								<i class="fa fa-fw fa-bars"></i>
                            </button>
                        </li>                        
                    </ul>

        </nav>
	
	</div>
	<!-- End Navigation -->
</template>

<script>
    export default {
        data(){
            return {
                user: null
            }
        },
        created(){
            this.user = JSON.parse(localStorage.getItem('tpack.user'))
        },
        methods:{
            logout(){
                localStorage.removeItem('tpack.jwt')
                localStorage.removeItem('tpack.user')
                this.$router.push('/login')
            }
        },
        mounted: function () {
            var resizefunc = [];
            $( document ).ready(function() {
                    $(function() {
                    $(".nicescroll").niceScroll({cursorcolor:"#858586"});
                });
            });
            !function($) {
                "use strict";
                
                var Sidemenu = function() {
                    this.$body = $("body"),
                    this.$openLeftBtn = $(".open-left"),
                    this.$menuItem = $("#sidebar-menu a")
                };
                Sidemenu.prototype.openLeftBar = function() {
                  $("#main").toggleClass("enlarged");
                  $("#main").addClass("forced");

                  if($("#main").hasClass("enlarged") && $("body").hasClass("adminbody")) {
                    $("body").removeClass("adminbody").addClass("adminbody-void");
                  } else if(!$("#main").hasClass("enlarged") && $("body").hasClass("adminbody-void")) {
                    $("body").removeClass("adminbody-void").addClass("adminbody");
                  }

                  if($("#main").hasClass("enlarged")) {
                    $(".left ul").removeAttr("style");
                  } else {
                    $(".subdrop").siblings("ul:first").show();
                  }

                },
                //menu item click
                Sidemenu.prototype.menuItemClick = function(e) {
                   if(!$("#main").hasClass("enlarged")){
                    if($(this).parent().hasClass("submenu")) {

                    }
                    if(!$(this).hasClass("subdrop")) {
                      // hide any open menus and remove all other classes
                      $("ul",$(this).parents("ul:first")).slideUp(350);
                      $("a",$(this).parents("ul:first")).removeClass("subdrop");
                      $("#sidebar-menu .pull-right i").removeClass("md-remove").addClass("md-add");

                      // open our new menu and add the open class
                      $(this).next("ul").slideDown(350);
                      $(this).addClass("subdrop");
                      $(".pull-right i",$(this).parents(".submenu:last")).removeClass("md-add").addClass("md-remove");
                      $(".pull-right i",$(this).siblings("ul")).removeClass("md-remove").addClass("md-add");
                    }else if($(this).hasClass("subdrop")) {
                      $(this).removeClass("subdrop");
                      $(this).next("ul").slideUp(350);
                      $(".pull-right i",$(this).parent()).removeClass("md-remove").addClass("md-add");
                    }
                  }
                },

                //init sidemenu
                Sidemenu.prototype.init = function() {
                  var $this  = this;

                  var ua = navigator.userAgent,
                    event = (ua.match(/iP/i)) ? "touchstart" : "click";

                  //bind on click
                  this.$openLeftBtn.on(event, function(e) {
                    e.stopPropagation();
                    $this.openLeftBar();
                  });

                  // LEFT SIDE MAIN NAVIGATION
                  $this.$menuItem.on(event, $this.menuItemClick);

                  // NAVIGATION HIGHLIGHT & OPEN PARENT
                  $("#sidebar-menu ul li.submenu a.active").parents("li:last").children("a:first").addClass("active").trigger("click");
                },

                //init Sidemenu
                $.Sidemenu = new Sidemenu, $.Sidemenu.Constructor = Sidemenu

            }(window.jQuery),


            //main app module
             function($) {
                "use strict";

                var App = function() {        
                    this.pageScrollElement = "html, body",
                    this.$body = $("body")
                };

                 //on doc load
                App.prototype.onDocReady = function(e) {
                  FastClick.attach(document.body);
                  resizefunc.push("changeptype");

                  $('.animate-number').each(function(){
                    $(this).animateNumbers($(this).attr("data-value"), true, parseInt($(this).attr("data-duration")));
                  });

                  //RUN RESIZE ITEMS
                  $(window).resize(debounce(resizeitems,100));
                  $("body").trigger("resize");

                  // right side-bar toggle
                  $('.right-bar-toggle').on('click', function(e){

                      $('#main').toggleClass('right-bar-enabled');
                  });


                },
                //initilizing
                App.prototype.init = function() {
                    var $this = this;
                    $(document).ready($this.onDocReady);
                    $.Sidemenu.init();
                },

                $.App = new App, $.App.Constructor = App

            }(window.jQuery),
            //main app module
             function($) {
                "use strict";

                var App = function() {        
                    this.pageScrollElement = "html, body",
                    this.$body = $("body")
                };

                 //on doc load
                App.prototype.onDocReady = function(e) {
                  FastClick.attach(document.body);
                  resizefunc.push("changeptype");

                  $('.animate-number').each(function(){
                    $(this).animateNumbers($(this).attr("data-value"), true, parseInt($(this).attr("data-duration")));
                  });

                  //RUN RESIZE ITEMS
                  $(window).resize(debounce(resizeitems,100));
                  $("body").trigger("resize");

                  // right side-bar toggle
                  $('.right-bar-toggle').on('click', function(e){

                      $('#main').toggleClass('right-bar-enabled');
                  });


                },
                //initilizing
                App.prototype.init = function() {
                    var $this = this;
                    $(document).ready($this.onDocReady);
                    $.Sidemenu.init();
                },

                $.App = new App, $.App.Constructor = App

            }(window.jQuery),

            //initializing main application module
            function($) {
                "use strict";
                $.App.init();
            }(window.jQuery);



        }
    }
</script>