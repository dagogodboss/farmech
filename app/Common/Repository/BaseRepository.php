<?php

namespace App\Common\Repository;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

abstract class BaseRepository
{
    protected $model;

    public function all()
    {
        return $this->model->all();
    }
    public function getById($id)
    {
        return $this->model->findorFail($id);
    }
    public function store($data)
    {
        // $data->created_at = Carbon::now();
        return $this->model->create($data);
    }
    public function update()
    {
        $this->model->updated_at = Carbon::now();
        return $this->model->save();
    }
    public function destroy($id)
    {
        return $this->model->getById()->delete;
    }
}
