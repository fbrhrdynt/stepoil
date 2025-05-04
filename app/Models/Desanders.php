<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Desanders extends Model
{
    protected $table = 'desanders';
    protected $primaryKey = 'id_desander';

    protected $fillable = [
        'id_wellinfo',
        'run_hour',
        'feed_rate',
        'feed_dens',
        'overflow_dens',
        'underflow_dens',
        'vol_discharge',
        'mudoncuttings',
        'volmud_discharge',
        'head_pressure',
    ];

    public function wellinfo()
    {
        return $this->belongsTo(WellInfo::class, 'id_wellinfo', 'id_wellinfo');
    }
}
