<template>
    <div>
        <app-discussion-breadcrumb-component></app-discussion-breadcrumb-component>
        <app-discussion-new-component></app-discussion-new-component>
        <app-discussion-content-component></app-discussion-content-component>
    </div>
</template>

<script>
    import DiscussionBreadcrumbComponent from './DiscussionBreadcrumbComponent.vue';
    import DiscussionContentComponent from './DiscussionContentComponent.vue';
    import DiscussionNewComponent from './DiscussionNewComponent.vue';

    export default {
        components:{
            appDiscussionBreadcrumbComponent: DiscussionBreadcrumbComponent,
            appDiscussionContentComponent: DiscussionContentComponent,
            appDiscussionNewComponent: DiscussionNewComponent
        }
    }
</script>