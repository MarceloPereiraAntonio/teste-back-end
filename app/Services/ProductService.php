<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductService
{
    public function __construct(protected ProductRepository $repository)
    {}

    public function getAll($request): LengthAwarePaginator
    {
        return $this->repository->getAll($request);
    }

    public function findOne(string $id): array
    {
        return $this->repository->findOne($id);
    }

    public function delete(string $id): void
    {
        $this->repository->delete($id);
    }

    public function create($request): array
    {
        if(isset($request['image']) && $request['image']->isValid()){
            $nameFile = uniqid(). '.' .$request['image']->getClientOriginalExtension();
            $image = $request['image']->storeAs('products', $nameFile, 'public');
            $request['image'] = $image;
        }
        return $this->repository->create($request);
    }

    public function update($id, $request)
    {
        if($this->repository->findOne($id)){
            if(isset($request['image']) && $request['image']->isValid()){
                $nameFile = uniqid(). '.' .$request['image']->getClientOriginalExtension();
                $image = $request['image']->storeAs('products', $nameFile, 'public');
                $request['image'] = $image;
            }

        return $this->repository->update($id, $request);
        }
        
        return redirect()->back();
    }

}