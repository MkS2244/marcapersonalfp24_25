<?php

namespace Database\Seeders;

use App\Models\Empresa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpresasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Empresa::truncate();

        if(Empresa::count() == 0) {
            if(config('app.env') ==='local'){
                Empresa::factory(10)->create();
                Empresa::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                ]);
            }
        }
    }
}
