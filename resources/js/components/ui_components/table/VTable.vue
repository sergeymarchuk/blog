<template>
    <table class="sm_table">
        <caption>{{ caption }}</caption>

        <thead class="sm_table-head">
            <tr class="comman_row">
                <td :colspan="colSpan">
                    <v-button @button-click="$emit('add')">
                        <div class="b-new"><i class="fas fa-plus"></i> add new {{ caption }}</div>
                    </v-button>
                </td>
            </tr>
            <tr>
                <td v-for="item in head">{{item}}</td>
                <td v-if="action">action</td>
            </tr>
        </thead>

        <tbody class="sm_table-body">
            <tr v-for="item in items">
                <td v-for="(value, field) in item">{{value}}</td>
                <td v-if="action">
                    <i class="far fa-eye sm_table-action"  @click="updateItem(item.id)"></i>
                    <i class="far fa-trash-alt sm_table-action"  @click="deleteItem(item.id)"></i></td>
            </tr>
        </tbody>

        <tfoot>
            <tr>
                <td :colspan="colSpan">
                    <v-pagination
                        v-if="Object.keys(paginator).length !== 0"
                        :currentPage="paginator.current_page"
                        :lastPage="paginator.last_page"
                        @changedActivePage="setNewActivePage"
                    ></v-pagination>
                </td>
            </tr>
        </tfoot>
    </table>
</template>

<script>
export default {
    name: "VTable",
    props: {
        caption: {
            type: String,
            default: ""
        },
        head: {
            type: Array,
            default: []
        },
        items: {
            type: Array,
            default: []
        },
        action: {
            type: Boolean,
            default: false
        },
        paginator: {
            type: Object,
            default: {}
        },
    },
    computed: {
        colSpan() {
            if (this.action) {
                return this.head.length + 1
            }

            return this.head.length
        }
    },
    methods: {
        setNewActivePage(page) {
            this.$emit('changeActivePage', page)
        },
        updateItem(id) {
            this.$emit('clickItemUpdate', id)
        },
        deleteItem(id) {
            this.$emit('clickItemDelete', id)
        }
    }
}
</script>
