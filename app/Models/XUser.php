<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class XUser extends Authenticatable
{
    use HasFactory;

    protected $table = 'xusers';
    protected $primaryKey = 'id_user'; // Ini wajib karena bukan "id"
    public $timestamps = false; // kalau memang tabelmu tidak pakai created_at, updated_at

    protected $fillable = [
        'employee_id', 'employee_name', 'email', 'kode_login', 'pass_login', 'level', 'id_project', 'status'
    ];

    public function getAuthPassword()
    {
        return $this->pass_login;
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'id_project', 'id_project');
    }
}
