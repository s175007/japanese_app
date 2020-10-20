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
        // DB::table('administrators')->insert([
        //     'name' => 'Admin',
        //     'email' => "admin@gmail.com",
        //     'password' => Hash::make('123456')
        // ]);

        // DB::table('users')->insert([
        //     'first_name' => 'Họ',
        //     'last_name' => 'Tên',
        //     'email' => "user@gmail.com",
        //     'password' => Hash::make('123456')
        // ]);
    
        // DB::table('categories')->insert([
        //     'id' => "1",
        //     'name' => "みんなの日本語",
        // ]);

        // DB::table('categories')->insert([
        //     'id' => "2",
        //     'name' => "中級の日本語",
        // ]);

        // DB::table('books')->insert([
        //     'name' => "みんなの日本語　初級",
        //     'category_id' => "1",
        //     'img' => "",
        // ]);

        // DB::table('books')->insert([
        //     'name' => "みんなの日本語　中級",
        //     'category_id' => "1",
        //     'img' => "",
        // ]);

        // DB::table('books')->insert([
        //     'name' => "みんなの日本語　上級",
        //     'category_id' => "1",
        //     'img' => "",
        // ]);

        // DB::table('books')->insert([
        //     'name' => "中級の日本語 第一",
        //     'category_id' => "2",
        //     'img' => "",
        // ]);

        // DB::table('books')->insert([
        //     'name' => "中級の日本語 第二",
        //     'category_id' => "2",
        //     'img' => "",
        // ]);

        // for ($i = 0; $i < 500; $i ++){
        //     DB::table('categories')->insert([
        //         'name' => "Category" . $i,
        //     ]);
        // }

        // for ($i = 0; $i < 50; $i++) {
        //     DB::table('lessons')->insert([
        //         'name' => "みんなの日本語　Lesson" . ($i + 1),
        //         'book_id' => 2,
        //     ]);
        // }

        for ($i = 0; $i < 50; $i++) {
            DB::table('grammars')->insert([
                'title' => "Grammar " . ($i + 1),
                'mean' => "Mean Grammar " . ($i + 1),
                'using' => "Using Grammar " . ($i + 1),
                'lesson_id' => 2,
            ]);
        }
    }
}
