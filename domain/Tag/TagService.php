<?php

namespace Domain\Tag;

use Domain\Tag\DataTransferObjects\TagCreateDto;
use Domain\Tag\DataTransferObjects\TagUpdateDto;
use Domain\Tag\Models\{Tag, TagFilter};
use Domain\Tag\Resources\{TagResource, TagResourceCollection};

/**
 * Class TagService
 * @package App\Domain\Tag
 */
class TagService {

    private $model;
    private $filter;

    public function __construct(Tag $model, TagFilter $filter) {
        $this->model = $model;
        $this->filter = $filter;
    }

    /**
     * @param int $perPage
     *
     * @return TagResourceCollection
     */
    public function getResourceCollection(int $perPage): TagResourceCollection {
        return new TagResourceCollection($this->model::filter($this->filter)->paginate($perPage));
    }

    /**
     * @param TagCreateDto $dto
     *
     * @return Tag|null
     */
    public function createTag(TagCreateDto $dto): ?Tag {
        try {
            return $this->model::create($dto->toArray());
        } catch (\Exception $e) {
            return null;
        }
    }

    /**
     * @param int $id
     *
     * @return TagResource
     */
    public function getResource(int $id): TagResource {
        return new TagResource($this->model::find($id));
    }

    /**
     * @param TagUpdateDto $dto
     * @param int $id
     *
     * @return Tag|null
     */
    public function update(TagUpdateDto $dto, int $id): ?Tag {
        if ($this->model::where('id', $id)->update($dto->toArray())) {
            return $this->model::find($id);
        };

        return null;
    }

    /**
     * @param int $id
     *
     * @return bool
     */
    public function delete(int $id): bool {
        return $this->model::where('id', $id)->delete();
    }

    /**
     * @return array
     */
    public function autocomplete(): array {
        return $this->model::filter($this->filter)->select('id', 'name as text')->get()->toArray();
    }
}
