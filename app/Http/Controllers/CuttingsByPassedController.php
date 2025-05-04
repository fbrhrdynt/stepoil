<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CuttingsByPassed;

class CuttingsByPassedController extends Controller
{
    // Menampilkan data CuttingsByPassed berdasarkan id_wellinfo
    public function show($project_id, $wellinfo_id)
    {
        $data = CuttingsByPassed::where('id_wellinfo', $wellinfo_id)->first();

        if (!$data) {
            // Kembalikan view dengan data kosong jika belum ada
            return view('pages.wellinfo.cuttingsbypassed', [
                'project_id' => $project_id,
                'wellinfo_id' => $wellinfo_id,
                'data' => null
            ]);
        }

        return view('pages.wellinfo.cuttingsbypassed', [
            'project_id' => $project_id,
            'wellinfo_id' => $wellinfo_id,
            'data' => $data
        ]);
    }

    // Update atau create data CuttingsByPassed
    public function updateBypassed(Request $request, $project_id, $wellinfo_id)
    {
        $validated = $request->validate([
            'percentage' => 'nullable|numeric',
            'volume' => 'nullable|numeric',
            'from_depth' => 'nullable|numeric',
            'to_depth' => 'nullable|numeric',
            'each_from_depth' => 'nullable|in:Metre,Feet',
            'each_to_depth' => 'nullable|in:Metre,Feet',
        ]);        

        CuttingsByPassed::updateOrCreate(
            ['id_wellinfo' => $wellinfo_id],
            $validated + ['id_wellinfo' => $wellinfo_id]
        );

        return redirect()
            ->route('wellinfo.cuttingsbypassed', [$project_id, $wellinfo_id])
            ->with('success', 'Data Cuttings By-Passed has been successfully updated.');

    }
}
