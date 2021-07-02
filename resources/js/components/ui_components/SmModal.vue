<template>
    <div class="sm_modal--wrapper">
        <div class="sm_modal--window">
            <div class="sm_modal--header">
                <div class="sm_modal--title">{{ title }}</div>
                <div class="sm_modal--close" @click="$emit('close')"><i class="fas fa-times"></i></div>
            </div>
            <div class="sm_modal--body">
                <slot></slot>
            </div>
            <div class="sm_modal--footer" v-if="hasButtons">
                <sm-button :buttonClass="'success'" @button-click="$emit('attachmentSave')">
                    save
                </sm-button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "SmModal",
    props: {
        title: {
            type: String,
            default: ''
        },
        buttons: {
            type: Array,
            default: []
        }
    },
    computed: {
        hasButtons() {
            return this.buttons.length > 0
        }
    }
}
</script>
