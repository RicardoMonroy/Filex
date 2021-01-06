<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CharacteristicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('characteristics')->insert([
            'icon' => 'fas fa-file-signature',
            'description' => 'Firma de forma segura todos tus documentos.',
            'about_id' => 1
        ]);

        DB::table('characteristics')->insert([
            'icon' => 'fas fa-file-medical',
            'description' => 'Lleva un historial de tus firmas.',
            'about_id' => 1
        ]);

        DB::table('characteristics')->insert([
            'icon' => 'fas fa-mail-bulk',
            'description' => 'Invita a usuarios a firmar de forma segura.',
            'about_id' => 1
        ]);
    }
}
