<?php

namespace Domain\Tag\Models;

use Domain\Post\Models\Post;
use Domain\Common\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model {
    use HasFactory, Filterable;

    protected $table = 'tags';
    public $timestamps = false;

    protected $fillable = ['name'];

    public function posts() {
        return $this->belongsToMany(Post::class, 'posts_tags');
    }
}
