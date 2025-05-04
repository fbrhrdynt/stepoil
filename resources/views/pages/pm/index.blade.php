@extends('layouts.app')
@section('title', 'Company Assets | FOTrack')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css">


<div class="xCPtuxM4_gihvpPwv9bX t6gkcSf0Bt4MLItXvDJ_ Nu4HUn5EQpnNJ1itNkrd iHPddplqYvrN6qWgvntn AqVNvLG_H6VHhym2yKMp">
    <div class="NM7Z1HBVjN_86WhEcXan mveJTCIb2WII7J4sY22F pXhVRBC8yaUNllmIWxln qUWbS_LTZujDB4XCd11V _Ybd3WwuTVljUT4vEaM3 IvHclGgvMLtYg_ow0uba fzhbbDQ686T8arwvi_bJ _fGhMnSfYmaGrv7DvZ00 _1jTZ8KXRZul60S6czNi">
        <div class="container mx-auto px-4 sm:px-8">
            <div class="py-8">

                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-semibold leading-tight">Asset Category</h2>
                    <a href="#" data-modal-toggle="addCategoryModal"
                        class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded">
                            + Add Asset Category
                    </a>

                </div>

                <div class="overflow-x-auto">
                    <table id="datatable" class="min-w-full leading-normal border border-gray-300">
                        <thead>
                            <tr class="bg-gray-400 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">#</th>
                                <th class="py-3 px-6 text-left">Category Name</th>
                                <th class="py-3 px-6 text-left">Notes</th>
                                <th class="py-3 px-6 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $index => $cat)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6">{{ $index + 1 }}</td>
                                <td class="py-3 px-6 font-semibold text-gray-800">{{ $cat->name }}</td>
                                <td class="py-3 px-6">{{ $cat->notes }}</td>
                                <td class="py-3 px-6 space-x-2">
                                    <a href="{{ route('pm.data.index', $cat->id) }}" class="text-blue-500 hover:underline">Show</a>
                                    <a href="#" 
                                        data-modal-target="editCategoryModal{{ $cat->id }}" 
                                        data-modal-toggle="editCategoryModal{{ $cat->id }}" 
                                        class="text-yellow-500 hover:underline">
                                            Edit
                                    </a>
                                    <button 
                                        type="button"
                                        onclick="confirmDelete({{ $cat->id }}, '{{ $cat->name }}')"
                                        class="text-red-500 hover:underline">
                                        Delete
                                    </button>
                                </td>
                                <!-- Edit Category Modal -->
                                <div id="editCategoryModal{{ $cat->id }}"
                                    tabindex="-1"
                                    aria-hidden="true"
                                    class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center hidden">

                                    <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6 relative">
                                        <div class="flex justify-between items-center mb-4">
                                            <h3 class="text-xl font-semibold">Edit Category</h3>
                                            <button type="button" data-modal-hide="editCategoryModal{{ $cat->id }}" class="text-gray-500 hover:text-red-500">
                                                <i class="fa-solid fa-times text-lg"></i>
                                            </button>
                                        </div>

                                        <form method="POST" action="{{ route('pm.update', $cat->id) }}">
                                            @csrf
                                            @method('PUT')

                                            <div class="mb-4">
                                                <label class="block mb-1 font-semibold">Category Name</label>
                                                <input type="text" name="name" value="{{ $cat->name }}" required class="custom-input w-full border px-3 py-2 rounded">
                                            </div>

                                            <div class="mb-4">
                                                <label class="block mb-1 font-semibold">Notes</label>
                                                <textarea name="notes" rows="3" class="custom-input w-full border px-3 py-2 rounded">{{ $cat->notes }}</textarea>
                                            </div>

                                            <div class="flex justify-end gap-2">
                                                <button type="submit"
                                                        class="custom-btn-submit">
                                                    <i class="fa-solid fa-save mr-1"></i> Update
                                                </button>
                                                <button type="button" data-modal-hide="editCategoryModal{{ $cat->id }}"
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
                                <td colspan="4" class="text-center py-4 text-gray-500">No categories found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <!-- Modal Add Category -->
                    <div id="addCategoryModal"
                        tabindex="-1"
                        aria-hidden="true"
                        class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center hidden">

                        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6 relative">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-xl font-semibold">Add PM Category</h3>
                                <button type="button" data-modal-hide="addCategoryModal" class="text-gray-500 hover:text-red-500">
                                    <i class="fa-solid fa-times text-lg"></i>
                                </button>
                            </div>

                            <form method="POST" action="{{ route('pm.store') }}">
                                @csrf

                                <div class="mb-4">
                                    <label class="block mb-1 font-semibold">Category Name</label>
                                    <input type="text" name="name" required class="custom-input w-full border px-3 py-2 rounded">
                                </div>

                                <div class="mb-4">
                                    <label class="block mb-1 font-semibold">Notes</label>
                                    <textarea name="notes" rows="3" class="custom-input w-full border px-3 py-2 rounded"></textarea>
                                </div>

                                <div class="flex justify-end gap-2">
                                    <button type="submit"
                                            class="custom-btn-submit">
                                        <i class="fa-solid fa-save mr-1"></i> Save
                                    </button>
                                    <button type="button" data-modal-hide="addCategoryModal"
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
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" ></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        new simpleDatatables.DataTable("#datatable");
    });
</script>
<script>
    function confirmDelete(id, name) {
        Swal.fire({
            title: 'Are you sure?',
            text: `Category "${name}" will be permanently deleted!`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // base URL sesuai path project Laravel kamu
                const baseUrl = "{{ url('pm-admin') }}"; 
                window.location.href = `${baseUrl}/${id}/delete`;
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

</section>


@endsection
