@extends('layouts.app')

@section('content')
<div class="xCPtuxM4_gihvpPwv9bX t6gkcSf0Bt4MLItXvDJ_ Nu4HUn5EQpnNJ1itNkrd iHPddplqYvrN6qWgvntn AqVNvLG_H6VHhym2yKMp">
<div class="NM7Z1HBVjN_86WhEcXan mveJTCIb2WII7J4sY22F pXhVRBC8yaUNllmIWxln qUWbS_LTZujDB4XCd11V _Ybd3WwuTVljUT4vEaM3 IvHclGgvMLtYg_ow0uba fzhbbDQ686T8arwvi_bJ _fGhMnSfYmaGrv7DvZ00 _1jTZ8KXRZul60S6czNi">
<div class="container mx-auto px-4 sm:px-8">
    <div class="py-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold leading-tight">Manage Accounts</h2>
            <a href="{{ url('/accounts/add') }}" class="custom-btn-submit">
                + Add New Account
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table id="datatable" class="table-auto w-full border-collapse border border-gray-300">
                <thead class="bg-gray-200">
                    <tr class="text-left">
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">Employee ID</th>
                        <th class="px-4 py-2 border">Account Name</th>
                        <th class="px-4 py-2 border">Username</th>
                        <th class="px-4 py-2 border">Level</th>
                        <th class="px-4 py-2 border">Project</th>
                        <th class="px-4 py-2 border">Status</th>
                        <th class="px-4 py-2 border text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $index => $user)
                    <tr class="border hover:bg-gray-100">
                        <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 border">{{ $user->employee_id }}</td>
                        <td class="px-4 py-2 border">{{ $user->employee_name }}</td>
                        <td class="px-4 py-2 border">{{ $user->kode_login }}</td>
                        <td class="px-4 py-2 border">{{ ucfirst($user->level) }}</td>
                        <td class="px-4 py-2 border">{{ $user->projects->operator_name ?? 'All Projects' }}</td>
                        <td class="px-4 py-2 border">
                            @if($user->status === 'Y')
                                <span class="px-2 py-1 bg-green-500 text-white text-xs rounded">Active</span>
                            @else
                                <span class="px-2 py-1 bg-red-500 text-white text-xs rounded">Inactive</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 border text-center">
                            <div class="flex items-center justify-center gap-4">
                                <!-- Edit Icon -->
                                <a href="{{ url('accounts/edit/'.$user->id_user) }}">
                                    <i class="fa-solid fa-pen-to-square text-yellow-500 text-lg hover:text-yellow-600"></i>
                                </a>

                                <!-- Delete Icon -->
                                <a href="#" onclick="confirmDelete({{ $user->id_user }})">
                                    <i class="fa-solid fa-trash text-red-500 text-lg hover:text-red-700"></i>
                                </a>
                            </div>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        new simpleDatatables.DataTable("#datatable");
    });

    function confirmDelete(id) {
        if (confirm("Are you sure to delete this account?")) {
            window.location.href = "{{ url('accounts/delete/') }}/" + id;
        }
    }
</script>
</div>
    </div>
</div>
</div>
</section>
@endsection
