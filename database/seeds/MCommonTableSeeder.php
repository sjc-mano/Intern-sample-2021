<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MCommonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_common')->insert([
            [
                'common_id'=>'00001',
                'common_name'=>'客先',
                'common_type_id'=>'01',
                'common_type_name'=>'客先01',
                'created_at'=>new Datetime(),
            ],
            [
                'common_id'=>'00001',
                'common_name'=>'客先',
                'common_type_id'=>'02',
                'common_type_name'=>'客先02',
                'created_at'=>new Datetime(),
            ],
            [
                'common_id'=>'00001',
                'common_name'=>'客先',
                'common_type_id'=>'03',
                'common_type_name'=>'客先03',
                'created_at'=>new Datetime(),
            ],
            [
                'common_id'=>'00001',
                'common_name'=>'客先',
                'common_type_id'=>'04',
                'common_type_name'=>'客先04',
                'created_at'=>new Datetime(),
            ],
            [
                'common_id'=>'00001',
                'common_name'=>'客先',
                'common_type_id'=>'05',
                'common_type_name'=>'客先05',
                'created_at'=>new Datetime(),
            ],
            [
                'common_id'=>'00001',
                'common_name'=>'客先',
                'common_type_id'=>'06',
                'common_type_name'=>'客先06',
                'created_at'=>new Datetime(),
            ],
            [
                'common_id'=>'00001',
                'common_name'=>'客先',
                'common_type_id'=>'07',
                'common_type_name'=>'客先07',
                'created_at'=>new Datetime(),
            ],
            [
                'common_id'=>'00001',
                'common_name'=>'客先',
                'common_type_id'=>'08',
                'common_type_name'=>'客先08',
                'created_at'=>new Datetime(),
            ],
            [
                'common_id'=>'00001',
                'common_name'=>'客先',
                'common_type_id'=>'09',
                'common_type_name'=>'客先09',
                'created_at'=>new Datetime(),
            ],
            [
                'common_id'=>'00001',
                'common_name'=>'客先',
                'common_type_id'=>'10',
                'common_type_name'=>'客先10',
                'created_at'=>new Datetime(),
            ],
            [
                'common_id'=>'00001',
                'common_name'=>'客先',
                'common_type_id'=>'11',
                'common_type_name'=>'客先11',
                'created_at'=>new Datetime(),
            ],
            [
                'common_id'=>'00002',
                'common_name'=>'箱種',
                'common_type_id'=>'01',
                'common_type_name'=>'箱種01',
                'created_at'=>new Datetime(),
            ],
            [
                'common_id'=>'00002',
                'common_name'=>'箱種',
                'common_type_id'=>'02',
                'common_type_name'=>'箱種02',
                'created_at'=>new Datetime(),
            ],
            [
                'common_id'=>'00002',
                'common_name'=>'箱種',
                'common_type_id'=>'03',
                'common_type_name'=>'箱種03',
                'created_at'=>new Datetime(),
            ],
            [
                'common_id'=>'00002',
                'common_name'=>'箱種',
                'common_type_id'=>'04',
                'common_type_name'=>'箱種04',
                'created_at'=>new Datetime(),
            ],
            [
                'common_id'=>'00002',
                'common_name'=>'箱種',
                'common_type_id'=>'05',
                'common_type_name'=>'箱種05',
                'created_at'=>new Datetime(),
            ],
            [
                'common_id'=>'00002',
                'common_name'=>'箱種',
                'common_type_id'=>'06',
                'common_type_name'=>'箱種06',
                'created_at'=>new Datetime(),
            ],
            [
                'common_id'=>'00002',
                'common_name'=>'箱種',
                'common_type_id'=>'07',
                'common_type_name'=>'箱種07',
                'created_at'=>new Datetime(),
            ],
            [
                'common_id'=>'00002',
                'common_name'=>'箱種',
                'common_type_id'=>'08',
                'common_type_name'=>'箱種08',
                'created_at'=>new Datetime(),
            ],
            [
                'common_id'=>'00002',
                'common_name'=>'箱種',
                'common_type_id'=>'09',
                'common_type_name'=>'箱種09',
                'created_at'=>new Datetime(),
            ],
            [
                'common_id'=>'00002',
                'common_name'=>'箱種',
                'common_type_id'=>'10',
                'common_type_name'=>'箱種10',
                'created_at'=>new Datetime(),
            ],
            [
                'common_id'=>'00002',
                'common_name'=>'箱種',
                'common_type_id'=>'11',
                'common_type_name'=>'箱種11',
                'created_at'=>new Datetime(),
            ]
        ]);
    }
}
