<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAdditionalTable extends Migration
{
    public function up()
    {
        Schema::create('additional', function (Blueprint $table) {
            $table->increments('id_add'); // Primary Key
            $table->unsignedBigInteger('id_wellinfo'); // Foreign Key ke wellinfo

            $table->longText('bssactivity')->nullable();
            $table->longText('rigactivity')->nullable();
            $table->string('vctodryer_bbls', 10)->nullable();
            $table->string('vctodryer_m3', 10)->nullable();
            $table->string('vcfrdryer_bbls', 10)->nullable();
            $table->string('vcfrdryer_m3', 10)->nullable();
            $table->string('vcfrcf1_bbls', 10)->nullable();
            $table->string('vcfrcf1_m3', 10)->nullable();
            $table->string('vcfrcf2_bbls', 10)->nullable();
            $table->string('vcfrcf2_m3', 10)->nullable();
            $table->string('vcfrcf3_bbls', 10)->nullable();
            $table->string('vcfrcf3_m3', 10)->nullable();

            // Foreign key constraint
            $table->foreign('id_wellinfo')->references('id_wellinfo')->on('wellinfo')->onDelete('cascade');
        });

        // Insert default row with all "0" values and id_wellinfo = 1
        DB::table('additional')->insert([
            'id_add' => 1,
            'id_wellinfo' => 1,
            'bssactivity' => '0',
            'rigactivity' => '0',
            'vctodryer_bbls' => '0',
            'vctodryer_m3' => '0',
            'vcfrdryer_bbls' => '0',
            'vcfrdryer_m3' => '0',
            'vcfrcf1_bbls' => '0',
            'vcfrcf1_m3' => '0',
            'vcfrcf2_bbls' => '0',
            'vcfrcf2_m3' => '0',
            'vcfrcf3_bbls' => '0',
            'vcfrcf3_m3' => '0',
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('additional');
    }
}
