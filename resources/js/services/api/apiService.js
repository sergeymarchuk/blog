import TagsApi from "./tagsApi";
import PostsApi from "./postsApi";

export default class ApiService {
    constructor($axios) {
        this.tags = new TagsApi($axios)
        this.posts = new PostsApi($axios)
    }
}
