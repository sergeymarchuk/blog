<?php

namespace Domain\Post\Models;

use Domain\Tag\Models\Tag;
use Domain\Common\Filters\Filterable;
use Illuminate\Database\Eloquent\{Model, SoftDeletes, Factories\HasFactory};

class Post extends Model {
    use HasFactory, SoftDeletes, Filterable;

    protected $table = "posts";

    protected $fillable = ['title', 'slug', 'published', 'published_at', 'body'];

    public function tags() {
        return $this->belongsToMany(Tag::class, 'posts_tags');
    }
}
