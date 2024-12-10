<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Models\GeneratedTag;
use Illuminate\Console\Command;

class AdjustCompanyId extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'adjust:company_id';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ajusta os company_id das tabelas filho';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $generated_tags = GeneratedTag::all();

        foreach ($generated_tags as $key => $value) {
            $product = Product::find($value->product_id);

            $value->company_id = $product->company_id;
            $value->save();
        }
    }
}
