<template>
    <button
        :type="buttonType"
        :class="buttonClass"
    >
            <slot></slot>
    </button>
</template>

<script>
export default {
    name: "VButton",
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
