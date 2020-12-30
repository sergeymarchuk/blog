export default {
    TAGS: {
        LIST: '/api/v1/tags',
        GET: (id) => `/api/v1/tags/${id}`,
        CREATE: '/api/v1/tags',
        UPDATE: (id) => `/api/v1/tags/${id}`,
        DELETE: (id) => `/api/v1/tags/${id}`,
    }
}
