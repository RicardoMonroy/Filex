<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plans')->insert([
            'title' => 'Plan FILEX Premium',
            'identifier' => 'Premium',
            'stripe_id' => 'price_1IDFbPKYWi6uPg51ZU3knGTj',
        ]);

        DB::table('plans')->insert([
            'title' => 'Plan FILEX Básico',
            'identifier' => 'Básico',
            'stripe_id' => 'price_1IDFOaKYWi6uPg51beIFrspu',
        ]);
    }
}
