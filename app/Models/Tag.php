<?php

namespace App\Models;

use App\Models\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tag extends Model
{
    use HasFactory, Filterable;

    protected $table = 'tags';
    public $timestamps = false;

    protected $fillable = ['name'];

}
