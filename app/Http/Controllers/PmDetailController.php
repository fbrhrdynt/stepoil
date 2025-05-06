<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PmDetail;
use Carbon\Carbon;

class PmDetailController extends Controller
{
    // Tampilkan halaman DataTable
    public function index()
    {
        return view('pages.pm.all-data');
    }

    // API untuk DataTables
    public function getList()
    {
        $data = PmDetail::with(['pmCategory', 'asset'])->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'category' => optional($item->pmCategory)->pm_name,
                'asset' => optional($item->asset)->company_asset, // 👈 pakai company_asset
                'pm_start' => \Carbon\Carbon::parse($item->pm_start)->format('M d, Y'),
                'pm_due' => \Carbon\Carbon::parse($item->pm_due)->format('M d, Y'),
                'pm_status' => $item->pm_status,
                'performed_by' => $item->performed_by,
            ];
        });
    
        return response()->json(['data' => $data]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'id_pm_detail_category' => 'required|exists:pm_detail_category,id',
            'id_asset_list' => 'required|exists:assets_list,id',
            'pm_start' => 'required|date',
            'pm_due' => 'required|date',
            'pm_status' => 'required|string',
            'performed_by' => 'required|string',
            'notes' => 'nullable|string'
        ]);
    
        PmDetail::create($request->all());
    
        return response()->json(['success' => true]);
    }

    public function edit($id)
    {
        $pm = PmDetail::with('asset', 'pmCategory')->findOrFail($id);
        return response()->json($pm);
    }
    
    public function update(Request $request, $id)
    {
        $pm = PmDetail::findOrFail($id);
        $pm->update($request->all());
        return response()->json(['message' => 'Updated successfully']);
    }
    
    public function destroy($id)
    {
        $pm = PmDetail::findOrFail($id);
        $pm->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
    
    
}
