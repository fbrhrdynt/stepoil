@extends('layouts.app')
@section('title', 'Accounts | FOTrack')

@section('content')

@if(session('success'))
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const message = @json(session('success'));
        const alertBox = document.createElement('div');
        alertBox.className = 'fixed top-5 right-5 z-50 px-4 py-3 bg-green-100 border border-green-400 text-green-700 rounded shadow';
        alertBox.innerHTML = `<strong>Success:</strong> ${message}`;
        document.body.appendChild(alertBox);
        setTimeout(() => alertBox.remove(), 6000);
    });
</script>
@endif

<div class="xCPtuxM4_gihvpPwv9bX t6gkcSf0Bt4MLItXvDJ_ Nu4HUn5EQpnNJ1itNkrd iHPddplqYvrN6qWgvntn AqVNvLG_H6VHhym2yKMp">
    <div class="NM7Z1HBVjN_86WhEcXan mveJTCIb2WII7J4sY22F pXhVRBC8yaUNllmIWxln qUWbS_LTZujDB4XCd11V _Ybd3WwuTVljUT4vEaM3 IvHclGgvMLtYg_ow0uba fzhbbDQ686T8arwvi_bJ _fGhMnSfYmaGrv7DvZ00 _1jTZ8KXRZul60S6czNi">
        <div class="container mx-auto px-4 sm:px-8">

            <div class="py-8">
                <div class="flex justify-between items-center mb-4">
                    <h1 class="text-2xl font-semibold leading-tight">Manage Accounts</h1>
                    <button id="createAccountButton" data-modal-target="addAccountModal" data-modal-toggle="addAccountModal" type="button" class="YRrCJSr_j5nopfm4duUc t6gkcSf0Bt4MLItXvDJ_ Q_jg_EPdNf9eDMn1mLI2 Nm7xMnguzOx6J5Ao7yCU mveJTCIb2WII7J4sY22F g40_g3BQzYCOX5eZADgY _Cj_M6jt2eLjDgkBBNgI b9aD6g2qw84oyZNsMO8j c8dCx6gnV43hTOLV6ks5 ezMFUVl744lvw6ht0lFe y6GKdvUrd7vp_pxsFb57 YoPCmQ0E_V5W0GGmSIdm BkIbg_JwkgiyRW804Hhu _dylIDxYTN3qgvD4U597 KmgKPWh7pHX4ztLneO0T d8_fVOcgDmbt7UdpfeLK WuKugQzwTT7o1wwBck2R _ZsTMX_gz275093orLWM icxWjIgUd9_dzYucx1nx">
                        <i class="fa-solid fa-plus"></i> Add New Account
                    </button>
                </div>

                <div class="overflow-x-auto">
                    <table id="datatable" class="table-auto w-full border-collapse border border-gray-300">
                        <thead class="bg-gray-200">
                            <tr class="text-left">
                                <th>No</th>
                                <th>Employee ID</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th>Project</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
</section>

@endsection

@include('pages.accounts.modal_add')


{{-- AJAX & DataTables --}}
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("accounts.data") }}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'employee_id', name: 'employee_id' },
                { data: 'employee_name', name: 'employee_name' },
                { data: 'kode_login', name: 'kode_login' },
                { data: 'level', name: 'level' },
                { data: 'project_name', name: 'project_name' },
                { data: 'status', name: 'status', orderable: false, searchable: false },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });

        const form = document.getElementById("addAccountForm");
        form.addEventListener("submit", function (e) {
            e.preventDefault();

            const formData = new FormData(form);
            const submitBtn = form.querySelector("button[type='submit']");
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Saving...';

            fetch(form.action, {
                method: "POST",
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (!data.success) throw new Error(data.message);
                form.reset();
                document.querySelector('[data-modal-toggle="addAccountModal"]').click();
                showAlert(data.message || "Account has been added successfully.", 'green');
                table.ajax.reload();
            })
            .catch(err => {
                console.error(err);
                showAlert(err.message || "Failed to add account.", 'red');
            })
            .finally(() => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="fa-solid fa-save"></i> &nbsp; Save Account';
            });
        });
    });

    function confirmDelete(id) {
        const modal = document.createElement('div');
        modal.classList.add('modal-confirm-delete');
        modal.innerHTML = `
            <div class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
                <div class="bg-white rounded-lg p-6 w-full max-w-md text-center shadow space-y-4">
                    <h2 class="text-xl font-semibold">Confirm Delete</h2>
                    <p class="text-gray-600">This account will be permanently deleted. Proceed?</p>
                    <div class="flex justify-center gap-4 pt-4">
                        <button class="cancel-btn px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded">Cancel</button>
                        <button class="delete-btn px-4 py-2 bg-red-600 hover:bg-red-700 text-black rounded">Yes, Delete</button>
                    </div>
                </div>
            </div>
        `;
        document.body.appendChild(modal);

        modal.querySelector('.cancel-btn').addEventListener('click', () => modal.remove());

        modal.querySelector('.delete-btn').addEventListener('click', () => {
            fetch(`{{ url('accounts') }}/${id}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    _method: 'DELETE'
                })
            })
            .then(res => res.json())
            .then(data => {
                modal.remove();
                showAlert(data.message || "Deleted", 'green');
                $('#datatable').DataTable().ajax.reload(null, false);
            })
            .catch(() => {
                modal.remove();
                showAlert("An error occurred while deleting the account.", 'red');
            });
        });
    }

    document.addEventListener("DOMContentLoaded", function () {
        const successMessage = localStorage.getItem('accountSuccess');
        if (successMessage) {
            showAlert(successMessage, 'green');
            localStorage.removeItem('accountSuccess');
        }
    });

    function showAlert(message, color = 'green') {
        const alertBox = document.createElement('div');
        alertBox.className = `fixed top-5 right-5 z-50 px-4 py-3 bg-${color}-100 border border-${color}-400 text-${color}-700 rounded shadow`;
        alertBox.innerHTML = `<strong>${color === 'green' ? 'Success:' : 'Error:'}</strong> ${message}`;
        document.body.appendChild(alertBox);
        setTimeout(() => alertBox.remove(), 6000);
    }
</script>

<script>
function toggleStatus(userId, currentStatus) {
    const action = currentStatus === 'Y' ? 'deactivate' : 'activate';
    const confirmMessage = currentStatus === 'Y'
        ? 'Are you sure you want to deactivate this account?\n\nThis will prevent the user from accessing the system (blocked).'
        : 'Are you sure you want to activate this account?';

    if (confirm(confirmMessage)) {
        fetch(`{{ url('accounts') }}/${userId}/toggle-status`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                showAlert(data.message);
                $('#datatable').DataTable().ajax.reload(null, false);
            } else {
                showAlert("Failed to update status", 'red');
            }
        })
        .catch(err => {
            console.error(err);
            showAlert("Something went wrong", 'red');
        });
    }
}

</script>

</script>

