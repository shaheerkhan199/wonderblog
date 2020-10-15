<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cats = [
            ['categoryName' => 'Social Life'],
            ['categoryName' => 'Inflation'],
            ['categoryName' => 'Politics'],
            ['categoryName' => 'Entertainment'],
            ['categoryName' => 'Health'],
            ['categoryName' => 'Science and Technology'],
        ];
        // DB::table('categories')->insert([
        //     'categoryName' => 'Inflation',
        // ]);
        foreach($cats as $cat){
            Category::create($cat);
        }

    }
}
