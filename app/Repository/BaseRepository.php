<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    protected $model;

    public function find(int $id): Model {
        return $this->model::find($id);
    }

    public function create(array $attributes): Model {
        return $this->model::create($attributes);
    }

    public function delete(int $ids): bool {
        return $this->model::where('id', $ids)->delete();
    }
}
