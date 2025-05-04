<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up()
    {
        Schema::create('personnel', function (Blueprint $table) {
            $table->id('id_personnel'); // Primary Key
            $table->unsignedBigInteger('id_wellinfo'); // Foreign Key

            // Day Shift (ds)
            for ($i = 1; $i <= 2; $i++) {
                $table->string("ds{$i}_name", 255)->nullable();
            }

            // Night Shift (ns)
            for ($i = 1; $i <= 2; $i++) {
                $table->string("ns{$i}_name", 255)->nullable();
            }

            // Foreign key constraint
            $table->foreign('id_wellinfo')->references('id_wellinfo')->on('wellinfo')->onDelete('cascade');

            $table->timestamps(); // created_at & updated_at
        });

        // Dummy insert: id_wellinfo = 1
        DB::table('personnel')->insert([
            'id_wellinfo' => 1,
            'ds1_name' => 'Person A',
            'ds2_name' => 'Person B',
            'ns1_name' => 'Person D',
            'ns2_name' => 'Person E',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('personnel');
    }
};
