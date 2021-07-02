<template>
    <div :class="className" :style="cardStyle">
        <div class="sm_card-title">
            {{ title }}
        </div>
        <div class="sm_card-close" @click="$emit('closeCard', idCard)">
            <i class="fas fa-times"></i>
        </div>
    </div>
</template>

<script>
export default {
    name: "SmCard",
    props: {
        title: {
            type: String,
            default: 'no name'
        },
        cover: {
            type: String,
            default: ''
        },
        additionalClass: {
            type: String,
            default: ''
        },
        maxWidth: {
            type: Number,
            default: 500
        },
        idCard: {
            type: Number,
            default: 0
        }
    },
    data: () => ({
        defaultClassName: {
            'sm_card': true
        }
    }),
    computed: {
        className() {
            let classObj = this.defaultClassName
            classObj[this.additionalClass] = this.additionalClass !== ''
            return classObj
        },
        cardStyle() {
            let styleObj = {
                'width': this.maxWidth + 'px',
                'height': this.maxWidth / 1.5 + 'px'
            }

            if (this.cover !== '') {
                styleObj['background-image'] = 'url(' + this.cover + ')'
                styleObj['background-size'] = 'cover'
            }

            return styleObj
        }
    },
    methods: {

    }
}
</script>
