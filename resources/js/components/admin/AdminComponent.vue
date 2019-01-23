<template>
	<div id="main">
	    <app-admin-header-bar></app-admin-header-bar>
	   
        <app-admin-left-side-bar></app-admin-left-side-bar>
	
        <router-view></router-view>
    
        <app-admin-footer></app-admin-footer>

    </div>
</template>

<script>
    import AdminHeaderBar from './AdminHeaderBar.vue';
    import AdminLeftSideBar from './AdminLeftSideBar.vue';
    import AdminFooter from './AdminFooter.vue';
    
    export default {
        mounted() {
            // console.log('Component mounted.')
        },
        components: {
            appAdminHeaderBar: AdminHeaderBar,
            appAdminLeftSideBar: AdminLeftSideBar,
            appAdminFooter: AdminFooter
        }
    }
</script>

<style>
	#sidebar-menu ul li .float-right{
		margin-right: 0;
	}
</style>