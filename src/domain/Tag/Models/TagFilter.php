<?php

namespace Domain\Tag\Models;

use Domain\Common\Filters\QueryFilter;

/**
 * Class TagFilter
 * @package Domain\Tag\Models
 */
class TagFilter extends QueryFilter {
    public function name(string $name) {
        $this->builder->where('name', 'ilike', "%{$name}%");
    }
}
