<?php

use Illuminate\Database\Seeder;

class contact extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contact')->delete();
        DB::table('contact')->insert([
        	['id'=>1,'email'=>'duongtv2712@gmail.com', 'theme'=>'Admin dz', 'full'=>'Dương G-A','message'=>'admin dkz'],
        	

        ]);
    }
}
