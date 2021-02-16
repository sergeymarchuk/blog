<template>
    <div id="sm-editor-content"
         contenteditable="true"
         v-html="editorContent"
         @keypress="write"
         @mousedown="getStartCursorPoint"
         @mouseup="getEndCursorPoint"
    ></div>
</template>

<script>
export default {
    name: "SmEditorContent",
    props: {
        content: {
            type: String,
            default: ''
        }
    },
    data: () => ({
        editorContent: '',
        startPos: {
            posX: 0,
            posY: 0
        }
    }),
    created() {
        if (this.content === '') {
            this.editorContent = '<p>Some content</p>'
        } else {
            this.editorContent = this.content
        }
    },
    methods: {
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
        },
        write() {
            this.$emit('write', document.getElementById('sm-editor-content').innerHTML)
        }
    }
}
</script>
