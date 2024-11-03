<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductRequest;
use App\Services\CategoryService;
use App\Services\ExternalProductApiService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(protected ProductService $productService, protected CategoryService $categoryService)
    {}
    public function index(Request $request)
    {
       return view('pages.products.index')->with('products', $this->productService->getAll($request));
    }

    public function create()
    {
        return view('pages.products.create')->with('categories', $this->categoryService->getAll());
    }

    public function show($id)
    {
        return view('pages.products.show')
            ->with('product', $this->productService->findOne($id))
            ->with('categories', $this->categoryService->getAll());
    }
    public function store(StoreUpdateProductRequest $request)
    {
        $this->productService->create($request->all());
        return redirect()->route('product.index')->with('success', 'Produto criado com sucesso');
    }

    public function edit($id)
    {
        return view('pages.products.edit')
            ->with('product', $this->productService->findOne($id))
            ->with('categories', $this->categoryService->getAll());
    }

    public function update(StoreUpdateProductRequest $request, $id)
    {
        $this->productService->update($id, $request->all());
        return redirect()->route('product.index')->with('success', 'Produto atualizado com sucesso');
    }

    public function destroy($id)
    {
        $this->productService->delete($id);
        return redirect()->route('product.index')->with('success', 'Produto excluido com sucesso');
    }

}
