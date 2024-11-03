<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ExternalProductApiService
{
    protected $baseUrl = 'https://fakestoreapi.com/products';

    public function getAllProducts()
    {
        $response = Http::get($this->baseUrl);
        return $response->successful() ? $response->json() : null;
    }

    public function getProductById($id)
    {
        $response = Http::get("{$this->baseUrl}/{$id}");
        return $response->successful() ? $response->json() : null;
    }

    public function getAllCategories()
    {
        $response = Http::get("{$this->baseUrl}/categories");
        return $response->successful() ? $response->json() : null;
    }
}
