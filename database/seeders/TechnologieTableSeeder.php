<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technologie;

class TechnologieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ['HTML', 'CSS','VueJS', 'PHP', 'Laravel'];
        foreach($data as $item){
           $new_item = new Technologie();
           $new_item->name = $item;
          $new_item->save();
        }
    }
}
