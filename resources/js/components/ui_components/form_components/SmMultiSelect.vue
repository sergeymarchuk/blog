<template>
    <div ref="smmultiselect">
        <div class="sm-multi_select">
            <div class="sm-multi_select-selected">
                <div class="sm-tag" v-for="(item, key) in items" :key="item.id">
                    <i class="fab fa-slack-hash"></i>
                    {{item.name}}
                    <i class="fas fa-times sm-close-el" @click="$emit('deleteItem', item.id)"></i>
                </div>
            </div>
            <input @input="customInput" :value="value">
        </div>
        <div class="sm-multi_select--available_values" v-if="selectDisplay">
            <sm-select
                :size="selectSize"
                :options="options"
                :width="selectWidth"
                @click="select()"
            ></sm-select>
        </div>
    </div>
</template>

<script>
export default {
    name: "SmMultiSelect",
    props: {
        autocomplete: {
            type: Boolean,
            default: false
        },
        options: {
            type: Array,
            default: []
        },
        items: {
            type: Array,
            default: []
        }
    },
    data: () => ({
        selectWidth: 0,
        value: ''
    }),
    mounted() {
        this.setSelectWidth()
    },
    computed: {
        selectDisplay() {
            return this.options.length > 0
        },
        selectSize() {
            if (this.options.length <= 2) {
                return 2
            }

            if (this.options.length < 10) {
                return this.options.length
            }

            return 10
        }
    },
    methods: {
        select() {
            this.items.push({id: event.target.value, name: event.target.text})
            console.log(this.items)
            this.value = ''
        },
        setSelectWidth() {
            this.selectWidth = this.$refs.smmultiselect.clientWidth
        },
        customInput() {
            this.value = event.target.value
            this.$emit('input', event.target.value)
        }
    }
}
</script>

