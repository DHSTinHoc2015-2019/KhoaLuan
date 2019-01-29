
require('./bootstrap');

require('../assets/css/animate-css/animate.css');
require('../assets/css/home/style.css');
require('../assets/css/home/blog.css');
require('../assets/css/home/discussion.css');
require('../assets/css/admin/style.css');
/*===========Admin==============*/
require('../assets/plugins/datatable/dataTables.bootstrap4.css');

// require('../assets/css/login/util.css');
require('../assets/plugins/font-awesome/css/font-awesome.css');
 // window.$ = window.jQuery = require('jquery');
// import '../assets/js/fastclick.js';
// import '../assets/js/detect.js';
import '../assets/plugins/datatable/jquery.dataTables.js';
import Viewer from 'v-viewer'

window.Vue = require('vue');

import VueRoute from 'vue-router';
Vue.use(VueRoute);

import App from './App.vue';

// Vue.use(VueViewer.default);

import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);

Vue.use(Viewer)

/*===========Home==============*/
import HomeComponent from './components/home/HomeComponent.vue';
import HomeContentComponent from './components/home/home/HomeContentComponent.vue';
import IntroComponent from './components/home/intro/IntroComponent.vue';
import BlogComponent from './components/home/blog/BlogComponent.vue';
import BlogDetailsComponent from './components/home/blog/blogDetails/BlogDetailsComponent.vue';
import DiscussionComponent from './components/home/discussion/DiscussionComponent.vue';
import DiscussionContentComponent from './components/home/discussion/discussion/DiscussionContentComponent.vue';
import DiscussionDetailsComponent from './components/home/discussion/DiscussionDetails/DiscussionDetailsComponent.vue';
import NewsComponent from './components/home/news/NewsComponent.vue';
import LibraryComponent from './components/home/library/LibraryComponent.vue';
import ContactComponent from './components/home/contact/ContactComponent.vue';

/*===========Admin==============*/
import AdminComponent from './components/admin/AdminComponent.vue';
import AdminHome from './components/admin/homeAdmin/AdminHome.vue';
import ThanhPhanTpack from './components/admin/trangchu/ThanhPhanTpack.vue';
import ThanhPhanTpackEdit from './components/admin/trangchu/ThanhPhanTpackEdit.vue';
import ThanhPhanTpackCreate from './components/admin/trangchu/ThanhPhanTpackCreate.vue';
import Intro from './components/admin/intro/Intro.vue';
import IntroEdit from './components/admin/intro/IntroEdit.vue';
import News from './components/admin/news/News.vue';
import NewsMore from './components/admin/news/NewsMore.vue';
import NewsEdit from './components/admin/news/NewsEdit.vue';
import NewsCreate from './components/admin/news/NewsCreate.vue';

/*===========Admin demo==============*/
import DemoAdmin from './components/admin/demo/DemoAdmin.vue';
import DemoAdminKhongCo from './components/admin/demo/DemoAdminKhongCo.vue';
import DemoUser from './components/admin/demo/DemoUser.vue';
import DemoTableBasic from './components/admin/demo/DemoTableBasic.vue';
import DemoUserEdit from './components/admin/demo/DemoUserEdit.vue';

/*===========Pages==============*/
import Page404Component from './components/pages/Page404Component.vue';
import LoginComponent from './components/home/login/LoginComponent.vue';
import RegisterComponent from './components/home/login/RegisterComponent.vue';


