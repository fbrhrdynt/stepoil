<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetList extends Model
{
    use HasFactory;

    protected $table = 'assets_list';

    protected $fillable = [
        'id_pm_category',
        'asset_name',
        'mfg_sn',
        'company_asset',
        'coc',
        'status',
        'notes'
    ];

    public function category()
    {
        return $this->belongsTo(PmCategory::class, 'id_pm_category');
    }
    public function inspectionDetails()
    {
        return $this->hasMany(\App\Models\InspectionDetail::class, 'id_asset_list');
    }

}
