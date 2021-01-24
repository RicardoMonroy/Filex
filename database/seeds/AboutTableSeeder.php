<?php

use Illuminate\Database\Seeder;

class AboutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('abouts')->insert([
            'title' => 'Con Filex',
            'subtitleLeft' => 'Podras firmar',
            'subtitleRight' => 'de forma digital',
            'paragraph' => 'FILEX® es una plataforma 100% mexicana para la firma de documentos legales con firma electrónica, de una manera fácil, segura y legal.',
            'picture' => 'Images/Brand1.png'
        ]);
    }
}
