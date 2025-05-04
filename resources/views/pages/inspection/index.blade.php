@extends('layouts.app')

@section('title', 'Inspection Category | FOTrack')
@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

<div class="xCPtuxM4_gihvpPwv9bX t6gkcSf0Bt4MLItXvDJ_ Nu4HUn5EQpnNJ1itNkrd iHPddplqYvrN6qWgvntn AqVNvLG_H6VHhym2yKMp">
    <div class="NM7Z1HBVjN_86WhEcXan mveJTCIb2WII7J4sY22F pXhVRBC8yaUNllmIWxln qUWbS_LTZujDB4XCd11V _Ybd3WwuTVljUT4vEaM3 IvHclGgvMLtYg_ow0uba fzhbbDQ686T8arwvi_bJ _fGhMnSfYmaGrv7DvZ00 _1jTZ8KXRZul60S6czNi">
        <div class="container mx-auto px-4 sm:px-8">
            <div class="py-8">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-semibold leading-tight">Inspections Categories</h2>
                    <button id="addBtn" class="custom-btn-submit">
                        + Add New Category
                    </button>
                </div>

                <table id="inspectionTable" class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2">#</th>
                            <th class="py-2">Name</th>
                            <th class="py-2">Notes</th>
                            <th class="py-2">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="modalForm" class="hidden fixed z-10 inset-0 overflow-y-auto bg-gray-700 bg-opacity-50">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white rounded-lg p-8">
            <h2 class="text-xl mb-4" id="modalTitle">Add Category</h2>
            <form id="formSubmit">
                @csrf
                <input type="hidden" name="id" id="categoryId">
                <div class="mb-4">
                    <label class="block mb-1">Name</label>
                    <input type="text" name="name_inspection" id="name_inspection" class="custom-input" required>
                </div>
                <div class="mb-4">
                    <label class="block mb-1">Notes</label>
                    <textarea name="notes" id="notes" class="custom-input"></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="custom-btn-submit mr-2">Save</button>
                    <button type="button" id="closeModal" class="custom-btn-cancel bg-gray-500">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>  
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
let table;

$(document).ready(function() {
    table = $('#inspectionTable').DataTable({
        ajax: {
            url: '{{ route('inspection-category.index') }}',
            type: "GET",
            dataSrc: 'data',
            error: function(xhr, error, thrown) {
                Swal.fire('Error', 'Failed to load data. Please check server.', 'error');
            }
        },
        columns: [
            {
                data: null,
                render: function (data, type, row, meta) {
                    return meta.row + 1;
                },
                orderable: false,
                searchable: false
            },
            { data: 'name_inspection' },
            { data: 'notes' },
            { 
                data: null,
                orderable: false,
                searchable: false,
                render: function (data, type, row) {
                    return `
                        <button onclick="editData(${row.id_inspection})" class="bg-blue-500 text-black px-2 py-1 rounded">Edit</button>
                        <button onclick="deleteData(${row.id_inspection})" class="bg-red-500 text-black px-2 py-1 rounded ml-2">Delete</button>
                    `;
                }
            }
        ]
    });




    $('#addBtn').on('click', function() {
        $('#formSubmit')[0].reset();
        $('#modalTitle').text('Add Category');
        $('#modalForm').removeClass('hidden');
        $('#categoryId').val('');
    });

    $('#closeModal').on('click', function() {
        $('#modalForm').addClass('hidden');
    });

    $('#formSubmit').on('submit', function(e) {
        e.preventDefault();
        let id = $('#categoryId').val();
        let url = id ? '{{ url('inspection-category') }}/' + id : '{{ route("inspection-category.store") }}';
        let method = id ? 'PUT' : 'POST';

        $.ajax({
            url: url,
            method: method,
            data: $(this).serialize(),
            success: function(response) {
                Swal.fire('Success', response.message, 'success');
                $('#modalForm').addClass('hidden');
                table.ajax.reload();
            },
            error: function(xhr) {
                Swal.fire('Error', xhr.responseJSON.message, 'error');
            }
        });
    });
});

function editData(id) {
    $.get('{{ url('inspection-category') }}/' + id, function(data) {
        $('#modalTitle').text('Edit Category');
        $('#categoryId').val(data.id_inspection);
        $('#name_inspection').val(data.name_inspection);
        $('#notes').val(data.notes);
        $('#modalForm').removeClass('hidden');
    });
}

function deleteData(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "This action cannot be undone.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '{{ url('inspection-category') }}/' + id,
                method: 'DELETE',
                data: { _token: '{{ csrf_token() }}' },
                success: function(response) {
                    Swal.fire('Deleted!', response.message, 'success');
                    table.ajax.reload();
                }
            });
        }
    })
}
</script>
@endpush
