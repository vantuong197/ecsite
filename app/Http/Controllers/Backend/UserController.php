<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\UserServiceInterface as UserService;
use App\Repositories\Interfaces\ProvinceRepositoryInterface as ProvinceRepository;
class UserController extends Controller
{
    //
    private $userService;
    private $provinceRepository;
    public function __construct(UserService $userService, ProvinceRepository $provinceRepository){
        $this->userService = $userService;
        $this->provinceRepository = $provinceRepository;
    }

    public function index(){

 
        $users = $this->userService->paginate();
        $config = [
            'js' => [
                'backend/js/plugins/switchery/switchery.js'
            ],
            'css' => [
                'backend/css/plugins/switchery/switchery.css'
            ]
        ];
        $config["seo"] = config('apps.user.index');
        $template = 'backend.user.index';
        return view('backend.dashboard.layout', compact('template', 'config', 'users'));


    }

    public function create(){
        $provinces = $this->provinceRepository->getAll();
        $config = [
            'js' => [
                'backend/js/plugins/switchery/switchery.js',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                'backend/library/location.js'
            ],
            'css' => [
                'backend/css/plugins/switchery/switchery.css',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
            ]
        ];
        $config["seo"] = config('apps.user.create');
        $template = 'backend.user.create';
        return view('backend.dashboard.layout', compact('template', 'config', 'provinces'));
    }

    
}
