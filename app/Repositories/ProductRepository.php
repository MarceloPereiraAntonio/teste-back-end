<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductRepository implements ProductRepositoryInterface
{
    public function __construct(protected Product $model)
    {}

    public function getAll($request): LengthAwarePaginator
    {
        return $this->model->filter($request)->paginate(7);
    }

    public function findOne(string $id): array
    {
        return $this->model->find($id)->toArray();
    }

    public function delete(string $id): void
    {
        if($product = $this->model->find($id)){
            $product->delete($id);
        }
    }

    public function create($request): array
    {
        $product = $this->model->create([
            'name'  => $request['title'],
            'price' => $request['price'],
            'description'  => $request['description'],
            'category' => $request['category'],
            'image_url' => $request['image'] ?? null,
        ]);

        return $product->toArray();
    }

    public function update($id, $request): array|bool
    {
        if(!$product = $this->model->find($id)){
            return false;
        }
        $product->update([
            'name'  => $request['title'],
            'price' => $request['price'],
            'description'  => $request['description'],
            'category' => $request['category'],
            'image_url' => $request['image'] ?? $product->image_url,
        ]);
        return $product->toArray();
    }

    public function getProductByName($name): array|null
    {
        if($product = Product::where('name', $name)->first()){
            return $product->toArray();
        }
        return null;
    }

}