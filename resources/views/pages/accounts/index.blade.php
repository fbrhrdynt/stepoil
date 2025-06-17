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
                    <button id="createAccountButton" data-modal-target="addAccountModal" data-modal-toggle="addAccountModal" type="button" class="custom-btn-submit">
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
        Swal.fire({
            title: 'Are you sure?',
            text: "This account will be permanently deleted.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e3342f',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, delete it!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
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
                    Swal.fire({
                        icon: 'success',
                        title: 'Deleted!',
                        text: data.message || 'The account has been deleted.'
                    });
                    $('#datatable').DataTable().ajax.reload(null, false);
                })
                .catch(() => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'An error occurred while deleting the account.'
                    });
                });
            }
        });
    }

    function toggleStatus(userId, currentStatus) {
    const action = currentStatus === 'Y' ? 'Deactivate' : 'Activate';
    const confirmText = currentStatus === 'Y'
        ? 'This will block the user from accessing the system.'
        : 'This will allow the user to access the system.';

    Swal.fire({
        title: `Are you sure?`,
        text: `${action} this account?\n\n${confirmText}`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#aaa',
        confirmButtonText: `Yes, ${action.toLowerCase()} it!`,
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(`{{ url('accounts') }}/${userId}/toggle-status`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
            })
            .then(res => res.json())
            .then(data => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: data.message || `${action} successful`
                });
                $('#datatable').DataTable().ajax.reload(null, false);
            })
            .catch(() => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Something went wrong.'
                });
            });
        }
    });
}


</script>

</script>

