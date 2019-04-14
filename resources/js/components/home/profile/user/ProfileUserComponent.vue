<template>
    <div>
        <app-profile-user-breadcrumb-component></app-profile-user-breadcrumb-component>
        <app-profile-user-content-component></app-profile-user-content-component>
    </div>
</template>

<script>
    import ProfileUserBreadcrumbComponent from './ProfileUserBreadcrumbComponent.vue';
    import ProfileUserContentComponent from './ProfileUserContentComponent.vue';

    export default {
        components:{
            appProfileUserBreadcrumbComponent: ProfileUserBreadcrumbComponent,
            appProfileUserContentComponent: ProfileUserContentComponent
        }
    }
</script>