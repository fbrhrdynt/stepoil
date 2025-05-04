<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('warning', function (Blueprint $table) {
            $table->id(); // Laravel otomatis membuat id sebagai Primary Key (BIGINT UNSIGNED AUTO_INCREMENT)
            $table->string('code_warning', 20); // Kode Warning
            $table->text('detail_warning'); // Detail Warning
            $table->timestamp('start_time')->nullable(); // Waktu Mulai
            $table->timestamp('end_time')->nullable(); // Waktu Selesai
            $table->enum('status_warning', ['Y', 'N'])->default('N'); // Status Warning (Y/N)

            // Index untuk optimasi query
            $table->index('code_warning'); 
            $table->index('status_warning');

            $table->timestamps(); // Menambahkan kolom created_at & updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('warning');
    }
};

