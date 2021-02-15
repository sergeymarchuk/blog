<?php

namespace App\Domains\Post\Models;

use App\Models\Filters\Filterable;
use App\Models\Tag;
use Illuminate\Database\Eloquent\{Model, SoftDeletes, Factories\HasFactory};

class Post extends Model {
    use HasFactory, SoftDeletes, Filterable;

    protected $table = "posts";

    protected $fillable = ['title', 'slug', 'published', 'published_at', 'body'];

    public function tags() {
        return $this->belongsToMany(Tag::class, 'posts_tags');
    }
}
