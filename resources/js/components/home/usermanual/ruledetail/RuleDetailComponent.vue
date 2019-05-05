<template>
    <div>
        <app-rule-detail-breadcrumb-component></app-rule-detail-breadcrumb-component>
        <app-rule-detail-content-component></app-rule-detail-content-component>
    </div>
</template>

<script>
    import RuleDetailBreadcrumbComponent from './RuleDetailBreadcrumbComponent.vue';
    import RuleDetailContentComponent from './RuleDetailContentComponent.vue';

    export default {
        components:{
            appRuleDetailBreadcrumbComponent: RuleDetailBreadcrumbComponent,
            appRuleDetailContentComponent: RuleDetailContentComponent
        }
    }
</script>