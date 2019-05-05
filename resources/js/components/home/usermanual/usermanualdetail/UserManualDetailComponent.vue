<template>
    <div>
        <app-user-manual-detail-breadcrumb-component></app-user-manual-detail-breadcrumb-component>
        <app-user-manual-detail-content-component></app-user-manual-detail-content-component>
    </div>
</template>

<script>
    import UserManualDetailBreadcrumbComponent from './UserManualDetailBreadcrumbComponent.vue';
    import UserManualDetailContentComponent from './UserManualDetailContentComponent.vue';

    export default {
        components:{
            appUserManualDetailBreadcrumbComponent: UserManualDetailBreadcrumbComponent,
            appUserManualDetailContentComponent: UserManualDetailContentComponent
        }
    }
</script>