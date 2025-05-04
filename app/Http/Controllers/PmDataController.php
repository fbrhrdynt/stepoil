<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PmCategory;
use App\Models\PmData;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PmDataController extends Controller
{
    public function index($categoryId)
    {
        $category = PmCategory::findOrFail($categoryId);
        $files = $category->data()->with('uploader')->latest()->get(); // <-- Pindah ke sini
    
        if (request()->ajax()) {
            $data = $category->data()->with('user')->latest()->get();
    
            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('file', function($row) {
                    return '<a href="'.route('pm.data.download', [$row->category_id, $row->id]).'" target="_blank" class="text-blue-600 hover:underline">View</a>';
                })
                ->addColumn('uploader', function($row) {
                    return $row->user->employee_name ?? 'Unknown';
                })
                ->addColumn('uploaded_at', function($row) {
                    return $row->created_at ? $row->created_at->format('d M Y H:i') : '-';
                })
                ->addColumn('action', function($row) use ($categoryId) {
                    return '
                        <a href="'.route('pm.data.edit', [$categoryId, $row->id]).'" class="text-yellow-500 hover:underline">Edit</a>
                        |
                        <button onclick="confirmDelete('.$categoryId.', '.$row->id.')" class="text-red-600 hover:underline">Delete</button>
                    ';
                })
                ->rawColumns(['file', 'action'])
                ->make(true);
        }
    
        return view('pages.pm.data-index', compact('category', 'files'));
    }
    
    

    public function store(Request $request, $categoryId)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|mimes:pdf|max:20480', // Max 20MB
        ]);

        $category = PmCategory::findOrFail($categoryId);

        $path = 'pm/' . Str::slug($category->name);

        try {
            $storedPath = $request->file('file')->store($path, 'private');

            PmData::create([
                'category_id' => $categoryId,
                'title' => $request->input('title'),
                'file_path' => $storedPath,
                'file_type' => $request->file('file')->getClientMimeType(),
                'file_size' => $request->file('file')->getSize(),
                'id_user' => auth()->id(), // ambil id user dari auth
            ]);

            return response()->json([
                'success' => true,
                'message' => 'File uploaded successfully.',
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Upload failed: ' . $e->getMessage(),
            ], 500);
        }
    }
}
