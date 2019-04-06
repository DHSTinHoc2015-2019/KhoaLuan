<template>
    <div>
        <app-news-details-breadcrumb-component></app-news-details-breadcrumb-component>
        <app-news-details-content-component></app-news-details-content-component>
    </div>
</template>


<script>
    import NewsDetailsBreadcrumbComponent from './NewsDetailsBreadcrumbComponent.vue';
    import NewsDetailsContentComponent from './NewsDetailsContentComponent.vue';

    export default {
        mounted() {
            // console.log('Component bai viet chi tiet.')
        }
        ,
        components: {
            appNewsDetailsBreadcrumbComponent: NewsDetailsBreadcrumbComponent,
            appNewsDetailsContentComponent: NewsDetailsContentComponent
        }
    }
</script>