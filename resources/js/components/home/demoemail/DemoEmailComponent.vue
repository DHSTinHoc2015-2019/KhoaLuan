<template>
    <div>
        <app-demo-email-breadcrumb-component></app-demo-email-breadcrumb-component>
        <app-demo-email-content-component></app-demo-email-content-component>
    </div>
</template>

<script>
    import DemoEmailBreadcrumbComponent from './DemoEmailBreadcrumbComponent.vue';
    import DemoEmailContentComponent from './DemoEmailContentComponent.vue';

    export default {
        mounted (){
            // console.log("Giới thiệu")
        },
        components:{
            appDemoEmailBreadcrumbComponent: DemoEmailBreadcrumbComponent,
            appDemoEmailContentComponent: DemoEmailContentComponent
        }
    }
</script>