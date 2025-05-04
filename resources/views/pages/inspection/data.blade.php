@extends('layouts.app')
@section('title', 'All Inspection Data | FOTrack')
@section('content')
<meta name="app-url" content="{{ url('/') }}">

<div class="xCPtuxM4_gihvpPwv9bX t6gkcSf0Bt4MLItXvDJ_ Nu4HUn5EQpnNJ1itNkrd iHPddplqYvrN6qWgvntn AqVNvLG_H6VHhym2yKMp">
<div class="NM7Z1HBVjN_86WhEcXan mveJTCIb2WII7J4sY22F pXhVRBC8yaUNllmIWxln qUWbS_LTZujDB4XCd11V _Ybd3WwuTVljUT4vEaM3 IvHclGgvMLtYg_ow0uba fzhbbDQ686T8arwvi_bJ _fGhMnSfYmaGrv7DvZ00 _1jTZ8KXRZul60S6czNi">
<div class="container mx-auto px-4 sm:px-8">
    <div class="py-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold leading-tight">All Inspection Data</h2>
            <a href="#" onclick="openAddCertModal()" class="px-4 py-2 bg-green-900 text-white rounded-lg hover:bg-green-600">
                + Add New Certificate
            </a>
        </div>


        <table id="inspectionTable" class="min-w-full bg-white">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Asset No</th>
                    <th>Inspection Date</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th>Certificate</th>
                </tr>
            </thead>
        </table>


    </div>
</div>

</div>
    </div>
</div>
</div>
</section>
@endsection
<!-- Modal Preview PDF -->
<div id="pdfModal" class="hidden fixed inset-0 z-50 bg-black bg-opacity-10 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-lg max-w-4xl w-full relative p-4">
        <button type="button" id="pdfCloseBtn"
            class="absolute top-2 right-4 text-2xl font-bold text-gray-600 hover:text-black focus:outline-none">
            &times;
        </button>
        <h2 class="text-lg font-semibold mb-4">Certificate Preview</h2>
        <iframe id="pdfViewer" src="" width="100%" height="600px" class="border rounded shadow"></iframe>
    </div>
</div>

