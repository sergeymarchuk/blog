import TagsApi from "./tagsApi";

export default class ApiService {
    constructor($axios) {
        this.tags = new TagsApi($axios)
    }
}
