@extends('layouts.app')
@section('title', 'Files in ' . $category->name . ' | FOTrack')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css">

<div class="xCPtuxM4_gihvpPwv9bX t6gkcSf0Bt4MLItXvDJ_ Nu4HUn5EQpnNJ1itNkrd iHPddplqYvrN6qWgvntn AqVNvLG_H6VHhym2yKMp">
    <div class="NM7Z1HBVjN_86WhEcXan mveJTCIb2WII7J4sY22F pXhVRBC8yaUNllmIWxln qUWbS_LTZujDB4XCd11V _Ybd3WwuTVljUT4vEaM3 IvHclGgvMLtYg_ow0uba fzhbbDQ686T8arwvi_bJ _fGhMnSfYmaGrv7DvZ00 _1jTZ8KXRZul60S6czNi">
        <div class="container mx-auto px-4 sm:px-8">
            <div class="py-8">

                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-semibold leading-tight">Files in: {{ $category->name }}</h2>
                    <a href="#" data-modal-toggle="addFileModal"
                        class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded">
                        + Add Files
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table id="datatable" class="min-w-full leading-normal border border-gray-300">
                        <thead>
                            <tr class="bg-gray-400 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">#</th>
                                <th class="py-3 px-6 text-left">Title</th>
                                <th class="py-3 px-6 text-left">Uploader</th>
                                <th class="py-3 px-6 text-left">Type</th>
                                <th class="py-3 px-6 text-left">Size</th>
                                <th class="py-3 px-6 text-left">Uploaded At</th>
                                <th class="py-3 px-6 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($files as $index => $file)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6">{{ $index + 1 }}</td>
                                <td class="py-3 px-6 font-semibold text-gray-800">{{ $file->title }}</td>
                                <td class="py-3 px-6">{{ $file->uploader->employee_name ?? '-' }}</td>
                                <td class="py-3 px-6">{{ strtoupper($file->file_type) }}</td>
                                <td class="py-3 px-6">{{ number_format($file->file_size / 1024, 2) }} KB</td>
                                <td class="py-3 px-6">{{ $file->created_at ? $file->created_at->format('d M Y H:i') : '-' }}</td>
                                <td class="py-3 px-6 space-x-2">
                                    <a href="{{ route('pm.data.download', [$category->id, $file->id]) }}" target="_blank" class="text-blue-500 hover:underline">View</a>
                                    <a href="#" 
                                        data-modal-target="editFileModal{{ $file->id }}" 
                                        data-modal-toggle="editFileModal{{ $file->id }}" 
                                        class="text-yellow-500 hover:underline">
                                            Edit
                                    </a>
                                    <button 
                                        type="button"
                                        onclick="confirmDelete({{ $category->id }}, {{ $file->id }}, '{{ $file->title }}')"
                                        class="text-red-500 hover:underline">
                                        Delete
                                    </button>
                                </td>

                                <!-- Edit File Modal -->
                                <div id="editFileModal{{ $file->id }}"
                                    tabindex="-1"
                                    aria-hidden="true"
                                    class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center hidden">
                                    
                                    <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6 relative">
                                        <div class="flex justify-between items-center mb-4">
                                            <h3 class="text-xl font-semibold">Edit File</h3>
                                            <button type="button" data-modal-hide="editFileModal{{ $file->id }}" class="text-gray-500 hover:text-red-500">
                                                <i class="fa-solid fa-times text-lg"></i>
                                            </button>
                                        </div>

                                        <form method="POST" action="{{ route('pm.data.update', [$category->id, $file->id]) }}">
                                            @csrf
                                            @method('PUT')

                                            <div class="mb-4">
                                                <label class="block mb-1 font-semibold">Title</label>
                                                <input type="text" name="title" value="{{ $file->title }}" required class="custom-input w-full border px-3 py-2 rounded">
                                            </div>

                                            <div class="flex justify-end gap-2">
                                                <button type="submit"
                                                    class="custom-btn-submit">
                                                    <i class="fa-solid fa-save mr-1"></i> Update
                                                </button>
                                                <button type="button" data-modal-hide="editFileModal{{ $file->id }}"
                                                    class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">
                                                    Cancel
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-gray-500">No files found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Modal Add File -->
                    <div id="addFileModal"
                        tabindex="-1"
                        aria-hidden="true"
                        class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center hidden">

                        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6 relative">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-xl font-semibold">Add New File</h3>
                                <button type="button" data-modal-hide="addFileModal" class="text-gray-500 hover:text-red-500">
                                    <i class="fa-solid fa-times text-lg"></i>
                                </button>
                            </div>

                            <form method="POST" action="{{ route('pm.data.store', $category->id) }}" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-4">
                                    <label class="block mb-1 font-semibold">Title</label>
                                    <input type="text" name="title" required class="custom-input w-full border px-3 py-2 rounded">
                                </div>

                                <div class="mb-4">
                                    <label class="block mb-1 font-semibold">Select File (PDF only)</label>
                                    <input type="file" name="file" accept="application/pdf" required class="custom-input w-full border px-3 py-2 rounded">
                                </div>

                                <div class="flex justify-end gap-2">
                                    <button type="submit"
                                            class="custom-btn-submit">
                                        <i class="fa-solid fa-upload mr-1"></i> Upload
                                    </button>
                                    <button type="button" data-modal-hide="addFileModal"
                                            class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">
                                        Cancel
                                    </button>
                                </div>

                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        new simpleDatatables.DataTable("#datatable");
    });

    function confirmDelete(categoryId, fileId, title) {
        Swal.fire({
            title: 'Are you sure?',
            text: `File "${title}" will be permanently deleted!`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                const baseUrl = "{{ url('pm-admin') }}";
                window.location.href = `${baseUrl}/${categoryId}/${fileId}/delete`;
            }
        });
    }
</script>

@if(session('success'))
<script>
    document.addEventListener("DOMContentLoaded", function () {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session('success') }}',
            confirmButtonColor: '#3085d6'
        });
    });
</script>
@endif

@endsection
