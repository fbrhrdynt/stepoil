<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DailyWaste;
use App\Models\Details;
use App\Models\Desanders;
use App\Models\Desilters;
use App\Models\RetortWorksheet;
use App\Models\AdditionalModel;

class DailyWasteController extends Controller
{
    /**
    public function show($project_id, $wellinfo_id)
    {
        $details = Details::where('id_wellinfo', $wellinfo_id)->first();
        $desanders = Desanders::where('id_wellinfo', $wellinfo_id)->first();
        $desilters = Desilters::where('id_wellinfo', $wellinfo_id)->first();
        $retorts = RetortWorksheet::where('id_wellinfo', $wellinfo_id)->first();
    
        // Validasi agar tidak error kalau data tidak lengkap
        if (!$details || !$desanders || !$desilters || !$retorts) {
            return back()->with('error', 'Data tidak lengkap untuk kalkulasi cutting discharge.');
        }
    
        // 🔢 Mulai Perhitungan sesuai rumus kamu
        $wm_volcut_frwell = (($details->bitsize / 1029) * $details->volholedrill) * 1.1;
        $wm_volcut_frsh12 = $wm_volcut_frwell * 0.9;
        $wm_volcut_frsh34 = $wm_volcut_frwell * 0.9;
        $wm_volcut_tocdu = $wm_volcut_frsh12 - $wm_volcut_frsh34;
        $wm_volcut_frcdu = ($wm_volcut_tocdu * 80) / 90;
    
        $wm_volcut_desander_desilter =
            ($desanders->vol_dicharge / ($desanders->mudoncuttings ?: 1)) +
            ($desilters->vol_dicharge / ($desilters->mudoncuttings ?: 1));
    
        $wm_volcut_frmudclean = $wm_volcut_desander_desilter / ($retorts->rt_cdu_mudoncutting ?: 1);
        $wm_volcut_frcf1 = $retorts->rt_cf1_volmuddisc / ($retorts->rt_cf1_mudoncutting ?: 1);
        $wm_volcut_frcf2 = $retorts->rt_cf2_volmuddisc / ($retorts->rt_cf2_mudoncutting ?: 1);
        $wm_volcut_frcf3 = $retorts->rt_cf3_volmuddisc / ($retorts->rt_cf3_mudoncutting ?: 1);
    
        $wom_volcut_frsh12 = $wm_volcut_frsh12 * $retorts->rt_sh_mudoncutting;
        $wom_volcut_frsh34 = $wm_volcut_frsh34 * $retorts->rt_cdu_mudoncutting;
        $wom_volcut_tocdu = $wm_volcut_tocdu * $retorts->rt_sh_mudoncutting;
        $wom_volcut_frcdu = $wm_volcut_frcdu * $retorts->rt_cdu_mudoncutting;
        $wom_volcut_frmudclean = $wm_volcut_desander_desilter;
    
        $wom_volcut_frcf1 = $wm_volcut_frcf1 * $retorts->rt_cf1_mudoncutting;
        $wom_volcut_frcf2 = $wm_volcut_frcf2 * $retorts->rt_cf2_mudoncutting;
        $wom_volcut_frcf3 = $wm_volcut_frcf3 * $retorts->rt_cf3_mudoncutting;
    
        $total_wm = $wm_volcut_frsh12 + $wm_volcut_frsh34 + $wm_volcut_frcdu +
                    $wm_volcut_frmudclean + $wm_volcut_desander_desilter +
                    $wm_volcut_frcf1 + $wm_volcut_frcf2 + $wm_volcut_frcf3;
    
        $total_wom = $wom_volcut_frsh12 + $wom_volcut_frsh34 + $wom_volcut_frcdu +
                     $wom_volcut_frmudclean + $wom_volcut_frcf1 +
                     $wom_volcut_frcf2 + $wom_volcut_frcf3;
    
        //=================================================================
        $total_cuttings_discharge = round($total_wm + $total_wom, 2);
        //=================================================================
        $avg_moc = round($total_wm / $total_wom, 2);
        //=================================================================
        $avg_dischrge = round(($total_wom * $details->sgbasefluid * $details->basefluid ) / ( $total_wm * $details->sgdrillsolid + $total_wom * $details->mudweight / 8.33) * 100,2);

    
        // Load data yang ada di tabel dailywaste (jika ada)
        $data = DailyWaste::where('id_wellinfo', $wellinfo_id)->first();
    
        return view('pages.wellinfo.dailywaste', [
            'project_id' => $project_id,
            'wellinfo_id' => $wellinfo_id,
            'data' => $data,
            'total_cuttings_discharge' => $total_cuttings_discharge,
            'avg_moc' => $avg_moc,
            'avg_dischrge' => $avg_dischrge

        ]);
    }
    */


