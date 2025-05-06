@extends('layouts.app')
@section('title', 'Asset List | FOTrack')
@section('content')
@push('styles')
<style>
    #assetTable,
    #assetTable th,
    #assetTable td {
        font-size: 0.85rem !important; /* kecilkan ukuran font */
    }

    #assetTable th {
        font-weight: 600;
    }

    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter,
    .dataTables_wrapper .dataTables_info,
    .dataTables_wrapper .dataTables_paginate {
        font-size: 0.8rem !important; /* kecilkan pagination, filter, dll */
    }
</style>
@endpush

<meta name="app-url" content="{{ url('/') }}">

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

<div class="xCPtuxM4_gihvpPwv9bX t6gkcSf0Bt4MLItXvDJ_ Nu4HUn5EQpnNJ1itNkrd iHPddplqYvrN6qWgvntn AqVNvLG_H6VHhym2yKMp">
<div class="NM7Z1HBVjN_86WhEcXan mveJTCIb2WII7J4sY22F pXhVRBC8yaUNllmIWxln qUWbS_LTZujDB4XCd11V _Ybd3WwuTVljUT4vEaM3 IvHclGgvMLtYg_ow0uba fzhbbDQ686T8arwvi_bJ _fGhMnSfYmaGrv7DvZ00 _1jTZ8KXRZul60S6czNi">
<div class="container mx-auto px-4 sm:px-8">
    <div class="py-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold leading-tight">Assets List</h2>
            <button id="addAssetBtn" class="custom-btn-submit">+ Add New Asset</button>
        </div>

        <table id="assetTable" class="min-w-full bg-white">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Asset Name</th>
                    <th>Mfg. Asset No</th>
                    <th>Company Asset No</th>
                    <th>Status</th>
                    <th>COC</th>
                    <th>Inspection</th>
                    <th>PM</th>
                    <th>Action</th>
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

