<template>
    <div class="sm_tabs">
        <div class="sm_tabs-header">
            <div
                class="header_item"
                :class="{active: isActive(item.name)}"
                v-for="(item, index) in config.tabs"
                :key="index"
                @click="setActiveTab(item.name)"
            >
                <span class="sm-tab-icon"><i :class="item.icon"></i></span>
                {{ item.name }}
            </div>
            <div class="header_item">
            </div>
        </div>
        <div class="sm_tabs-body">
            Tro-lo-lo
        </div>
    </div>
</template>

<script>
export default {
    name: "VTabs",
    props: {
        config: {
            type: Object,
            default: {}
        }
    },
    data: () => ({
        activeTab: "create"
    }),
    methods: {
        isActive(tabName) {
            return this.activeTab === tabName
        },
        setActiveTab(tabName) {
            this.activeTab = tabName
        }
    }
}
</script>

<style scoped>

</style>