<!-- Modal Add Certificate -->
<div id="modalAddCert" class="hidden fixed inset-0 z-50 bg-black bg-opacity-10 flex items-center justify-center">
    <div class="bg-white rounded-lg p-6 w-full max-w-xl relative shadow-lg">
        <button onclick="closeAddCertModal()" class="absolute top-2 right-3 text-2xl text-gray-600 hover:text-black">&times;</button>
        <h2 class="text-xl font-semibold mb-4">Add New Certificate</h2>

        <form id="formAddCert" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="id_inspection" class="block font-medium mb-1">Inspection Category</label>
                <select name="id_inspection" id="id_inspection" class="custom-input w-full border rounded p-2">
                    @foreach(\App\Models\InspectionCategory::all() as $cat)
                        <option value="{{ $cat->id_inspection }}">{{ $cat->name_inspection }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="id_asset_list" class="block font-medium mb-1">Company Asset Number</label>
                <select name="id_asset_list" id="id_asset_list" class="custom-input w-full border rounded p-2">
                    @foreach(\App\Models\AssetList::all() as $asset)
                        <option value="{{ $asset->id }}">{{ $asset->company_asset }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">Inspection Date</label>
                <input type="date" name="inspection_date" class="custom-input w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">Expiry Date</label>
                <input type="date" name="inspection_exp" class="custom-input w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">Certificate File</label>
                <input type="file" name="cert" accept=".pdf,.doc,.docx" class="custom-input w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">Notes</label>
                <textarea name="notes" class="custom-input w-full border rounded p-2" rows="2"></textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="custom-btn-submit">Save</button>
            </div>
        </form>
    </div>
</div>



@push('scripts')
<!-- jQuery dan DataTables harus di-include -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

<script>
$(document).ready(function () {
    // Format tanggal menjadi "March 13, 2025"
    function formatDate(dateStr) {
        if (!dateStr) return '-';
        const date = new Date(dateStr);
        return date.toLocaleDateString('en-US', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
    }

    // Buat status: VALID, DUE, EXPIRED
    function renderStatus(expDateStr) {
        if (!expDateStr) return '-';

        const today = new Date();
        const expDate = new Date(expDateStr);
        const diffTime = expDate.getTime() - today.getTime();
        const diffDays = Math.ceil(diffTime / (1000 * 3600 * 24)); // selisih hari

        if (diffDays < 0) {
            return '<span class="px-2 py-1 rounded bg-red-100 text-red-700 font-semibold text-sm">EXPIRED</span>';
        } else if (diffDays <= 30) {
            return `<span class="px-2 py-1 rounded bg-yellow-100 text-yellow-700 font-semibold text-sm">DUE ${diffDays} days</span>`;
        } else {
            return '<span class="px-2 py-1 rounded bg-green-100 text-green-700 font-semibold text-sm">VALID</span>';
        }
    }

    const baseUrl = document.querySelector('meta[name="app-url"]').getAttribute('content');

    const table = $('#inspectionTable').DataTable({
        ajax: {
            url: `${baseUrl}/inspection-data/list`,
            dataSrc: function (json) {
                return json.data ?? json;
            }
        },
        columns: [
            {
                data: null,
                name: 'no',
                render: function (data, type, row, meta) {
                    return meta.row + 1;
                },
                searchable: false
            },
            { data: 'category', name: 'category' },
            { data: 'asset', name: 'asset' },

            // Format tanggal inspection_date
            {
                data: 'inspection_date',
                name: 'inspection_date',
                render: function (data) {
                    return formatDate(data);
                }
            },

            // Format tanggal inspection_exp
            {
                data: 'inspection_exp',
                name: 'inspection_exp',
                render: function (data) {
                    return formatDate(data);
                }
            },

            // Status berdasarkan tanggal expired
            {
                data: 'inspection_exp',
                name: 'status',
                render: function (expDate) {
                    return renderStatus(expDate);
                }
            },

            {
                data: 'cert_link',
                name: 'cert_link',
                orderable: false,
                searchable: false
            }
        ]
    });

    // 🔁 Refresh otomatis setiap 30 detik
    setInterval(() => {
        table.ajax.reload(null, false); // false = tetap di halaman sekarang
    }, 10000);

    // Tombol "View File" membuka modal
    $(document).on('click', '.btn-view', function () {
        const url = $(this).data('url');
        $('#pdfViewer').attr('src', url);
        $('#pdfModal').removeClass('hidden');
    });

    // Tombol close (X)
    $('#pdfCloseBtn').on('click', function () {
        closePdfModal();
    });

    // Tombol ESC untuk close
    $(document).on('keydown', function (e) {
        if (e.key === "Escape") {
            closePdfModal();
        }
    });

    // Fungsi close
    function closePdfModal() {
        $('#pdfViewer').attr('src', '');
        $('#pdfModal').addClass('hidden');
    }

});
</script>


<!-- Select2 -->
<!-- ✅ Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
$(document).ready(function () {

    // Submit form
    $('#formAddCert').on('submit', function (e) {
        e.preventDefault();
        let formData = new FormData(this);

        $.ajax({
            url: "{{ url('/inspection-details') }}",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: response.message,
                    confirmButtonColor: '#3085d6'
                });

                $('#formAddCert')[0].reset();
                closeAddCertModal();
                $('#inspectionTable').DataTable().ajax.reload(null, false);
            },
            error: function (xhr) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: xhr.responseJSON?.message ?? 'Something went wrong. Please check the form.'
                });
            }
        });
    });


    // ESC close modal
    $(document).on('keydown', function (e) {
        if (e.key === 'Escape') {
            closeAddCertModal();
        }
    });

});

// Buka modal dan init select2 dalam modal
function openAddCertModal() {
    const $modal = $('#modalAddCert');
    $modal.removeClass('hidden');

    // Inisialisasi Select2 saat modal dibuka untuk menghindari konflik
    $('#id_asset_list').select2({
        dropdownParent: $modal,
        width: '100%',
        placeholder: 'Select Asset'
    });

    $('#id_inspection').select2({
        dropdownParent: $modal,
        width: '100%',
        placeholder: 'Select Category'
    });
}

// Tutup modal dan reset form
function closeAddCertModal() {
    const $modal = $('#modalAddCert');
    $modal.addClass('hidden');
    $('#formAddCert')[0].reset();

    // Clear Select2 value & reset
    $('#id_asset_list').val(null).trigger('change.select2');
    $('#id_inspection').val(null).trigger('change.select2');

    // Optional: destroy select2 instance to re-init fresh next open
    $('#id_asset_list').select2('destroy');
    $('#id_inspection').select2('destroy');
}
</script>


@endpush
