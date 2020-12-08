<?php

namespace App\Models\Filters;

class TagFilter extends QueryFilter {
    public function name(string $name) {
        $this->builder->where('name', 'ilike', "%{$name}%");
    }
}
