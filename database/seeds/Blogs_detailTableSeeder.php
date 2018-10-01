<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Blogs_detailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs_detail')->insert([
            'title' => str_random(10),
            'detail' => str_random(10),
            
        ]);
    }
}
