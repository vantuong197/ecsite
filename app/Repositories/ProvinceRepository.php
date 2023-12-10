<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ProvinceRepositoryInterface;
use App\Models\Province;
use App\Repositories\BaseRepository;
/**
 * Class ProvinceRepository 
 * @package App\Repositores
 */
class ProvinceRepository extends BaseRepository implements ProvinceRepositoryInterface
{
    protected $model;
    public function __construct(Province $model){
        $this->model = $model;
    }
}
