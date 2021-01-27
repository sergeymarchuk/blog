<template>
    <div class="paginator_wrapper">
        <div class="paginator">
            <div
                :class="[currentPage === 1 ? 'paginator-item_wrapper-disabled' : 'paginator-item_wrapper']"
                @click="changeActivePage(currentPage - 1)"
            >
                <i class="fas fa-chevron-left"></i>
            </div>

            <div class="paginator-ellipsis" v-if="startRange !== 1">
                <i class="fas fa-ellipsis-h"></i>
            </div>

            <div
                 :class="[currentPage === item ? 'paginator-item_wrapper-active' : 'paginator-item_wrapper']"
                 v-for="item in itemRange" :key="item"
                 @click="changeActivePage(item)"
            >{{ item }}</div>

            <div class="paginator-ellipsis" v-if="endRange !== lastPage">
                <i class="fas fa-ellipsis-h"></i>
            </div>

            <div
                :class="[currentPage === lastPage ? 'paginator-item_wrapper-disabled' : 'paginator-item_wrapper']"
                @click="changeActivePage(currentPage + 1)"
            >
                <i class="fas fa-chevron-right"></i>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "SmPagination",
    props: {
        currentPage: {
            type: Number,
            default: 1
        },
        lastPage: {
            type: Number,
            default: 1,
        }
    },
    computed: {
        startRange() {
            if (this.currentPage - 3 <= 1) {
                return 1
            }

            return this.currentPage - 3
        },
        endRange() {
            if (this.currentPage + 3 >= this.lastPage) {
                return this.lastPage;
            }

            return this.currentPage + 3;
        },
        itemRange() {
            let rangeLength = this.endRange - this.startRange + 1;
            return [...Array(rangeLength).keys()].map(i => i + this.startRange)
        }
    },
    methods: {
        changeActivePage(page) {
            if (page > 0 && page <= this.lastPage) {
                this.$emit('changedActivePage', page);
            }
        }
    }
}
</script>
