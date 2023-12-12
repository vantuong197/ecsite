<?php

namespace App\Repositories;

use App\Repositories\Interfaces\DistrictRepositoryInterface;
use App\Models\District;
use App\Repositories\BaseRepository;
/**
 * Class ProvinceRepository 
 * @package App\Repositores
 */
class DistrictRepository extends BaseRepository implements DistrictRepositoryInterface
{
    protected $model;
    public function __construct(District $model){
        $this->model = $model;
    }

    
}
