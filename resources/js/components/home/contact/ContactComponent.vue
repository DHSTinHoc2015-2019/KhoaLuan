<template>
    <div>
        <app-contact-breadcrumb-component></app-contact-breadcrumb-component>
        <app-contact-content-component></app-contact-content-component>
    </div>
</template>

<script>
    import ContactBreadcrumbComponent from './ContactBreadcrumbComponent.vue';
    import ContactContentComponent from './ContactContentComponent.vue';

    export default {
        mounted (){
            // console.log("Liên hệ")
        },
        components:{
            appContactBreadcrumbComponent: ContactBreadcrumbComponent,
            appContactContentComponent: ContactContentComponent
        }
    }
</script>