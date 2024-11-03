<?php

namespace App\Jobs;

use App\Repositories\CategoriesRepository;
use App\Services\ExternalProductApiService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ImportCategoriesJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $repository;
    public function __construct(CategoriesRepository $repository)
    {
        $this->repository = $repository;

    }
    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $externalProductApi = new ExternalProductApiService();
        $categories = $externalProductApi->getAllCategories();

        foreach ($categories as $categoryName) {
            if (is_string($categoryName)) {
                $existingCategory = $this->repository->getCategoryByName($categoryName);
                
                if ($existingCategory) {
                    $this->repository->update($existingCategory['id'], $categoryName);
                } else {
                    $this->repository->create(['name' => $categoryName]);
                }
            }
        }
    }
}
