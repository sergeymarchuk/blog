<template>
    <menu class="a_menu">
        <v-menu-item
            v-for="item in menu"
            :key="item.title"
            :title="item.title"
            :icon="item.icon"
            :subMenu="item.subMenu"
            :activeItem="activeMenuItem"
        ></v-menu-item>
    </menu>
</template>

<script>
export default {
    name: "VMenu",
    props: {
        menu: {
            type: Array,
            default: []
        },
        activeMenuItem: {
            type: String,
            default: ''
        },
    },
}
</script>
