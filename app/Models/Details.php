<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
    use HasFactory;

    protected $table = 'details';
    protected $primaryKey = 'id_details';
    public $timestamps = true;

    protected $fillable = [
        'id_wellinfo', 'mudcheck_type', 'depth_each', 'depth1bef', 'bitsize', 'bittype',
        'washout', 'mudweight', 'mwunit', 'curdepth', 'volholedrill', 'volholeunit', 'avgrop',
        'lgsactive', 'datenow', 'cirrategpm', 'hgsactive', 'sgbasefluid', 'fluidtype', 'rigpresentact',
        'activesysvol', 'pv', 'yp', 'sandcontent', 'basefluid', 'chlorides', 'mudtemp', 'tempunit',
        'categories1', 'categories2', 'sgdrillsolid',

        // Shakers
        'sh1_name', 'sh1_model', 'sh1_screensize', 'sh1_runninghour',
        'sh2_name', 'sh2_model', 'sh2_screensize', 'sh2_runninghour',
        'sh3_name', 'sh3_model', 'sh3_screensize', 'sh3_runninghour',
        'sh4_name', 'sh4_model', 'sh4_screensize', 'sh4_runninghour',
        'sh5_name', 'sh5_model', 'sh5_screensize', 'sh5_runninghour',
        'sh6_name', 'sh6_model', 'sh6_screensize', 'sh6_runninghour',
        'screens_changed',

        // Centrifuges
        'cf1_sn', 'cf1_model', 'cf1_modeofopr', 'cf1_weirplate', 'cf1_bowlspeed', 'cf1_bowlconv',
        'cf1_feedsuc', 'cf1_effluentreturn', 'cf1_underflow', 'cf1_runninghour', 'cf1_feedinrate',
        'cf1_feedindensity', 'cf1_centratedens', 'cf1_cakediscdens', 'cf1_centratereturn',
        'cf1_cakediscflow', 'cf1_masscake', 'cf1_volcake',

        'cf2_sn', 'cf2_model', 'cf2_modeofopr', 'cf2_weirplate', 'cf2_bowlspeed', 'cf2_bowlconv',
        'cf2_feedsuc', 'cf2_effluentreturn', 'cf2_underflow', 'cf2_runninghour', 'cf2_feedinrate',
        'cf2_feedindensity', 'cf2_centratedens', 'cf2_cakediscdens', 'cf2_centratereturn',
        'cf2_cakediscflow', 'cf2_masscake', 'cf2_volcake',

        'cf3_sn', 'cf3_model', 'cf3_modeofopr', 'cf3_weirplate', 'cf3_bowlspeed', 'cf3_bowlconv',
        'cf3_feedsuc', 'cf3_effluentreturn', 'cf3_underflow', 'cf3_runninghour', 'cf3_feedinrate',
        'cf3_feedindensity', 'cf3_centratedens', 'cf3_cakediscdens', 'cf3_centratereturn',
        'cf3_cakediscflow', 'cf3_masscake', 'cf3_volcake',

        // CDUs
        'cdu1_sn', 'cdu1_model', 'cdu1_screensize', 'cdu1_runninghour', 'cdu1_centrateppg', 'cdu1_scroll', 'cdu1_sampledepth',
        'cdu2_sn', 'cdu2_model', 'cdu2_screensize', 'cdu2_runninghour', 'cdu2_centrateppg', 'cdu2_scroll', 'cdu2_sampledepth',
    ];
}
