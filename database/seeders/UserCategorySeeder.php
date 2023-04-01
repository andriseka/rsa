<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_categories')->insert(
            [
                'name' => 'IPNU',
                'slug' => 'ipnu'
            ],
        );
        DB::table('user_categories')->insert(
            [
                'name' => 'IPPNU',
                'slug' => 'ippnu'
            ],
        );
    }
}
