<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoDocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tipo_docs')->insert([
            [
                'initials' => 'CC',
                'description' => 'Cedula de Ciudadania',
                'state' => 1,
            ],
            [
                'initials' => 'CE',
                'description' => 'Cedula de Extranjeria',
                'state' => 1,
            ],
            [
                'initials' => 'NIT',
                'description' => 'Nit',
                'state' => 1,
            ],
        ]);
    }
}
