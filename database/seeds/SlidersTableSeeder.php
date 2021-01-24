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
            'subtitle' => 'Una plataforma para firmar tus documentos',
            'paragraph' => 'legales con firma electrónica, de forma sencilla y con validez legal',
            'banner' => 'Sliders/Banner1.png',
            'margin' => 'center'
        ]);

        DB::table('sliders')->insert([
            'title' => 'Filex',
            'subtitle' => 'Una plataforma para firmar tus documentos',
            'paragraph' => 'legales con firma electrónica, de forma sencilla y con validez legal',
            'banner' => 'Sliders/Banner2.png',
            'margin' => 'left'
        ]);

        DB::table('sliders')->insert([
            'title' => 'Filex',
            'subtitle' => 'Una plataforma para firmar tus documentos',
            'paragraph' => 'legales con firma electrónica, de forma sencilla y con validez legal',
            'banner' => 'Sliders/Banner3.png',
            'margin' => 'right'
        ]);

        DB::table('sliders')->insert([
            'title' => 'Filex',
            'subtitle' => 'Una plataforma para firmar tus documentos',
            'paragraph' => 'legales con firma electrónica, de forma sencilla y con validez legal',
            'banner' => 'Sliders/Banner4.png',
            'margin' => 'center'
        ]);
    }
}
