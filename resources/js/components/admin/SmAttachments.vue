<template>
    <div class="admin-attachment" ref="collection">
        <div class="admin-attachment--title">
            Attachments
        </div>
        <sm-button @button-click="showModal">
            <div class="b-new"><i class="fas fa-plus"></i> add new attachment</div>
        </sm-button>
        <div class="admin-attachment--collection">
            <div v-for="(item) in items" :key="item.id">
                <sm-card
                    :additionalClass="'attachment_preview'"
                    :cover="'/storage/images/originals/new_file_3.jpeg'"
                    :idCard="item.id"
                    :maxWidth="getCardMaxWith"
                    :title="item.name"
                    @closeCard="remove"
                ></sm-card>
            </div>
        </div>
        <sm-modal
            v-if="displayModal"
            :title="'add new Attachment'"
            :buttons="['save', 'cancel']"
            @close="showModal"
            @attachmentSave="save"
        >
            <sm-form
                :name="'newAttachment'"
            >
                <sm-field :label="'Attachment name :'">
                    <sm-input
                        :name="'name'"
                        v-model="attachmentName"
                    ></sm-input>
                </sm-field>
                <sm-field :label="'Attachment file :'">
                    <sm-input
                        :name="'attachment'"
                        :type="'file'"
                    ></sm-input>
                </sm-field>
            </sm-form>
        </sm-modal>
    </div>
</template>

<script>
import {notifications} from "../ui_components/notification/notifications";

export default {
    name: "SmAttachments",
    data: () => ({
        items: [],
        activePage: 0,
        screenWidth: 0,
        displayModal: false,
        attachmentName: '',
    }),
    created() {
        this.changeActivePage(this.activePage)
        window.addEventListener('resize', this.screenWithUpdate)
    },
    computed: {
        getCardMaxWith() {
            let cardWidth = (this.$refs.collection.clientWidth - 30) / 4 - 20;
            if (cardWidth < 200) {
                return 200
            }

            return cardWidth
        }
    },
    methods: {
        async changeActivePage(page) {
            this.activePage = page

            try {
                let {data} = await this.$api.attachments.all(page)
                this.items = data.data
                // this.paginator = data.meta
                notifications.addNotification({title: "Success", class: "sm-success", message: "Attachment was successful upload."})
            } catch (e) {
                notifications.addNotification({title: "Error", class: "sm-danger", message: "Can't get attachmnets info"})
            }
        },
        screenWithUpdate() {
            this.screenWidth = window.innerWidth
        },
        showModal() {
            this.displayModal = !this.displayModal
        },
        async save() {
            let attachmentData = new FormData(document.forms.namedItem("newAttachment"))
            let {data} = await this.$api.attachments.create(attachmentData)
            console.log(data)

        },
        async remove(id) {
            try {
                await this.$api.attachments.delete(id)
                notifications.addNotification({title: "Success", class: "sm-success", message: "Attachment was successful deleted."})
            } catch (e) {
                notifications.addNotification({title: "Error", class: "sm-danger", message: "Attachment not deleted."})
            }
        }
    }
}
</script>
