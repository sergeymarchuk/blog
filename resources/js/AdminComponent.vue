<template>
    <div class="admin">
        <v-menu
            :menu="menu"
            :defaultMenuItem="defaultMenuItem"
            @changeActiveItem="changeDynamicComponent"
        ></v-menu>
        <main class="admin_main">
            <components :is="componentName"></components>
        </main>
    </div>
</template>

<script>
import admin_tabs from "./config/admin_tabs";
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
        componentName() {
            let aComponent = (this.activeItem === "") ? this.ucFirst(admin_menu.activeByDefault) : this.ucFirst(this.activeItem)
            return () => import(`./components/admin/V${aComponent}`)
        },
        menu() {
            return admin_menu.menu
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
