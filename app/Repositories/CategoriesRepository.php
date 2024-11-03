<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Contracts\CategoriesRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoriesRepository implements CategoriesRepositoryInterface
{

    public function __construct(protected Category $model)
    {}
    public function getAll(): LengthAwarePaginator
    {
        return $this->model->paginate(7);
    }

    public function findOne(string $id): array
    {
        return $this->model->find($id)->toArray();
    }
    
    public function create($request): array
    {
        $category = $this->model->create([
            'name'  => $request['name'],
        ]);

        return $category->toArray();
    }
    public function update(string $id, $request): array|bool
    {
        if(!$category = $this->model->find($id)){
            return false;
        }
        $category->update([
            'name'  => $request['name'],
        ]);
        return $category->toArray();
    }
    public function getCategoryByName(string $name): array|null
    {
        return $this->model->where('name', $name)->first();
    }
}