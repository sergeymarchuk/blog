<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    /**
     * @param array $attributes
     * @return Model
     */
    public function create(array $attributes): Model;

    /**
     * @param int $id
     * @param array $newAttributes
     * @return bool
     */
    public function update(int $id, array $newAttributes): Model;

    /**
     * @param array $ids
     * @return bool
     */
    public function delete(int $ids): bool;
}
