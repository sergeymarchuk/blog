<template>
    <button
        :type="buttonType"
        :class="buttonClass"
        @click="$emit('button-click')"
    >
            <slot></slot>
    </button>
</template>

<script>
export default {
    name: "SmButton",
    props: {
        buttonType: {
            type: String,
            default: 'button'
        },
        buttonClass: {
            type: String,
            default: 'default'
        }
    }
}
</script>
