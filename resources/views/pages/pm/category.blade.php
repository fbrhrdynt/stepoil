@extends('layouts.app')
@section('title', 'Preventive Maintenance Category | FOTrack')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="xCPtuxM4_gihvpPwv9bX t6gkcSf0Bt4MLItXvDJ_ Nu4HUn5EQpnNJ1itNkrd iHPddplqYvrN6qWgvntn AqVNvLG_H6VHhym2yKMp">
<div class="NM7Z1HBVjN_86WhEcXan mveJTCIb2WII7J4sY22F pXhVRBC8yaUNllmIWxln qUWbS_LTZujDB4XCd11V _Ybd3WwuTVljUT4vEaM3 IvHclGgvMLtYg_ow0uba fzhbbDQ686T8arwvi_bJ _fGhMnSfYmaGrv7DvZ00 _1jTZ8KXRZul60S6czNi">
<div class="container mx-auto px-4 sm:px-8">
    <div class="py-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold leading-tight">Preventive Maintenance Category</h2>
            <button onclick="openModal()" class="custom-btn-submit">+ Add New Category</button>

        </div>

        <table id="pm-category-table" class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th>#</th>
                    <th>Name</th>
                    <th>Frequency</th>
                    <th>Unit</th>
                    <th>Notes</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
<!-- Modal -->
<div id="addCategoryModal" class="fixed inset-0 hidden z-50 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="modal-content bg-white p-6 rounded shadow-lg relative w-full max-w-md">
        <button id="btnCloseModal" class="absolute top-2 right-3 text-2xl text-gray-700 hover:text-black">&times;</button>
        <h2 class="text-xl font-semibold mb-4">Add Preventive Maintenance Category</h2>

        <form id="add-category-form">
            @csrf
            Preventive Maintenance Name
            <input type="text" name="pm_name" class="custom-input w-full mb-3" placeholder="Name" required>
            <br>
            Frequency
            <input type="number" name="frequency" class="custom-input w-full mb-3" placeholder="Frequency" required>
            <br>
            Frequency Unit
            <select name="frequency_unit" class="custom-input w-full mb-3" required>
                <option value="Day">Day</option>
                <option value="Week">Week</option>
                <option value="Month">Month</option>
                <option value="Year">Year</option>
            </select>
            <br>
            Notes   
            <textarea name="notes" class="custom-input w-full mb-3" placeholder="Notes"></textarea>
            <br>
            <input type="hidden" name="id" id="edit_id">
            <div class="text-right">
                <button type="submit" class="custom-btn-submit bg-green-600 text-white px-4 py-2 rounded">Save</button>
                <button type="button" class="btnCancelModal custom-btn-cancel bg-gray-300 px-4 py-2 rounded">Cancel</button>
            </div>
        </form>
    </div>
</div>

</div>
    </div>
</div>
</div>
</section>
@endsection



@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function openModal() {
        const modal = document.getElementById('addCategoryModal');
        if (modal) {
            modal.classList.remove('hidden');
            console.log('[MODAL] Opened');
        }
    }

    $('#btnCloseModal, .btnCancelModal').on('click', function () {
        closeModal();
    });

    function closeModal() {
        $('#addCategoryModal').addClass('hidden');
        $('#add-category-form')[0].reset(); // ✅ bersihkan form
    }

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            closeModal();
        }
    });

    // Datatable
    $(document).ready(function () {
        let table = $('#pm-category-table').DataTable({
            ajax: {
                url: "{{ route('preventive.maintenance.data') }}",
                dataSrc: 'data'
            },
            columns: [
                {
                    data: null,
                    render: (data, type, row, meta) => meta.row + 1
                },
                { data: 'pm_name' },
                { data: 'frequency' },
                { data: 'frequency_unit' },
                { data: 'notes' },
                {
                    data: null,
                    render: function (data, type, row) {
                        return `
                            <div class="flex space-x-2">
                                <button onclick="editCategory(${row.id})"
                                    class="text-blue-600 hover:text-blue-800 font-semibold inline-flex items-center gap-1">
                                    ✏️ Edit
                                </button>
                                <button onclick="deleteCategory(${row.id})"
                                    class="text-red-600 hover:text-red-800 font-semibold inline-flex items-center gap-1">
                                    🗑️ Delete
                                </button>
                            </div>
                        `;
                    }
                }

            ],
            paging: true,
            searching: true
        });

        // Auto-refresh
        setInterval(() => table.ajax.reload(null, false), 5000);

        // Safe submit with feedback
        $('#add-category-form').off('submit').on('submit', function (e) {
            e.preventDefault();

            const id = $('#edit_id').val();
            const isEdit = id !== '';
            const url = isEdit ? `{{ url('pm-category') }}/${id}` : '{{ route("pm-category.store") }}';

            let formData = new FormData(this);

            // ✅ Tambah token CSRF
            formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

            if (isEdit) {
                formData.append('_method', 'PUT'); // spoofing method
            }

            $.ajax({
                url: url,
                method: 'POST', // Always POST for FormData
                data: formData,
                contentType: false,
                processData: false,
                success: function () {
                    Swal.fire({
                        icon: 'success',
                        title: isEdit ? 'Updated!' : 'Saved!',
                        text: `Category ${isEdit ? 'updated' : 'added'} successfully`,
                        timer: 1500,
                        showConfirmButton: false
                    });

                    closeModal();
                    $('#add-category-form')[0].reset();
                    $('#edit_id').val('');
                    $('#pm-category-table').DataTable().ajax.reload(null, false);
                },
                error: function (xhr) {
                    const errorMsg = xhr.responseJSON?.message || 'Something went wrong';
                    Swal.fire('Error', errorMsg, 'error');
                }
            });
        });
    });

    function editCategory(id) {
        $.ajax({
            url: `{{ url('pm-category') }}/${id}`,
            method: 'GET',
            success: function (data) {
                $('#edit_id').val(data.id);
                $('[name="pm_name"]').val(data.pm_name);
                $('[name="frequency"]').val(data.frequency);
                $('[name="frequency_unit"]').val(data.frequency_unit);
                $('[name="notes"]').val(data.notes);

                openModal();
            },
            error: function () {
                Swal.fire('Error', 'Unable to fetch data.', 'error');
            }
        });
    }

    function deleteCategory(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'This will delete the category permanently.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `{{ url('pm-category') }}/${id}`,
                    type: 'POST', // Laravel only accepts POST + _method
                    data: {
                        _method: 'DELETE',
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function () {
                        Swal.fire('Deleted!', 'Category has been deleted.', 'success');
                        $('#pm-category-table').DataTable().ajax.reload(null, false);
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);
                        Swal.fire('Error', 'Failed to delete category.', 'error');
                    }
                });
            }
        });
    }



</script>
@endpush
