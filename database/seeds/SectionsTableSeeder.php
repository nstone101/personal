<?php

use App\Models\Admin\Section;
use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ID to zero
        Section::truncate();

        // Create datas
        Section::create([
            'heading' => 'My Resume',
            'description' => 'If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text..',
            'section' => 'resume',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'heading' => 'My Skills',
            'description' => 'If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.',
            'section' => 'skills',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'heading' => 'My Services',
            'description' => 'If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.',
            'section' => 'services',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'heading' => 'My Works',
            'description' => 'If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.',
            'section' => 'works',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'heading' => 'My Clients',
            'description' => 'If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.',
            'section' => 'clients',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'heading' => 'My Gallery',
            'description' => 'If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.',
            'section' => 'gallery',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'heading' => 'My Team',
            'description' => 'If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.',
            'section' => 'team',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'heading' => 'My Blogs',
            'description' => 'If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.',
            'section' => 'blogs',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'heading' => 'Contact Me',
            'description' => 'If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.',
            'section' => 'contact',
            'status' => 1
        ]);

    }
}
