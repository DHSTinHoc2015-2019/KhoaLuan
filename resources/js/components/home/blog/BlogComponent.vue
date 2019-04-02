<template>
    <div>
        <app-blog-breadcrumb-component></app-blog-breadcrumb-component>
        <app-blog-highlight-component></app-blog-highlight-component>
        <app-blog-new-component></app-blog-new-component>
        <app-blog-all-component></app-blog-all-component>

    </div>
</template>


<script>
    import BlogBreadcrumbComponent from './BlogBreadcrumbComponent.vue';
    import BlogNewComponent from './BlogNewComponent.vue';
    import BlogHighlightComponent from './BlogHighlightComponent.vue';
    import BlogAllComponent from './BlogAllComponent.vue';

    export default {
        mounted() {
            // console.log('Component bai viet.')
        }
        ,
        components: {
            appBlogBreadcrumbComponent: BlogBreadcrumbComponent,
            appBlogNewComponent: BlogNewComponent,
            appBlogHighlightComponent: BlogHighlightComponent,
            appBlogAllComponent: BlogAllComponent
        }
    }
</script>