<template>
    <form :class="className" :action="url" :method="method" :name="name">
        <header class="form_header" v-if="className">
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
            type: String,
            default: 'GET'
        },
        url: {
            type: String,
            default: ''
        },
        className: {
            type: String,
            default: ''
        },
        name: {
            type: String,
            default: ''
        }
    }
}
</script>
