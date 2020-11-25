<template>
    <menu class="a_menu">
        <v-menu-item
            v-for="item in getMenu"
            :key="item.title"
            :title="item.title"
            :icon="item.icon"
            :subMenu="item.subMenu"
            :activeItem="activeItem"
            @changeActiveItem="setActiveItem"
        ></v-menu-item>
    </menu>
</template>

<script>
import admin_menu from "../../../config/admin_menu";

export default {
    name: "VMenu",
    data: () => ({
        activeItem: ""
    }),
    created() {
        this.activeItem = admin_menu.activeByDefault
    },
    computed: {
        getMenu() {
            return admin_menu.menu;
        }
    },
    methods: {
        setActiveItem(itemName) {
            this.activeItem = itemName
        }
    }
}
</script>
