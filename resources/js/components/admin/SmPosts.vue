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
    name: "SmPosts",
    data: () => ({
        tableCaption: "Posts",
        items: [],
        paginator: {},
        head: [
            "id", "title", "slug", "published_at", "cover", "tags"
        ],
        activePage: 0
    }),
    created() {
        this.changeActivePage(this.activePage)
    },
    methods: {
        async deleteItem(id) {
            try {
                await this.$api.posts.delete(id)
                notifications.addNotification({title: "Success", class: "sm-success", message: "Post was successful deleted."})
                await this.changeActivePage(this.activePage)
            } catch (e) {
                notifications.addNotification({title: "Error", class: "sm-danger", message: "Post not deleted."})
            }
        },
        goToItem(id) {
            this.$router.push({name: "post", params: {postId: id}})
        },
        async changeActivePage(page) {
            this.activePage = page

            try {
                let {data} = await this.$api.posts.all(page)
                this.items = data.data
                this.paginator = data.meta
            } catch (e) {
                notifications.addNotification({title: "Error", class: "sm-danger", message: "Can't get posts info"})
            }
        },
        newEntity() {
            this.$router.push({name: "post", params: {postId: "new"}})
        }
    }
}
</script>
