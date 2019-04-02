<template>
    <div id="new-blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12 pl-3 wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="900ms">
                    <h2><b class="blog-title">Bài viết mới nhất</b></h2>
                </div>
                <div class="col-md-4 col-xs-12 p-3 home-blog" v-for="(value, index) in blognew">
                    <div class="card wow fadeInDown animated" data-wow-duration="500ms" :data-wow-delay="(datawowdelay * index) + 'ms'">
                        <a href="javascript:void(0)" class="imgover" v-if="!checkImageSVG(index)">
                            <img class="card-img-top" :src="`images/blog/${value.blog_image}`" alt="" style="height: 210px">
                        </a>
                        <a href="javascript:void(0)" class="imgover" v-if="checkImageSVG(index)" v-html="value.blog_image"></a>
                        <div class="card-body">
                            <router-link :to="{ name: 'BlogDetails', params: {id: value.id }}" :title="value.title">
                                <h4 class="font-weight-bold">{{value.title}}</h4>
                            </router-link>
                            <p class="home-blog-author">Đăng bởi <a class="blog-admin" href="javascript:void(0)">{{ value.name }}</a> ngày <span>{{ convertDate(value.created_at) }}</span></p>
                            <p class="card-text">{{ value.description }}</p>
                            <div class="blog-footer">
                                <a href="javascript:void(0)"><span class="fa fa-comment"></span>{{ value.countComment }} Bình luận</a>
                                <a href="javascript:void(0)" class="float-right"><span class="fa fa-thumbs-o-up"></span>{{ value.countLikeBlog }} Thích</a>
                            </div>
                        </div>
                    </div>
                </div>               
            </div>
        </div>
    </div>
</template>

<style scoped>
    #new-blog {
        padding: 40px 0;
        background-image: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        /*background: linear-gradient(to bottom, rgba(255,255,255,0.15) 0%, rgba(0,0,0,0.15) 100%), radial-gradient(at top center, rgba(255,255,255,0.40) 0%, rgba(0,0,0,0.40) 120%) #989898; 
        background-blend-mode: multiply,multiply;*/
    }
    #new-blog .imgover {
        display:inline-block; 
        position:relative; 
        max-width:100%;
        overflow: hidden;
        /*////////*/
        background: #2f3238;
        border-top-left-radius: 0.25rem;
        border-top-right-radius: 0.25rem;
    }
    #new-blog .imgover::before, .imgover::after {
        display:block; 
        position:absolute; 
        content:""; 
        text-align:center; 
        opacity:0; 
        transition: all .5s ease-in-out;
    }
    #new-blog .imgover::before {
        top:0; 
        right:0; 
        bottom:0; 
        left:0;
    }
    #new-blog .imgover::after {
        top:50%; 
        left:50%; 
        width:50px; 
        height:50px; 
        line-height:50px; 
        margin:-25px 0 0 -25px; 
        font:normal normal normal 14px/1 FontAwesome; 
        font-weight:900; 
        content:"\f06e";
        font-size:28px;
    }
    #new-blog .imgover:hover::before, .imgover:hover::after {
        opacity:1;
    }
    #new-blog .imgover:hover::before {
        background:rgba(0,0,0,.55);
    }
    #new-blog .imgover, #new-blog .imgover:hover::after {
        color:#02bdd5;
    }
    #new-blog a {
        text-decoration: none;
    }

    .blog-title {
        color: #231557; text-transform: uppercase;
    }

    #new-blog .imgover img {
        -webkit-transition: opacity 1s,
         -webkit-transform 1s;
        transition: opacity 1s, transform 1s;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
    }
    #new-blog .imgover:hover img {
        -webkit-transform: scale3d(1.1,1.1,1);
        transform: scale3d(1.1,1.1,1);
        opacity: 0.4;
        transition: all .5s ease-in-out;
    }
    
    #new-blog .home-blog-author{
        font-size: 0.8em;
        font-style: italic;
    }

    #new-blog .blog-footer {
        display: inline; float: left;
        padding: 12px 0 0 0; 
        width: 100%;
        border-top: 1px solid #ccc;
    }
    #new-blog .blog-footer a {
        font-size: 0.8em;
        /*color: #818181;*/
        /*margin-right: 35px*/
    }
    #new-blog .blog-footer a span {
        border: 1px solid;
        border-radius: 50%; 
        display: inline-block; 
        margin-right: 3px; 
        padding: 4px 5px;
    }

    #new-blog .new-blog-title{
        color: black;
    }
</style>

<script>
    export default {
        data(){
            return {
                blognew: {},
                datawowdelay: 150
            }
        },
        created(){
            this.axios.get('/api/blog/new').then((response) =>{
                this.blognew = response.data
                // console.log(response.data)
            }).catch(error => {
                console.error(error);
            }) 
        },
        mounted() {
            // jQuery(document).ready(function(){
            // "use strict";
            // new WOW().init();
            // });
        },
        methods:{
            checkImageSVG(index){
                if(this.blognew.length > 0){
                    if('blog_image' in this.blognew[index]){
                        return this.blognew[index].blog_image.toString().indexOf('<svg') != -1
                    }
                }
                return false;
            },
            pad(s){
                return (s < 10) ? '0' + s : s;
            },
            convertDate(inputFormat) {
              var d = new Date(inputFormat);
              return [this.pad(d.getDate()), this.pad(d.getMonth()+1), d.getFullYear()].join('/');
            },
        }
    }
</script>
