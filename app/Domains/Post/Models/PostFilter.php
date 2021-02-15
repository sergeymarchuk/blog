<?php

namespace App\Domains\Post\Models;

use App\Models\Filters\QueryFilter;

class PostFilter extends QueryFilter {
    public function title(string $title) {
        $this->builder->where('name', 'ilike', "%{$title}%");
    }

    public function slug(string $slug) {
        $this->builder->where('name', 'ilike', "%{$slug}%");
    }

    public function published(bool $published) {
        $this->builder->where('published', $published);
    }
}
