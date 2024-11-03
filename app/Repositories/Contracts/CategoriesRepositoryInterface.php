<?php

namespace App\Repositories\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;

interface CategoriesRepositoryInterface
{
    public function getAll(): LengthAwarePaginator;
    public function create($request): array;
    public function findOne(string $id): array|null;
    public function update(string $id, $request): array|bool;
    public function getCategoryByName(string $name): array|null;


}