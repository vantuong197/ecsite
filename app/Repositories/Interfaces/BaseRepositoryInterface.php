<?php

namespace App\Repositories\Interfaces;

/**
 * Interface BaseRepositoryInterface
 * @package App\Repositories\Interfaces
 */
interface BaseRepositoryInterface
{
    public function getAll();
    public function findById(
        int $id,
        array $column,
        array $relation
    );
}
