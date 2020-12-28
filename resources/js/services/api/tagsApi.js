import apiRoutes from "./apiRoutes";
import BaseApi from './baseApi';

export default class TagsApi extends BaseApi {
    all() {
        return this.$axios.get(apiRoutes.TAGS.LIST)
    }

    get(id) {
        return this.$axios.get(apiRoutes.TAGS.GET, id)
    }

    create(params) {
        return this.$axios.post(apiRoutes.TAGS.CREATE, params)
    }

    update(id, params) {
        return this.$axios.put(apiRoutes.TAGS.UPDATE, params)
    }

    delete(id) {
        return this.$axios.post(apiRoutes.TAGS.DELETE, id)
    }
}
