<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RetortWorksheet;
use App\Models\Project;
use App\Models\Wellinfo;
use App\Models\Details;
use App\Models\AdditionalModel;

class RetortController extends Controller
{
    /**
     * Tampilkan form Retort.
     */
    public function show($id_project, $id_wellinfo)
    {
        $project = Project::findOrFail($id_project);
        $wellinfo = WellInfo::findOrFail($id_wellinfo);
        $retorts = RetortWorksheet::where('id_wellinfo', $id_wellinfo)->first();
        $additional = AdditionalModel::where('id_wellinfo', $id_wellinfo)->first();

        // Ambil data dari table `details`
        $details = Details::where('id_wellinfo', $id_wellinfo)->first();
    
        if (!$details) {
            return redirect()->back()->with('error', 'Details data not found for this wellinfo.');
        }
    
        return view('pages.wellinfo.retort', compact('retorts', 'details', 'wellinfo', 'project', 'additional'));
    }
    

    /**
     * Update data Retort berdasarkan input dari form.
     */
    public function updateRetort(Request $request, $project_id, $wellinfo_id)
    {
        $prefixes = ['sh', 'cdu', 'cf1', 'cf2', 'cf3'];
        $fields = [
            'sampledepth', 'sampletime', 'emptycell', 'emptycellwetsamp', 'celldrycut', 'emptycylinder',
            'wtcylwaterbf', 'watervolin', 'basefluidvolincyl', 'massofcutting', 'massofdry',
            'wtofwaterbf', 'massofbf', 'mudoncutting', 'percofcutting', 'volmuddisc',
            'volbfoildisc', 'ooc'
        ];
    
        // Helper untuk konversi nilai string seperti "2,200.00" jadi float 2200.00
        $clean = fn($val) => is_numeric(str_replace(',', '', $val)) ? floatval(str_replace(',', '', $val)) : 0;
    
        // === Save RETORTS ===
        $dataRetort = ['id_wellinfo' => $wellinfo_id];
    
        foreach ($prefixes as $prefix) {
            foreach ($fields as $field) {
                $key = "rt_{$prefix}_{$field}";
                $dataRetort[$key] = $clean($request->input($key));
            }
        }
    
        $dataRetort['oil_recovered'] = $clean($request->input('oil_recovered'));
        $dataRetort['mud_recovered'] = $clean($request->input('mud_recovered'));
        $dataRetort['cum_oil'] = $clean($request->input('cum_oil'));
        $dataRetort['cum_mud'] = $clean($request->input('cum_mud'));
    
        RetortWorksheet::updateOrCreate(
            ['id_wellinfo' => $wellinfo_id],
            $dataRetort
        );
    
        // === Save FINALIZE / ADDITIONAL ===
        $dataAdditional = [
            'id_wellinfo' => $wellinfo_id,
            'vctodryer_bbls' => $clean($request->input('vctodryer_bbls')),
            'vctodryer_m3' => $clean($request->input('vctodryer_m3')),
            'vcfrdryer_bbls' => $clean($request->input('vcfrdryer_bbls')),
            'vcfrdryer_m3' => $clean($request->input('vcfrdryer_m3')),
            'vcfrcf1_bbls' => $clean($request->input('vcfrcf1_bbls')),
            'vcfrcf1_m3' => $clean($request->input('vcfrcf1_m3')),
            'vcfrcf2_bbls' => $clean($request->input('vcfrcf2_bbls')),
            'vcfrcf2_m3' => $clean($request->input('vcfrcf2_m3')),
            'vcfrcf3_bbls' => $clean($request->input('vcfrcf3_bbls')),
            'vcfrcf3_m3' => $clean($request->input('vcfrcf3_m3')),
        ];
    
        AdditionalModel::updateOrCreate(
            ['id_wellinfo' => $wellinfo_id],
            $dataAdditional
        );
    
        return redirect()->back()->with('success', 'Retort and Finalize data have been successfully saved.');
    }
    
    
    
    
}
