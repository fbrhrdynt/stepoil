@extends('layouts.app')
@section('title', 'Preventive Maintenance Data | FOTrack')
@section('content')
@push('styles')
<style>
    #pmTable {
        font-size: 0.85rem; /* Ukuran kecil */
    }

    #pmTable td {
        vertical-align: middle;
        padding-top: 6px;
        padding-bottom: 6px;
    }

    #pmTable th {
        font-weight: 600;
        font-size: 0.8rem;
    }
</style>
@endpush

<div class="xCPtuxM4_gihvpPwv9bX t6gkcSf0Bt4MLItXvDJ_ Nu4HUn5EQpnNJ1itNkrd iHPddplqYvrN6qWgvntn AqVNvLG_H6VHhym2yKMp">
<div class="NM7Z1HBVjN_86WhEcXan mveJTCIb2WII7J4sY22F pXhVRBC8yaUNllmIWxln qUWbS_LTZujDB4XCd11V _Ybd3WwuTVljUT4vEaM3 IvHclGgvMLtYg_ow0uba fzhbbDQ686T8arwvi_bJ _fGhMnSfYmaGrv7DvZ00 _1jTZ8KXRZul60S6czNi">
<div class="container mx-auto px-4 sm:px-8">
    <div class="py-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold leading-tight">All Preventive Maintenance Data</h2>
            <button onclick="openPmModal()" class="custom-btn-submit mb-4">
                + Add New Record
            </button>
        </div>

        <table id="pmTable" class="min-w-full table-auto">
            <thead>
                <tr>
                    <th>#</th>
                    <th>PM Category</th>
                    <th>Asset No</th>
                    <th>Start</th>
                    <th>Due</th>
                    <th>Status</th>
                    <th>Performed By</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<!-- Modal Kustom (Hidden Default) -->
<div id="addPmModal" class="fixed inset-0 hidden z-50 bg-black bg-opacity-50 flex items-center justify-center">
  <div class="modal-content bg-white p-6 rounded shadow-lg relative w-full max-w-lg">
    <button id="btnCloseModal" class="absolute top-2 right-3 text-2xl text-gray-700 hover:text-black">&times;</button>
    <h2 class="text-xl font-semibold mb-4">Add Preventive Maintenance</h2>

    <form id="addPmForm">
      @csrf
      <div class="mb-3">
        <label for="id_pm_detail_category" class="block mb-1">PM Category</label>
        <select class="custom-input w-full" name="id_pm_detail_category" id="id_pm_detail_category" required></select>
      </div>
      <div class="mb-3">
        <label for="id_asset_list" class="block mb-1">Company Asset Number</label>
        <select class="custom-input select2 w-full" name="id_asset_list" id="id_asset_list" required></select>
      </div>
      <div class="mb-3">
        <label for="pm_start" class="block mb-1">PM Start</label>
        <input type="date" name="pm_start" class="custom-input w-full" id="pm_start" required>
      </div>
      <div class="mb-3">
        <label for="pm_due" class="block mb-1">PM Due</label>
        <input type="text" name="pm_due" class="custom-input w-full" id="pm_due" readonly>
      </div>
      <div class="mb-3">
        <label for="performed_by" class="block mb-1">Performed By</label>
        <input type="text" name="performed_by" class="custom-input w-full" id="performed_by" required>
      </div>
      <div class="mb-3">
        <label for="notes" class="block mb-1">Notes</label>
        <textarea name="notes" class="custom-input w-full" rows="3"></textarea>
      </div>
      <div class="text-right mt-4">
        <button type="submit" class="custom-btn-submit">Submit</button>
        <button type="button" class="btnCancelModal custom-btn-cancel">Cancel</button>
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
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<!-- Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    let table;

    function loadTable() {
        table = $('#pmTable').DataTable({
            ajax: {
                url: '{{ route("preventive.data.list") }}',
                dataSrc: 'data'
            },
            destroy: true,
            columns: [
                {
                    data: null,
                    render: function (data, type, row, meta) {
                        return meta.row + 1;
                    },
                    title: 'No'
                },
                { data: 'category' },
                { data: 'asset' }, // ✅ ini sudah oke, karena backend kirim company_asset
                { data: 'pm_start' },
                { data: 'pm_due' },
                {
                    data: 'pm_status',
                    render: function (data, type, row) {
                        if (data === 'VALID') {
                            return '<span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-semibold rounded">VALID</span>';
                        } else if (data === 'PM DUE') {
                            return '<span class="px-2 py-1 bg-red-100 text-red-800 text-xs font-semibold rounded">PM DUE</span>';
                        }
                        return data;
                    }
                },
                { data: 'performed_by' },
                {
                    data: null,
                    render: function (data, type, row) {
                        return `
                            <button class="bg-blue-500 text-black px-2 py-1 rounded" onclick="editPm(${row.id})">Edit</button>
                            <button class="bg-red-500 text-black px-2 py-1 rounded ml-2" onclick="deletePm(${row.id})">Delete</button>
                        `;
                    },
                    orderable: false,
                    searchable: false
                }
            ],
            order: [[2, 'asc']] // 👈 urutkan berdasarkan kolom ke-3 = 'Asset'
        });
    }

    $(document).ready(function () {
        loadTable();

        // Refresh setiap 5 detik
        setInterval(function () {
            table.ajax.reload(null, false); // reload data tanpa reset pagination
        }, 5000);
    });

    function openPmModal() {
        console.log('Modal clicked'); // ← Debug
        $('#addPmModal').removeClass('hidden');
        $('#addPmForm')[0].reset();
        $('#id_asset_list').val(null).trigger('change');
        $('#id_pm_detail_category').val('').trigger('change');
        $('#pm_due').val('');
    }

    function closePmModal() {
        $('#addPmModal').addClass('hidden');
        $('#addPmForm')[0].reset();
    }

    $(document).ready(function () {
        $('#btnCloseModal, .btnCancelModal').on('click', function () {
            closePmModal();
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                closePmModal();
            }
        });
    });

