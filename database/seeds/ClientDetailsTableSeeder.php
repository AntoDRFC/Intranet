<?php

use Illuminate\Database\Seeder;

class ClientDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('client_details')->insert([
        	'client_id' => '1',
        	'type_id' => '24',
        	'url' => 'http://www.companyone.com',
        	'description' => 'Wordpress',
        	'username' => '',
        	'password' => ''
        ]);

        DB::table('client_details')->insert([
        	'client_id' => '1',
        	'type_id' => '1',
        	'url' => 'ftp.companyone.com',
        	'description' => 'FTP Login',
        	'username' => 'company_ftp',
        	'password' => '6cOAuIRoUM'
        ]);

        DB::table('client_details')->insert([
        	'client_id' => '1',
        	'type_id' => '8',
        	'url' => 'http://www.companyone.com/wp-admin',
        	'description' => 'Wordpress Admin Login',
        	'username' => 'admin',
        	'password' => 'owOY7BRae0'
        ]);
    }
}
