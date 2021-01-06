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
            'paragraph' => 'Lorem Ipsum',
            'picture' => 'img/'
        ]);
    }
}
