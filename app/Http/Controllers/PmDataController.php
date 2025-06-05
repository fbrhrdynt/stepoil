<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PmCategory;
use App\Models\PmData;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

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
    
    public function getData($categoryId)
    {
        $category = PmCategory::findOrFail($categoryId);
    
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
            ->addColumn('file_type', function($row) {
                return match ($row->file_type) {
                    'application/vnd.openxmlformats-officedocument.presentationml.presentation' => 'application/pptx',
                    'application/vnd.ms-powerpoint' => 'application/ppt',
                    'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'application/docx',
                    'application/msword' => 'application/doc',
                    'application/vnd.ms-excel' => 'application/xls',
                    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' => 'application/xlsx',
                    'application/pdf' => 'application/pdf',
                    default => $row->file_type,
                };
            })            
            ->rawColumns(['file', 'action'])
            ->make(true);
    }    

    public function store(Request $request, $categoryId)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:15360', // 15MB = 15360KB
        ]);
    
        $category = PmCategory::findOrFail($categoryId);
    
        $slugCategory = Str::slug($category->name);
        $slugTitle = Str::slug($request->input('title'));
        $ext = $request->file('file')->getClientOriginalExtension();
        $fileName = 'id_' . $slugTitle . '.' . $ext;
        $path = 'pm/' . $slugCategory;
    
        try {
            $storedPath = $request->file('file')->storeAs($path, $fileName, 'public'); // disimpan di public
    
            PmData::create([
                'category_id' => $categoryId,
                'title' => $request->input('title'),
                'file_path' => $storedPath,
                'file_type' => $request->file('file')->getClientMimeType(),
                'file_size' => $request->file('file')->getSize(),
                'id_user' => auth()->id(),
            ]);
    
            return response()->json([
                'success' => true,
                'message' => 'The file has been successfully uploaded and stored.',
            ], 200);
    
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Upload failed: ' . $e->getMessage(),
            ], 500);
        }
    }
    
}
