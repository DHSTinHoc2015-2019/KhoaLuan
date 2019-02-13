<template>
    <div>
        <app-discussion-details-breadcrumb-component></app-discussion-details-breadcrumb-component>
        <app-discussion-details-content-component></app-discussion-details-content-component>
    </div>
</template>


<script>
    import DiscussionDetailsBreadcrumbComponent from './DiscussionDetailsBreadcrumbComponent.vue';
    import DiscussionDetailsContentComponent from './DiscussionDetailsContentComponent.vue';

    export default {
        components: {
            appDiscussionDetailsBreadcrumbComponent: DiscussionDetailsBreadcrumbComponent,
            appDiscussionDetailsContentComponent: DiscussionDetailsContentComponent,
        }
    }
</script>