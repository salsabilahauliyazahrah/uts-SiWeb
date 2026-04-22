<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin1@gmail.com',
            'password' => bcrypt('admin123'),            
        ]);
        
        // DB::table('products')->insert([
        //     'user_id' => 1,
        //     'nama_produk' => 'Produk Shampo',
        //     'kode_produk' => 'PROD001',
        //     'stok' => 100,
        //     'harga' => 50000.00,
        // ]);
    }
}
