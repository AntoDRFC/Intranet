<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert(['type' => 'FTP']);
        DB::table('types')->insert(['type' => 'Remote Desktop']);
        DB::table('types')->insert(['type' => 'Domain Control Panel']);
        DB::table('types')->insert(['type' => 'VNC']);
        DB::table('types')->insert(['type' => 'Windows Login']);
        DB::table('types')->insert(['type' => 'Vivid CMS']);
        DB::table('types')->insert(['type' => 'Live Hosting Date']);
        DB::table('types')->insert(['type' => 'Resource']);
        DB::table('types')->insert(['type' => 'Router']);
        DB::table('types')->insert(['type' => 'Google Email']);
        DB::table('types')->insert(['type' => 'Server Login']);
        DB::table('types')->insert(['type' => 'ADSL']);
        DB::table('types')->insert(['type' => 'Bootroom CMS']);
        DB::table('types')->insert(['type' => 'Blog']);
        DB::table('types')->insert(['type' => 'VPN']);
        DB::table('types')->insert(['type' => 'Database']);
        DB::table('types')->insert(['type' => 'SVN']);
        DB::table('types')->insert(['type' => 'Google Account']);
        DB::table('types')->insert(['type' => 'Twitter']);
        DB::table('types')->insert(['type' => 'Payment Gateway']);
        DB::table('types')->insert(['type' => 'Wordpress']);
        DB::table('types')->insert(['type' => 'NOP Login']);
        DB::table('types')->insert(['type' => 'Hosting Start Date']);
        DB::table('types')->insert(['type' => 'Built With']);
    }
}