<!-- Modal Form -->
<div id="modalAssetForm" class="hidden fixed z-10 inset-0 overflow-y-auto bg-gray-700 bg-opacity-50">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white rounded-lg p-8 w-96 shadow-lg">
            <h2 class="text-xl mb-4" id="assetModalTitle">Add Asset</h2>
            <form id="assetForm" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="assetId" name="id">

                <div class="mb-4">
                    <label>Category</label>
                    <select name="id_pm_category" class="custom-input">
                        @foreach(\App\Models\PmCategory::all() as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label>Asset Name</label>
                    <input type="text" name="asset_name" class="custom-input" required>
                </div>

                <div class="mb-4">
                    <label>Company Asset Number</label><br>
                    <small><i>This field can't be edit future</i></small>
                    <input type="text" name="company_asset" class="custom-input">
                </div>

                <div class="mb-4">
                    <label>Mfg. Serial Number</label>
                    <input type="text" name="mfg_sn" class="custom-input">
                </div>

                <div class="mb-4">
                    <label>Status</label>
                    <select name="status" class="custom-input">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label>Notes</label>
                    <textarea name="notes" class="custom-input"></textarea>
                </div>

                <div class="mb-4">
                    <label>COC Attachment</label>
                    <input type="file" name="coc" class="custom-input" accept=".pdf,.doc,.docx">
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="custom-btn-submit mr-2">Save</button>
                    <button type="button" id="closeAssetModal" class="custom-btn-cancel bg-gray-500">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal show COC -->
<div id="modalPdfViewer" class="hidden fixed z-10 inset-0 overflow-y-auto bg-gray-700 bg-opacity-50">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white rounded-lg p-4 w-full max-w-4xl shadow-lg">
            <div class="flex justify-between items-center mb-2">
                <h2 class="text-lg font-semibold">COC Preview</h2>
                <button onclick="closePdfModal()" class="text-gray-600 hover:text-gray-800">&times;</button>
            </div>
            <iframe id="pdfIframe" src="" width="100%" height="600px" class="border border-gray-300 rounded"></iframe>
        </div>
    </div>
</div>

<!-- Modal Inspection -->
<div id="modalInspection" class="hidden fixed z-10 inset-0 overflow-y-auto bg-gray-700 bg-opacity-50">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white rounded-lg p-6 w-screen max-w-screen-xl shadow-lg overflow-x-auto">
            <div class="flex justify-between items-center mb-4">
                <h2 id="inspectionModalTitle" class="text-lg font-semibold">
                    <!-- Dynamic title here -->
                </h2>
                <button onclick="closeInspectionModal()" class="text-gray-600 hover:text-gray-800 text-2xl">&times;</button>
            </div>

            <div class="overflow-x-auto mb-6 flex justify-center">
                <table class="w-auto min-w-[500px] text-sm text-left border border-gray-300" id="inspectionTable">
                    <thead class="bg-gray-100">
                        <tr id="inspectionTableHeader"></tr>
                    </thead>
                    <tbody>
                        <tr id="inspectionTableBody"></tr>
                    </tbody>
                </table>
            </div>

            <div id="inspectionPdfViewerWrapper" class="hidden mt-4">
                <h3 class="text-md font-semibold mb-2">Certificate Preview</h3>
                <iframe id="inspectionPdfViewer" src="" width="100%" height="600px" class="border rounded shadow"></iframe>
            </div>

            <div id="inspectionUploadWrapper" class="hidden">
                <form id="inspectionUploadForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id_asset_list" id="formAssetId">
                    <input type="hidden" name="id_inspection" id="formInspectionId">

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label>Date of Inspection</label>
                            <input type="date" name="inspection_date" class="custom-input" required>
                        </div>
                        <div>
                            <label>Expiration Date</label>
                            <input type="date" name="inspection_exp" class="custom-input" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label>Certificate File</label>
                        <input type="file" name="cert" class="custom-input" accept=".pdf,.doc,.docx" required>
                    </div>
                    <div class="mb-4">
                        <label>Notes</label>
                        <textarea name="notes" class="custom-input" rows="2"></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="custom-btn-submit">Upload Certificate</button>
                        <button type="button" onclick="cancelInspectionUpload()" class="custom-btn-cancel">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal PM -->
<div id="modalPm" class="hidden fixed z-10 inset-0 overflow-y-auto bg-gray-700 bg-opacity-50">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white rounded-lg p-6 w-screen max-w-screen-xl shadow-lg overflow-x-auto">
            <div class="flex justify-between items-center mb-4">
                <h2 id="pmModalTitle" class="text-lg font-semibold">
                    <!-- Dynamic title here -->
                </h2>
                <button onclick="closePmModal()" class="text-gray-600 hover:text-gray-800 text-2xl">&times;</button>
            </div>

            <div class="overflow-x-auto mb-6 flex justify-center">
            <table class="w-full border text-sm">
                <thead class="bg-gray-100">
                    <tr id="pmTableHeader"></tr>
                </thead>
                <tbody id="pmTableBody"></tbody>
            </table>
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
const inspectionCategories = @json(\App\Models\InspectionCategory::all());

let table;

$(document).ready(function () {
    const baseUrl = document.querySelector('meta[name="app-url"]').getAttribute('content');

    // Kolom tetap
    let columns = [
        {
            data: null,
            render: function (data, type, row, meta) {
                return meta.row + 1;
            },
            orderable: false,
            searchable: false
        },
        { data: 'asset_name' },
        { data: 'mfg_sn' },
        { data: 'company_asset' },
        {
            data: 'status',
            render: function (data) {
                if (data === 'active') {
                    return `<span class="px-2 py-1 text-xs font-semibold rounded bg-green-100 text-green-700">Active</span>`;
                } else if (data === 'inactive') {
                    return `<span class="px-2 py-1 text-xs font-semibold rounded bg-red-100 text-red-700">Inactive</span>`;
                } else {
                    return `<span class="px-2 py-1 text-xs font-semibold rounded bg-gray-100 text-gray-700">${data}</span>`;
                }
            }
        },
        {
            data: 'coc',
            render: function (data) {
                return data
                    ? `<button onclick="showPdfModal('${baseUrl}/storage/${data}')" class="text-blue-600">View</button>`
                    : '-';
            }
        },
        {
            data: null,
            title: 'Inspection',
            render: function (data, type, row) {
                return `<button onclick="showInspectionModal(${row.id})" class="text-blue-600">View</button>`;
            },
            orderable: false,
            searchable: false
        },
        {
            data: null,
            title: 'PM',
            render: function (data, type, row) {
                return `<button onclick="showPmModal(${row.id})" class="text-green-600 hover:underline">View</button>`;
            },
            orderable: false,
            searchable: false
        },
        {
            data: null,
            orderable: false,
            searchable: false,
            render: function (data, type, row) {
                return `
                    <button onclick="editAsset(${row.id})" class="bg-blue-500 text-black px-2 py-1 rounded">Edit</button>
                    <button onclick="deleteAsset(${row.id})" class="bg-red-500 text-black px-2 py-1 rounded ml-2">Delete</button>
                `;
            }
        }
    ];

    // Inisialisasi DataTable
    table = $('#assetTable').DataTable({
        ajax: {
            url: '{{ route("assets.index") }}',
            dataSrc: function (json) {
                console.log("📦 DATA DARI SERVER:", json);
                return json.data;
            },
            error: function (xhr) {
                console.error("❌ ERROR AJAX:", xhr.responseText);
            }
        },
        columns: columns,
        responsive: false
    });

    // Tampilkan Modal Add
    $('#addAssetBtn').on('click', function () {
        $('#assetForm')[0].reset();
        $('#assetModalTitle').text('Add Asset');
        $('#modalAssetForm').removeClass('hidden');
        $('#assetId').val('');
    });

    // Tutup Modal
    $('#closeAssetModal').on('click', function () {
        $('#modalAssetForm').addClass('hidden');
    });

    // Submit Form Asset
    $('#assetForm').on('submit', function (e) {
        e.preventDefault();
        let id = $('#assetId').val();
        let url = id ? `${baseUrl}/assets/${id}` : `${baseUrl}/assets`;

        let formData = new FormData(this);

        if (id) formData.append('_method', 'PUT');

        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                Swal.fire('Success', response.message, 'success');
                $('#modalAssetForm').addClass('hidden');
                table.ajax.reload();
            },
            error: function (xhr) {
                let msg = 'Something went wrong.';
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    msg = Object.values(xhr.responseJSON.errors).join('<br>');
                }
                Swal.fire('Error', msg, 'error');
            }
        });
    });
});

