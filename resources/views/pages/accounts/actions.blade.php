<div class="flex items-center justify-center gap-4">
    <!-- Edit Icon -->
    <a href="{{ route('accounts.edit', $row->id_user) }}">
        <i class="fa-solid fa-pen-to-square text-yellow-500 text-lg hover:text-yellow-600"></i>
    </a>

    <!-- Delete Icon -->
    <button onclick="confirmDelete({{ $row->id_user }})"
            class="text-red-500 hover:text-red-600"
            title="Delete Account">
        <i class="fa-solid fa-trash"></i>
    </button>

    <!-- Tombol status toggle -->
    <button onclick="toggleStatus({{ $row->id_user }}, '{{ $row->status }}')" 
            title="Change Status"
            class="text-blue-600 hover:text-blue-800">
        <i class="fa-solid fa-toggle-{{ $row->status === 'Y' ? 'on' : 'off' }}"></i>
    </button>

</div>
