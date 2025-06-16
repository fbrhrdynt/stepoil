@php
$user = auth()->user();
$projectId = $user->id_project ?? null;
$level = $user->level;
@endphp



<header>
  <nav class="navbar">
    <div class="logo-container" id="btnToggleMenu" aria-label="Toggle Menu">
      <img src="{{ asset('isi/icons_fotrack/fotrack.png') }}" width="100px" height="12px" alt="FOTrack Logo" />
      <span style="color: grey">Field Operation Track System</span>
    </div>
  </nav>
</header>

<div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
    <ul class="flex flex-wrap -mb-px justify-center">
        <li class="me-2">
            <a href="{{ url('/dashboard') }}" class="inline-block p-4 border-b-2 rounded-t-lg {{ request()->routeIs('dashboard') ? 'tab-active' : 'border-transparent hover:text-gray-600 hover:border-gray-300' }}">Dashboard</a>
        </li>
        {{-- My Reports - hanya Operator & Staff --}}
        @if (in_array($level, ['Operator', 'Staff']) && $projectId)
        <li class="me-2">
            <a href="{{ route('projects.details', ['project_id' => $projectId]) }}" class="inline-block p-4 border-b-2 rounded-t-lg {{ request()->routeIs('projects*') ? 'tab-active' : 'border-transparent hover:text-gray-600 hover:border-gray-300' }}" aria-current="page">My Reports</a>
        </li>
        @endif

        {{-- Project Access - MASTER & Supervisor --}}
        @if (in_array($level, ['MASTER', 'Supervisor']))
        <li class="me-2">
            <a href="{{ url('/projects') }}" class="inline-block p-4 border-b-2 rounded-t-lg {{ request()->routeIs('projects*') ? 'tab-active' : 'border-transparent hover:text-gray-600 hover:border-gray-300' }}">Project Access</a>
        </li>
        <li class="me-2">
            <a href="{{ url('/accounts') }}" class="inline-block p-4 border-b-2 rounded-t-lg {{ request()->routeIs('account*') ? 'tab-active' : 'border-transparent hover:text-gray-600 hover:border-gray-300' }}">Accounts</a>
        </li>
        @endif
        <li class="me-2">
            <a href="{{ url('/preventive-maintenance') }}" class="inline-block p-4 border-b-2 rounded-t-lg {{ request()->routeIs('preventive.maintenance') ? 'tab-active' : 'border-transparent hover:text-gray-600 hover:border-gray-300' }}">Preventive Maintenance</a>
        </li>
        @if (in_array($level, ['MASTER', 'Supervisor', 'Staff']))
        <li class="me-2">
            <a href="{{ url('/assets-category') }}" class="inline-block p-4 border-b-2 rounded-t-lg {{ request()->routeIs('assets*') ? 'tab-active' : 'border-transparent hover:text-gray-600 hover:border-gray-300' }}">Company Asset</a>
        </li>
        @endif
        @if (in_array($level, ['MASTER', 'Supervisor', 'Staff']))
        <li class="me-2">
            <a href="{{ url('/inspection-category') }}" class="inline-block p-4 border-b-2 rounded-t-lg {{ request()->routeIs('inspection*') ? 'tab-active' : 'border-transparent hover:text-gray-600 hover:border-gray-300' }}">Inspection Category</a>
        </li>
        @endif
    </ul>
</div>
