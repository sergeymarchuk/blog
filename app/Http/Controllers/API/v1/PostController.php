<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Post\PostResourceCollection;
use App\Models\{Filters\PostFilter, Post};
use Illuminate\Http\{JsonResponse, Request};

class PostController extends Controller {
    /**
     * @param Request $request
     *
     * @param PostFilter $filter
     */
    public function index(Request $request, PostFilter $filter) {
        $perPage = $request->perPage ?? config('constants.per_page');

        return new PostResourceCollection(Post::filter($filter)->paginate($perPage));
    }

    /**
     * @param Request $request
     */
    public function store(Request $request) {

    }

    /**
     * @param int $id
     */
    public function show(int $id) {

    }

    /**
     * @param Request $request
     *
     * @param int $id
     */
    public function update(Request $request, int $id) {

    }

    /**
     * @param int $id
     *
     * @return bool
     */
    public function destroy(int $id): bool {

    }

    /**
     * @return JsonResponse
     */
    public function autocomplete(): JsonResponse {

    }
}
