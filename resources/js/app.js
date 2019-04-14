
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

// Vue.use(NProgress)
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
import UserBlogEdit from './components/home/blog/update/UserBlogEdit.vue';
import UserBlogCreate from './components/home/blog/update/UserBlogCreate.vue';
import BlogDetailsComponent from './components/home/blog/blogDetails/BlogDetailsComponent.vue';
import DiscussionComponent from './components/home/discussion/DiscussionComponent.vue';
import DiscussionTypeComponent from './components/home/discussion/discussion/DiscussionTypeComponent.vue';
import DiscussionDetailsComponent from './components/home/discussion/DiscussionDetails/DiscussionDetailsComponent.vue';
import NewsComponent from './components/home/news/NewsComponent.vue';
import NewsDetailsComponent from './components/home/news/newsdetail/NewsDetailsComponent.vue';
import LibraryComponent from './components/home/library/LibraryComponent.vue';
import ContactComponent from './components/home/contact/ContactComponent.vue';
import ProfileComponent from './components/home/profile/ProfileComponent.vue';
import ActiveEmailComponent from './components/home/activemail/ActiveEmailComponent.vue';

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

import AdminBlog from './components/admin/blog/AdminBlog.vue';
import AdminBlogCreate from './components/admin/blog/AdminBlogCreate.vue';
import AdminBlogEdit from './components/admin/blog/AdminBlogEdit.vue';
import AdminBlogMore from './components/admin/blog/AdminBlogMore.vue';

import AdminDiscussionType from './components/admin/discussiontype/AdminDiscussionType.vue';
import AdminDiscussionTypeCreate from './components/admin/discussiontype/AdminDiscussionTypeCreate.vue';
import AdminDiscussionTypeEdit from './components/admin/discussiontype/AdminDiscussionTypeEdit.vue';

import AdminDiscussion from './components/admin/discussion/AdminDiscussion.vue';
import AdminDiscussionCreate from './components/admin/discussion/AdminDiscussionCreate.vue';
import AdminDiscussionEdit from './components/admin/discussion/AdminDiscussionEdit.vue';
import AdminDiscussionWithType from './components/admin/discussion/AdminDiscussionWithType.vue';
import AdminDiscussionMore from './components/admin/discussion/AdminDiscussionMore.vue';

import AdminProfile from './components/admin/profile/AdminProfile.vue';

import AdminContact from './components/admin/contact/AdminContact.vue';


import DemoEmailComponent from './components/home/demoemail/DemoEmailComponent.vue';

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
import LoginFacebookComponent from './components/home/login/LoginFacebookComponent.vue';

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
                path: 'blog',
                component: {
                    render(c) { return c('router-view') }
                },
                children:[
                    {
                        name: 'AdminBlog',
                        path: '',
                        component: AdminBlog
                    },
                    {
                        name: 'AdminBlogCreate',
                        path: 'create',
                        component: AdminBlogCreate
                    },
                    {
                        name: 'AdminBlogEdit',
                        path: 'edit/:id',
                        component: AdminBlogEdit
                    },
                    {
                        name: 'AdminBlogMore',
                        path: 'blogmore/:id',
                        component: AdminBlogMore
                    }
                ]
            },
            {
                path: 'discussiontype',
                component: {
                    render (c) { return c('router-view') }
                },
                children:[
                    {
                        name: 'AdminDiscussionType',
                        path: '',
                        component: AdminDiscussionType
                    },
                    {
                        name: 'AdminDiscussionTypeCreate',
                        path: 'create',
                        component: AdminDiscussionTypeCreate
                    },
                    {
                        name: 'AdminDiscussionTypeEdit',
                        path: 'edit/:id',
                        component: AdminDiscussionTypeEdit
                    }
                ]
            },
            {
                path: 'discussion',
                component:{
                    render (c) { return c('router-view') }
                },
                children:[
                    {
                        name: 'AdminDiscussion',
                        path: '',
                        component: AdminDiscussion
                    },
                    {
                        name: 'AdminDiscussionCreate',
                        path: 'create',
                        component: AdminDiscussionCreate
                    },
                    {
                        name: 'AdminDiscussionEdit',
                        path: 'edit/:id',
                        component: AdminDiscussionEdit
                    },
                    {
                        name: 'AdminDiscussionWithType',
                        path: 'type/:id',
                        component: AdminDiscussionWithType
                    },
                    {
                        name: 'AdminDiscussionMore',
                        path: 'discussionmore/:id',
                        component: AdminDiscussionMore
                    }
                ]
            },
            {
                name: 'AdminProfile',
                path: 'profile',
                component: AdminProfile
            },
            {
                name: 'AdminContact',
                path: 'contact',
                component: AdminContact
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
        		path: 'tintuc',
                component: {
                    render (c) { return c('router-view') }
                },
                children:[
                    {
                        path: '',
                        component: NewsComponent,
                        name: 'NewsComponent',
                    },
                    {
                        name: 'NewsDetails',
                        path: ':id',
                        component: NewsDetailsComponent,
                    }
                ]
        	},
        	{
        		path: 'blog',
        		// meta: { label: 'Blog' },
        		component: {
        			render (c) { return c('router-view') }
        		},
        		children:[
        			{
						path: '',
						component: BlogComponent,
                        name: 'Blog'
        			},
                    {
                        name: 'UserBlogEdit',
                        path: 'edit/:id',
                        component: UserBlogEdit,
                    },
                    {
                        name: 'UserBlogCreate',
                        path: 'create',
                        component: UserBlogCreate,
                    },
        			{
        				name: 'BlogDetails',
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
                        name: 'DiscussionTypeComponent',
                        path: ':id_type', //path cho discussiontype
                        component: DiscussionTypeComponent,
                    },
					{
						name: 'DiscussionDetailsComponent',
						path: ':id_type/:id_discussion',
						// meta: { label: 'DiscussionDetails'},
						component: DiscussionDetailsComponent,
					}
        		]
        	},
            {
                path: 'trangcanhan',
                component: {
                    render (c) { return c('router-view') }
                },
                children:[
                    {
                        path: '',
                        component: ProfileComponent,
                        name: 'Profile'
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
            {
                name: 'LoginFacebook',
                path: 'callback/facebook',
                component: LoginFacebookComponent
            },
            {
                name: 'ActiveEmail',
                path: 'active/:id/:activation_code',
                component: ActiveEmailComponent
            },
            {
                name: 'DemoEmail',
                path: 'demoemail',
                component: DemoEmailComponent
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

// router.beforeResolve((to, from, next) => {
//   if (to.path) {
//         NProgress.start()
//         console.log('bat dau')
//   }
//   next()
// });

// router.afterEach(() => {
//     NProgress.done()
//     console.log('xong')
// });

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

