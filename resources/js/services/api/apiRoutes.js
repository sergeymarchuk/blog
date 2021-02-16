export default {
    TAGS: {
        AUTOCOMPLETE: (part) => `http://sm.test/api/v1/tag/autocomplete?name=${part}`,
        LIST: '/api/v1/tags',
        GET: (id) => `/api/v1/tags/${id}`,
        CREATE: '/api/v1/tags',
        UPDATE: (id) => `/api/v1/tags/${id}`,
        DELETE: (id) => `/api/v1/tags/${id}`,
    },
    POST: {
        AUTOCOMPLETE: (part) => `http://sm.test/api/v1/post/autocomplete?name=${part}`,
        LIST: '/api/v1/posts',
        GET: (id) => `/api/v1/posts/${id}`,
        CREATE: '/api/v1/posts',
        UPDATE: (id) => `/api/v1/posts/${id}`,
        DELETE: (id) => `/api/v1/posts/${id}`,
    }
}
