<?php

use Illuminate\Database\Seeder;

class CreateLanguages extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('languages')->insert(['name' => 'English', 'code' => 'en']);
        \DB::table('languages')->insert(['name' => 'Français', 'code' => 'fr']);
    }
}
