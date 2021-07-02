<?php

namespace Domain\Attachment\Models;

use Domain\Common\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model {
    use HasFactory, Filterable;

    protected $table = 'attachments';
    public $timestamps = false;

    protected $fillable = ['name'];
}
