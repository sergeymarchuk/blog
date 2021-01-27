<template>
    <div class="sm-editor-menu" v-show="isActive" :style="{'top': top + 'px', 'left': left + 'px'}">
        <slot></slot>
    </div>
</template>

<script>
export default {
    name: "SmEditorMenu",
    props: {
        isActive: {
            type: Boolean,
            default: false
        },
        top: {
            type: Number,
            default: 0
        },
        left: {
            type: Number,
            default: 0
        }
    }
}
</script>