var routes = [
    /*===========Admin==============*/
    {
        path: '/admin',
        component: AdminComponent,
        meta: { requiresAuth: true, is_admin: true },
        children:[
            {
                name: 'Admin',
                path: '',
                component: AdminHome
            },
            {
                path: 'thanhphantpack',
                component: {
                    render (c) { return c('router-view') }
                },
                children: [
                    {
                        name: 'ThanhPhanTpack',
                        path: '',
                        component: ThanhPhanTpack
                    },
                    {
                        name: 'ThanhPhanTpackEdit',
                        path: 'edit/:id',
                        component: ThanhPhanTpackEdit,
                        props: true
                    },
                    {
                        name: 'ThanhPhanTpackCreate',
                        path: 'create',
                        component: ThanhPhanTpackCreate,
                        props: true
                    }
                ]
            },
            {
                path: 'intro',
                component: {
                    render (c) { return c('router-view') }
                },
                children: [
                    {
                        name: 'AdminIntro',
                        path: '',
                        component: Intro
                    },
                    {
                        name: 'AdminIntroEdit',
                        path: 'edit',
                        component: IntroEdit,
                        props: true
                    }
                ]
            },
            {
                path: 'news',
                component: {
                    render (c) { return c('router-view') }
                },
                children: [
                    {
                        name: 'News',
                        path: '',
                        component: News
                    },
                    {
                        name: 'NewsMore',
                        path: 'newmore/:id',
                        component: NewsMore
                    },
                    {
                        name: 'NewsEdit',
                        path: 'edit/:id',
                        component: NewsEdit
                    },
                    {
                        name: 'NewsCreate',
                        path: 'create',
                        component: NewsCreate
                    }

                ]
            },
            {
                name: 'AdminTrangChu',
                path: 'demotablechild',
                component: DemoAdmin
            },
            {
                name: 'DemoAdminKhongCo',
                path: 'demokhongconoidung',
                component: DemoAdminKhongCo
            },
            {
                path: 'demouser',
                component: {
                    render (c) { return c('router-view') }
                },
                children: [
                    {
                        path: '',
                        name: 'DemoUser',
                        component: DemoUser
                    },
                    {
                        name: 'DemoUserEdit',
                        path: ':id',
                        component: DemoUserEdit
                    }

                ]
            },
            {
                name: 'DemoTableBasic',
                path: 'demotable',
                component: DemoTableBasic
            }
        ]
    },
    {
    /*===========Home==============*/
        name: 'Home',
        path: '/',
        redirect: '/',
        component: HomeComponent,
        children: [
        	{
        		name: 'HomeContentComponent',
	        	path: '',
	        	component: HomeContentComponent,
        	},
            {
                name: 'IntroComponent',
                path: 'gioithieu',
                component: IntroComponent,
                props: true
            },
        	{
        		name: 'NewsComponent',
        		path: 'tintuc',
        		component: NewsComponent
        	},
        	{
        		path: 'blog',
        		meta: { label: 'Blog' },
        		component: {
        			render (c) { return c('router-view') }
        		},
        		children:[
        			{
						path: '',
						component: BlogComponent,
        			},
        			{
        				name: 'Blog',
        				meta: { label: 'BlogDetails' },
						path: ':id',
						component: BlogDetailsComponent,
						props: true
        			}
        		]
        	},
            {
                name: 'Library',
                path: 'thuvien',
                component: LibraryComponent,
                props: true
            },
        	{
        		meta: { label: 'Discussion'},
        		path: 'thaoluan',
        		component: {
	            	render (c) { return c('router-view') }
		        },
        		children: [
        			{
                        name: 'Discussion',
						path: '',
						component: DiscussionComponent,

					},
                    {
                        name: 'DiscussionContent',
                        path: ':id',
                        meta: { label: 'DiscussionContent'},
                        component: DiscussionContentComponent,
                        props: true
                    }
                    ,
					{
						name: 'DiscussionDetail',
						path: ':id/:id1',
						meta: { label: 'DiscussionDetails'},
						component: DiscussionDetailsComponent,
						props: true
					}
        		]
        	},
            {
                name: 'Contact',
                path: 'lienhe',
                component: ContactComponent,
                props: true
            },
            {
                name: 'Login',
                path: 'login',
                component: LoginComponent
            },{
                name: 'Register',
                path: 'register',
                component: RegisterComponent
            },
            /*===========Page404==============*/
            // {
            //     name: 'Page404',
            //     path: '*',
            //     component: Page404Component
            // }
        	

        ]
    },
    
  	
];

var router = new VueRoute({
	mode: 'history', 
	routes: routes,
	scrollBehavior (to, from, savedPosition) {
		return { x: 0, y: 0 }
	}
});

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (localStorage.getItem('tpack.jwt') == null) {
            next({
                path: '/login',
                params: { nextUrl: to.fullPath }
            })
        } else {
            let user = JSON.parse(localStorage.getItem('tpack.user'))
            if (to.matched.some(record => record.meta.is_admin)) {
                if (user.is_admin == 1) {
                    next()
                }
                else {
                    next({ path: '/' })
                }
            }
            else if (to.matched.some(record => record.meta.is_user)) {
                if (user.is_admin == 0) {
                    next()
                }
                else {
                    next({ name: '/admin' })
                }
            }
            next()
        }
    } else {
        next()
    }
})

var app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');

