<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\DistrictRepositoryInterface as DistrictRepository;
use App\Repositories\Interfaces\ProvinceRepositoryInterface as ProvinceRepository;
class LocationController extends Controller
{
    protected $districtRepository;
    protected $provinceRepository;
    public function __construct(
        DistrictRepository $districtRepository,
        ProvinceRepository $provinceRepository,
        ){
        $this->districtRepository = $districtRepository;
        $this->provinceRepository = $provinceRepository;
    }

    public function getLocation(Request $request){
        $get = $request->all();;
        $html = '';
        if($get['target'] == 'district'){
            $provinces = $this->provinceRepository->findById($get['data']['location_id'], ['code', 'name_en'], ['districts']);
            $html = $this->renderHtml($provinces->districts);
            
        }else if($get['target'] == 'wards'){
            $districts = $this->districtRepository->findById($get['data']['location_id'], ['code', 'name_en'], ['wards']);
            $html = $this->renderHtml($districts->wards, '[Select Ward]');
        }
        $response = [
            'html' => $html
        ];
        return response()->json($response);
    }

    public function renderHtml($locations, $root = '[Select District]'){
        $html = '<option value="0">'.$root.'</option>';

        foreach($locations as $location){
            $html .= '<option value="'.$location->code.'">'.$location->name_en.'</option>';
        }
        return $html;
    }
}
