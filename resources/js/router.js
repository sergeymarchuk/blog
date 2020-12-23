import Vue from 'vue';
import VueRouter from 'vue-router';
import VStatistics from "./components/admin/VStatistics";
import VTags from "./components/admin/VTags";
import VTag from "./components/admin/VTag";
import VPosts from "./components/admin/VPosts";
import VUsers from "./components/admin/VUsers";

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        {
            path: '/admin/statistics', component: VStatistics
        },
        {
            path: '/admin/tags', name: 'tags', component: VTags
        },
        {
            path: '/admin/tags/:tagId', name: 'tag', component: VTag
        },
        {
            path: '/admin/posts', component: VPosts
        },
        {
            path: '/admin/users', component: VUsers
        },
        {
            path: '/admin', redirect: '/admin/statistics'
        }
    ],
    mode: 'history'
});
