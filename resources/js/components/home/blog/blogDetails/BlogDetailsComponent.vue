<template>
    <div>
        <app-blog-details-breadcrumb-component></app-blog-details-breadcrumb-component>
        <app-blog-details-content-component></app-blog-details-content-component>
    </div>
</template>


<script>
    import BlogDetailsBreadcrumbComponent from './BlogDetailsBreadcrumbComponent.vue';
    import BlogDetailsContentComponent from './BlogDetailsContentComponent.vue';

    export default {
        mounted() {
            // console.log('Component bai viet chi tiet.')
        }
        ,
        components: {
            appBlogDetailsBreadcrumbComponent: BlogDetailsBreadcrumbComponent,
            appBlogDetailsContentComponent: BlogDetailsContentComponent
        }
    }
</script>