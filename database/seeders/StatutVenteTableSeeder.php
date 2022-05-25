<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatutVenteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("statut_ventes")->insert([
            ["nom" => "En attente"],
            ["nom" => "En cours"],
            ["nom" => "Terminee"]
        ]);
    }
}
