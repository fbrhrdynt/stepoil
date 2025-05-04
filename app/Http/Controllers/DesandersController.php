<?php

namespace App\Http\Controllers;

use App\Models\Desanders;
use App\Models\WellInfo;
use Illuminate\Http\Request;

class DesandersController extends Controller
{
    public function show($project_id, $wellinfo_id)
    {
        $wellinfo = WellInfo::findOrFail($wellinfo_id);
        $desander = Desanders::where('id_wellinfo', $wellinfo_id)->firstOrFail();

        return view('pages.wellinfo.desanders', [
            'project_id' => $project_id,
            'wellinfo' => $wellinfo,
            'desander' => $desander
        ]);
    }

    public function update(Request $request, $project_id, $wellinfo_id)
    {
        $request->validate([
            'id_wellinfo'        => 'required|numeric',
            'run_hour'           => 'nullable|numeric',
            'feed_rate'          => 'nullable|string|max:20',
            'feed_dens'          => 'nullable|string|max:20',
            'overflow_dens'      => 'nullable|string|max:20',
            'underflow_dens'     => 'nullable|string|max:20',
            'vol_discharge'      => 'nullable|string|max:20',
            'mudoncuttings'      => 'nullable|string|max:20',
            'volmud_discharge'   => 'nullable|string|max:20',
            'head_pressure'      => 'nullable|string|max:20',
        ]);

        $desander = Desanders::where('id_wellinfo', $wellinfo_id)->firstOrFail();

        $desander->update($request->only([
            'run_hour',
            'feed_rate',
            'feed_dens',
            'overflow_dens',
            'underflow_dens',
            'vol_discharge',
            'mudoncuttings',
            'volmud_discharge',
            'head_pressure',
        ]));

        return response()->json(['success' => true]);
    }
}
