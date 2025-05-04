<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wellinfo extends Model
{
    protected $table = 'wellinfo';
    protected $primaryKey = 'id_wellinfo';
    public $timestamps = true;

    protected $fillable = [
        'curdate', 'id_project', 'platform', 'wellname', 'spud_date',
        'location', 'companyman', 'oim', 'mudeng', 'urut', 'lockreport',
    ];

    public function project()
    {
        return $this->belongsTo(\App\Models\Project::class, 'id_project', 'id_project');
    }
}
