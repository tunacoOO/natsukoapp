<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
       
        DB::table('categories')->insert([
            'name' => '和食',
            'code' => 'japanese'
        ]);
        DB::table('categories')->insert([
            'name' => '中華',
            'code' => 'chinese'
        ]);
        DB::table('categories')->insert([
            'name' => 'フレンチ',
            'code' => 'french'
        ]);
        DB::table('categories')->insert([
            'name' => 'イタリアン',
            'code' =>'italian'
        ]);
        DB::table('categories')->insert([
            'name' => 'ブッフェ',
            'code' => 'buffet'
        ]);
           
            
        
    }
}
