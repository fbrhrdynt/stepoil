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
                    <button type="button" data-modal-toggle="addFileModal" class="custom-btn-submit">+ Add Files</button>
                </div>

                <div class="overflow-x-auto">
                <table id="datatable" class="min-w-full">
                    <thead>
                        <tr class="text-sm leading-normal">
                            <th>#</th>
                            <th>Title</th>
                            <th>Uploader</th>
                            <th>Type</th>
                            <th>Size</th>
                            <th>Uploaded At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
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

                            <form id="uploadForm" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="category_id" value="{{ $category->id }}">

                                <div class="mb-4">
                                    <label class="block mb-1 font-semibold">Title</label>
                                    <input type="text" name="title" required class="custom-input w-full border px-3 py-2 rounded">
                                </div>

                                <div class="mb-4">
                                    <label class="block mb-1 font-semibold">Select File</label>
                                    <small style="color: red"><i>Allowed file type : pdf, doc, docx, xls, xlsx, ppt, pptx<br>
                                    Maximum file size : 15 MB</i></small>
                                    <input type="file" name="file" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx" required class="custom-input w-full border px-3 py-2 rounded">
                                </div>

                                <div class="flex justify-end gap-2">
                                    <button type="submit" class="custom-btn-submit">
                                        <i class="fa-solid fa-upload mr-1"></i> Upload
                                    </button>
                                    <button type="button" data-modal-hide="addFileModal" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest"></script>
<script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>

<script>
    // Setup CSRF untuk semua AJAX
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let table;

    document.addEventListener("DOMContentLoaded", function () {
        table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('pm.data.getData', $category->id) }}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'title', name: 'title' },
                { data: 'uploader', name: 'uploader' },
                { data: 'file_type', name: 'file_type' },
                { data: 'file_size', name: 'file_size' },
                { data: 'uploaded_at', name: 'uploaded_at' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });

        // Refresh otomatis setiap 5 detik
        /*
        setInterval(() => {
            table.ajax.reload(null, false); // false = tidak reset pagination
        }, 5000);
        */
    });

    $(document).ready(function () {
        $('#uploadForm').on('submit', function(e) {
            e.preventDefault();

            let formData = new FormData(this);
            let categoryId = $('input[name=category_id]').val();

            $.ajax({
                url: `/pm-admin/${categoryId}/store-data`,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Upload Successful',
                        text: response.message,
                        timer: 2000,
                        showConfirmButton: false
                    });
                    document.querySelector('[data-modal-hide="addFileModal"]').click();
                    $('#uploadForm')[0].reset();
                    table.ajax.reload(null, false); // reload DataTable saja
                },
                error: function(xhr) {
                    let message = xhr.responseJSON?.message || 'An unexpected error occurred. Please try again.';
                    Swal.fire({
                        icon: 'error',
                        title: 'Upload Failed',
                        text: message,
                    });
                }
            });
        });
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

@endsection
