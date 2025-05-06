<?php

namespace App\Http\Controllers;

use App\Models\AssetList;
use App\Models\InspectionCategory;
use App\Models\InspectionDetail;
use App\Models\PmDetailCategory;
use App\Models\PmDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AssetListController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $assets = \App\Models\AssetList::with(['pm_details.pmCategory', 'inspectionDetails'])->get();
    
            return response()->json([
                'data' => $assets
            ]);
        }
    
        return view('pages.assets.index');
    }    
     
    public function select(Request $request)
    {
        $search = $request->q;
    
        $assets = \App\Models\AssetList::query()
            ->when($search, fn($q) => $q->where('asset_name', 'like', "%{$search}%")
                                        ->orWhere('company_asset', 'like', "%{$search}%"))
            ->select('id', 'asset_name', 'company_asset')
            ->limit(10)
            ->get();
    
        return response()->json($assets);
    }     

    public function getPmDetails($id)
    {
        $asset = \App\Models\AssetList::with('pm_details.pmCategory')->findOrFail($id);
        return response()->json($asset);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'asset_name'       => 'required|string|max:255',
            'company_asset'    => 'nullable|string|max:255',
            'mfg_sn'           => 'nullable|string|max:255',
            'status'           => 'required|string',
            'id_pm_category'   => 'required|exists:pm_categories,id',
            'notes'            => 'nullable|string',
            'coc'              => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);
    
        // Simpan data asset (tanpa file dulu)
        $asset = \App\Models\AssetList::create($validated);
    
        // Simpan file jika ada
        if ($request->hasFile('coc')) {
            $file = $request->file('coc');
            $ext = $file->getClientOriginalExtension();
            $fileName = "{$asset->id}-{$asset->mfg_sn}.{$ext}";
    
            // Simpan ke public disk
            $path = $file->storeAs('coc_files', $fileName, 'public');
    
            // Update path di DB
            $asset->update(['coc' => $path]);
        }
    }
    
    public function show($id)
    {
        $asset = AssetList::with('inspectionDetails')->findOrFail($id);
        return response()->json($asset);
    }
    

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'asset_name' => 'required|string|max:255',
            'company_asset' => 'nullable|string|max:255',
            'mfg_sn' => 'nullable|string|max:255',
            'status' => 'required|string',
            'id_pm_category' => 'required|exists:pm_categories,id',
            'notes' => 'nullable|string',
            'coc' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);
    
        $asset = AssetList::findOrFail($id);
        $asset->update($validated);
    
        if ($request->hasFile('coc')) {
            // Hapus file lama jika ada
            if ($asset->coc && \Storage::disk('public')->exists($asset->coc)) {
                \Storage::disk('public')->delete($asset->coc);
            }
        
            $file = $request->file('coc');
            $ext = $file->getClientOriginalExtension();
            $filename = "{$asset->id}-{$asset->mfg_sn}-" . time() . ".{$ext}";
            $path = $file->storeAs('public/coc_files', $filename);
            $asset->update(['coc' => str_replace('public/', '', $path)]);
        }        
    
        return response()->json([
            'message' => 'Asset updated successfully.',
            'data' => $asset
        ]);
    }

    public function destroy($id)
    {
        $asset = AssetList::findOrFail($id);
    
        // Hapus file COC jika ada
        if ($asset->coc && Storage::disk('public')->exists($asset->coc)) {
            Storage::disk('public')->delete($asset->coc);
        }
    
        $asset->delete();
    
        return response()->json(['message' => 'Asset and its file deleted successfully']);
    }
    
}
