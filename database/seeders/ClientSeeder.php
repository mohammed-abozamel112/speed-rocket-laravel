<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        /* create clients 4 random clients
          'name_ar',
        'name_en',
        'description_ar',
        'description_en',
        'image',
        'status',
        'category_ar',
        'category_en', */
        $clients = [
            [
                'name_ar' => 'عميل 1',
                'name_en' => 'Client 1',
                'description_ar' => 'وصف العميل 1',
                'description_en' => 'Description of client 1',
                'image' => 'client1.jpg',
                'status' => 1,
                'category_ar' => 'فئة 1',
                'category_en' => 'Category 1',
            ],
            [
                'name_ar' => 'عميل 2',
                'name_en' => 'Client 2',
                'description_ar' => 'وصف العميل 2',
                'description_en' => 'Description of client 2',
                'image' => 'client2.jpg',
                'status' => 1,
                'category_ar' => 'فئة 2',
                'category_en' => 'Category 2',
            ],
            [
                'name_ar' => 'عميل 3',
                'name_en' => 'Client 3',
                'description_ar' => 'وصف العميل 3',
                'description_en' => 'Description of client 3',
                'image' => 'client3.jpg',
                'status' => 1,
                'category_ar' => 'فئة 3',
                'category_en' => 'Category 3',
            ],
            [
                'name_ar' => 'عميل 4',
                'name_en' => 'Client 4',
                'description_ar' => 'وصف العميل 4',
                'description_en' => 'Description of client 4',
                'image' => 'client4.jpg',
                'status' => 1,
                'category_ar' => 'فئة 4',
                'category_en' => 'Category 4',
            ],
        ];
        foreach ($clients as $client) {
            $client['image'] = 'clients/' . $client['image'];
            Client::create($client);
        }
    }
}
