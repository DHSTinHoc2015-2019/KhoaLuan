<template>
	<!-- Left Sidebar -->
	<div class="left main-sidebar">
		<div class="sidebar-inner leftscroll">
			<div id="sidebar-menu">
				<ul>
					<li class="submenu">
						<a href="javascript:void(0)"><i class="fa fa-fw fa-bars"></i><span> Dashboard </span> </a>
                    </li>

                    <li class="submenu">
                        <a href="javascript:void(0)"><i class="fa fa-fw fa-table"></i> <span> Trang chủ </span> <span class="menu-arrow"></span></a>
							<ul class="list-unstyled">
								<li><router-link to="/admin/thanhphantpack">Thành phần TPACK</router-link></li>
								<!-- <li><a href="tables-datatable.html">Data Tables</a></li> -->
							</ul>
                    </li>

					<li class="submenu">
                        <router-link to="/admin/intro"><i class="fa fa-fw fa-tv"></i><span> Giới thiệu </span> </router-link>
                    </li>

                    <li class="submenu">
                        <router-link to="/admin/news"><i class="fa fa-fw fa-tv"></i><span> Tin tức </span> </router-link>
                    </li>
					<li class="submenu">
                        <router-link to="/admin/blog"><i class="fa fa-fw fa-tv"></i><span> Bài viết </span> </router-link>
                    </li>
					<li class="submenu">
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
                    </li>
                    
					
                    
					<li class="submenu">
                        <a href="javascript:void(0)"><i class="fa fa-fw fa-table"></i> <span> Tables </span> <span class="menu-arrow"></span></a>
							<ul class="list-unstyled">
								<li><a href="tables-basic.html">Basic Tables</a></li>
								<li><a href="tables-datatable.html">Data Tables</a></li>
							</ul>
                    </li>

                    <li class="submenu">
                        <a href="javascript:void(0)"><i class="fa fa-fw fa-tv"></i><span> Charts </span> </a>
                    </li>


            	</ul>

            	<div class="clearfix"></div>

			</div>
			<!-- end sidebar-menu -->
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- End Sidebar -->
</template>