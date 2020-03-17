<?php

use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert([
        	['id'=>1,'email'=>'Duongtv2712@gmail.com', 'password'=>bcrypt('12345'), 'full'=>'DuongTV', 'phone'=>'0337694991', 'level'=>1,'address'=>'Tiền Hải - Thái Bình'],
        	['id'=>2,'email'=>'Duongga99@gmail.com', 'password'=>bcrypt('123456'), 'full'=>'DuongGA', 'phone'=>'0345694998', 'level'=>2,'address'=>'Vườn Cam - Hà Nội'],
        	

        ]);
    }
}
