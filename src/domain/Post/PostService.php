<?php

namespace Domain\Post;

use Domain\Post\DataTransferObjects\{PostCreateDto, PostUpdateDto};
use Domain\Post\Models\{Post, PostFilter};
use Domain\Post\Resources\{PostResourceCollection, PostResource};
use Domain\Common\Models\PostTag;
use Illuminate\Support\{Facades\DB, Str};
use DateTime;

class PostService {

    private $model;
    private $postTag;

    /**
     * PostService constructor.
     * @param Post $model
     * @param PostTag $postTag
     */
    public function __construct(Post $model, PostTag $postTag) {
        $this->model = $model;
        $this->postTag = $postTag;
    }

    /**
     * @param PostFilter $filter
     * @param int|null $perPage
     *
     * @return PostResourceCollection
     */
    public function getResourceCollection(PostFilter $filter, int $perPage = null): PostResourceCollection {
        return new PostResourceCollection(Post::filter($filter)->paginate($perPage));
    }

    /**
     * @param PostCreateDto $dto
     * @return Post|null
     *
     * @throws \Exception
     */
    public function createPost(PostCreateDto $dto): ?Post {
        $modelFields = $dto->toArray();
        $modelFields['published'] = $this->definePublished($dto->getPublishedAt(), $dto->getBody());
        $modelFields['slug'] = Str::slug($dto->getTitle());

        DB::beginTransaction();
        try {
            $post = $this->model::create($modelFields);
            $this->postTag::where('post_id', $post->id)->delete();
            $this->postTag::insert($this->getPostsTagsData($post->id, $modelFields['tags']));
            DB::commit();

            return $post;
        } catch (\Exception $e) {
            DB::rollBack();
            return null;
        }
    }

    /**
     * @param int $id
     *
     * @return PostResource
     */
    public function getResource(int $id): PostResource {
        return new PostResource($this->model::find($id));
    }

    /**
     * @param PostUpdateDto $dto
     * @param int $id
     *
     * @return PostResource|null
     * @throws \Exception
     */
    public function update(PostUpdateDto $dto, int $id): ?PostResource {
        $modelFields = $dto->toArray();
        $modelFields['published'] = $this->definePublished($dto->getPublishedAt(), $dto->getBody());

        if (array_key_exists('title', $modelFields)) {
            $modelFields['slug'] = Str::slug($dto->getTitle());
        }

        if ($this->model::where('id', $id)->update($modelFields)) {
            $this->postTag::where('post_id', $id)->delete();
            $this->postTag::insert($this->getPostsTagsData($id, $dto->getTags()));
            return new PostResource($this->model::find($id));
        }

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
     * @param string|null $published_at
     * @param string|null $body
     *
     * @return bool
     * @throws \Exception
     */
    private function definePublished(string $published_at = null, string $body = null): bool {
        if (empty($published_at) && empty($body)) {
            return false;
        }

        try {
            if (new DateTime($published_at) < new DateTime() && !empty($body)) {
                return true;
            }
        } catch (\Exception $e) {}

        return false;
    }

    /**
     * @param int $postId
     * @param array $tagIds
     *
     * @return array
     */
    private function getPostsTagsData(int $postId, array $tagIds): array {
        foreach ($tagIds as $tagId) {
            $result[] = [
                'post_id' => $postId,
                'tag_id' => $tagId,
            ];
        }

        return $result ?? [];
    }
}
