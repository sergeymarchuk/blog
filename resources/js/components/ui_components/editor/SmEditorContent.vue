<template>
    <div id="sm-editor-content"
         contenteditable="true"
         v-html="content"
         @keyup="updateContent"
         @mousedown="getStartCursorPoint"
         @mouseup="getEndCursorPoint"
    ></div>
</template>

<script>
export default {
    name: "SmEditorContent",
    props: {
        value: {
            type: String,
            default: ''
        }
    },
    data: () => ({
        content: '',
        startPos: {
            posX: 0,
            posY: 0
        }
    }),
    created() {
        this.content = this.value
    },
    methods: {
        updateContent() {
            this.content = document.getElementById('editor-content').innerHTML;
        },
        getStartCursorPoint() {
            this.startPos.posX = event.pageX
            this.startPos.posY = event.pageY
        },
        getEndCursorPoint() {
            let endPosX = event.pageX
            let endPosY = event.pageY

            if (this.startPos.posX !== endPosX || this.startPos.posY !== this.startPos.posY) {
                this.$emit('showMenu', this.startPos.posX + (endPosX - this.startPos.posX) / 2, this.startPos.posY + this.getFontSize() / 2)
            }
        },
        getFontSize() {
            return parseFloat(window.getComputedStyle(document.getElementById('sm-editor-content'), null).getPropertyValue('font-size'))
        }
    }
}
</script>
