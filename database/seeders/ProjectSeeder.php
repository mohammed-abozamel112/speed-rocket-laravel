<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* create 3 projects with names Decor Fid ,Fid and Address printer according to model
        'title_ar',
        'title_en',
        'description_ar',
        'description_en',
        'image',
        'external_url',
        'github_url',
        'category_ar',
        'category_en',
        */
        $projects = [
            [
            'title_ar' => 'ديكور فيد',
            'title_en' => 'Decor Fid',
            'description_ar' => 'وصف ديكور فيد',
            'description_en' => 'Description of Decor Fid',
            'image' => 'decor_fid.png',
            'external_url' => 'https://example.com/decor-fid',
            'github_url' => 'https://github.com/example/decor-fid',
            'category_ar' => 'فئة ديكور',
            'category_en' => 'Decor Category',
            ],
            [
            'title_ar' => 'فيد',
            'title_en' => 'Fid',
            'description_ar' => 'وصف فيد',
            'description_en' => 'Description of Fid',
            'image' => 'fid.png',
            'external_url' => 'https://example.com/fid',
            'github_url' => 'https://github.com/example/fid',
            'category_ar' => 'فئة فيد',
            'category_en' => 'Fid Category',
            ],
            [
            'title_ar' => 'طابعة العنوان',
            'title_en' => 'Address Printer',
            'description_ar' => 'وصف طابعة العنوان',
            'description_en' => 'Description of Address Printer',
            'image' => 'address_printer.png',
            'external_url' => 'https://example.com/address-printer',
            'github_url' => 'https://github.com/example/address-printer',
            'category_ar' => 'فئة طابعة العنوان',
            'category_en' => 'Address Printer Category',
            ],
        ];

        foreach ($projects as $project) {
            Project::create([
            ...$project,
            'image' => asset('storage/' . $project['image']),
            ]);
        }


    }
}
