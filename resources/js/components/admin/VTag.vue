<template>
    <div>
        <b-field label="Id">
            <b-input v-model="id" disabled></b-input>
        </b-field>
        <b-field label="Tag name">
            <b-input v-model="name"></b-input>
        </b-field>
        <div class="button_wrapper" v-show="buttonText !== ''">
            <v-button
                :buttonClass="'danger'"
                @button-click="saveOrCreate"
            >
                {{ buttonText }}
            </v-button>
        </div>
    </div>
</template>

<script>
import {notifications} from "../ui_components/notification/notifications";

export default {
    name: "VTag",
    data: () => ({
        name: '',
        id: '',
        buttonText: ''
    }),
    async created() {
        try {
            if (!isNaN(this.$route.params.tagId)) {
                let {data: {data}} = await this.$api.tags.get(this.$route.params.tagId)
                this.id = data.id
                this.name = data.name
            }

            this.buttonText = this.id == '' ? 'Create' : 'Save'
        } catch (e) {
            notifications.addNotification({title: "Error!", class: "sm-danger", message: "The system can't get tag data."})
        }
    },
    methods: {
        async saveOrCreate() {
            try {
                if (this.id === '') {
                    let {data: {data}} = await this.$api.tags.create({name: this.name})
                    notifications.addNotification({title: "Success!", class: "sm-success", message: "Tag was successful create."})
                    await this.$router.push({name: "tag", params: {tagId: data.id}})
                } else if (!isNaN(this.id)) {
                    await this.$api.tags.update(this.id, {name: this.name})
                    notifications.addNotification({title: "Success!", class: "sm-success", message: "Tag was successful update."})
                }
            } catch (e) {
                notifications.addNotification({title: "Error!", class: "sm-danger", message: "Tag wasn't update."})
            }
        }
    }
}
</script>
