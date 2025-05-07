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

    public function details()
    {
        return $this->hasOne(\App\Models\Details::class, 'id_wellinfo', 'id_wellinfo');
    }
    
    public function retorts()
    {
        return $this->hasOne(\App\Models\RetortWorksheet::class, 'id_wellinfo', 'id_wellinfo');
    }
    
    public function personnel()
    {
        return $this->hasOne(\App\Models\Personnel::class, 'id_wellinfo', 'id_wellinfo');
    }
    
    public function additional()
    {
        return $this->hasOne(\App\Models\AdditionalModel::class, 'id_wellinfo', 'id_wellinfo');
    }
    
}
