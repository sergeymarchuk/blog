import apiRoutes from "./apiRoutes";
import BaseApi from './baseApi';

export default class AttachmentsApi extends BaseApi {
    all(page) {
        return this.$axios.get(apiRoutes.ATTACHMENT.LIST, {params: {page: page}})
    }

    get(id) {
        return this.$axios.get(apiRoutes.ATTACHMENT.GET(id))
    }

    create(params) {
        return this.$axios.post(apiRoutes.ATTACHMENT.CREATE, params)
    }

    update(id, params) {
        return this.$axios.put(apiRoutes.ATTACHMENT.UPDATE(id), params)
    }

    delete(id) {
        return this.$axios.delete(apiRoutes.ATTACHMENT.DELETE(id), id)
    }
}
