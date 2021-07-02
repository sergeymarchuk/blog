import TagsApi from "./tagsApi";
import PostsApi from "./postsApi";
import AttachmentsApi from "./attachmentsApi";

export default class ApiService {
    constructor($axios) {
        this.tags = new TagsApi($axios)
        this.posts = new PostsApi($axios)
        this.attachments = new AttachmentsApi($axios)
    }
}
