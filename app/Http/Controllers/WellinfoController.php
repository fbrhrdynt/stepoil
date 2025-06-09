<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wellinfo;
use App\Models\Project;
use App\Models\Details;
use App\Models\AdditionalModel;
use App\Models\CuttingsByPassed;
use App\Models\DailyWaste;
use App\Models\Desanders;
use App\Models\Desilters;
use App\Models\RetortWorksheet;
use Yajra\DataTables\Facades\DataTables;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\WellSummaryExport;

class WellinfoController extends Controller
{
    public function index($project_id)
    {
        $project = Project::findOrFail($project_id);
        $wellinfo = Wellinfo::where('id_project', $project_id)->get();
    
        return view('pages.wellinfo.index', compact('project', 'wellinfo'));
    }

    public function show($project_id, $wellinfo_id)
    {
        $project = Project::findOrFail($project_id);
        $wellinfo = Wellinfo::findOrFail($wellinfo_id);
        $retorts = RetortWorksheet::where('id_wellinfo', $wellinfo_id)->first();
    
        return view('pages.wellinfo.show', [
            'project' => $project,
            'wellinfo' => $wellinfo,
            'retorts' => $retorts,
            'projectId' => $project->id_project,
            'wellinfoId' => $wellinfo->id_wellinfo,
        ]);
    }    
    
    public function editFirst($project_id, $wellinfo_id)
    {
        $wellinfo = Wellinfo::findOrFail($wellinfo_id);
        return view('pages.wellinfo.edit', compact('wellinfo', 'project_id'));
    }    

    public function updateFirst(Request $request, $project_id, $wellinfo_id)
    {
        $wellinfo = Wellinfo::findOrFail($wellinfo_id);
        $project = Project::findOrFail($project_id);
    
        $wellinfo->update($request->only([
            'platform', 'wellname', 'spud_date', 'location', 'companyman', 'oim', 'mudeng', 'urut'
        ]));
    
        return redirect()
            ->route('wellinfo.show', ['project_id' => $project_id, 'wellinfo_id' => $wellinfo->id_wellinfo])
            ->with('success', "Project detail for <strong>{$project->operator_name}</strong> successfully updated.");
    }    

