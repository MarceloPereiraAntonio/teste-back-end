<?php

namespace App\Services;

use App\Repositories\CategoriesRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryService
{
    public function __construct(protected CategoriesRepository $repository)
    {}

    public function getAll(): LengthAwarePaginator
    {
        return $this->repository->getAll();
    }

    public function create($data)
    {
        return $this->repository->create($data);
    }

    public function edit($id)
    {
        return $this->repository->findOne($id);
    }

    public function update($id, $request)
    {
        return $this->repository->update($id, $request);
    }
}