<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects'; // Nama tabel di database
    protected $primaryKey = 'id_project'; // Primary Key sesuai migrasi
    public $timestamps = true; // Menggunakan created_at & updated_at

    protected $fillable = [
        'contract', 
        'operator_name', 
        'drillingrig', 
        'logo', 
        'wellname', 
        'kodeakses'
    ];
    
    public function wellinfos()
    {
        return $this->hasMany(Wellinfo::class, 'id_project', 'id_project');
    }

}
