<template>
    <menu class="a_menu">
        <v-menu-item
            v-for="item in menu"
            :key="item.title"
            :title="item.title"
            :icon="item.icon"
            :subMenu="item.subMenu"
            :activeItem="activeItemMenu"
            @changeActiveItem="setActiveItem"
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
        defaultMenuItem: {
            type: String,
            default: ''
        }
    },
    data: () => ({
        activeItem: ""
    }),
    computed: {
        activeItemMenu() {
            return this.activeItem === "" ? this.defaultMenuItem : this.activeItem ;
        }
    },
    methods: {
        setActiveItem(itemName) {
            this.activeItem = itemName
            this.$emit('changeActiveItem', itemName)
        }
    }
}
</script>
