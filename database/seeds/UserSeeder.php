<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$insertUserList = array();
        $insertUserList[] = array('email'=>'liamdemafelix.n@gmail.com',
			        				'first_name'=>'Liam',
			        				'last_name'=>'Demafelix',
			        				'mobile_number'=>'0929819201',
			        				'password'=>bcrypt('123456'),
			        				'user_type_id'=>1,
			        				'created_at'=>date('Y-m-d'),
			        				'updated_at'=>date('Y-m-d'),
			                        'is_active'=>1,
			                        'created_by'=>null,
			                        'updated_by'=>null);
        $insertUserList[] = array('email'=>'rsbarrato@gmail.com',
			        				'first_name'=>'Raymond',
			        				'last_name'=>'Barrato',
			        				'mobile_number'=>'0929819201',
			        				'password'=>bcrypt('123456'),
			        				'user_type_id'=>1,
			        				'created_at'=>date('Y-m-d'),
			        				'updated_at'=>date('Y-m-d'),
			                        'is_active'=>1,
			                        'created_by'=>null,
			                        'updated_by'=>null);
       	 $insertUserList[] = array('email'=>'prinz03@gmail.com',
			        				'first_name'=>'Prince',
			        				'last_name'=>'Juliano',
			        				'mobile_number'=>'0929819201',
			        				'password'=>bcrypt('123456'),
			        				'user_type_id'=>1,
			        				'created_at'=>date('Y-m-d'),
			        				'updated_at'=>date('Y-m-d'),
			                        'is_active'=>1,
			                        'created_by'=>null,
			                        'updated_by'=>null);
    	DB::table('users')->insert($insertUserList);
    }
}
