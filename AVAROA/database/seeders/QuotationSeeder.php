<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Quotation;

class QuotationSeeder extends Seeder {
    public function run() {
        Quotation::factory(10)->create(); // Generate 10 fake quotations
    }
}
