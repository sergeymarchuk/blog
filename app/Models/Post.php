<?php

namespace App\Models;

use App\Models\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model {
    use HasFactory, SoftDeletes, Filterable;

    protected $table = "posts";

    protected $fillable = ['title', 'slug', 'published', 'published_at', 'content'];

    public function tags() {
        return $this->belongsToMany(Tag::class, 'posts_tags');
    }
}
