<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InspectionCategory extends Model
{
    use HasFactory;

    protected $table = 'inspection_category';
    protected $primaryKey = 'id_inspection';

    protected $fillable = [
        'name_inspection',
        'notes',
    ];
}
