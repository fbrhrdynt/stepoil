<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id('id_project'); // Primary Key
            $table->string('contract', 20)->nullable();
            $table->string('operator_name', 255)->nullable();
            $table->string('drillingrig', 255)->nullable();
            $table->text('logo')->nullable(); // Path logo
            $table->string('wellname', 255)->nullable();
            $table->unsignedInteger('kodeakses')->nullable();

            $table->index('kodeakses');
            $table->timestamps();
        });

        // 👇 Seed data langsung saat migrasi
        DB::table('projects')->insert([
            [
                'id_project'     => 1,
                'contract'       => 'CO12344',
                'operator_name'  => 'MEDCO',
                'drillingrig'    => 'GRISSIK',
                'logo'           => 'CO12344.jpeg',
                'wellname'       => 'GRS-001',
                'kodeakses'      => 60321,
                'created_at'     => now(),
                'updated_at'     => '2025-04-01 00:07:21',
            ],
            [
                'id_project'     => 33,
                'contract'       => 'SLB001',
                'operator_name'  => 'Schlumberger',
                'drillingrig'    => 'MI Swaco',
                'logo'           => 'SLB001.jpg',
                'wellname'       => 'Cikarang',
                'kodeakses'      => 79720,
                'created_at'     => '2025-04-01 00:03:33',
                'updated_at'     => '2025-04-01 00:07:05',
            ]
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
