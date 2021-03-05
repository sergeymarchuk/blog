<?php

namespace Domain\Post\DataTransferObjects;

use Illuminate\Support\Str;

/**
 * Class PostCreateDto
 * @package App\Domain\Post\DataTransferObjects
 */
class PostCreateDto {
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
        string $title,
        string $published_at,
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
            $result[$key] = $this->$methodName();
        }

        return $result ?? [];
    }

}
