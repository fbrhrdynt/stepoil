<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PmCategory extends Model
{
    protected $table = 'pm_categories';

    protected $fillable = [
        'name',
        'notes',
    ];

    public function data()
    {
        return $this->hasMany(PmData::class, 'category_id');
    }
}
