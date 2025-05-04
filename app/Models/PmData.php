<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PmData extends Model
{
    protected $table = 'pm_data';

    protected $fillable = [
        'category_id',
        'title',
        'file_path',
        'file_type',
        'file_size',
        'id_user',
    ];

    public function category()
    {
        return $this->belongsTo(PmCategory::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\XUser::class, 'id_user', 'id_user');
    }


    public function uploader()
    {
        return $this->belongsTo(XUser::class, 'id_user', 'id_user');
    }

}
