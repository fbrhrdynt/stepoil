<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CuttingsByPassed extends Model
{
    protected $table = 'cuttingsbypassed'; // pastikan nama tabel sesuai
    protected $primaryKey = 'id_wellinfo';
    public $incrementing = true; // karena bukan auto-increment
    protected $keyType = 'int'; // karena integer, bukan UUID atau string

    protected $fillable = [
        'id_wellinfo',
        'percentage',
        'volume',
        'from_depth',
        'each_from_depth',
        'to_depth',
        'each_to_depth',
    ];
}
