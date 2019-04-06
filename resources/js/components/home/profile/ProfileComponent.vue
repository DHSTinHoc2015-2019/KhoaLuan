<template>
    <div>
        <app-profile-breadcrumb-component></app-profile-breadcrumb-component>
        <app-profile-content-component></app-profile-content-component>
    </div>
</template>

<script>
    import ProfileBreadcrumbComponent from './ProfileBreadcrumbComponent.vue';
    import ProfileContentComponent from './ProfileContentComponent.vue';

    export default {
        mounted (){
            // console.log("Giới thiệu")
        },
        components:{
            appProfileBreadcrumbComponent: ProfileBreadcrumbComponent,
            appProfileContentComponent: ProfileContentComponent
        }
    }
</script>