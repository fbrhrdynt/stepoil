<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DailyWaste extends Model
{
    use HasFactory;

    protected $table = 'dailywaste';
    protected $primaryKey = 'id_dailywaste';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'id_wellinfo',
        'dailywaste_generated',
        'avg_moc',
        'avg_discharge',
    ];

    public function wellinfo()
    {
        return $this->belongsTo(WellInfo::class, 'id_wellinfo', 'id_wellinfo');
    }
}
