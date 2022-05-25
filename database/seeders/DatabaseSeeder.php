<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Article;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TypeArticleTableSeeder::class);

        Article::factory(10)->create();
        Client::factory(10)->create();

        $this->call(RoleTableSeeder::class);
        $this->call(StatutVenteTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(DureeVenteTableSeeder::class);
    }
}
