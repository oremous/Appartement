<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DureeVenteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("duree_ventes")->insert([
            ["libelle" => "Journee", "valeurEnHeure" => 24],
            ["libelle" => "Demi-journee", "valeurEnHeure" => 12]
        ]);
    }
}
