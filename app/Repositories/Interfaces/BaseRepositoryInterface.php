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
    public function create($payload = []);
    public function update(int $id = 0, $payload = []);
    public function updateByWhereIn(string $whereInField, array $whereIn, array $payload);
    public function delete(int $id = 0);
    public function forceDelete(int $id = 0);
    public function pagination(array $column = ['*'], array $condition = [], array $join = [], int $perpage = 20, array $extend = [], array $relation = []);
}
