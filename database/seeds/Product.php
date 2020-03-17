<?php

use Illuminate\Database\Seeder;

class Product extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->delete();
        DB::table('product')->insert([
        	['id'=>1,'code'=>'SP01', 'name'=>'Áo Nữ Sơ Mi Chấm Bi', 'slug'=>'ao-nu-so-mi-cham-pi', 'price'=>500000, 'featured'=>1,'state'=>1,'img'=>'Ao-nu-so-mi-cham-pi.jpg','category_id'=>6],
        	['id'=>2,'code'=>'SP02', 'name'=>'Áo Nữ Phối Viền', 'slug'=>'ao-nu-phoi-vien', 'price'=>400000, 'featured'=>1,'state'=>0,'img'=>'Ao-nu-phoi-vien.jpg','category_id'=>6],

        ]);
    }
}
