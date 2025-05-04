<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('retorts', function (Blueprint $table) {
            $table->id('id_retort');
            $table->unsignedBigInteger('id_wellinfo');

            // SH Fields
            $table->decimal('rt_sh_sampledepth', 10, 2)->nullable();
            $table->string('rt_sh_sampletime', 255)->nullable();
            $table->decimal('rt_sh_emptycell', 10, 2)->nullable();
            $table->decimal('rt_sh_emptycellwetsamp', 10, 2)->nullable();
            $table->decimal('rt_sh_celldrycut', 10, 2)->nullable();
            $table->decimal('rt_sh_emptycylinder', 10, 2)->nullable();
            $table->decimal('rt_sh_watervolin', 10, 2)->nullable();
            $table->decimal('rt_sh_basefluidvolincyl', 10, 2)->nullable();
            $table->decimal('rt_sh_wtcylwaterbf', 10, 2)->nullable();
            $table->decimal('rt_sh_massofcutting', 10, 2)->nullable();
            $table->decimal('rt_sh_massofdry', 10, 2)->nullable();
            $table->decimal('rt_sh_wtofwaterbf', 10, 2)->nullable();
            $table->decimal('rt_sh_massofbf', 10, 2)->nullable();
            $table->decimal('rt_sh_mudoncutting', 10, 2)->nullable();
            $table->decimal('rt_sh_percofcutting', 10, 2)->nullable();
            $table->decimal('rt_sh_volbfoildisc', 10, 2)->nullable();
            $table->decimal('rt_sh_volmuddisc', 10, 2)->nullable();
            $table->decimal('rt_sh_ooc', 10, 2)->nullable();

            // CDU Fields
            $table->decimal('rt_cdu_sampledepth', 10, 2)->nullable();
            $table->string('rt_cdu_sampletime', 255)->nullable();
            $table->decimal('rt_cdu_emptycell', 10, 2)->nullable();
            $table->decimal('rt_cdu_emptycellwetsamp', 10, 2)->nullable();
            $table->decimal('rt_cdu_celldrycut', 10, 2)->nullable();
            $table->decimal('rt_cdu_emptycylinder', 10, 2)->nullable();
            $table->decimal('rt_cdu_watervolin', 10, 2)->nullable();
            $table->decimal('rt_cdu_basefluidvolincyl', 10, 2)->nullable();
            $table->decimal('rt_cdu_wtcylwaterbf', 10, 2)->nullable();
            $table->decimal('rt_cdu_massofcutting', 10, 2)->nullable();
            $table->decimal('rt_cdu_massofdry', 10, 2)->nullable();
            $table->decimal('rt_cdu_wtofwaterbf', 10, 2)->nullable();
            $table->decimal('rt_cdu_massofbf', 10, 2)->nullable();
            $table->decimal('rt_cdu_mudoncutting', 10, 2)->nullable();
            $table->decimal('rt_cdu_percofcutting', 10, 2)->nullable();
            $table->decimal('rt_cdu_volbfoildisc', 10, 2)->nullable();
            $table->decimal('rt_cdu_volmuddisc', 10, 2)->nullable();
            $table->decimal('rt_cdu_ooc', 10, 2)->nullable();

            // CF1 Fields
            $table->decimal('rt_cf1_sampledepth', 10, 2)->nullable();
            $table->string('rt_cf1_sampletime', 255)->nullable();
            $table->decimal('rt_cf1_emptycell', 10, 2)->nullable();
            $table->decimal('rt_cf1_emptycellwetsamp', 10, 2)->nullable();
            $table->decimal('rt_cf1_celldrycut', 10, 2)->nullable();
            $table->decimal('rt_cf1_emptycylinder', 10, 2)->nullable();
            $table->decimal('rt_cf1_watervolin', 10, 2)->nullable();
            $table->decimal('rt_cf1_basefluidvolincyl', 10, 2)->nullable();
            $table->decimal('rt_cf1_wtcylwaterbf', 10, 2)->nullable();
            $table->decimal('rt_cf1_massofcutting', 10, 2)->nullable();
            $table->decimal('rt_cf1_massofdry', 10, 2)->nullable();
            $table->decimal('rt_cf1_wtofwaterbf', 10, 2)->nullable();
            $table->decimal('rt_cf1_massofbf', 10, 2)->nullable();
            $table->decimal('rt_cf1_mudoncutting', 10, 2)->nullable();
            $table->decimal('rt_cf1_percofcutting', 10, 2)->nullable();
            $table->decimal('rt_cf1_volbfoildisc', 10, 2)->nullable();
            $table->decimal('rt_cf1_volmuddisc', 10, 2)->nullable();
            $table->decimal('rt_cf1_ooc', 10, 2)->nullable();

            // CF2 Fields
            $table->decimal('rt_cf2_sampledepth', 10, 2)->nullable();
            $table->string('rt_cf2_sampletime', 255)->nullable();
            $table->decimal('rt_cf2_emptycell', 10, 2)->nullable();
            $table->decimal('rt_cf2_emptycellwetsamp', 10, 2)->nullable();
            $table->decimal('rt_cf2_celldrycut', 10, 2)->nullable();
            $table->decimal('rt_cf2_emptycylinder', 10, 2)->nullable();
            $table->decimal('rt_cf2_watervolin', 10, 2)->nullable();
            $table->decimal('rt_cf2_basefluidvolincyl', 10, 2)->nullable();
            $table->decimal('rt_cf2_wtcylwaterbf', 10, 2)->nullable();
            $table->decimal('rt_cf2_massofcutting', 10, 2)->nullable();
            $table->decimal('rt_cf2_massofdry', 10, 2)->nullable();
            $table->decimal('rt_cf2_wtofwaterbf', 10, 2)->nullable();
            $table->decimal('rt_cf2_massofbf', 10, 2)->nullable();
            $table->decimal('rt_cf2_mudoncutting', 10, 2)->nullable();
            $table->decimal('rt_cf2_percofcutting', 10, 2)->nullable();
            $table->decimal('rt_cf2_volbfoildisc', 10, 2)->nullable();
            $table->decimal('rt_cf2_volmuddisc', 10, 2)->nullable();
            $table->decimal('rt_cf2_ooc', 10, 2)->nullable();

            // CF3 Fields
            $table->decimal('rt_cf3_sampledepth', 10, 2)->nullable();
            $table->string('rt_cf3_sampletime', 255)->nullable();
            $table->decimal('rt_cf3_emptycell', 10, 2)->nullable();
            $table->decimal('rt_cf3_emptycellwetsamp', 10, 2)->nullable();
            $table->decimal('rt_cf3_celldrycut', 10, 2)->nullable();
            $table->decimal('rt_cf3_emptycylinder', 10, 2)->nullable();
            $table->decimal('rt_cf3_watervolin', 10, 2)->nullable();
            $table->decimal('rt_cf3_basefluidvolincyl', 10, 2)->nullable();
            $table->decimal('rt_cf3_wtcylwaterbf', 10, 2)->nullable();
            $table->decimal('rt_cf3_massofcutting', 10, 2)->nullable();
            $table->decimal('rt_cf3_massofdry', 10, 2)->nullable();
            $table->decimal('rt_cf3_wtofwaterbf', 10, 2)->nullable();
            $table->decimal('rt_cf3_massofbf', 10, 2)->nullable();
            $table->decimal('rt_cf3_mudoncutting', 10, 2)->nullable();
            $table->decimal('rt_cf3_percofcutting', 10, 2)->nullable();
            $table->decimal('rt_cf3_volbfoildisc', 10, 2)->nullable();
            $table->decimal('rt_cf3_volmuddisc', 10, 2)->nullable();
            $table->decimal('rt_cf3_ooc', 10, 2)->nullable();

            // Cumulative
            $table->decimal('oil_recovered', 10, 2)->nullable();
            $table->decimal('mud_recovered', 10, 2)->nullable();
            $table->decimal('cum_oil', 10, 2)->nullable();
            $table->decimal('cum_mud', 10, 2)->nullable();

            $table->foreign('id_wellinfo')->references('id_wellinfo')->on('wellinfo')->onDelete('cascade');

            $table->timestamps();
        });

        // Insert default data
        $fields = Schema::getColumnListing('retorts');
        $data = ['id_retort' => 1, 'id_wellinfo' => 1, 'created_at' => now(), 'updated_at' => now()];

        foreach ($fields as $field) {
            if (!isset($data[$field]) && $field !== 'id_retort' && $field !== 'id_wellinfo' && $field !== 'created_at' && $field !== 'updated_at') {
                $data[$field] = 0.00;
            }
        }

        DB::table('retorts')->insert($data);
    }

    public function down(): void
    {
        Schema::dropIfExists('retorts');
    }
};
