<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jurnalistik;
use App\Models\Sastra;
use App\Models\Fotografi;
use App\Models\CategoryJurnalistik;
use App\Models\CategorySastra;
use App\Models\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::create([
        //     'name' => 'Oka Rhahul Akhmad',
        //     'email' => 'akhmadrahul@gmail.com',
        //     'password' => bcrypt('oka123')
        // ]);

        User::create([
            'name' => 'LPM Pena Muda',
            'email' => 'penamudaofficially@gmail.com',
            'username' => 'lpm_penamuda',
            'password' => bcrypt('penamuda123')
        ]);

        // User::factory(5)->create();

        CategoryJurnalistik::create([
            'name' => 'Hardnews',
            'slug' => 'hardnews',
        ]);

        CategoryJurnalistik::create([
            'name' => 'Softnews',
            'slug' => 'softnews'
        ]);

        CategoryJurnalistik::create([
            'name' => 'Opini',
            'slug' => 'opini'
        ]);

        CategorySastra::create([
            'name' => 'Cerpen',
            'slug' => 'cerpen'
        ]);

        CategorySastra::create([
            'name' => 'Puisi',
            'slug' => 'puisi'
        ]);

        CategorySastra::create([
            'name' => 'Quotes',
            'slug' => 'quotes'
        ]);
        

        Jurnalistik::factory(20)->create();
        Sastra::factory(20)->create();
        Fotografi::factory(5)->create();
        
    }
}
