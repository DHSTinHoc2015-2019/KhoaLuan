<template>
	<div>
		<app-home-header-component></app-home-header-component>
		<app-home-tpack-component></app-home-tpack-component>
		<app-home-blog-component></app-home-blog-component>
	</div>
</template>

<script>
	import HomeHeaderComponent from './HomeHeaderComponent.vue';
	import HomeTpackComponent from './HomeTpackComponent.vue';
	import HomeBlogComponent from './HomeBlogComponent.vue';
	export default {
		components: {
			appHomeHeaderComponent: HomeHeaderComponent,
			appHomeTpackComponent: HomeTpackComponent,
			appHomeBlogComponent: HomeBlogComponent
		}
	}
</script>