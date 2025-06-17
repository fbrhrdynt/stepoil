<div class="flex items-center justify-center gap-2">
    {{-- Edit --}}
    <a href="{{ route('accounts.edit', $row->id_user) }}"
       class="group flex items-center justify-center w-9 h-9 rounded-full bg-yellow-100 hover:bg-yellow-500 transition duration-200"
       title="Edit Account">
        <i class="fa-solid fa-pen-to-square text-yellow-600 group-hover:text-white text-base"></i>
    </a>

    {{-- Delete --}}
    <button onclick="confirmDelete({{ $row->id_user }})"
        class="group flex items-center justify-center w-9 h-9 rounded-full bg-red-100 hover:bg-red-600 transition duration-200"
        title="Delete Account">
        <i class="fa-solid fa-trash text-red-600 group-hover:text-white text-base"></i>
    </button>

    {{-- Toggle Status --}}
    <button onclick="toggleStatus({{ $row->id_user }}, '{{ $row->status }}')"
        class="group flex items-center justify-center w-9 h-9 rounded-full bg-blue-100 hover:bg-blue-600 transition duration-200"
        title="Toggle Status">
        <i class="fa-solid fa-toggle-{{ $row->status === 'Y' ? 'on' : 'off' }} text-blue-600 group-hover:text-white text-lg"></i>
    </button>
</div>
