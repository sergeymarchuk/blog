<?php

namespace Domain\Post\DataTransferObjects;

use Illuminate\Support\Str;

/**
 * Class PostUpdateDto
 * @package App\Domains\Post\DataTransferObjects
 */
class PostUpdateDto {

    /** @var string */
    private $title;

    /** @var string */
    private $published_at;

    /** @var string|null */
    private $cover;

    /** @var string|null */
    private $body;

    /** @var array|null */
    private $tags;

    public function __construct(
        string $title = null,
        string $published_at = null,
        string $cover = null,
        string $body = null,
        array $tags = null
    ) {
        $this->title = $title;
        $this->published_at = $published_at;
        $this->cover = $cover;
        $this->body = $body;
        $this->tags = $tags;
    }

    /**
     * @return string
     */
    public function getTitle(): string {
        return preg_replace('/\s+/i', ' ', $this->title);
    }

    /**
     * @return string
     */
    public function getPublishedAt(): string {
        return $this->published_at;
    }

    /**
     * @return string|null
     */
    public function getCover(): ?string {
        return $this->cover;
    }

    /**
     * @return string|null
     */
    public function getBody(): ?string {
        return $this->body;
    }

    /**
     * @return array|null
     */
    public function getTags(): ?array {
        return $this->tags;
    }

    /**
     * @return array
     */
    public function toArray(): array {
        foreach ($this as $key => $value) {
            $methodName = 'get' . ucfirst(Str::camel($key));

            if (!empty($this->$methodName()) && $key !== 'tags') {
                $result[$key] = $this->$methodName();
            }
        }

        return $result ?? [];
    }

}
