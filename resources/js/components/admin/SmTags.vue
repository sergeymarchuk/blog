<template>
    <sm-table
        :caption="tableCaption"
        :paginator="paginator"
        :items="items"
        :head="head"
        :action="true"
        @changeActivePage="changeActivePage"
        @clickItemUpdate="goToItem"
        @clickItemDelete="deleteItem"
        @add="newEntity"
    ></sm-table>
</template>

<script>
import {notifications} from "../ui_components/notification/notifications";

export default {
    name: "SmTags",
    data: () => ({
        tableCaption: "Tag",
        items: [],
        paginator: {},
        head: [
            "id", "name"
        ],
        activePage: 0
    }),
    created() {
        this.changeActivePage(this.activePage)
    },
    methods: {
        async deleteItem(id) {
            try {
                await this.$api.tags.delete(id)
                notifications.addNotification({title: "Success", class: "sm-success", message: "Tag was successful deleted."})
                await this.changeActivePage(this.activePage)
            } catch (e) {
                notifications.addNotification({title: "Error", class: "sm-danger", message: "Tag not deleted."})
            }
        },
        goToItem(id) {
            this.$router.push({name: "tag", params: {tagId: id}})
        },
        async changeActivePage(page) {
            this.activePage = page

            try {
                let {data} = await this.$api.tags.all(page)
                this.items = data.data
                this.paginator = data.meta
            } catch (e) {
                notifications.addNotification({title: "Error", class: "sm-danger", message: "Can't get tags info"})
            }
        },
        newEntity() {
            this.$router.push({name: "tag", params: {tagId: "new"}})
        }
    }
}
</script>
