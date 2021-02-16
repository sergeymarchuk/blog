<template>
    <div className="editor">
        <sm-editor-menu :isActive="activeMenu" :top="top" :left="left">
            <button class="sm-editor-menu-button" @click="menuItemPress">
                <i class="fas fa-bold"></i>
            </button>
            <button class="sm-editor-menu-button" @click="menuItemPress">
                <i class="fas fa-italic"></i>
            </button>
            <button class="sm-editor-menu-button" @click="menuItemPress">
                <i class="fas fa-code"></i>
            </button>
            <button class="sm-editor-menu-button" @click="menuItemPress">
                <i class="fas fa-list-ul"></i>
            </button>
            <button class="sm-editor-menu-button" @click="menuItemPress">
                <i class="fas fa-quote-right"></i>
            </button>
            <button class="sm-editor-menu-button" @click="menuItemPress">
                <strong>hr</strong>
            </button>
            <button class="sm-editor-menu-button" @click="menuItemPress">
                <i class="fas fa-link"></i>
            </button>
        </sm-editor-menu>
        <sm-editor-content
            :content="content"
            @write="updateContent"
            @showMenu="activationMenu"
        ></sm-editor-content>
    </div>
</template>

<script>

export default {
    name: "SmEditor",
    props: {
        label: {
            type: String,
            default: ''
        },
        content: {
            type: String,
            default: ''
        }
    },
    data: () => ({
        activeMenu: false,
        top: 0,
        left: 0
    }),
    methods: {
        activationMenu(left, top) {
            this.top = top
            this.left = left
            this.activeMenu = true
        },
        menuItemPress() {
            this.activeMenu = false
            this.top = 0
            this.left = 0
        },
        updateContent(newContent) {
            this.$emit('write', newContent)
        }
    }
}
</script>
