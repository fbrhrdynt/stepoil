<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RetortWorksheet extends Model
{
    protected $table = 'retorts';
    protected $primaryKey = 'id_retort';
    public $timestamps = true;

    protected $fillable = [
        'id_wellinfo',

        'rt_sh_sampletime','rt_cdu_sampletime','rt_cf1_sampletime','rt_cf2_sampletime','rt_cf3_sampletime',
        // SH
        'rt_sh_sampledepth', 'rt_sh_emptycell', 'rt_sh_emptycellwetsamp', 'rt_sh_celldrycut', 'rt_sh_emptycylinder',
        'rt_sh_watervolin', 'rt_sh_basefluidvolincyl', 'rt_sh_wtcylwaterbf', 'rt_sh_massofcutting', 'rt_sh_massofdry',
        'rt_sh_wtofwaterbf', 'rt_sh_massofbf', 'rt_sh_mudoncutting', 'rt_sh_percofcutting',
        'rt_sh_volbfoildisc', 'rt_sh_volmuddisc', 'rt_sh_ooc',

        // CDU
        'rt_cdu_sampledepth', 'rt_cdu_emptycell', 'rt_cdu_emptycellwetsamp', 'rt_cdu_celldrycut', 'rt_cdu_emptycylinder',
        'rt_cdu_watervolin', 'rt_cdu_basefluidvolincyl', 'rt_cdu_wtcylwaterbf', 'rt_cdu_massofcutting', 'rt_cdu_massofdry',
        'rt_cdu_wtofwaterbf', 'rt_cdu_massofbf', 'rt_cdu_mudoncutting', 'rt_cdu_percofcutting',
        'rt_cdu_volbfoildisc', 'rt_cdu_volmuddisc', 'rt_cdu_ooc',

        // CF1
        'rt_cf1_sampledepth', 'rt_cf1_emptycell', 'rt_cf1_emptycellwetsamp', 'rt_cf1_celldrycut', 'rt_cf1_emptycylinder',
        'rt_cf1_watervolin', 'rt_cf1_basefluidvolincyl', 'rt_cf1_wtcylwaterbf', 'rt_cf1_massofcutting', 'rt_cf1_massofdry',
        'rt_cf1_wtofwaterbf', 'rt_cf1_massofbf', 'rt_cf1_mudoncutting', 'rt_cf1_percofcutting',
        'rt_cf1_volbfoildisc', 'rt_cf1_volmuddisc', 'rt_cf1_ooc',

        // CF2
        'rt_cf2_sampledepth', 'rt_cf2_emptycell', 'rt_cf2_emptycellwetsamp', 'rt_cf2_celldrycut', 'rt_cf2_emptycylinder',
        'rt_cf2_watervolin', 'rt_cf2_basefluidvolincyl', 'rt_cf2_wtcylwaterbf', 'rt_cf2_massofcutting', 'rt_cf2_massofdry',
        'rt_cf2_wtofwaterbf', 'rt_cf2_massofbf', 'rt_cf2_mudoncutting', 'rt_cf2_percofcutting',
        'rt_cf2_volbfoildisc', 'rt_cf2_volmuddisc', 'rt_cf2_ooc',

        // CF3
        'rt_cf3_sampledepth', 'rt_cf3_emptycell', 'rt_cf3_emptycellwetsamp', 'rt_cf3_celldrycut', 'rt_cf3_emptycylinder',
        'rt_cf3_watervolin', 'rt_cf3_basefluidvolincyl', 'rt_cf3_wtcylwaterbf', 'rt_cf3_massofcutting', 'rt_cf3_massofdry',
        'rt_cf3_wtofwaterbf', 'rt_cf3_massofbf', 'rt_cf3_mudoncutting', 'rt_cf3_percofcutting',
        'rt_cf3_volbfoildisc', 'rt_cf3_volmuddisc', 'rt_cf3_ooc',

        // Cumulative
        'oil_recovered', 'mud_recovered', 'cum_oil', 'cum_mud',
    ];
}
