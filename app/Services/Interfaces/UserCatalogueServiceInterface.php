<?php

namespace App\Services\Interfaces;
use Illuminate\Http\Request;


/**
 * Interface UserCatalogueServiceInterface
 * @package App\Services\Interfaces
 */
interface UserCatalogueServiceInterface
{
    public function paginate($request);
    // public function create(Request $request);
    // public function delete(int $id);
    // public function updateStatus(array $post);
    // public function updateStatusAll(array $post);
}
