<template>
    <div>
        <div id="preloader" v-if="loading">
            <img src="images/loading1.gif" alt="Preloader">
        </div>
        <!--  Fixed Navigation
        ==================================== -->
        <header id="navigation">
            <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #0eb493">
                <div class="container">
                    <router-link to="/" class="navbar-brand font-weight-bold">Trang chủ</router-link>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar6">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="navbar-collapse collapse justify-content-stretch" id="navbar6">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <router-link to="/gioithieu" class="nav-link">Giới thiệu<span class="sr-only">Home</span></router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/tintuc" class="nav-link active">Tin tức</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/blog" class="nav-link active">Bài viết</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link class="nav-link active" to="/thuvien">Thư viện</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/thaoluan" class="nav-link active">Thảo luận</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link class="nav-link active" to="/lienhe">Liên hệ</router-link>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <router-link to="register" class="nav-link active" v-if="!isLoggedIn">Đăng ký</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="login" class="nav-link active" v-if="!isLoggedIn">Đăng nhập</router-link>
                            </li>
                            <!-- <span v-if="isLoggedIn"> -->
                            <li class="nav-item">
                                <router-link to="trangcanhan" class="nav-link active" v-if="isLoggedIn">Xin chào {{ name }}</router-link>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0)" class="nav-link active" v-on:click="logout" v-if="isLoggedIn">Đăng xuất</a>
                            </li>
                            <!-- </span> -->
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <router-view @loggedIn="change" v-bind:users="users"></router-view>
        <app-footer-component></app-footer-component>
    </div>  
</template>



<script>
    // import NavbarComponent from './NavbarComponent.vue';
    import FooterComponent from './FooterComponent.vue';

    export default {
        data() {
            return {
                users: [],
                count: 0,
                loading: true,
                name: null,
                user_type: 0,
                isLoggedIn: localStorage.getItem('tpack.jwt') != null
            }
        },
        mounted: function () {
            // axios.get('api/demo1').then((response) => {
            //     console.log(response.data);
            //     this.userdemo = response.data;
            // });
            // axios.get('api/demo').then((response) => {
            //     console.log(response.data);
            // })
            setTimeout(() => {
                this.loading = false
            }, 1000);
            // console.log("navbar: trang thai dang nhap: " + this.isLoggedIn)
            this.setDefaults();
        },
        init() {

        },
        finalize() {
            // JavaScript to be fired on all pages, after page specific JS is fired
        },
        methods : {
            setDefaults() {
                if (this.isLoggedIn) {
                    let user = JSON.parse(localStorage.getItem('tpack.user'))
                    this.users = JSON.parse(localStorage.getItem('tpack.user'))
                    this.name = user.name
                    this.user_type = user.is_admin
                } else this.users = []
            },
            change() {
                this.isLoggedIn = localStorage.getItem('tpack.jwt') != null
                this.setDefaults()
            },
            logout(){
                console.log("navbar: trang thai dang nhap khi dang xuat: " + localStorage.getItem('tpack.jwt') != null)
                localStorage.removeItem('tpack.jwt')
                localStorage.removeItem('tpack.user')
                this.change()   
                this.$router.push('/login')
            }
        },
        components: {
            appFooterComponent: FooterComponent
        }
    }
</script>