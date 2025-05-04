<?php

namespace App\Http\Controllers;

use App\Models\InspectionCategory;
use Illuminate\Http\Request;

class InspectionCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $categories = \App\Models\InspectionCategory::select('id_inspection', 'name_inspection', 'notes')->get();
            return response()->json(['data' => $categories]);
        }
    
        return view('pages.inspection.index');
    }
    

    /**
     * Get all inspection categories for DataTable.
     */
    public function getData()
    {
        try {
            $categories = \App\Models\InspectionCategory::select('id_inspection', 'name_inspection', 'notes')->get();
            return response()->json(['data' => $categories]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
    

    /**
     * Store a newly created inspection category.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_inspection' => 'required|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $category = InspectionCategory::create($validated);

        return response()->json([
            'message' => 'Inspection Category successfully added.',
            'data' => $category
        ], 201);
    }

    /**
     * Display the specified inspection category (for edit).
     */
    public function show($id)
    {
        $category = InspectionCategory::findOrFail($id);

        return response()->json($category);
    }

    /**
     * Update the specified inspection category.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name_inspection' => 'required|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $category = InspectionCategory::findOrFail($id);
        $category->update($validated);

        return response()->json([
            'message' => 'Inspection Category successfully updated.',
            'data' => $category
        ]);
    }

    /**
     * Remove the specified inspection category from storage.
     */
    public function destroy($id)
    {
        $category = InspectionCategory::findOrFail($id);
        $category->delete();

        return response()->json([
            'message' => 'Inspection Category successfully deleted.'
        ]);
    }
}
