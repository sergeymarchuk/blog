<?php

namespace Domain\Post\Models;

use Domain\Attachment\Models\Attachment;
use Domain\Tag\Models\Tag;
use Domain\Common\Filters\Filterable;
use Illuminate\Database\Eloquent\{Model, Relations\BelongsToMany, Relations\HasOne, SoftDeletes, Factories\HasFactory};

class Post extends Model {
    use HasFactory, SoftDeletes, Filterable;

    protected $table = "posts";

    protected $fillable = ['title', 'slug', 'published', 'published_at', 'body', 'cover'];

    /**
     * @return BelongsToMany
     */
    public function tags(): BelongsToMany {
        return $this->belongsToMany(Tag::class, 'posts_tags');
    }

    /**
     * @return HasOne
     */
    public function cover(): HasOne {
        return $this->hasOne(Attachment::class, 'id', 'cover');
    }
}
