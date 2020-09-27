<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id' => "1",
            'name' => "みんなの日本語",
        ]);

        DB::table('books')->insert([
            'name' => "みんなの日本語　初級",
            'category_id' => "1",
            'img' => "",
        ]);

        DB::table('books')->insert([
            'name' => "みんなの日本語　中級",
            'category_id' => "1",
            'img' => "",
        ]);

        DB::table('books')->insert([
            'name' => "みんなの日本語　上級",
            'category_id' => "1",
            'img' => "",
        ]);
    }
}