    public function getWellinfoData(Request $request, $project_id)
    {
        if ($request->ajax()) {
            $data = Wellinfo::where('id_project', $project_id)->get();
    
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('curdate', fn($row) => \Carbon\Carbon::parse($row->curdate)->format('F d, Y'))
                ->editColumn('spud_date', fn($row) => \Carbon\Carbon::parse($row->spud_date)->format('F d, Y'))
                ->addColumn('action', function ($row) {
                    $viewBtn = '<a href="' . url('projects/details/' . $row->id_project . '/' . $row->id_wellinfo) . '" 
                                    class="text-green-600 hover:text-green-800 mr-2" title="View Details">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </a>';
                
                    $lockIcon = $row->lockreport === 'NO'
                        ? '<a href="' . url('wellinfo/lock/' . $row->id_wellinfo) . '" class="text-blue-600 hover:text-blue-800 mr-2" title="Lock">
                                <i class="fa-solid fa-lock"></i>
                            </a>'
                        : '<a href="' . url('wellinfo/unlock/' . $row->id_wellinfo) . '" class="text-yellow-600 hover:text-yellow-800 mr-2" title="Unlock">
                                <i class="fa-solid fa-lock-open"></i>
                            </a>';
                
                    $deleteBtn = '<a href="' . url('wellinfo/delete/' . $row->id_wellinfo) . '" onclick="return confirm(\'Are you sure to delete this report?\')" class="text-red-600 hover:text-red-800" title="Delete">
                                    <i class="fa fa-trash"></i>
                                </a>';
                
                    return $viewBtn . $lockIcon . $deleteBtn;
                })
                
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    //================= WELL INFO FORM =================//

    public function editWell($project_id, $wellinfo_id)
    {
        $details = Details::where('id_wellinfo', $wellinfo_id)->firstOrFail();
    
        // Optional: ambil data dari tabel wellinfo kalau ada
        $wellinfo = WellInfo::find($wellinfo_id); // optional
    
        return view('pages.wellinfo.wi', [
            'details' => $details,
            'project_id' => $project_id,
            'wellinfo' => $wellinfo // pastikan dikirim ke view
        ]);
    }
    
    public function updateWell(Request $request, $project_id, $wellinfo_id)
    {
        $validated = $request->validate([
            'id_details' => 'required|integer|exists:details,id_details',
            'id_wellinfo' => 'required|integer',
            // Tambahkan validasi sesuai field lainnya
        ]);
    
        $details = Details::findOrFail($validated['id_details']);
        $details->update($request->all());
    
        return response()->json(['success' => true]);
    }
    
    //================= ACTIVE MUD PROPERTIES FORM =================//
    public function editAMP($project_id, $wellinfo_id)
    {
        $details = Details::where('id_wellinfo', $wellinfo_id)->firstOrFail();
        $wellinfo = WellInfo::findOrFail($wellinfo_id);
    
        return view('pages.wellinfo.activemudprop', [
            'project_id' => $project_id,
            'wellinfo' => $wellinfo,
            'details' => $details
        ]);
    }
    
    public function updateAMP(Request $request, $project_id, $wellinfo_id)
    {
        $request->validate([
            'id_details' => 'required|integer|exists:details,id_details',
            'pv' => 'required|numeric',
            'yp' => 'required|numeric',
            'sandcontent' => 'required|numeric',
            'basefluid' => 'required|numeric',
            'chlorides' => 'required|numeric',
            'mudtemp' => 'required|numeric',
            'categories2' => 'required|numeric',
            'sgdrillsolid' => 'required|numeric',
            'tempunit' => 'required|string',
        ]);
    
        $data = $request->only([
            'pv', 'yp', 'sandcontent', 'basefluid', 'chlorides', 'mudtemp',
            'categories1', 'categories2', 'sgdrillsolid', 'tempunit'
        ]);
    
        $details = Details::findOrFail($request->id_details);
        $details->update($data);
    
        return response()->json(['success' => true]);
    }

    //================= SHAKERS FORM =================//
    public function shakers($project_id, $wellinfo_id)
    {
        $wellinfo = Wellinfo::findOrFail($wellinfo_id);
        $details = Details::where('id_wellinfo', $wellinfo_id)->firstOrFail();

        return view('pages.wellinfo.shakers', [
            'project_id' => $project_id,
            'wellinfo' => $wellinfo,
            'details' => $details,
        ]);
    }

    public function updateShakers(Request $request, $project_id, $wellinfo_id)
    {
        $details = Details::findOrFail($request->id_details);
    
        $data = $request->only([
            'sh1_name', 'sh1_model', 'sh1_screensize', 'sh1_runninghour',
            'sh2_name', 'sh2_model', 'sh2_screensize', 'sh2_runninghour',
            'sh3_name', 'sh3_model', 'sh3_screensize', 'sh3_runninghour',
            'sh4_name', 'sh4_model', 'sh4_screensize', 'sh4_runninghour',
            'sh5_name', 'sh5_model', 'sh5_screensize', 'sh5_runninghour',
            'sh6_name', 'sh6_model', 'sh6_screensize', 'sh6_runninghour',
            'screens_changed', // ✅ Make sure this is here
        ]);
    
        $details->update($data);
    
        return response()->json(['success' => true]);
    }
    
    //================= CENTRIFUGE-1 FORM =================//
    public function centrifuge1($project_id, $wellinfo_id)
    {
        $wellinfo = Wellinfo::findOrFail($wellinfo_id);
        $details = Details::where('id_wellinfo', $wellinfo_id)->firstOrFail();
    
        return view('pages.wellinfo.cfuge1', compact('wellinfo', 'details', 'project_id'));
    }

    public function updateCentrifuge1(Request $request, $projectId, $wellinfoId)
    {
        $details = Details::find($request->id_details);
        if (!$details) {
            return response()->json(['success' => false, 'error' => 'Data not found.']);
        }
        $details->update([
            'cf1_sn'              => $request->cf1_sn,
            'cf1_model'           => $request->cf1_model,
            'cf1_modeofopr'       => $request->cf1_modeofopr,
            'cf1_weirplate'       => $request->cf1_weirplate,
            'cf1_bowlspeed'       => $request->cf1_bowlspeed,
            'cf1_bowlconv'        => $request->cf1_bowlconv,
            'cf1_feedsuc'         => $request->cf1_feedsuc,
            'cf1_effluentreturn'  => $request->cf1_effluentreturn,
            'cf1_underflow'       => $request->cf1_underflow,
            'cf1_runninghour'     => $request->cf1_runninghour,
            'cf1_feedinrate'      => $request->cf1_feedinrate,
            'cf1_feedindensity'   => $request->cf1_feedindensity,
            'cf1_centratedens'    => $request->cf1_centratedens,
            'cf1_cakediscdens'    => $request->cf1_cakediscdens,
            'cf1_centratereturn'  => $request->cf1_centratereturn,
            'cf1_cakediscflow'    => $request->cf1_cakediscflow,
            'cf1_masscake'        => $request->cf1_masscake,
            'cf1_volcake'         => $request->cf1_volcake,
        ]);
    
        return response()->json(['success' => true]);
    }
    
    //================= CENTRIFUGE-2 FORM =================//
    public function centrifuge2($project_id, $wellinfo_id)
    {
        $wellinfo = Wellinfo::findOrFail($wellinfo_id);
        $details = Details::where('id_wellinfo', $wellinfo_id)->firstOrFail();
    
        return view('pages.wellinfo.cfuge2', compact('project_id', 'wellinfo', 'details'));
    }
    
    public function updateCentrifuge2(Request $request, $project_id, $wellinfo_id)
    {
        $details = Details::find($request->id_details);
    
        if (!$details) {
            return response()->json(['success' => false, 'error' => 'Data not found.']);
        }
    
        $details->update($request->only([
            'cf2_sn', 'cf2_model', 'cf2_modeofopr', 'cf2_weirplate',
            'cf2_bowlspeed', 'cf2_bowlconv', 'cf2_feedsuc', 'cf2_effluentreturn',
            'cf2_underflow', 'cf2_runninghour', 'cf2_feedinrate', 'cf2_feedindensity',
            'cf2_centratedens', 'cf2_cakediscdens', 'cf2_centratereturn', 'cf2_cakediscflow',
            'cf2_masscake', 'cf2_volcake',
        ]));
    
        return response()->json(['success' => true]);
    }
    
    //================= CENTRIFUGE-3 FORM =================//
    public function centrifuge3($project_id, $wellinfo_id)
    {
        $wellinfo = Wellinfo::findOrFail($wellinfo_id);
        $details = Details::where('id_wellinfo', $wellinfo_id)->firstOrFail();
    
        return view('pages.wellinfo.cfuge3', compact('project_id', 'wellinfo', 'details'));
    }
    
    public function updateCentrifuge3(Request $request, $project_id, $wellinfo_id)
    {
        $details = Details::find($request->id_details);
    
        if (!$details) {
            return response()->json(['success' => false, 'error' => 'Data not found.']);
        }
    
        $details->update($request->only([
            'cf3_sn', 'cf3_model', 'cf3_modeofopr', 'cf3_weirplate',
            'cf3_bowlspeed', 'cf3_bowlconv', 'cf3_feedsuc', 'cf3_effluentreturn',
            'cf3_underflow', 'cf3_runninghour', 'cf3_feedinrate', 'cf3_feedindensity',
            'cf3_centratedens', 'cf3_cakediscdens', 'cf3_centratereturn', 'cf3_cakediscflow',
            'cf3_masscake', 'cf3_volcake',
        ]));
    
        return response()->json(['success' => true]);
    }
    
    //================= CUTITNG DRYER 1 FORM =================//
    public function cdu1($project_id, $wellinfo_id)
    {
        $wellinfo = WellInfo::findOrFail($wellinfo_id);
        $details = Details::where('id_wellinfo', $wellinfo_id)->firstOrFail();
    
        return view('pages.wellinfo.cdu1', [
            'project_id' => $project_id,
            'wellinfo' => $wellinfo,
            'details' => $details
        ]);
    }
    
    public function updateCDU1(Request $request, $project_id, $wellinfo_id)
    {
        try {
            $validated = $request->validate([
                'id_wellinfo'        => 'required|numeric',
                'id_details'         => 'required|numeric',
                'cdu1_sn'            => 'nullable|string|max:255',
                'cdu1_model'         => 'nullable|string|max:50',
                'cdu1_screensize'    => 'nullable|numeric',
                'cdu1_runninghour'   => 'nullable|numeric',
                'cdu1_centrateppg'   => 'nullable|numeric',
                'cdu1_scroll'        => 'nullable|numeric',
                'cdu1_sampledepth'   => 'nullable|numeric',
            ]);
    
            $details = Details::findOrFail($validated['id_details']);
    
            $details->update([
                'cdu1_sn'            => $validated['cdu1_sn'],
                'cdu1_model'         => $validated['cdu1_model'],
                'cdu1_screensize'    => $validated['cdu1_screensize'],
                'cdu1_runninghour'   => $validated['cdu1_runninghour'],
                'cdu1_centrateppg'   => $validated['cdu1_centrateppg'],
                'cdu1_scroll'        => $validated['cdu1_scroll'],
                'cdu1_sampledepth'   => $validated['cdu1_sampledepth'],
            ]);
    
            return response()->json(['success' => true]);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'error' => 'Failed to update Cutting Dryer 1 data. ' . $e->getMessage(),
            ], 500);
        }
    }
    
