<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdditionalModel extends Model
{
    // Nama tabel yang digunakan
    protected $table = 'additional';

    // Primary key custom (karena bukan 'id')
    protected $primaryKey = 'id_add';

    // Tipe primary key (karena bukan UUID atau bigInt)
    public $incrementing = true;

    // Tidak menggunakan timestamp (created_at, updated_at)
    public $timestamps = false;

    // Mass assignable fields
    protected $fillable = [
        'id_wellinfo',
        'bssactivity',
        'rigactivity',
        'vctodryer_bbls',
        'vctodryer_m3',
        'vcfrdryer_bbls',
        'vcfrdryer_m3',
        'vcfrcf1_bbls',
        'vcfrcf1_m3',
        'vcfrcf2_bbls',
        'vcfrcf2_m3',
        'vcfrcf3_bbls',
        'vcfrcf3_m3',
    ];

    // Relasi ke WellInfo jika ada
    public function wellinfo()
    {
        return $this->belongsTo(WellInfo::class, 'id_wellinfo', 'id_wellinfo');
    }
}
