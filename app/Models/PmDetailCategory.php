<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PmDetailCategory extends Model
{
    use HasFactory;

    protected $table = 'pm_detail_category';

    protected $fillable = [
        'pm_name',
        'frequency',
        'frequency_unit',
        'notes'
    ];
}
