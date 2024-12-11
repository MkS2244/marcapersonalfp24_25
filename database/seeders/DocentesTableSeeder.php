<?php

namespace Database\Seeders;

use App\Models\Docente;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DocentesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Model::unguard();
        Schema::disableForeignKeyConstraints();

        // llamadas a otros ficheros de seed
        Docente::truncate();
        Docente::factory(10)->create();
        // llamadas a otros ficheros de seed

        Model::reguard();

        Schema::enableForeignKeyConstraints();
    }
}
