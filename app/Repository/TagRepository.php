<?php

namespace App\Repository;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;

class TagRepository extends BaseRepository implements RepositoryInterface {

    protected $model = Tag::class;

    public function update(int $id, array $newAttributes): Model {
        $this->model::where('id', $id)->update($newAttributes);
        return $this->model::find($id);
    }
}
