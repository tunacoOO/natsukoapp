<?php

namespace Database\Seeders;

use App\Models\TimeCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        DB::table('time_categories')->insert([
            'name' => '朝食',
            'code' =>'breakfast'
        ]);
        DB::table('time_categories')->insert([
            'name' => '昼食',
            'code' => 'lunch'
        ]);
        DB::table('time_categories')->insert([
            'name' => '夕食',
            'code' => 'dinner'
        ]);
        DB::table('time_categories')->insert([
            'name' => 'アフタヌーンティー',
            'code' => 'afternoontea'
        ]);
        DB::table('time_categories')->insert([
            'name' => 'ルームサービス',
            'code' => 'roomservice'
        ]);
           
            
        
    }
}