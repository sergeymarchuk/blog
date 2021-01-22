<template>
    <div class="sm-form_field">
        <div class="sm-form_field-label">{{ label }}</div>
        <slot></slot>
    </div>
</template>

<script>
export default {
    name: "SmField",
    props: {
        label: {
            type: String,
            default: ''
        }
    }
}
</script>
