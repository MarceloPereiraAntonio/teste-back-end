<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateCategoryRequest;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(protected CategoryService $categoryService)
    {}
    public function index()
    {
        return view('pages.categories.index')->with('categories', $this->categoryService->getAll());
    }

    public function create()
    {
        return view('pages.categories.create');
    }

    public function store(StoreUpdateCategoryRequest $request)
    {
        $this->categoryService->create($request->all());
        return redirect()->route('category.index')->with('success', 'Categoria criada com sucesso');
    }

    public function edit($id)
    {
        return view('pages.categories.edit')->with('category', $this->categoryService->edit($id));
    }

    public function update(StoreUpdateCategoryRequest $request, $id)
    {
        $this->categoryService->update($id, $request->all());
        return redirect()->route('category.index')->with('success', 'Categoria atualizada com sucesso');
    }
}
