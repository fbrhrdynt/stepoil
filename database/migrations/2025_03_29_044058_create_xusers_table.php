<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('xusers', function (Blueprint $table) {
            $table->increments('id_user');
            $table->string('employee_id', 20);
            $table->string('employee_name');
            $table->string('email', 100)->nullable();
            $table->string('kode_login');
            $table->string('pass_login');
            $table->string('level', 20)->nullable();
            $table->integer('id_project')->nullable();
            $table->enum('status', ['Y', 'N'])->default('Y');
        });

        // Insert default data
        DB::table('xusers')->insert([
            [
                'id_user'        => 8,
                'employee_id'    => 'febroherdyanto',
                'employee_name'  => 'Febro Herdyanto Administrator',
                'email'          => 'febroherdyanto98@gmail.com',
                'kode_login'     => 'febroherdyanto',
                'pass_login'     => '$2y$10$pwSkaenz6t7QrGtPfuI.FOdoExWLf4r4lsQFCnL5TqDzTRfKoslDO', // hashed password
                'level'          => 'MASTER',
                'id_project'     => null,
                'status'         => 'Y',
            ],
            [
                'id_user'        => 10,
                'employee_id'    => 'H248044',
                'employee_name'  => 'Bobby Setiawan',
                'email'          => 'bobby.setiawan@halli.com',
                'kode_login'     => 'bobby.setiawan',
                'pass_login'     => bcrypt('default123'), // Gantilah sesuai kebutuhan
                'level'          => 'Supervisor',
                'id_project'     => 1,
                'status'         => 'Y',
            ],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('xusers');
    }
};
