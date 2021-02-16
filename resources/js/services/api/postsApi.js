import apiRoutes from "./apiRoutes";
import BaseApi from './baseApi';

export default class PostsApi extends BaseApi {
    all(page) {
        return this.$axios.get(apiRoutes.POST.LIST, {params: {page: page}})
    }

    get(id) {
        return this.$axios.get(apiRoutes.POST.GET(id))
    }

    create(params) {
        return this.$axios.post(apiRoutes.POST.CREATE, params)
    }

    update(id, params) {
        return this.$axios.put(apiRoutes.POST.UPDATE(id), params)
    }

    delete(id) {
        return this.$axios.delete(apiRoutes.POST.DELETE(id), id)
    }

    autocomplete(part) {
        return this.$axios.get(apiRoutes.POST.AUTOCOMPLETE(part))
    }
}
