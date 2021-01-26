<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\TagResourceCollection;
use App\Models\Filters\TagFilter;
use App\Models\Tag;
use App\Http\Resources\TagResource;
use App\Repository\RepositoryInterface;
use Illuminate\Http\Request;

class TagController extends Controller
{
    const PER_PAGE_DEFAULT = 10;

    private $tagRepository;

    public function __construct(RepositoryInterface $repository) {
        $this->tagRepository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param TagFilter $filter
     * @return TagResourceCollection
     */
    public function index(Request $request, TagFilter $filter)
    {
        $perPage = $request->perPage ?? self::PER_PAGE_DEFAULT;

        return new TagResourceCollection(Tag::filter($filter)->paginate($perPage));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return TagResource
     */
    public function store(Request $request) {
        if ($request->has('name') && $request->filled('name')) {
            return new TagResource($this->tagRepository->create(['name' => $request->name]));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return TagResource
     */
    public function show(int $id) {
        return new TagResource($this->tagRepository->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return TagResource
     */
    public function update(Request $request, int $id) {
        if ($request->has('name') && $request->filled('name')) {
            return new TagResource($this->tagRepository->update($id, ['name' => $request->name]));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return bool
     */
    public function destroy(int $id): bool {
        return $this->tagRepository->delete($id);
    }

    /**
     * Display resource for autocomplete
     *
     * @param TagFilter $filter
     * @return \Illuminate\Http\JsonResponse
     */
    public function autocomplete(TagFilter $filter) {
        $tags = Tag::filter($filter)->select('id', 'name as text')->get()->toArray();
        return response()->json(['data' => $tags]);
    }
}
