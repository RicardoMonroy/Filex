<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SlidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sliders')->insert([
            'title' => '¡Olvidate de los papeles!',
            'subtitle' => 'Filex, gestión de firmas digitales.',
            'paragraph' => 'lorem ipsum',
            'banner' => 'Sliders/Banner1.png',
            'margin' => 'center'
        ]);

        DB::table('sliders')->insert([
            'title' => 'Filex',
            'subtitle' => 'Un lugar para firmar tus documentos.',
            'paragraph' => 'lorem ipsum',
            'banner' => 'Sliders/Banner2.png',
            'margin' => 'left'
        ]);

        DB::table('sliders')->insert([
            'title' => 'No corras riesgos',
            'subtitle' => 'Utililiza Filex.',
            'paragraph' => 'lorem ipsum',
            'banner' => 'Sliders/Banner3.png',
            'margin' => 'right'
        ]);

        DB::table('sliders')->insert([
            'title' => 'Aqui podras encontrar',
            'subtitle' => 'Los mejores planes',
            'paragraph' => 'Texto informativo',
            'banner' => 'Sliders/Banner4.png',
            'margin' => 'center'
        ]);
    }
}
