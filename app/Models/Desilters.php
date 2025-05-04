<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Desilters extends Model
{
    protected $table = 'desilters';
    protected $primaryKey = 'id_desilter';

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
}
