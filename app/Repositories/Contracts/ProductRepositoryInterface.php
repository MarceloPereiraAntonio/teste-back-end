<?php

namespace App\Repositories\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;

interface ProductRepositoryInterface
{
    public function getAll($request): LengthAwarePaginator;
    public function findOne(string $id): array;
    public function delete(string $id): void;
    public function create($request): array;
    public function update(string $id, string $request): array|bool;
    public function getProductByName(string $name): array|null;


}