<?php

namespace App\Console\Commands;

use App\Jobs\ImportProductsJob;
use App\Repositories\ProductRepository;
use Illuminate\Console\Command;

class ImportProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:import {--id= : Import single product by ID}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import products from fakestoreapi --id= : Import single product by ID';
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        parent::__construct();
        $this->productRepository = $productRepository;
    }
    public function handle()
    {
        $id = $this->option('id');

        if ($id) {
            ImportProductsJob::dispatch($id, $this->productRepository);
            $this->info("Added job to import product with ID: $id. Start horizion");
        } else {
            ImportProductsJob::dispatch(null, $this->productRepository); 
            $this->info('Added job to import products. Start horizion');
        }
    }

}
