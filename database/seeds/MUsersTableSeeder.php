<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MUsersTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_users')->insert([
            [
                'user_id'=>'testUser1',
                'user_name'=>'テスト1',
                'user_pass'=>Hash::make('test1'),
                'mail_address'=>'test1@aaa.bb',
                'created_at'=>new DateTime(),
                'updated_at'=>new DateTime(),
                'delete_flg'=>0
            ],
            [
                'user_id'=>'testUser2',
                'user_name'=>'テスト2',
                'user_pass'=>Hash::make('test2'),
                'mail_address'=>'test2@aaa.bb',
                'created_at'=>new Datetime(),
                'updated_at'=>new DateTime(),
                'delete_flg'=>0
            ]
        ]);
    }
}