//show Inspection Modal
function showInspectionModal(assetId) {
    const modal = document.getElementById('modalInspection');
    const headerRow = document.getElementById('inspectionTableHeader');
    const bodyRow = document.getElementById('inspectionTableBody');
    const baseUrl = document.querySelector('meta[name="app-url"]').getAttribute('content');
    const title = document.getElementById('inspectionModalTitle');
    const form = document.getElementById('inspectionUploadForm');

    headerRow.innerHTML = '';
    bodyRow.innerHTML = '';

    $.get(`${baseUrl}/assets/${assetId}`, function (asset) {
        console.log("🔁 INSPECTION MODAL DATA:", asset);
        title.textContent = `Inspection Certificates for ${asset.asset_name} Asset Number ${asset.company_asset}`;
        document.getElementById('formAssetId').value = asset.id;

        inspectionCategories.forEach(cat => {
            headerRow.innerHTML += `<th class="px-4 py-2 border">${cat.name_inspection}</th>`;
        });

        inspectionCategories.forEach(cat => {
            const detail = asset.inspection_details?.find(d => d.id_inspection === cat.id_inspection);

            const cell = document.createElement('td');
            cell.className = 'px-4 py-2 border text-center';

            const info = document.createElement('div');
            const inspectionDate = formatDateToLong(detail?.inspection_date);
            const inspectionExp = formatDateToLong(detail?.inspection_exp);

            // Jika ada file
            if (detail && detail.cert) {
                const fileName = detail.cert.split('/').pop();

                info.innerHTML = `
                    <div class="text-sm text-left mb-2">
                        <div><strong>Inspection Date:</strong> ${inspectionDate}</div>
                        <div><strong>Expired Date:</strong> ${inspectionExp}</div>
                        <div><strong>Cert:</strong> ${fileName}</div>
                    </div>
                    <div class="flex gap-3 text-center">
                        <button onclick="toggleInspectionPdf(this, '${baseUrl}/storage/${detail.cert}')" class="btn-view">View Cert</button>
                        
                        <button onclick='editInspection(${JSON.stringify(detail)})' class="btn-update">Update Inspection Record</button>
                    </div>
                `;
            } else {
                info.innerHTML = `
                    <div class="text-sm text-left mb-2">
                        <div><strong>Inspection Date:</strong> -</div>
                        <div><strong>Expired Date:</strong> -</div>
                        <div><strong>Cert:</strong> -</div>
                    </div>
                    <button onclick="selectInspection(${cat.id_inspection})" class="btn-upload">Upload Cert</button>
                `;
            }

            cell.appendChild(info);
            bodyRow.appendChild(cell);
        });


        modal.classList.remove('hidden');
    });
}