let categoryData = {};

$(document).ready(function () {
    // ✅ Init select2 for asset
    $('#id_asset_list').select2({
        placeholder: 'Select Asset',
        width: '100%',
        ajax: {
            url: '{{ route("assets.select") }}', // ✅ gunakan route JSON
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term // optional search
                };
            },
            processResults: function (data) {
                return {
                    results: data.map(item => ({
                        id: item.id,
                        text: `${item.asset_name} - ${item.company_asset}`
                    }))
                };
            }
        }
    });

    // ✅ Load PM Categories via AJAX
    $.ajax({
        url: '{{ route("pm-detail-category.select") }}', // ✅ gunakan route JSON
        method: 'GET',
        success: function (data) {
            categoryData = {};
            data.forEach(function (item) {
                $('#id_pm_detail_category').append(
                    `<option value="${item.id}" data-frequency="${item.frequency}" data-unit="${item.frequency_unit}">${item.pm_name}</option>`
                );
                categoryData[item.id] = item;
            });
        },
        error: function () {
            alert("Failed to load PM Categories");
        }
    });

    // ✅ Auto calculate due date
    $('#id_pm_detail_category, #pm_start').on('change', function () {
        const categoryId = $('#id_pm_detail_category').val();
        const startDate = $('#pm_start').val();

        if (categoryId && startDate) {
            const cat = categoryData[categoryId];
            let date = new Date(startDate);

            if (cat.frequency_unit === 'Day') {
                date.setDate(date.getDate() + parseInt(cat.frequency));
            } else if (cat.frequency_unit === 'Week') {
                date.setDate(date.getDate() + parseInt(cat.frequency) * 7);
            } else if (cat.frequency_unit === 'Month') {
                date.setMonth(date.getMonth() + parseInt(cat.frequency));
            } else if (cat.frequency_unit === 'Year') {
                date.setFullYear(date.getFullYear() + parseInt(cat.frequency));
            }

            const formatted = date.toISOString().split('T')[0];
            $('#pm_due').val(formatted);
        }
    });

    // ✅ Handle form submission
    $('#addPmForm').on('submit', function (e) {
        e.preventDefault();

        const dueDate = new Date($('#pm_due').val());
        const today = new Date();
        today.setHours(0, 0, 0, 0);
        const status = (dueDate <= today) ? 'PM DUE' : 'VALID';

        let statusInput = $('#pm_status');
        if (statusInput.length === 0) {
            $('<input>').attr({
                type: 'hidden',
                id: 'pm_status',
                name: 'pm_status',
                value: status
            }).appendTo('#addPmForm');
        } else {
            statusInput.val(status);
        }

        const formData = $(this).serialize();
        const id = $(this).attr('data-edit-id');
        const url = id ? `{{ url('preventive-data') }}/${id}` : '{{ route("preventive.data.store") }}';
        const method = id ? 'PUT' : 'POST';

        $.ajax({
            url: url,
            type: method,
            data: formData,
            success: function () {
                Swal.fire('Success!', id ? 'Record updated.' : 'Record added.', 'success');
                $('#addPmModal').addClass('hidden');
                $('#addPmForm')[0].reset();
                $('#id_asset_list').val(null).trigger('change');
                $('#id_pm_detail_category').val('').trigger('change');
                $('#addPmForm').removeAttr('data-edit-id');
                table.ajax.reload();
            },
            error: function () {
                Swal.fire('Error', 'Something went wrong.', 'error');
            }
        });
    });

    // ✅ Reset form dan select2 saat modal ditutup
    $('#addPmModal').on('hidden.bs.modal', function () {
        // Reset semua field form
        $('#addPmForm')[0].reset();

        // Reset select2 dropdown
        $('#id_asset_list').val(null).trigger('change');
        $('#id_pm_detail_category').val('').trigger('change');

        // Kosongkan PM Due (karena readonly)
        $('#pm_due').val('');
    });

});

    window.editPm = function(id) {
        $.get(`{{ url('preventive-data') }}/${id}/edit`, function (data) {
            $('#id_pm_detail_category').val(data.id_pm_detail_category).trigger('change');
            $('#id_asset_list').append(
                new Option(`${data.asset.asset_name} - ${data.asset.company_asset}`, data.id_asset_list, true, true)
            ).trigger('change');

            $('#pm_start').val(data.pm_start);
            $('#pm_due').val(data.pm_due);
            $('#performed_by').val(data.performed_by);
            $('#notes').val(data.notes);

            $('#addPmForm').attr('data-edit-id', data.id);
            $('#addPmModal').removeClass('hidden'); // jika pakai Tailwind modal
            $('#addPmModal').modal('show'); // jika pakai Bootstrap modal
        });
    }

    window.deletePm = function(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'This record will be deleted.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `{{ url('preventive-data') }}/${id}`,
                    type: 'DELETE',
                    data: { _token: '{{ csrf_token() }}' },
                    success: function () {
                        Swal.fire('Deleted!', 'Record deleted.', 'success');
                        table.ajax.reload(null, false);
                    },
                    error: function () {
                        Swal.fire('Error', 'Failed to delete.', 'error');
                    }
                });
            }
        });
    }
</script>



@endpush

