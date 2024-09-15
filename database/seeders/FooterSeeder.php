<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Db::table('footers')->insert([
            'phone' => '+201010232458',
            'description' => 'welcome, we are happy to see you here',
            'address' => 'abo Zahran street, east Samalout, El-minya City ',
            'email' => 'aliabdulbaqi01@gmail.com',
            'facebook' => 'https://www.facebook.com/',
            'twitter' => 'https://twitter.com/',
            'copyright' => 'copyright by Ali Ahmed Dev',
        ]);
    }
}
