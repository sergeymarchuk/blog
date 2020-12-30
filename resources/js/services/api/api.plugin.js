import apiService from './apiService';

export default {
    install (Vue, options) {
        Vue.prototype.$api = new apiService(axios)
    }
}
