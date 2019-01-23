<template>
    <div>
        <app-news-breadcrumb-component></app-news-breadcrumb-component>
        <app-news-content-component></app-news-content-component>
    </div>
</template>

<script>
    import NewsBreadcrumbComponent from './NewsBreadcrumbComponent.vue';
    import NewsContentComponent from './NewsContentComponent.vue';

    export default {
        mounted (){
            // console.log("Giới thiệu")
        },
        components:{
            appNewsBreadcrumbComponent: NewsBreadcrumbComponent,
            appNewsContentComponent: NewsContentComponent
        }
    }
</script>