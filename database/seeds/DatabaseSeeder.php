<?php

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
         $this->call(RolesTableSeeder::class);
         $this->call(UsersTableSeeder::class);
         $this->call(SectionsTableSeeder::class);
         $this->call(OtherSectionsTableSeeder::class);
        $this->call(LanguageKeywordsTableSeeder::class);
         $this->call(LanguagesTableSeeder::class);
         $this->call(PanelModesTableSeeder::class);
    }
}
