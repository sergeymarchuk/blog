<template>
    <select
        class="sm-select"
        :size="size"
        :style="{width: width + 'px'}"
    >
        <option
            class="sm-select-option"
            :value="option.id"
            v-for="(option, key) in options"
            @click="$emit('click', $event.target.value)"
        >{{option.text}}</option>
    </select>
</template>

<script>
export default {
    name: "SmSelect",
    props: {
        options: {
            type: Array,
            default: []
        },
        size: {
            type: Number,
            default: 5
        },
        width: {
            type: Number,
            default: 0
        }
    }
}
</script>
