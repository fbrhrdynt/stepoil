<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Yajra\DataTables\DataTables;
use App\Models\Wellinfo;
use App\Models\Details;
use App\Models\RetortWorksheet;
use App\Models\Desanders;
use App\Models\Desilters;
use App\Models\CuttingsByPassed;
use App\Models\DailyWaste;
use App\Models\AdditionalModel;

class ProjectController extends Controller
{
    public function index()
    {
        return view('pages.projects');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'contract' => 'required|string|max:20',
                'operator_name' => 'required|string|max:255',
                'drillingrig' => 'required|string|max:255',
                'wellname' => 'required|string|max:255',
                'kodeakses' => 'required|integer',
                'logo' => 'nullable|image|mimes:png,jpg,jpeg|max:900',
            ]);
    
            $data = $request->except('logo');
    
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $newLogoName = $request->contract . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('isi/logos'), $newLogoName);
                $data['logo'] = $newLogoName;
            }
    
            // ✅ 1. Buat project
            $project = Project::create($data);
    
            // ✅ 2. Buat laporan pertama (wellinfo)
            $wellinfo = Wellinfo::create([
                'id_project'   => $project->id_project,
                'curdate'      => now()->format('Y-m-d'),
                'platform'     => $project->contract,
                'wellname'     => $project->wellname,
                'spud_date'    => now()->format('Y-m-d'),
                'location'     => '',
                'companyman'   => '',
                'oim'          => '',
                'mudeng'       => '',
                'urut'         => 1,
                'lockreport'   => 'NO',
            ]);
    
            // ✅ 3. Buat data kosong default di semua table terkait
            Details::create(['id_wellinfo' => $wellinfo->id_wellinfo]);
            RetortWorksheet::create(['id_wellinfo' => $wellinfo->id_wellinfo]);
            Desanders::create(['id_wellinfo' => $wellinfo->id_wellinfo]);
            Desilters::create(['id_wellinfo' => $wellinfo->id_wellinfo]);
            DailyWaste::create(['id_wellinfo' => $wellinfo->id_wellinfo]);
            AdditionalModel::create(['id_wellinfo' => $wellinfo->id_wellinfo]);
            CuttingsByPassed::create([
                'id_wellinfo' => $wellinfo->id_wellinfo,
                'percentage' => 0,
                'volume' => 0,
                'from_depth' => 0,
                'each_from_depth' => 'Metre',
                'to_depth' => 0,
                'each_to_depth' => 'Metre',
            ]);
    
            return response()->json([
                'success' => true,
                'message' => 'Project has been added successfully with initial report.',
                'data' => $project
            ]);
    
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while saving the project.',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function edit($id)
    {
        $project = Project::findOrFail($id);

        if (request()->ajax()) {
            return response()->json($project);
        }

        return view('pages.projects.edit', compact('project'));
    }


    public function update(Request $request, $id)
    {
        try {
            $project = Project::findOrFail($id);
    
            $request->validate([
                'contract' => 'required|string|max:20',
                'operator_name' => 'required|string|max:255',
                'drillingrig' => 'required|string|max:255',
                'wellname' => 'required|string|max:255',
                'kodeakses' => 'required|integer',
                'logo' => 'nullable|image|mimes:png,jpg,jpeg|max:900',
            ]);
    
            $data = $request->except('logo');
    
            // ✅ Jika user upload logo baru
            if ($request->hasFile('logo')) {
                // Hapus logo lama
                if ($project->logo) {
                    $oldLogoPath = public_path('isi/logos/' . $project->logo);
                    if (file_exists($oldLogoPath)) {
                        unlink($oldLogoPath);
                    }
                }
    
                // Simpan logo baru
                $file = $request->file('logo');
                $newLogoName = $request->contract . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('isi/logos'), $newLogoName);
                $data['logo'] = $newLogoName;
            }
    
            $project->update($data);
    
            return redirect()->route('projects.index')->with('success', 'Project has been updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update the project.');
        }
    }
    
    
    

    public function destroy($id)
    {
        try {
            \Log::info("DELETE called for project ID: " . $id);

            $project = Project::findOrFail($id);

            if ($project->logo) {
                $logoPath = public_path('isi/logos/' . $project->logo);
                if (file_exists($logoPath)) {
                    unlink($logoPath);
                }
            }

            $project->delete();

            return response()->json([
                'success' => true,
                'message' => 'Project has been deleted successfully.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete the project.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getProjects(Request $request)
    {
        if ($request->ajax()) {
            $projects = Project::select(['id_project', 'contract', 'operator_name', 'drillingrig', 'wellname', 'kodeakses']);

            return DataTables::of($projects)
                ->addIndexColumn()
                ->addColumn('action', function ($project) {
                    return '
                        <a href="' . route('projects.edit', $project->id_project) . '">
                            <i class="fa-solid fa-pen-to-square text-yellow-500 text-xl hover:text-yellow-600 ml-3"></i>
                        </a> &nbsp;&nbsp;&nbsp;
                        <a href="' . route('projects.details', ['project_id' => $project->id_project]) . '" class="ml-3" title="View Well Info">
                            <i class="fa-solid fa-file-lines text-blue-500 text-xl hover:text-blue-700"></i>
                        </a>&nbsp;&nbsp;&nbsp;
                        <button type="button" onclick="confirmDelete(' . $project->id_project . ')" class="ml-3">
                            <i class="fa-solid fa-trash-can text-red-500 text-xl hover:text-red-700"></i>
                        </button>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return abort(403, 'Unauthorized action.');
    }
}
