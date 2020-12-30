import Vue from 'vue'

export const notifications = Vue.observable({
    items: [],

    addNotification(notification) {
        notifications.items.push(notification)
        setTimeout(() => notifications.items.splice(0, 1), 3000)
    },

    deleteNotification(index) {
        notifications.items.splice(index, 1)
    }
})
