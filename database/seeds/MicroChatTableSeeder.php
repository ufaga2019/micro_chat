<?php

use Illuminate\Database\Seeder;

class MicroChatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\MicroChats::create([
         'object_id' =>'1',
         'message'=>'New Message',
         'alias'=>'client',
         'by'=>'\app\Models\MicroChats',

        ]);

        \App\Models\MicroChats::create([
            'object_id' =>'2',
            'message'=>'Last Message',
            'alias'=>'client',
            'by'=>'\app\Models\MicroChats',

        ]);
    }
}
