<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('todos')->get()->count() == 0) {
            DB::table('todos')->insert([
                [
                    'title'=>'Bai tap Java',
                    'description'=>'Cần nộp tiến độ hoàn thành hàng tuần',
                    'status'=>"ACTIVE",
                    'created_at'=>date('Y-m-d H:i:s'),
                    'updated_at'=>date('Y-m-d H:i:s'),
                ],
                ['title'=>'Bài tập Toan',
                    'description'=>'Cần nộp dung han',
                    'status'=>"DONE",
                    'created_at'=>date('Y-m-d H:i:s'),
                    'updated_at'=>date('Y-m-d H:i:s'),
                ],
                ['title'=>'Bài tập C#',
                    'description'=>'Kha kho de hoan thanh',
                    'status'=>"DELETED",
                    'created_at'=>date('Y-m-d H:i:s'),
                    'updated_at'=>date('Y-m-d H:i:s'),
                ]
            ]);
        }
    }
}
