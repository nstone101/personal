<?php

use App\Models\Admin\OtherSection;
use Illuminate\Database\Seeder;

class OtherSectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ID to zero
        OtherSection::truncate();

        // Create datas
        OtherSection::create([
            'section' => 'about_me',
            'status' => 1
        ]);

        // Create datas
        OtherSection::create([
            'section' => 'counter',
            'status' => 1
        ]);

        // Create datas
        OtherSection::create([
            'section' => 'why_choose',
            'status' => 1
        ]);

        // Create datas
        OtherSection::create([
            'section' => 'sponsor',
            'status' => 1
        ]);

        // Create datas
        OtherSection::create([
            'section' => 'pages',
            'status' => 0
        ]);

        // Create datas
        OtherSection::create([
            'section' => 'call_to_action',
            'status' => 1
        ]);

        // Create datas
        OtherSection::create([
            'section' => 'special_section',
            'status' => 0
        ]);

        // Create datas
        OtherSection::create([
            'section' => 'preloader',
            'status' => 1
        ]);

        // Create datas
        OtherSection::create([
            'section' => 'featured_mode',
            'status' => 0
        ]);

        // Create datas
        OtherSection::create([
            'section' => 'maintenance_mode',
            'status' => 0
        ]);

        // Create datas
        OtherSection::create([
            'section' => 'rtl_mode',
            'status' => 0
        ]);

    }
}
