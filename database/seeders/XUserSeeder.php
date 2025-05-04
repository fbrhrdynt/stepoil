<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class XUserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('xusers')->insert([
            [
                'employee_id'    => 'febroherdyanto',
                'employee_name'  => 'Febro Herdyanto Adminsitrator',
                'email'          => 'febroherdyanto98@gmail.com',
                'kode_login'     => 'febroherdyanto',
                'pass_login'     => '$2y$10$pwSkaenz6t7QrGtPfuI.FOdoExWLf4r4lsQFCnL5TqDzTRfKoslDO', // already hashed
                'level'          => 'MASTER',
                'id_project'     => null,
                'status'         => 'Y',
            ],
            [
                'employee_id'    => 'H248044',
                'employee_name'  => 'Bobby Setiawan',
                'email'          => 'bobby.setiawan@halli.com',
                'kode_login'     => 'bobby.setiawan',
                'pass_login'     => Hash::make('password123'), // replace with real password
                'level'          => 'Supervisor',
                'id_project'     => null,
                'status'         => 'Y',
            ],
        ]);
    }
}
