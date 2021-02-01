<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\{TagResourceCollection, TagResource};
use App\Models\{Filters\TagFilter, Tag};
use Illuminate\Http\{JsonResponse, Request};

class TagController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param TagFilter $filter
     *
     * @return TagResourceCollection
     */
    public function index(Request $request, TagFilter $filter): TagResourceCollection {
        $perPage = $request->perPage ?? config('constants.per_page');

        return new TagResourceCollection(Tag::filter($filter)->paginate($perPage));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return TagResource
     */
    public function store(Request $request): TagResource {
        if ($request->has('name') && $request->filled('name')) {
            return new TagResource($this->tagRepository->create(['name' => $request->name]));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return TagResource
     */
    public function show(int $id): TagResource {
        return new TagResource($this->tagRepository->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return TagResource
     */
    public function update(Request $request, int $id): TagResource {
        if ($request->has('name') && $request->filled('name')) {
            return new TagResource($this->tagRepository->update($id, ['name' => $request->name]));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return bool
     */
    public function destroy(int $id): bool {
        return $this->tagRepository->delete($id);
    }

    /**
     * Display resource for autocomplete
     *
     * @param TagFilter $filter
     *
     * @return JsonResponse
     */
    public function autocomplete(TagFilter $filter): JsonResponse {
        $tags = Tag::filter($filter)->select('id', 'name as text')->get()->toArray();
        return response()->json(['data' => $tags]);
    }
}
