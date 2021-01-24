<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert([
            'paragraph' => 'Puedes ponerte en contacto con nosotros, podemos resolver tus dudas.',
            'address' => '123 calle CDMX, México.',
            'addressPhone' => '555 5 123 152',
            'addressMovil' => '444 2 123 456',
            'emailSupport' => 'support@filex.com',
            'emailSales' => 'sales@filex.com',
            'emailContact' => 'contact@filex.com'
        ]);
    }
}