function selectInspection(inspectionId) {
    document.getElementById('formInspectionId').value = inspectionId;
    document.getElementById('inspectionUploadWrapper').classList.remove('hidden');
    // Scroll ke bawah form biar terlihat
    document.getElementById('inspectionUploadWrapper').scrollIntoView({ behavior: 'smooth' });
}

function closeInspectionModal() {
    document.getElementById('modalInspection').classList.add('hidden');
    document.getElementById('inspectionUploadForm').reset();
    document.getElementById('formInspectionId').value = '';
    document.getElementById('inspectionUploadWrapper').classList.add('hidden');

    // Reset PDF preview
    const wrapper = document.getElementById('inspectionPdfViewerWrapper');
    const iframe = document.getElementById('inspectionPdfViewer');
    wrapper.classList.add('hidden');
    iframe.src = '';

    // Reset all "Hide Cert" buttons back to "View Cert"
    document.querySelectorAll('#inspectionTable button')
        .forEach(btn => {
            if (btn.textContent.trim() === 'Hide Cert') {
                btn.textContent = 'View Cert';
            }
        });
}

$('#inspectionUploadForm').on('submit', function (e) {
    e.preventDefault();
    const baseUrl = document.querySelector('meta[name="app-url"]').getAttribute('content');
    const formData = new FormData(this);

    $.ajax({
        url: `${baseUrl}/inspection-details`,
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            Swal.fire('Success', response.message, 'success');
            $('#inspectionUploadForm')[0].reset();
            document.getElementById('inspectionUploadWrapper').classList.add('hidden');
            document.getElementById('inspectionPdfViewerWrapper').classList.add('hidden');
            document.getElementById('inspectionPdfViewer').src = '';
            document.querySelectorAll('#inspectionTable button')
                .forEach(btn => {
                    if (btn.textContent.trim() === 'Hide Cert') {
                        btn.textContent = 'View Cert';
                    }
                });

            // Reload inspection table content
            showInspectionModal($('#formAssetId').val());
        },
        error: function (xhr) {
            Swal.fire('Error', xhr.responseText || 'Something went wrong.', 'error');
        }
    });
});

function toggleInspectionPdf(button, pdfUrl) {
    const wrapper = document.getElementById('inspectionPdfViewerWrapper');
    const iframe = document.getElementById('inspectionPdfViewer');

    // Jika wrapper sedang tampil, maka sembunyikan
    if (!wrapper.classList.contains('hidden')) {
        wrapper.classList.add('hidden');
        iframe.src = '';
        button.textContent = 'View Cert';
    } else {
        // Jika wrapper belum tampil, maka tampilkan dan set PDF
        iframe.src = pdfUrl;
        wrapper.classList.remove('hidden');
        button.textContent = 'Hide Cert';

        // Scroll agar PDF terlihat
        wrapper.scrollIntoView({ behavior: 'smooth' });
    }
}

function formatDateToLong(dateStr) {
    if (!dateStr || dateStr === '-') return '-';
    const date = new Date(dateStr);
    if (isNaN(date)) return '-';
    return date.toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
}

function editInspection(detail) {
    // Tampilkan form
    const formWrapper = document.getElementById('inspectionUploadWrapper');
    formWrapper.classList.remove('hidden');

    // Scroll ke form
    formWrapper.scrollIntoView({ behavior: 'smooth' });

    // Set form data
    document.getElementById('formAssetId').value = detail.id_asset_list;
    document.getElementById('formInspectionId').value = detail.id_inspection;
    $('[name="inspection_date"]').val(detail.inspection_date);
    $('[name="inspection_exp"]').val(detail.inspection_exp);
    $('[name="notes"]').val(detail.notes);

    // File input tidak bisa diisi secara programatik — user harus isi manual jika ingin mengganti
}

function cancelInspectionUpload() {
    const formWrapper = document.getElementById('inspectionUploadWrapper');
    const form = document.getElementById('inspectionUploadForm');

    form.reset();
    formWrapper.classList.add('hidden');

    document.getElementById('formAssetId').value = '';
    document.getElementById('formInspectionId').value = '';
}

