<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('admin')->insert([
            'id_admin' => 'adm1',
            'nama' => 'admin1',
            'username' => 'admin1',
            'password' => Hash::make('admin1'),
        ]);

        $this->call([
            ArticleSeeder::class,
        ]);
    }
}
