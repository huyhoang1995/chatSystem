<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Nguyễn Huy Hoàng',
                'password' => app('hash')->make('123456'),
                'email' => 'hoangnh@newtel.vn',
            ],
        ]);
    }
}
