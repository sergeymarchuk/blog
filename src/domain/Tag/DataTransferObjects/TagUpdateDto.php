<?php

namespace Domain\Tag\DataTransferObjects;

use Illuminate\Support\Str;

/**
 * Class TagUpdateDto
 * @package Domain\Tag\DataTransferObjects
 */
class TagUpdateDto {
    /** @var string */
    private $name;

    /**
     * TagCreateDto constructor.
     * @param string $name
     */
    public function __construct(string $name) {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
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
