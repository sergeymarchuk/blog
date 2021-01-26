import apiRoutes from "./apiRoutes";
import BaseApi from './baseApi';

export default class TagsApi extends BaseApi {
    all(page) {
        return this.$axios.get(apiRoutes.TAGS.LIST, {params: {page: page}})
    }

    get(id) {
        return this.$axios.get(apiRoutes.TAGS.GET(id))
    }

    create(params) {
        return this.$axios.post(apiRoutes.TAGS.CREATE, params)
    }

    update(id, params) {
        return this.$axios.put(apiRoutes.TAGS.UPDATE(id), params)
    }

    delete(id) {
        return this.$axios.delete(apiRoutes.TAGS.DELETE(id), id)
    }

    autocomplete(part) {
        return this.$axios.get(apiRoutes.TAGS.AUTOCOMPLETE(part))
    }
}
