<template>
    <div class="a_menu-item">
        <div class="a_menu-header" :class="{active: activeItem === title}" @click="activate(title)">
            <div class="a_menu-icon"><i :class="icon"></i></div>
            <div class="a_menu-title">{{ ucfirst(title) }}</div>
        </div>

        <div class="a_menu-sub">
            <div class="a_menu-sub_item" :class="{activeSub: activeItem === item.title}" v-for="item in subMenu">
                <div class="a_menu-header" @click="activate(item.title)">
                    <div class="a_menu-icon"><i :class="item.icon"></i></div>
                    <div class="a_menu-title">{{ item.title }}</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "VMenuItem",
    props: {
        title: {
            default: "",
            type: String
        },
        icon: {
            default: "far fa-circle",
            type: String
        },
        subMenu: {
            default: () => [],
            type: Array
        },
        activeItem: {
            default: "",
            type: String
        }
    },
    methods: {
        activate(itemName) {
            this.$emit('changeActiveItem', itemName)
            this.$router.push('/admin/' + itemName)
        },
        ucfirst(string) {
            return string.charAt(0).toUpperCase() + string.slice(1)
        }
    }
}
</script>
