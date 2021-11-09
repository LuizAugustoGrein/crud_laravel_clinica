<?php

use Illuminate\Database\Seeder;

class CargosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cargos')->insert([
            'nome_cargo' => "Secretaria(o)",
            'desc_cargo' => "Sem descrição cadastrada!"
        ]);
    }
}
