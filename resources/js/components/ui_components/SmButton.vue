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
            default: 'button',
            type: String
        },
        buttonClass: {
            default: '',
            type: String
        }
    }
}
</script>
