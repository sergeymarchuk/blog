import Vue from 'vue';
import VueRouter from 'vue-router';
import VStatistics from "./components/admin/VStatistics";
import SmTags from "./components/admin/SmTags";
import SmTag from "./components/admin/SmTag";
import SmPosts from "./components/admin/SmPosts";
import SmPost from "./components/admin/SmPost";
import VUsers from "./components/admin/VUsers";

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        {
            path: '/admin/statistics', component: VStatistics
        },
        {
            path: '/admin/tags', name: 'tags', component: SmTags
        },
        {
            path: '/admin/tags/:tagId', name: 'tag', component: SmTag
        },
        {
            path: '/admin/posts', name: 'posts',component: SmPosts
        },
        {
            path: '/admin/posts/:postId', name: 'post', component: SmPost
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
