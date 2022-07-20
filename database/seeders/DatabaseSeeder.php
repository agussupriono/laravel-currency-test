<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\User::factory()->create([
            'name' => 'Agus Supriono',
            'email' => 'agus.supriono@gmail.com',
            'password' => '$2y$10$WftD1gIIECnJFIoZ1.3Km.7swtZsF.xn7NRb.ivJDmMooLveaGCvO'
        ]);

        \App\Models\currency_rates::factory()->create(
            ['code' => 'EUR','name' => 'Euro','rate' => '1','date' => '2022-07-19']
        );
        \App\Models\currency_rates::factory()->create(
            ['code' => 'USD','name' => 'US dollar','rate' => '1.0245','date' => '2022-07-19']
        );
        \App\Models\currency_rates::factory()->create(
            ['code' => 'JPY','name' => 'Japanese yen','rate' => '141.01','date' => '2022-07-19']
        );
    }
}
