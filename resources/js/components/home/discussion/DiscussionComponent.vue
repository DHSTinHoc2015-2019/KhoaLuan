<template>
    <div>
        <app-discussion-breadcrumb-component></app-discussion-breadcrumb-component>
        <app-discussion-content-component></app-discussion-content-component>
        <app-discussion-new-component></app-discussion-new-component>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav style="display: block; margin-right: auto; margin-left: auto">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Trước</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Sau</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import DiscussionBreadcrumbComponent from './DiscussionBreadcrumbComponent.vue';
    import DiscussionContentComponent from './DiscussionContentComponent.vue';
    import DiscussionNewComponent from './DiscussionNewComponent.vue';

    export default {
        mounted (){
            // console.log("Thảo luận")
        },
        components:{
            appDiscussionBreadcrumbComponent: DiscussionBreadcrumbComponent,
            appDiscussionContentComponent: DiscussionContentComponent,
            appDiscussionNewComponent: DiscussionNewComponent
        }
    }
</script>