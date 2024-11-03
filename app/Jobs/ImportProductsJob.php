<?php

namespace App\Jobs;

use App\Repositories\ProductRepository;
use App\Services\ExternalProductApiService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ImportProductsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $productId;
    protected $repository;
    public function __construct($productId = null, ProductRepository $repository)
    {
        $this->productId = $productId;
        $this->repository = $repository;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $externalProductApi = new ExternalProductApiService;
        if ($this->productId) {
            $productData = $externalProductApi->getProductById($this->productId);
            if ($productData) {
                Self::importProduct($productData);
            }
        } else { 
            $products = $externalProductApi->getAllProducts();
            foreach ($products as $productData) {
                Self::importProduct($productData);
            }
        }
    }

    public function importProduct(array $productData): void
    {
        if ($existingProduct = $this->repository->getProductByName($productData['title'])) {
            $this->repository->update($existingProduct['id'], $productData);
        } else {
            $this->repository->create($productData);

        }
    }


}


