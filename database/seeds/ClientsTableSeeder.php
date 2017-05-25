<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert(['client_name' => 'Client 1']);
        DB::table('clients')->insert(['client_name' => 'Client 2']);
        DB::table('clients')->insert(['client_name' => 'Client 3']);
    }
}
