<?php

use App\Models\Admin\Language;
use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ID to zero
        Language::truncate();

        // Create datas
        Language::create([
            'language_name' => 'English',
            'language_code' => 'en',
            'status' => 1
        ]);
    }
}
