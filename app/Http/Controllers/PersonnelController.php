<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use App\Models\Wellinfo;
use Illuminate\Http\Request;

class PersonnelController extends Controller
{
    public function show($project_id, $wellinfo_id)
    {
        $wellinfo = \App\Models\Wellinfo::with('project')->findOrFail($wellinfo_id);
    
        // Ini akan ambil jika ada, atau insert baru kalau belum ada
        $personnel = Personnel::firstOrCreate(
            ['id_wellinfo' => $wellinfo_id],
            [
                'ds1_name' => '',
                'ds2_name' => '',
                'ns1_name' => '',
                'ns2_name' => '',
            ]
        );
    
        return view('pages.wellinfo.personnel', compact('wellinfo', 'personnel', 'project_id', 'wellinfo_id'));
    }   

    public function update(Request $request, $project_id, $wellinfo_id)
    {
        $personnel = \App\Models\Personnel::where('id_wellinfo', $wellinfo_id)->firstOrFail();
    
        $validated = $request->validate([
            'ds1_name' => 'nullable|string|max:255',
            'ds2_name' => 'nullable|string|max:255',
            'ns1_name' => 'nullable|string|max:255',
            'ns2_name' => 'nullable|string|max:255',
        ]);
    
        $personnel->update($validated);
    
        return redirect()->route('personnel.show', [$project_id, $wellinfo_id])
                         ->with('success', 'Personnel data updated successfully.');
    }
    

}
