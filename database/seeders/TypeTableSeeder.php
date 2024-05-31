<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [':-)', ':-(',':-|'];
        foreach($data as $item){
           $new_item = new Type();
           $new_item->name = $item;
           $new_item->save();
        }
    }
}
