<template>
    <div>
        <app-library-breadcrumb-component></app-library-breadcrumb-component>
        <app-library-content-component></app-library-content-component>
    </div>
</template>

<script>
    import LibraryBreadcrumbComponent from './LibraryBreadcrumbComponent.vue';
    import LibraryContentComponent from './LibraryContentComponent.vue';

    export default {
        mounted (){
            // console.log("Giới thiệu")
        },
        components:{
            appLibraryBreadcrumbComponent: LibraryBreadcrumbComponent,
            appLibraryContentComponent: LibraryContentComponent
        }
    }
</script>