<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->id('id_details');
            $table->unsignedBigInteger('id_wellinfo')->index(); // Relasi ke wellinfo

            $table->string('mudcheck_type', 100)->nullable();
            $table->string('depth_each', 10)->nullable();
            $table->float('depth1bef')->nullable();
            $table->float('bitsize')->nullable();
            $table->string('bittype', 30)->nullable();
            $table->float('washout')->nullable();
            $table->float('mudweight')->nullable();
            $table->string('mwunit', 20)->nullable();
            $table->float('curdepth')->nullable();
            $table->float('volholedrill')->nullable();
            $table->string('volholeunit', 20)->nullable();
            $table->float('avgrop')->nullable();
            $table->float('lgsactive')->nullable();
            $table->date('datenow')->nullable();
            $table->float('cirrategpm')->nullable();
            $table->float('hgsactive')->nullable();
            $table->float('sgbasefluid')->nullable();
            $table->string('fluidtype', 100)->nullable();
            $table->string('rigpresentact', 200)->nullable();
            $table->float('activesysvol')->nullable();
            $table->float('pv')->nullable();
            $table->float('yp')->nullable();
            $table->float('sandcontent')->nullable();
            $table->float('basefluid')->nullable();
            $table->float('chlorides')->nullable();
            $table->float('mudtemp')->nullable();
            $table->string('tempunit', 20)->nullable();
            $table->string('categories1', 20)->nullable();
            $table->float('categories2')->nullable();
            $table->float('sgdrillsolid')->nullable();

            // Shaker
            for ($i = 1; $i <= 6; $i++) {
                $table->string("sh{$i}_name", 200)->nullable();
                $table->string("sh{$i}_model", 200)->nullable();
                $table->string("sh{$i}_screensize", 255)->nullable();
                $table->string("sh{$i}_runninghour", 10)->nullable();
            }

            $table->string("screens_changed", 200)->nullable();
            // Centrifuge
            for ($i = 1; $i <= 3; $i++) {
                $table->string("cf{$i}_sn", 20)->nullable();
                $table->string("cf{$i}_model", 50)->nullable();
                $table->string("cf{$i}_modeofopr", 100)->nullable();
                $table->float("cf{$i}_weirplate")->nullable();
                $table->float("cf{$i}_bowlspeed")->nullable();
                $table->float("cf{$i}_bowlconv")->nullable();
                $table->string("cf{$i}_feedsuc", 100)->nullable();
                $table->string("cf{$i}_effluentreturn", 100)->nullable();
                $table->string("cf{$i}_underflow", 100)->nullable();
                $table->float("cf{$i}_runninghour")->nullable();
                $table->float("cf{$i}_feedinrate")->nullable();
                $table->float("cf{$i}_feedindensity")->nullable();
                $table->float("cf{$i}_centratedens")->nullable();
                $table->float("cf{$i}_cakediscdens")->nullable();
                $table->string("cf{$i}_centratereturn", 20)->nullable();
                $table->string("cf{$i}_cakediscflow", 20)->nullable();
                $table->string("cf{$i}_masscake", 20)->nullable();
                $table->string("cf{$i}_volcake", 20)->nullable();
            }

            // CDU
            for ($i = 1; $i <= 2; $i++) {
                $table->string("cdu{$i}_sn", 100)->nullable();
                $table->string("cdu{$i}_model", 100)->nullable();
                $table->float("cdu{$i}_screensize")->nullable();
                $table->float("cdu{$i}_runninghour")->nullable();
                $table->float("cdu{$i}_centrateppg")->nullable();
                $table->float("cdu{$i}_scroll")->nullable();
                $table->float("cdu{$i}_sampledepth")->nullable();
            }

            $table->timestamps();
            // Foreign Key Constraint
            $table->foreign('id_wellinfo')
                ->references('id_wellinfo')
                ->on('wellinfo')
                ->onDelete('cascade'); // << Ini yang penting
        });

        // Dummy record with all fields set to "0" or null
        $insertData = [
            'id_wellinfo' => 1,
            'depth1bef' => 0, 'bitsize' => 0, 'washout' => 0, 'mudweight' => 0,
            'curdepth' => 0, 'volholedrill' => 0, 'avgrop' => 0, 'lgsactive' => 0,
            'cirrategpm' => 0, 'hgsactive' => 0, 'sgbasefluid' => 0, 'activesysvol' => 0,
            'pv' => 0, 'yp' => 0, 'sandcontent' => 0, 'basefluid' => 0, 'chlorides' => 0,
            'mudtemp' => 0, 'categories2' => 0, 'sgdrillsolid' => 0, 'created_at' => now(), 'updated_at' => now()
        ];

        // Shaker default
        for ($i = 1; $i <= 6; $i++) {
            $insertData["sh{$i}_name"] = 'SHAKER-' . $i;
            $insertData["sh{$i}_model"] = 'Model X';
            $insertData["sh{$i}_screensize"] = 'API 100';
            $insertData["sh{$i}_runninghour"] = '0';
            $insertData["screens_changed"] = '0';
        }

        // Centrifuge default
        for ($i = 1; $i <= 3; $i++) {
            $insertData["cf{$i}_sn"] = 'CFSN' . $i;
            $insertData["cf{$i}_model"] = 'CF-Model';
            $insertData["cf{$i}_modeofopr"] = 'Auto';
            $insertData["cf{$i}_weirplate"] = 0;
            $insertData["cf{$i}_bowlspeed"] = 0;
            $insertData["cf{$i}_bowlconv"] = 0;
            $insertData["cf{$i}_feedsuc"] = '-';
            $insertData["cf{$i}_effluentreturn"] = '-';
            $insertData["cf{$i}_underflow"] = '-';
            $insertData["cf{$i}_runninghour"] = 0;
            $insertData["cf{$i}_feedinrate"] = 0;
            $insertData["cf{$i}_feedindensity"] = 0;
            $insertData["cf{$i}_centratedens"] = 0;
            $insertData["cf{$i}_cakediscdens"] = 0;
            $insertData["cf{$i}_centratereturn"] = '-';
            $insertData["cf{$i}_cakediscflow"] = '-';
            $insertData["cf{$i}_masscake"] = '-';
            $insertData["cf{$i}_volcake"] = '-';
        }

        // CDU default
        for ($i = 1; $i <= 2; $i++) {
            $insertData["cdu{$i}_sn"] = 'CDU-SN' . $i;
            $insertData["cdu{$i}_model"] = 'CDU-Model';
            $insertData["cdu{$i}_screensize"] = 0;
            $insertData["cdu{$i}_runninghour"] = 0;
            $insertData["cdu{$i}_centrateppg"] = 0;
            $insertData["cdu{$i}_scroll"] = 0;
            $insertData["cdu{$i}_sampledepth"] = 0;
        }

        DB::table('details')->insert($insertData);
    }

    public function down()
    {
        Schema::dropIfExists('details');
    }
};
