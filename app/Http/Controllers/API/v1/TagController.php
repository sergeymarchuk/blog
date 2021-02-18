<?php

namespace App\Http\Controllers\API\v1;

use Domain\Tag\FormRequest\StoreTagRequest;
use Domain\Tag\FormRequest\UpdateTagRequest;
use Domain\Tag\TagService;
use Domain\Tag\Resources\{TagResource, TagResourceCollection};
use App\Http\Controllers\Controller;
use Illuminate\Http\{JsonResponse, Request, Response};

class TagController extends Controller {

    private $tagService;

    public function __construct(TagService $service) {
        $this->tagService = $service;
    }

    /**
     * @param Request $request
     *
     * @return TagResourceCollection
     */
    public function index(Request $request): TagResourceCollection {
        $perPage = $request->perPage ?? config('constants.tags.per_page');
        return $this->tagService->getResourceCollection($perPage);
    }

    /**
     * @param StoreTagRequest $request
     *
     * @return TagResource
     */
    public function store(StoreTagRequest $request): TagResource {
        return new TagResource($this->tagService->createTag($request->getDto()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return TagResource
     */
    public function show(int $id): TagResource {
        return $this->tagService->getResource($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateTagRequest  $request
     * @param  int  $id
     *
     * @return TagResource
     */
    public function update(UpdateTagRequest $request, int $id): ?TagResource {
        return new TagResource($this->tagService->update($request->getDto(), $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return bool
     */
    public function destroy(int $id): bool {
        return $this->tagService->delete($id);
    }

    /**
     * @return JsonResponse
     */
    public function autocomplete(): JsonResponse {
        return response()->json(['data' => $this->tagService->autocomplete()]);
    }
}
