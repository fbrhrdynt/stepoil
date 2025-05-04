<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    // Nama tabel jika tidak mengikuti konvensi Laravel
    protected $table = 'personnel';

    // Primary key custom
    protected $primaryKey = 'id_personnel';

    // Jika tidak pakai auto increment (misalnya UUID), bisa diatur false
    public $incrementing = true;

    // Tipe data primary key (default: int)
    protected $keyType = 'int';

    // Mass assignment (boleh diisi secara massal)
    protected $fillable = [
        'id_wellinfo',
        'ds1_name',
        'ds2_name',
        'ns1_name',
        'ns2_name',
    ];

    // Relationship ke tabel wellinfo
    public function wellinfo()
    {
        return $this->belongsTo(Wellinfo::class, 'id_wellinfo', 'id_wellinfo');
    }
}
