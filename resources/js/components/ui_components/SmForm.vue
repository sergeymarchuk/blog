<template>
    <form :class="className" :action="url" :method="method">
        <header class="form_header">
            {{className.toUpperCase()}}
        </header>
        <div class="form_body">
            <slot></slot>
        </div>
    </form>
</template>

<script>
export default {
    name: "SmForm",
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
