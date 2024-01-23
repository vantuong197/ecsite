<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\UserCatalogueServiceInterface as UserCatalogueService;
use App\Repositories\Interfaces\UserCatalogueRepositoryInterface as UserCatalogueRepository;

use App\Http\Requests\StoreUserCatalogueRequest;
use App\Http\Requests\UpdateUserRequest;
class UserCatalogueController extends Controller
{
    //
    private $userCatalogueService;
    private $userCatalogueRepository;
    public function __construct(UserCatalogueService $userCatalogueService, UserCatalogueRepository $userCatalogueRepository){
        $this->userCatalogueService = $userCatalogueService;
        $this->userCatalogueRepository = $userCatalogueRepository;
    }

    public function index(Request $request){

 
        $users = $this->userCatalogueService->paginate($request);
        $config = [
            'js' => [
                'backend/js/plugins/switchery/switchery.js'
            ],
            'css' => [
                'backend/css/plugins/switchery/switchery.css'
            ]
        ];
        $config["seo"] = config('apps.usercatalogue.index');
        $template = 'backend.user.catalogue.index';
        return view('backend.dashboard.layout', compact('template', 'config', 'users'));


    }

    public function create(){
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
        $config["seo"] = config('apps.usercatalogue.create');
        $config['method'] = 'create';
        $template = 'backend.user.catalogue.store';
        return view('backend.dashboard.layout', compact('template', 'config'));
    }

    public function store(StoreUserCatalogueRequest $request){
        if($this->userCatalogueService->create($request)){
            return redirect()->route('user.catalogue.index')->with('success', 'Add new user successfully!');
        }
        return redirect()->route('user.catalogue.index')->with('error', 'Add new user failed, Please retry again!');
    }

    public function edit($id){
        $user = $this->userCatalogueRepository->findById($id);
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
        $config["seo"] = config('apps.usercatalogue.edit');
        $config['method'] = 'edit';
        $template = 'backend.user.catalogue.store';
        return view('backend.dashboard.layout', compact('template', 'config', 'user'));
    }

    public function update($id, StoreUserCatalogueRequest $request) {
        if($this->userCatalogueService->update($id, $request)){
            return redirect()->route('user.catalogue.index')->with('success', 'Update user successfully!');
        }
        return redirect()->route('user.catalogue.index')->with('error', 'Update user failed, Please retry again!');
    }

    public function delete($id) {
        $user = $this->userCatalogueRepository->findById($id);
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
        $config["seo"] = config('apps.usercatalogue.delete');
        $template = 'backend.user.catalogue.delete';
        return view('backend.dashboard.layout', compact('template', 'config', 'user'));
    }
    public function destroy($id){
        if($this->userCatalogueRepository->delete($id)){
            return redirect()->route('user.catalogue.index')->with('success', 'Delete user successfully!');
        }
        return redirect()->route('user.catalogue.index')->with('error', 'Delete user failed, Please retry again!');
    }
}
