<template>
    <div>
        <app-user-manual-breadcrumb-component></app-user-manual-breadcrumb-component>
        <app-user-manual-content-component></app-user-manual-content-component>
    </div>
</template>

<script>
    import UserManualBreadcrumbComponent from './UserManualBreadcrumbComponent.vue';
    import UserManualContentComponent from './UserManualContentComponent.vue';

    export default {
        components:{
            appUserManualBreadcrumbComponent: UserManualBreadcrumbComponent,
            appUserManualContentComponent: UserManualContentComponent
        }
    }
</script>