<template>
	<!-- Left Sidebar -->
	<div class="left main-sidebar">
		<div class="sidebar-inner leftscroll">
			<div id="sidebar-menu">
				<ul>
					<li class="submenu">
						<router-link to="/"><i class="fa fa-fw fa-bars"></i><span> TPACK </span> </router-link>
                    </li>

                    <li class="submenu">
                        <a href="javascript:void(0)"><i class="fa fa-fw fa-home"></i> <span> Trang chủ </span> <span class="menu-arrow"></span></a>
							<ul class="list-unstyled">
								<li><router-link to="/admin/siteinfo">Thông tin chung</router-link></li>
								<li><router-link to="/admin/thanhphantpack">Thành phần TPACK</router-link></li>
							</ul>
                    </li>

					<li class="submenu">
                        <router-link to="/admin/intro"><i class="fa fa-fw fa-tv"></i><span> Giới thiệu </span> </router-link>
                    </li>

                    <li class="submenu">
                        <router-link to="/admin/news"><i class="fa fa-fw fa-newspaper-o"></i><span> Tin tức </span> </router-link>
                    </li>
					<li class="submenu">
                        <router-link to="/admin/blog"><i class="fa fa-fw fa-address-card"></i><span> Bài viết </span> </router-link>
                    </li>

                    <li class="submenu">
                        <a href="javascript:void(0)"><i class="fa fa-fw fa-book"></i> <span> Thư viện </span> <span class="menu-arrow"></span></a>
						<ul class="list-unstyled">
							<li><router-link to="/admin/library/image">Hình ảnh</router-link></li>
							<li><router-link to="/admin/library/video">Video</router-link></li>
							<li><router-link to="/admin/library/document">Tài liệu</router-link></li>
						</ul>
                    </li>

                    <li class="submenu">
                        <a href="javascript:void(0)"><i class="fa fa-fw fa-commenting-o"></i> <span> Thảo luận </span> <span class="menu-arrow"></span></a>
						<ul class="list-unstyled">
							<li><router-link to="/admin/discussiontype">Đề tài thảo luận</router-link></li>
							<li><router-link to="/admin/discussion">Thảo luận</router-link></li>
						</ul>
                    </li>

                    <li class="submenu">
                        <router-link :to="{path: '/admin/account'}"><i class="fa fa-user"></i><span> Người dùng </span> </router-link>
                    </li>
					
					<li class="submenu">
                        <router-link :to="{path: '/admin/contact'}"><i class="fa fa-fw fa-telegram"></i><span> Liên hệ </span> </router-link>
                    </li>
                    <li class="submenu">
                        <router-link :to="{path: '/admin/rule'}"><i class="fa fa-info-circle"></i><span> Nội quy </span> </router-link>
                    </li>
                    <li class="submenu">
                        <router-link :to="{path: '/admin/usermanual'}"><i class="fa fa-question-circle"></i><span> Hướng dẫn sử dụng </span> </router-link>
                    </li>
                    

					<!-- <li class="submenu">
                        <a href="javascript:void(0)"><i class="fa fa-fw fa-table"></i> <span> Demo </span> <span class="menu-arrow"></span></a>
						<ul class="list-unstyled">
							<li>
								<router-link to="/admin/demokhongconoidung">Không có nội dung</router-link>
							</li>
							<li>
								<router-link to="/admin/demotablechild">Table child</router-link>
							</li>
							<li>
								<router-link to="/admin/demouser">Demo User</router-link>
							</li>
							<li>
								<router-link to="/admin/demotable">Demo Table</router-link>
							</li>
						</ul>
                    </li> -->

					<!-- <li class="submenu">
                        <a href="javascript:void(0)"><i class="fa fa-fw fa-table"></i> <span> Tables </span> <span class="menu-arrow"></span></a>
							<ul class="list-unstyled">
								<li><a href="tables-basic.html">Basic Tables</a></li>
								<li><a href="tables-datatable.html">Data Tables</a></li>
							</ul>
                    </li> -->

                   <!--  <li class="submenu">
                        <a href="javascript:void(0)"><i class="fa fa-fw fa-tv"></i><span> Charts </span> </a>
                    </li> -->


            	</ul>

            	<div class="clearfix"></div>

			</div>
			<!-- end sidebar-menu -->
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- End Sidebar -->
</template>