    // ================= CUTTING DRYER 2 =================
    public function cdu2($project_id, $wellinfo_id)
    {
        $wellinfo = WellInfo::findOrFail($wellinfo_id);
        $details = Details::where('id_wellinfo', $wellinfo_id)->firstOrFail();

        return view('pages.wellinfo.cdu2', [
            'project_id' => $project_id,
            'wellinfo' => $wellinfo,
            'details' => $details
        ]);
    }

    public function updateCDU2(Request $request, $project_id, $wellinfo_id)
    {
        try {
            $validated = $request->validate([
                'id_wellinfo'        => 'required|numeric',
                'id_details'         => 'required|numeric',
                'cdu2_sn'            => 'nullable|string|max:255',
                'cdu2_model'         => 'nullable|string|max:50',
                'cdu2_screensize'    => 'nullable|numeric',
                'cdu2_runninghour'   => 'nullable|numeric',
                'cdu2_centrateppg'   => 'nullable|numeric',
                'cdu2_scroll'        => 'nullable|numeric',
                'cdu2_sampledepth'   => 'nullable|numeric',
            ]);

            $details = Details::findOrFail($validated['id_details']);

            $details->update([
                'cdu2_sn'            => $validated['cdu2_sn'],
                'cdu2_model'         => $validated['cdu2_model'],
                'cdu2_screensize'    => $validated['cdu2_screensize'],
                'cdu2_runninghour'   => $validated['cdu2_runninghour'],
                'cdu2_centrateppg'   => $validated['cdu2_centrateppg'],
                'cdu2_scroll'        => $validated['cdu2_scroll'],
                'cdu2_sampledepth'   => $validated['cdu2_sampledepth'],
            ]);

            return response()->json(['success' => true]);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'error' => 'Failed to update Cutting Dryer 2 data. ' . $e->getMessage(),
            ], 500);
        }
    }

    

    public function lock($id)
    {
        Wellinfo::where('id_wellinfo', $id)->update(['lockreport' => 'YES']);
        return redirect()->back()->with('success', 'Report locked successfully!');
    }

    public function unlock($id)
    {
        Wellinfo::where('id_wellinfo', $id)->update(['lockreport' => 'NO']);
        return redirect()->back()->with('success', 'Report unlocked successfully!');
    }

    public function destroy($id)
    {
        Wellinfo::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Report deleted.');
    }

    public function copyLastReportWithProject($projectId, $idWellinfo)
    {
        $wellinfo = Wellinfo::findOrFail($idWellinfo);
    
        // Ambil report terakhir berdasarkan urutan
        $lastReport = Wellinfo::where('id_project', $projectId)
            ->where('id_wellinfo', $idWellinfo)
            ->first();
    
        if (!$lastReport) {
            return redirect()->back()->with('error', 'No report found to copy.');
        }
    
        // Salin Wellinfo
        $newWellinfo = $lastReport->replicate();
        $newWellinfo->curdate = now()->format('Y-m-d');
        $newWellinfo->urut = $lastReport->urut + 1;
        $newWellinfo->lockreport = 'NO';
        $newWellinfo->save();
    
        $newId = $newWellinfo->id_wellinfo;
        $fromId = $lastReport->id_wellinfo;
    
        // Copy table terkait
        $this->copyModel(Details::class, $fromId, $newId);
        $this->copyModel(RetortWorksheet::class, $fromId, $newId);
        $this->copyModel(Desanders::class, $fromId, $newId);
        $this->copyModel(Desilters::class, $fromId, $newId);
        $this->copyModel(CuttingsByPassed::class, $fromId, $newId);
        $this->copyModel(DailyWaste::class, $fromId, $newId);
        $this->copyModel(AdditionalModel::class, $fromId, $newId);
    
        return redirect()->route('projects.details', $projectId)
                         ->with('success', 'Previous report copied successfully.');
    }

    private function copyModel($modelClass, $fromId, $toId)
    {
        $old = $modelClass::where('id_wellinfo', $fromId)->first();
    
        if ($old) {
            // Deteksi primary key otomatis
            $primaryKey = (new $modelClass)->getKeyName();
    
            // Pengecualian khusus untuk CuttingsByPassed
            if ($modelClass === \App\Models\CuttingsByPassed::class) {
                // Exclude primary key 'id_cuttingbypassed'
                $new = $old->replicate(['id_cuttingbypassed']);
            } else {
                // Umum: exclude primary key
                $new = $old->replicate([$primaryKey]);
            }
    
            // Ganti id_wellinfo ke target
            $new->id_wellinfo = $toId;
            $new->save();
        }
    }
    
    public function downloadSummary($projectId)
    {
        return Excel::download(new WellSummaryExport($projectId), 'Well Summary.xlsx');
    }
    
}
