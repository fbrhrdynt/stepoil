<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PmDetailCategory;
use Illuminate\Support\Facades\Response;

class PmDetailCategoryController extends Controller
{
    public function index()
    {
        $categories = PmDetailCategory::all();
        return view('pages.pm.category', compact('categories'));
    }

    public function getData()
    {
        $data = PmDetailCategory::all();

        return response()->json([
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'pm_name' => 'required|string|max:255',
            'frequency' => 'required|numeric|min:1',
            'frequency_unit' => 'required|in:Day,Week,Month,Year',
            'notes' => 'nullable|string',
        ]);
    
        PmDetailCategory::create($request->all());
    
        return response()->json(['message' => 'Category saved']);
    }

    public function show($id)
    {
        $data = \App\Models\PmDetailCategory::find($id);

        if (!$data) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        \Log::info('--- UPDATE CALLED ---');
        \Log::info('Incoming ID: ' . $id);
        \Log::info($request->all());
    
        $category = PmDetailCategory::findOrFail($id);
        $category->update($request->only(['pm_name', 'frequency', 'frequency_unit', 'notes']));
    
        return response()->json(['message' => 'Category updated']);
    }
    
    public function destroy($id)
    {
        $category = PmDetailCategory::findOrFail($id);
        $category->delete();
    
        return response()->json(['message' => 'Category deleted']);
    }
        


        
}
