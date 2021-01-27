<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    protected $model;

    /**
     * @param int $id
     *
     * @return Model|null
     */
    public function find(int $id): ?Model {
        return $this->model::find($id);
    }

    /**
     * @param array $attributes
     *
     * @return Model
     */
    public function create(array $attributes): Model {
        return $this->model::create($attributes);
    }

    /**
     * @param int $ids
     *
     * @return bool
     */
    public function delete(int $ids): bool {
        return $this->model::where('id', $ids)->delete();
    }
}
