<?php

use App\Models\Admin\PanelMode;
use Illuminate\Database\Seeder;

class PanelModesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ID to zero
        PanelMode::truncate();

        // Create datas
        PanelMode::create([
            'mode' => 0
        ]);
    }
}
