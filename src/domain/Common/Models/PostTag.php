<?php

namespace Domain\Common\Models;

use Illuminate\Database\Eloquent\Model;

class PostTag extends Model {
    protected $table = 'posts_tags';
    public $timestamps = false;

    protected $fillable = ['post_id, tag_id'];
}
