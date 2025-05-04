<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Desilters;

class DesiltersController extends Controller
{
    /**
     * Display the form for editing Desilters data.
     */
    public function show($project_id, $wellinfo_id)
    {
        $desilter = Desilters::where('id_wellinfo', $wellinfo_id)->first();

        return view('pages.wellinfo.desilters', [
            'project_id' => $project_id,
            'wellinfo_id' => $wellinfo_id,
            'desilter' => $desilter
        ]);
    }

    /**
     * Update or create the Desilters data.
     */
    public function update(Request $request, $project_id, $wellinfo_id)
    {
        try {
            $validated = $request->validate([
                'run_hour'          => 'required|numeric|min:0.01',
                'feed_dens'         => 'required|numeric',
                'overflow_dens'     => 'required|numeric',
                'underflow_dens'    => 'required|numeric',
                'vol_discharge'     => 'required|numeric',
                'mudoncuttings'     => 'required|numeric',
                'head_pressure'     => 'required|numeric',
                'feed_rate'         => 'required|numeric',
                'volmud_discharge'  => 'required|numeric',
            ]);
    
            \App\Models\Desilters::updateOrCreate(
                ['id_wellinfo' => $wellinfo_id],
                $validated
            );
    
            return response()->json(['success' => true]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'error' => 'Validation failed',
                'messages' => $e->validator->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
}
