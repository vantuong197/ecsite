<?php

namespace App\Repositories;

use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
/**
 * Class BaseRepository 
 * @package App\Repositores
 */
class BaseRepository implements BaseRepositoryInterface
{
    protected $model;
    public function __construct(Model $model){
        $this->model = $model;
    }

    public function create($payload = []){
        $model = $this->model->create($payload);
        return $model->fresh();
    }
    public function getAll(){
        return $this->model->all();
    }

    public function findById(
        int $id,
        array $column = ['*'],
        array $relation = []
    ){
        return $this->model->select($column)->with($relation)->findOrFail($id);
    }
    public function update($id = 0, $payload = []){
        return $this->findById($id)->update($payload);
    }
    public function delete($id = 0){
        return $this->findById($id)->delete();
    }

    public function forceDelete($id = 0){
        return $this->findById($id)->forceDelete();
    }

    public function pagination(
        array $column = ['*'], 
        array $condition = [], 
        array $join = [], 
        int $perpage = 20,
        array $extend = [],
        array $relations = []
    ){
        $query = $this->model->select($column)->where(function($qry) use ($condition){
            if(isset($condition) && !empty($condition)){
                $qry->where('name', 'LIKE', '%'.$condition['keyword'].'%');
            }
        });
        
        if(!empty($join)){
            $query->join(...$join);
        }
        return $query->paginate($perpage)
                     ->withQueryString()
                     ->withPath(env('APP_URL').$extend['path']);
    }

    public function updateByWhereIn(string $whereInField = '', array $whereIn = [], array $payload = []){
        $this->model->whereIn($whereInField, $whereIn)->update($payload);
    }
}
