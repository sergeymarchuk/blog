<template>
    <div class="sm-text_input">
        <input
            :disabled="disabled"
            :name="name"
            :placeholder="placeholder"
            :readonly="readonly"
            :type="type"
            :value="value"
            @blur="checkField()"
            @input="$emit('input', $event.target.value)"
        >
        <div class="sm-text_input-details" :class="{ limit: valueLen > max}">
            <div class="sm-text_input-message">{{ message }}</div>
            <div v-if="max > 0" class="sm-counter">
                {{ valueLen }} / {{ max }}
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "SmInput",
    props: {
        disabled: {
            type: Boolean,
            default: false
        },
        max: {
            type: Number,
            default: -1
        },
        name: {
            type: String,
            default: ''
        },
        placeholder: {
            type: String,
            default: ''
        },
        readonly: {
            type: Boolean,
            default: false
        },
        value: {
            type: String | Number,
            default: ''
        },
        type: {
            type: String,
            default: 'text'
        }
    },
    data: () => ({
        message: '',

    }),
    computed: {
        valueLen() {
            return this.value.length
        }
    },
    methods: {
        checkField() {
            if (this.type === 'email') {
                let result = Array.from(value.matchAll(/(.+)@(.+)\.(\w+)/gi))
                this.message = typeof result[0] === 'undefined' ? 'Filed must be email' : ''
            }

            return ''
        }
    },
    watch: {
        value: function (newValue, oldValue) {
            if (this.valueLen > this.max && this.max >= 1) {
                this.message = 'Over limit'
                return;
            }
            this.message = ''
        }
    }
}
</script>
