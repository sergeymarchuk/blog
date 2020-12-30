<template>
    <div class="admin">
        <v-menu
            :menu="menu"
            :defaultMenuItem="defaultMenuItem"
            :activeMenuItem="activeMenuItem"
            @changeActiveItem="changeDynamicComponent"
        ></v-menu>
        <main class="admin_main">
            <router-view></router-view>
        </main>
        <v-notification></v-notification>
    </div>
</template>

<script>
import admin_menu from "./config/admin_menu";

export default {
    name: "AdminComponent",
    data: () => ({
        activeItem: ""
    }),
    computed: {
        tabs() {
            return admin_tabs
        },
        menu() {
            return admin_menu.menu
        },
        activeMenuItem() {
            let uri = this.$route.path
            uri = uri.replace('/admin/', '')

            if (uri.indexOf('/') !== -1) {
                return uri.substr(0, uri.indexOf('/'))
            }

            return uri
        },
        defaultMenuItem() {
            return admin_menu.activeByDefault
        }
    },
    methods: {
        changeDynamicComponent(activeItem) {
            this.activeItem = activeItem
        },
        ucFirst(name) {
            return name[0].toUpperCase() + name.slice(1)
        }
    }
}
</script>
