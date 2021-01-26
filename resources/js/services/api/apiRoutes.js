export default {
    TAGS: {
        AUTOCOMPLETE: (part) => `http://sm.test/api/v1/tag/autocomplete?name=${part}`,
        LIST: '/api/v1/tags',
        GET: (id) => `/api/v1/tags/${id}`,
        CREATE: '/api/v1/tags',
        UPDATE: (id) => `/api/v1/tags/${id}`,
        DELETE: (id) => `/api/v1/tags/${id}`,
    }
}
