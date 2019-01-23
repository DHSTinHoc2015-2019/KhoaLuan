<template>
    <div>
        <app-intro-breadcrumb-component></app-intro-breadcrumb-component>
        <app-intro-content-component></app-intro-content-component>
    </div>
</template>

<script>
    import IntroBreadcrumbComponent from './IntroBreadcrumbComponent.vue';
    import IntroContentComponent from './IntroContentComponent.vue';

    export default {
        mounted (){
            // console.log("Giới thiệu")
        },
        components:{
            appIntroBreadcrumbComponent: IntroBreadcrumbComponent,
            appIntroContentComponent: IntroContentComponent
        }
    }
</script>