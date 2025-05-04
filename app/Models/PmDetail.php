<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PmDetail extends Model
{
    use HasFactory;

    protected $table = 'pm_details';

    protected $fillable = [
        'id_pm_detail_category',
        'id_asset_list',
        'pm_start',
        'pm_due',
        'pm_status',
        'performed_by',
        'notes'
    ];

    public function pmCategory()
    {
        return $this->belongsTo(PmDetailCategory::class, 'id_pm_detail_category');
    }

    public function asset()
    {
        return $this->belongsTo(AssetList::class, 'id_asset_list');
    }
}
