<?php

namespace App\Http\Controllers;

use App\Models\PmCategory;
use Illuminate\Http\Request;

class PmCategoryController extends Controller
{
    public function index()
    {
        $categories = PmCategory::latest()->get();
        return view('pages.pm.index', compact('categories'));
    }

    public function create()
    {
        return view('pages.pm.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'notes' => 'nullable|string',
        ]);

        PmCategory::create($request->only('name', 'notes'));

        return redirect()->route('pm.index')->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        $category = PmCategory::findOrFail($id);
        return view('pages.pm.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'notes' => 'nullable|string',
        ]);
    
        $category = PmCategory::findOrFail($id);
        $category->update($request->only('name', 'notes'));
    
        return redirect()->route('pm.index')->with('success', 'Category updated successfully.');
    }    

    public function destroy($id)
    {
        $category = PmCategory::findOrFail($id);
        $category->delete();
    
        return redirect()->route('pm.index')->with('success', 'Category deleted successfully.');
    }
    
    public function maintenanceView()
    {
        $categories = \App\Models\PmCategory::with(['data'])->get();
        return view('pages.pm.card', compact('categories'));
    }
    
}
