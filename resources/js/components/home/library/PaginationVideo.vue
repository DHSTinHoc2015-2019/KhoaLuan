<template>
    <nav>
        <ul class="pagination">
            <li v-if="pagination.current_page > 1" class="page-item">
                <a href="#" aria-label="Previous" v-on:click.prevent="changePage(pagination.current_page - 1)" class="page-link">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li v-for="page in pagesNumber" :class="{'active': page == pagination.current_page}" class="page-item">
                <a href="#" v-on:click.prevent="changePage(page)" class="page-link">{{ page }}</a>
            </li>
            <li v-if="pagination.current_page < pagination.last_page" class="page-item">
                <a href="#" aria-label="Next" v-on:click.prevent="changePage(pagination.current_page + 1)" class="page-link">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</template>
<script>
    export default{
        props: {
            pagination: {
                type: Object,
                required: true
            },
            offset: {
                type: Number,
                default: 4
            }
        },
        computed: {
            pagesNumber: function () {
                if (!this.pagination.to) {
                    return [];
                }
                var from = this.pagination.current_page - this.offset;
                if (from < 1) {
                    from = 1;
                }
                var to = from + (this.offset * 2);
                if (to >= this.pagination.last_page) {
                    to = this.pagination.last_page;
                }
                var pagesArray = [];
                for (from = 1; from <= to; from++) {
                    pagesArray.push(from);
                }
                return pagesArray;
            }
        },
        methods : {
            changePage: function (page) {
                this.pagination.current_page = page;
                // window.scrollTo(0,0);
                window.scrollTo(this.findLeft('scroll-video'), this.findTop('scroll-video'));
            },
            findLeft(element) {
                var rec = document.getElementById(element).getBoundingClientRect();
                return rec.left + window.scrollX;
            },
            findTop(element) {
                var rec = document.getElementById(element).getBoundingClientRect();
                return rec.top + window.scrollY - 50;
            },
        }
    }
</script>