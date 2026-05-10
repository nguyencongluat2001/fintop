<?php

namespace Database\Seeders;

use Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder  extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $item = [
            'id'=> (string)\Str::uuid(),
            'name' => 'Nguyễn Công Luật',
            'email' => 'FinTop.BAShare@gmail.com',
            'password'=> Hash::make('123'),
            'status'=> 1,
            'role'=> 'ADMIN',
            'order' =>1
        ];
        // $item = [
        //     // 'id'=> (string)\Str::uuid(),
        //     'name' => 'Nguyễn Công Luật',
        //     'email' => 'nguyencongluat092001@gmail.com',
        //     'password'=> Hash::make('123'),
        //     'status'=> 1,
        //     'role'=> 'USERS',
        //     'order' =>1
        // ];
        DB::table('users')->insert($item);
    }

    // docker compose exec fintop_php php artisan db:seed --class=CateSeeder

    // docker compose exec fintop_php php artisan migrate:fresh --seed        chạy lại tất cả bảng
}