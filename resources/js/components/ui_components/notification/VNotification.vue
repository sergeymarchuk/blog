<template>
    <div class="sm_notification">
        <div class="sm_notification-item" :class="item.class" v-for="(item, index) in items" :key="index">
            <div class="sm_notification-title">
                <div>{{item.title}}</div>
                <div @click="close(index)"><i class="far fa-times-circle"></i></div>
            </div>
            <div class="sm_notification-body">{{item.message}}</div>
        </div>
    </div>
</template>

<script>
import {notifications} from "./notifications";

export default {
    name: "VNotification",
    computed: {
        items() {
            return notifications.items
        }
    },
    methods: {
        close(index) {
            notifications.deleteNotification(index)
        }
    }
}
</script>