function showPmModal(assetId) {
    const modal = document.getElementById('modalPm');
    const headerRow = document.getElementById('pmTableHeader');
    const bodyContainer = document.getElementById('pmTableBody');
    const baseUrl = document.querySelector('meta[name="app-url"]').getAttribute('content');
    const title = document.getElementById('pmModalTitle');

    headerRow.innerHTML = '';
    bodyContainer.innerHTML = '';

    $.get(`${baseUrl}/assets/${assetId}/pm`, function (asset) {
        title.textContent = `Preventive Maintenance for ${asset.asset_name} (${asset.company_asset})`;

        // Set header
        headerRow.innerHTML = `
            <th class="px-4 py-2 border text-left">Category</th>
            <th class="px-4 py-2 border text-left">Start</th>
            <th class="px-4 py-2 border text-left">Due</th>
            <th class="px-4 py-2 border text-left">Status</th>
            <th class="px-4 py-2 border text-left">Performed By</th>
            <th class="px-4 py-2 border text-left">Notes</th>
        `;

        const pmList = asset.pm_details || [];

        if (pmList.length === 0) {
            const row = document.createElement('tr');
            row.innerHTML = `<td colspan="6" class="text-center py-4 text-gray-500">No records found</td>`;
            bodyContainer.appendChild(row);
        } else {
            pmList.forEach(pm => {
                const row = document.createElement('tr');
                const category = pm.pm_category?.pm_name || '-';
                const start = formatDateToLong(pm.pm_start);
                const due = formatDateToLong(pm.pm_due);
                const status = pm.pm_status || '-';
                const by = pm.performed_by || '-';
                const notes = pm.notes || '-';

                row.innerHTML = `
                    <td class="px-4 py-2 border">${category}</td>
                    <td class="px-4 py-2 border">${start}</td>
                    <td class="px-4 py-2 border">${due}</td>
                    <td class="px-4 py-2 border">${status}</td>
                    <td class="px-4 py-2 border">${by}</td>
                    <td class="px-4 py-2 border">${notes}</td>
                `;
                bodyContainer.appendChild(row);
            });
        }

        modal.classList.remove('hidden');
    });
}


function closePmModal() {
    const modal = document.getElementById('modalPm');
    modal.classList.add('hidden');
}


//show PDF COC
function showPdfModal(pdfUrl) {
    const modal = document.getElementById('modalPdfViewer');
    const iframe = document.getElementById('pdfIframe');
    iframe.src = pdfUrl;
    modal.classList.remove('hidden');
}

//Close PDF COC
function closePdfModal() {
    const modal = document.getElementById('modalPdfViewer');
    const iframe = document.getElementById('pdfIframe');
    iframe.src = ''; // Hapus src untuk hentikan loading
    modal.classList.add('hidden');
}

//edit data
function editAsset(id) {
    const baseUrl = document.querySelector('meta[name="app-url"]').getAttribute('content');
    $.get(`${baseUrl}/assets/${id}`, function (data) {
        console.log(data); // Cek data
        $('#assetModalTitle').text('Edit Asset');
        $('#modalAssetForm').removeClass('hidden');
        $('#assetId').val(data.id);
        $('[name="asset_name"]').val(data.asset_name);
        $('[name="company_asset"]').val(data.company_asset).prop('readonly', true); // pastikan bisa diedit
        $('[name="mfg_sn"]').val(data.mfg_sn);
        $('[name="status"]').val(data.status);
        $('[name="id_pm_category"]').val(data.id_pm_category);
        $('[name="notes"]').val(data.notes);
    });
}

//delete data
function deleteAsset(id) {
    const baseUrl = document.querySelector('meta[name="app-url"]').getAttribute('content');
    Swal.fire({
        title: 'Delete this asset?',
        text: "This action cannot be undone.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `${baseUrl}/assets/${id}`,
                type: 'DELETE',
                data: { _token: '{{ csrf_token() }}' },
                success: function (response) {
                    Swal.fire('Deleted!', response.message, 'success');
                    table.ajax.reload();
                },
                error: function () {
                    Swal.fire('Error', 'Failed to delete asset.', 'error');
                }
            });
        }
    });
}

</script>

@endpush
