<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class UserReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_reviews')->insert([
            'user_id' => 1,
            'review' => "Dat was echt niet hard van jou man boro",
        ]);


    }
}
