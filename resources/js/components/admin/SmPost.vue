<template>
    <article>
        <div class="admin-article">
            <sm-field :label="'Id :'">
                <sm-input v-model="id" :type="'number'" :disabled="true"></sm-input>
            </sm-field>
            <sm-field :label="'Title :'">
                <sm-input
                    :max="120"
                    :name="'title'"
                    v-model="title"
                ></sm-input>
            </sm-field>
            <sm-field :label="'Content: '">
                <sm-editor
                    :content="content"
                    @write="updateContent"
                ></sm-editor>
            </sm-field>
            <sm-field :label="'Published at: '">
                <sm-input
                    :name="'published_at'"
                    :type="'date'"
                    v-model="published_at"
                ></sm-input>
            </sm-field>
            <sm-field :label="'Tags: '">
                <sm-multi-select
                    :autocomplete="true"
                    :options="options"
                    :items.sync="tags"
                    @input="autocomplete()"
                    @deleteItem="deleteItem"
                ></sm-multi-select>
            </sm-field>

            <div class="button_wrapper" v-show="buttonText !== ''">
                <sm-button :buttonClass="'danger'" @button-click="saveOrCreate">
                    {{ buttonText }}
                </sm-button>
            </div>
        </div>
    </article>
</template>

<script>
import SmEditor from "../ui_components/editor/SmEditor";
import {notifications} from "../ui_components/notification/notifications";

export default {
    name: "SmPost",
    components: {SmEditor},
    data: () => ({
        id: '',
        content: '',
        title: '',
        tags: [],
        published_at: '',
        options: [],
        buttonText: ''
    }),
    async created() {
        try {
            if (!isNaN(this.$route.params.postId)) {
                let {data: {data}} = await this.$api.posts.get(this.$route.params.postId)
                this.id = data.id
                this.body = data.content
                this.title = data.title
                this.published_at = data.published_at
                this.tags = data.tags
            }

            this.buttonText = this.id == '' ? 'Create' : 'Save'
        } catch (e) {
            notifications.addNotification({title: "Error!", class: "sm-danger", message: "The system can't get post data."})
        }
    },
    methods: {
        updateContent(newValue) {
            this.content = newValue
        },
        async autocomplete() {
            let autocompleteValue = event.target.value

            if (autocompleteValue.length >= 2) {
                let {data: {data}} = await this.$api.tags.autocomplete(autocompleteValue)
                this.options = data
            }
        },
        deleteItem(id) {
            let deletedIndex;
            this.tags.forEach(function(tag, index) {
                if (tag.id == id) {
                    deletedIndex = index
                }
            })

            this.tags.splice(deletedIndex, 1)
        },
        async saveOrCreate() {
            try {
                if (this.id === '') {
                    let {data: {data}} = await this.$api.posts.create({
                        title: this.title,
                        body: this.content,
                        published_at: this.published_at,
                        tags: this.getTags()
                    })
                    notifications.addNotification({title: "Success!", class: "sm-success", message: "Post was successful create."})
                    await this.$router.push({name: "post", params: {postId: data.id}})
                } else if (!isNaN(this.id)) {
                    await this.$api.posts.update(this.id, {
                        title: this.title,
                        body: this.content,
                        published_at: this.published_at,
                        tags: this.getTags()
                    })
                    notifications.addNotification({title: "Success!", class: "sm-success", message: "Post was successful update."})
                }
            } catch (e) {
                notifications.addNotification({title: "Error!", class: "sm-danger", message: "Post wasn't update."})
            }
        },
        getTags() {
            let result = []

            this.tags.forEach(function(tag) {
                result.push(tag.id)
            })

            return result
        }
    },
    watch: {
        tags: function () {
            this.options = []
        }
    }
}
</script>
