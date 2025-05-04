<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateWellinfoTable extends Migration
{
    public function up()
    {
        Schema::create('wellinfo', function (Blueprint $table) {
            $table->id('id_wellinfo');
            $table->date('curdate')->nullable();
            $table->unsignedBigInteger('id_project');
            $table->string('platform', 100)->nullable();
            $table->string('wellname', 100)->nullable();
            $table->date('spud_date')->nullable();
            $table->string('location', 100)->nullable();
            $table->string('companyman', 255)->nullable();
            $table->string('oim', 100)->nullable();
            $table->string('mudeng', 255)->nullable();
            $table->string('urut', 20)->nullable();
            $table->enum('lockreport', ['YES', 'NO'])->default('NO');
            $table->timestamps();

            $table->foreign('id_project')->references('id_project')->on('projects')->onDelete('cascade');
        });

        // ✅ Insert initial data (id_project = 1, semua nilai 0 atau kosong)
        DB::table('wellinfo')->insert([
            'id_wellinfo' => 1,
            'curdate'     => now(),
            'id_project'  => 1,
            'platform'    => '0',
            'wellname'    => '0',
            'spud_date'   => now(),
            'location'    => '0',
            'companyman'  => '0',
            'oim'         => '0',
            'mudeng'      => '0',
            'urut'        => '1',
            'lockreport'  => 'NO',
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('wellinfo');
    }
}
