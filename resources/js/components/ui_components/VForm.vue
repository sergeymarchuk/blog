<template>
    <form :class="className" :action="url" :method="method">
        <p class="form_header">
            {{className.toUpperCase()}}
        </p>
        <div class="form_body">
            <slot></slot>
        </div>
    </form>
</template>

<script>
export default {
    name: "VForm",
    props: {
        method: {
            default: 'GET',
            type: String
        },
        url: {
            default: '',
            type: String
        },
        className: {
            default: "form",
            type: String
        }
    }
}
</script>
