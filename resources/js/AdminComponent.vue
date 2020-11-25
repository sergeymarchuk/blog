<template>
    <div class="admin">
        <v-menu></v-menu>
        <main class="admin_main">
            <v-tabs :config="tabs"></v-tabs>
        </main>
    </div>
</template>

<script>
import admin_tabs from "./config/admin_tabs";

export default {
    name: "AdminComponent",
    computed: {
        tabs() {
            return admin_tabs
        }
    }
}
</script>
