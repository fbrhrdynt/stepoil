<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\InspectionDetail;
use App\Models\AssetList;
use App\Models\InspectionCategory;


class InspectionDetailController extends Controller
{
    public function show($id)
    {
        $asset = AssetList::with('inspectionDetails')->findOrFail($id);
        return response()->json($asset);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_inspection' => 'required|exists:inspection_category,id_inspection',
            'id_asset_list' => 'required|exists:assets_list,id',
            'inspection_date' => 'required|date',
            'inspection_exp' => 'required|date',
            'cert' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'notes' => 'nullable|string'
        ]);
    
        $asset = AssetList::findOrFail($request->id_asset_list);
        $category = InspectionCategory::findOrFail($request->id_inspection);
    
        $prefix = 'insp_' . Str::slug(Str::substr($category->name_inspection, 0, 2), '');
        $filename = $prefix . '_' . Str::slug($asset->company_asset) . '.' . $request->file('cert')?->getClientOriginalExtension();
    
        $existing = InspectionDetail::where([
            'id_inspection' => $request->id_inspection,
            'id_asset_list' => $request->id_asset_list
        ])->first();
    
        // Hapus file lama jika ada dan upload file baru
        $certPath = $existing?->cert; // simpan path lama
        if ($request->hasFile('cert')) {
            if ($certPath && Storage::disk('public')->exists($certPath)) {
                Storage::disk('public')->delete($certPath);
            }
    
            $storedPath = $request->file('cert')->storeAs('inspection_files', $filename, 'public');
            $certPath = str_replace('public/', '', $storedPath); // disimpan tanpa "public/"
        }
    
        // Update or Create data
        $detail = InspectionDetail::updateOrCreate(
            [
                'id_inspection' => $request->id_inspection,
                'id_asset_list' => $request->id_asset_list
            ],
            [
                'inspection_date' => $request->inspection_date,
                'inspection_exp' => $request->inspection_exp,
                'cert' => $certPath,
                'notes' => $request->notes
            ]
        );
    
        return response()->json([
            'message' => 'Inspection certificate has been successfully updated.',
            'detail' => $detail
        ]);
    }
    
    // Untuk menampilkan halaman blade
    public function dataIndex()
    {
        return view('pages.inspection.data');
    }

    // Untuk mengambil semua data inspection (AJAX/DataTable)
    public function getAllData()
    {
        $data = InspectionDetail::with(['inspectionCategory', 'asset'])->get();
    
        return datatables()->of($data)
            ->addColumn('category', function ($row) {
                return $row->inspectionCategory->name_inspection ?? '-';
            })
            ->addColumn('asset', function ($row) {
                return $row->asset->company_asset ?? '-';
            })
            ->addColumn('cert_link', function ($row) {
                if ($row->cert) {
                    $url = asset('storage/' . $row->cert);
                    return '<button class="btn-view" data-url="' . $url . '">View Cert</button>';
                }
                return '-';
            })            
            ->rawColumns(['cert_link']) // supaya link HTML tampil
            ->make(true);
    }
    

}
