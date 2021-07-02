<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use Domain\Post\FormRequests\{StorePostRequest, UpdatePostRequest};
use Domain\Post\Models\PostFilter;
use Domain\Post\PostService;
use Domain\Post\Resources\{PostResource, PostResourceCollection};
use Illuminate\Http\Request;

/**
 * Class PostController
 *
 * @package App\Http\Controllers\API\v1
 */
class PostController extends Controller {
    /** @var PostService */
    private $postService;

    /**
     * PostController constructor.
     * @param PostService $service
     */
    public function __construct(PostService $service) {
        $this->postService = $service;
    }

    /**
     * @param Request $request
     * @param PostFilter $filter
     *
     * @return PostResourceCollection
     */
    public function index(Request $request, PostFilter $filter) {
        $perPage = $request->perPage ?? config('constants.posts.per_page');
        return $this->postService->getResourceCollection($filter, $perPage);
    }

    /**
     * @param StorePostRequest $request
     *
     * @return PostResource
     * @throws \Exception
     */
    public function store(StorePostRequest $request) {
        $post = $this->postService->createPost($request->getDto());
        return new PostResource($post);
    }

    /**
     * @param int $id
     *
     * @return PostResource
     */
    public function show(int $id): PostResource {
        return $this->postService->getResource($id);
    }

    /**
     * @param UpdatePostRequest $request
     * @param int $id
     *
     * @return PostResource|null
     * @throws \Exception
     */
    public function update(UpdatePostRequest $request, int $id) {
        return $this->postService->update($request->getDto(), $id);
    }

    /**
     * @param int $id
     *
     * @return bool
     */
    public function destroy(int $id): bool {
        return $this->postService->delete($id);
    }
}
