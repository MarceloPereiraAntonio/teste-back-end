<?php

namespace App\Console\Commands;

use App\Jobs\ImportCategoriesJob;
use App\Models\Category;
use App\Repositories\CategoriesRepository;
use Illuminate\Console\Command;

class ImportCategories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'categories:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import all categories';
    protected $categoriesRepository;
    /**
     * Execute the console command.
     */
    public function __construct(CategoriesRepository $categoriesRepository)
    {
        parent::__construct();
        $this->categoriesRepository = $categoriesRepository;
    }
    public function handle()
    {
        ImportCategoriesJob::dispatch($this->categoriesRepository);
        $this->info("Added job to import categories");
    }
}