    public function show($project_id, $wellinfo_id)
    {
        $details    = Details::where('id_wellinfo', $wellinfo_id)->first();
        $desanders  = Desanders::where('id_wellinfo', $wellinfo_id)->first();
        $desilters  = Desilters::where('id_wellinfo', $wellinfo_id)->first();
        $retorts    = RetortWorksheet::where('id_wellinfo', $wellinfo_id)->first();
        $data       = DailyWaste::where('id_wellinfo', $wellinfo_id)->first();
        $additional = AdditionalModel::where('id_wellinfo', $wellinfo_id)->first();
    
        if (!$details || !$desanders || !$desilters || !$retorts) {
            return back()->with('error', 'Data tidak lengkap untuk kalkulasi cutting discharge.');
        }
    
        // 🔢 Perhitungan berdasarkan rumus
        $bitsize        = $details->bitsize ?? 0;
        $volholedrill   = $details->volholedrill ?? 0;
        $wm_frwell      = (($bitsize / 1029) * $volholedrill) * 1.1;
        $wm_frsh12      = $wm_frwell * 0.9;
        $wm_frsh34      = $wm_frwell * 0.9;
        $wm_tocdu       = $wm_frsh12 - $wm_frsh34;
        $wm_frcdu       = ($wm_tocdu * 80) / 90;
    
        $wm_desander_desilter = 
            ($desanders->vol_dicharge / ($desanders->mudoncuttings ?: 1)) +
            ($desilters->vol_dicharge / ($desilters->mudoncuttings ?: 1));
    
        $wm_frmudclean = $wm_desander_desilter / ($retorts->rt_cdu_mudoncutting ?: 1);
    
        $wm_frcf1 = $retorts->rt_cf1_mudoncutting != 0 ? $retorts->rt_cf1_volmuddisc / $retorts->rt_cf1_mudoncutting : 0;
        $wm_frcf2 = $retorts->rt_cf2_mudoncutting != 0 ? $retorts->rt_cf2_volmuddisc / $retorts->rt_cf2_mudoncutting : 0;
        $wm_frcf3 = $retorts->rt_cf3_mudoncutting != 0 ? $retorts->rt_cf3_volmuddisc / $retorts->rt_cf3_mudoncutting : 0;
    
        $wom_frsh12      = $wm_frsh12 * $retorts->rt_sh_mudoncutting;
        $wom_frsh34      = $wm_frsh34 * $retorts->rt_cdu_mudoncutting;
        $wom_tocdu       = $wm_tocdu * $retorts->rt_sh_mudoncutting;
        $wom_frcdu       = $wm_frcdu * $retorts->rt_cdu_mudoncutting;
        $wom_frmudclean  = $wm_desander_desilter;
        $wom_frcf1       = $wm_frcf1 * $retorts->rt_cf1_mudoncutting;
        $wom_frcf2       = $wm_frcf2 * $retorts->rt_cf2_mudoncutting;
        $wom_frcf3       = $wm_frcf3 * $retorts->rt_cf3_mudoncutting;
    
        $total_wm = $wm_frsh12 + $wm_frsh34 + $wm_frcdu + $wm_frmudclean + $wm_desander_desilter + $wm_frcf1 + $wm_frcf2 + $wm_frcf3;
        $total_wom = $wom_frsh12 + $wom_frsh34 + $wom_frcdu + $wom_frmudclean + $wom_frcf1 + $wom_frcf2 + $wom_frcf3;
    
        $total_cuttings_discharge = round($total_wm + $total_wom, 2);
        $avg_moc = $total_wom != 0 ? round($total_wm / $total_wom, 2) : 0;
    
        $denominator = $total_wm * $details->sgdrillsolid + ($total_wom * $details->mudweight / 8.33);
        $avg_dischrge = $denominator != 0
            ? round((($total_wom * $details->sgbasefluid * $details->basefluid) / $denominator) * 100, 2)
            : 0;
    
        return view('pages.wellinfo.dailywaste', [
            'project_id' => $project_id,
            'wellinfo_id' => $wellinfo_id,
            'data' => $data,
            'additional' => $additional,
            'total_cuttings_discharge' => $total_cuttings_discharge,
            'avg_moc' => $avg_moc,
            'avg_dischrge' => $avg_dischrge,
        ]);
    }
    
    public function update(Request $request, $project_id, $wellinfo_id)
    {
        $validated = $request->validate([
            'dailywaste_generated' => 'nullable|numeric',
            'avg_moc'              => 'nullable|numeric',
            'avg_discharge'        => 'nullable|numeric',
            'bssactivity'          => 'nullable|string|max:250',
            'rigactivity'          => 'nullable|string|max:250',
        ]);
    
        // Simpan ke dailywaste
        DailyWaste::updateOrCreate(
            ['id_wellinfo' => $wellinfo_id],
            [
                'dailywaste_generated' => $validated['dailywaste_generated'] ?? 0,
                'avg_moc'              => $validated['avg_moc'] ?? 0,
                'avg_discharge'        => $validated['avg_discharge'] ?? 0,
            ]
        );
    
        // Simpan ke additional
        AdditionalModel::updateOrCreate(
            ['id_wellinfo' => $wellinfo_id],
            [
                'bssactivity' => $validated['bssactivity'] ?? '',
                'rigactivity' => $validated['rigactivity'] ?? '',
            ]
        );
    
        return redirect()->route('wellinfo.daily-waste', [$project_id, $wellinfo_id])
            ->with('success', 'Daily Waste & Activity berhasil diperbarui.');
    }
    
    

}
