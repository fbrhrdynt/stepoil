@php
$user = auth()->user();
@endphp

<style>
    @media (min-width: 1024px) {
  .only-mobile {
    display: none;
  }
}

</style>

<div class="xCPtuxM4_gihvpPwv9bX t6gkcSf0Bt4MLItXvDJ_ Nu4HUn5EQpnNJ1itNkrd iHPddplqYvrN6qWgvntn AqVNvLG_H6VHhym2yKMp">
    <div class="NM7Z1HBVjN_86WhEcXan mveJTCIb2WII7J4sY22F pXhVRBC8yaUNllmIWxln qUWbS_LTZujDB4XCd11V _Ybd3WwuTVljUT4vEaM3 IvHclGgvMLtYg_ow0uba fzhbbDQ686T8arwvi_bJ _fGhMnSfYmaGrv7DvZ00 _1jTZ8KXRZul60S6czNi">
        <div class="container mx-auto px-4 sm:px-8">
            <div class="py-8">
                <div class="flex justify-between items-center mb-4">

@php
    $projectId = request()->route('project_id') ?? request('project_id');
    $wellinfoId = request()->route('wellinfo_id') ?? null;
    $assets = request()->route('assets') ?? null;
@endphp

<div class="only-mobile">
    <div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px">
        @if (Request::is('projects/details/*'))
            {{-- All Reports --}}
            <li class="me-2">
                <a href="{{ url('projects/details/' . $projectId) }}" class="inline-block p-4 border-b-2 rounded-t-lg {{ request()->routeIs('projects.details*') ? 'tab-active' : 'border-transparent hover:text-gray-600 hover:border-gray-300' }}">
                    <i class="fa-regular fa-newspaper"></i> All Reports</a>
            </li>
            @if ($wellinfoId)
                {{-- Current Report --}}
                <li class="me-2">
                    <a href="{{ url("projects/details/{$projectId}/{$wellinfoId}") }}" class="inline-block p-4 border-b-2 rounded-t-lg {{ request()->routeIs('projects.details*') ? 'tab-active' : 'border-transparent hover:text-gray-600 hover:border-gray-300' }}"><i class="fa-regular fa-file"></i> Current Report</a>
                </li>
                {{-- Edit Report --}}
                <li class="me-2">
                    <a href="{{ url("projects/details/{$projectId}/{$wellinfoId}/edit-first") }}" class="inline-block p-4 border-b-2 rounded-t-lg {{ request()->routeIs('projects.details*') ? 'tab-active' : 'border-transparent hover:text-gray-600 hover:border-gray-300' }}"><i class="fa-regular fa-tower-observation"></i> Well Detail</a>
                </li>
                {{-- Edit Well Info --}}
                <li class="me-2">
                    <a href="{{ url("projects/details/{$projectId}/{$wellinfoId}/edit-well") }}" class="inline-block p-4 border-b-2 rounded-t-lg {{ request()->routeIs('projects.details*') ? 'tab-active' : 'border-transparent hover:text-gray-600 hover:border-gray-300' }}"><span class="flex items-center gap-1"><img src="{{ asset("isi/icons_fotrack/wellinfo.png") }}" alt="Well Info icon" class="w-3 h-3"> Well Info</a></span>
                </li>
                {{-- Edit Active Mud Properties --}}
                <li class="me-2">
                    <a href="{{ url("projects/details/{$projectId}/{$wellinfoId}/edit-amp") }}" class="inline-block p-4 border-b-2 rounded-t-lg {{ request()->routeIs('projects.details*') ? 'tab-active' : 'border-transparent hover:text-gray-600 hover:border-gray-300' }}"><i class="fa-regular fa-calculator"></i> Active Mud Properties</a>
                </li>

                {{-- Equipment Menu --}}
                @php
                    $equipmentRoutes = [
                        'shakers',
                        'centrifuge-1',
                        'centrifuge-2',
                        'centrifuge-3',
                        'cdu-1',
                        'cdu-2',
                        'desanders',
                        'desilters',
                    ];

                    $isEquipmentOpen = collect($equipmentRoutes)->contains(function ($path) {
                        return request()->is("projects/details/*/*/$path");
                    });
                @endphp
                @php
                    $equipmentMenu = [
                        'Shakers' => 'shakers',
                        'Centrifuge 1' => 'centrifuge-1',
                        'Centrifuge 2' => 'centrifuge-2',
                        'Centrifuge 3' => 'centrifuge-3',
                        'Cutting Dryer 1' => 'cdu-1',
                        'Cutting Dryer 2' => 'cdu-2',
                        'Desanders' => 'desanders',
                        'Desilters' => 'desilters',
                    ];

                    $iconMap = [
                        'shakers' => 'shaker',
                        'centrifuge-1' => 'centrifuge',
                        'centrifuge-2' => 'centrifuge',
                        'centrifuge-3' => 'centrifuge',
                        'cdu-1' => 'cdu',
                        'cdu-2' => 'cdu',
                        'desanders' => 'desander',
                        'desilters' => 'desilter',
                    ];
                @endphp

                <li class="relative me-2">
                    <!-- Trigger -->
                    <button type="button" id="equipmentDropdownBtn" class="inline-block p-4 border-b-2 rounded-t-lg border-transparent hover:text-gray-600 hover:border-gray-300">
                        <i class="fa-solid fa-screwdriver-wrench mr-2"></i> Equipments
                    </button>

                    <!-- Dropdown -->
                    <ul id="equipmentDropdownMenu" class="hidden absolute left-0 z-50 bg-white border border-gray-200 rounded-md shadow-md mt-1 w-52">
                        @foreach($equipmentMenu as $label => $slug)
                            @php
                                $icon = $iconMap[$slug] ?? 'default';
                                $url = url("projects/details/{$projectId}/{$wellinfoId}/{$slug}");
                            @endphp
                            <li>
                                <a href="{{ $url }}" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <img src="{{ asset("isi/icons_fotrack/{$icon}.png") }}" alt="{{ $label }} icon" class="w-4 h-4">
                                    {{ $label }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <!-- JavaScript -->
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        const btn = document.getElementById("equipmentDropdownBtn");
                        const menu = document.getElementById("equipmentDropdownMenu");

                        btn.addEventListener("click", function (e) {
                            e.stopPropagation();
                            menu.classList.toggle("hidden");
                        });

                        // Klik di luar dropdown akan menutup menu
                        document.addEventListener("click", function (e) {
                            if (!menu.classList.contains("hidden")) {
                                menu.classList.add("hidden");
                            }
                        });

                        // Cegah menu tertutup saat klik di dalamnya
                        menu.addEventListener("click", function (e) {
                            e.stopPropagation();
                        });
                    });
                </script>


                {{-- Edit Retort Worksheet --}}
                <li class="me-2">
                    <a href="{{ url("projects/details/{$projectId}/{$wellinfoId}/retort") }}" class="inline-block p-4 border-b-2 rounded-t-lg {{ request()->routeIs('projects.details*') ? 'tab-active' : 'border-transparent hover:text-gray-600 hover:border-gray-300' }}"><i class="fa-regular fa-square-root-variable"></i> Retort Worksheet</a>
                </li>
                {{-- Edit Cuttings by Passed --}}
                <li class="me-2">
                    <a href="{{ url("projects/details/{$projectId}/{$wellinfoId}/bypassed") }}" class="inline-block p-4 border-b-2 rounded-t-lg {{ request()->routeIs('projects.details*') ? 'tab-active' : 'border-transparent hover:text-gray-600 hover:border-gray-300' }}"><span class="flex items-center gap-1"><img src="{{ asset("isi/icons_fotrack/bypassed.png") }}" alt="Cuttings by Passed icon" class="w-3 h-3"> Cuttings by Passed</span>
                </li>
                {{-- Edit Daily Waste & Average ROC --}}
                <li class="me-2">
                    <a href="{{ url("projects/details/{$projectId}/{$wellinfoId}/daily-waste") }}" class="inline-block p-4 border-b-2 rounded-t-lg {{ request()->routeIs('projects.details*') ? 'tab-active' : 'border-transparent hover:text-gray-600 hover:border-gray-300' }}"><span class="flex items-center gap-1"><img src="{{ asset("isi/icons_fotrack/dailywaste.png") }}" alt="Daily Waste, Average ROC & Activitieso icon" class="w-3 h-3"> Daily Waste, Average ROC & Activities</span>
                </li>
                {{-- Edit PERSONNEL --}}
                <li class="me-2">
                    <a href="{{ url("projects/details/{$projectId}/{$wellinfoId}/personnel") }}" class="inline-block p-4 border-b-2 rounded-t-lg {{ request()->routeIs('projects.details*') ? 'tab-active' : 'border-transparent hover:text-gray-600 hover:border-gray-300' }}"><i class="fa-regular fa-users"></i> Personnel</a>
                </li>
            @endif
        @endif

        @if (Request::is('assets*'))
            {{-- Assets Categories --}}
            <li class="me-2">
                <a href="{{ url('assets-category') }}" class="inline-block p-4 border-b-2 rounded-t-lg {{ request()->routeIs('asset*') ? 'tab-active' : 'border-transparent hover:text-gray-600 hover:border-gray-300' }}">
                <i class="fa-regular fa-tractor"></i> Asset Category</a>
            </li>
            {{-- Assets List --}}
            <li class="me-2">
                <a href="{{ url('assets') }}" class="inline-block p-4 border-b-2 rounded-t-lg {{ request()->routeIs('asset*') ? 'tab-active' : 'border-transparent hover:text-gray-600 hover:border-gray-300' }}">
                <i class="fa-regular fa-tractor"></i> Assets</a>
            </li>
        @endif

        @if (Request::is('inspection*'))
            {{-- Inspection Categories --}}
            <li class="me-2">
                <a href="{{ url('inspection-category') }}" class="inline-block p-4 border-b-2 rounded-t-lg {{ request()->routeIs('inspection*') ? 'tab-active' : 'border-transparent hover:text-gray-600 hover:border-gray-300' }}">
                <i class="fa-regular fa-object-ungroup"></i> Inspection Category</a>
            </li>
            {{-- Inspection Data --}}
            <li class="me-2">
                <a href="{{ url('inspection-data') }}" class="inline-block p-4 border-b-2 rounded-t-lg {{ request()->routeIs('inspection*') ? 'tab-active' : 'border-transparent hover:text-gray-600 hover:border-gray-300' }}">
                <i class="fa-regular fa-rectangle-list"></i> Inspection Data</a>
            </li>
        @endif

        @if (Request::is('preventive*'))
            {{-- Preventive Maintenance Card --}}
            <li class="me-2">
                <a href="{{ url('preventive-maintenance') }}" class="inline-block p-4 border-b-2 rounded-t-lg {{ request()->routeIs('preventive*') ? 'tab-active' : 'border-transparent hover:text-gray-600 hover:border-gray-300' }}">
                <i class="fa-regular fa-file"></i> PM Files</a>
            </li>
            {{-- PM Categories --}}
            <li class="me-2">
                <a href="{{ url('preventive-category') }}" class="inline-block p-4 border-b-2 rounded-t-lg {{ request()->routeIs('preventive*') ? 'tab-active' : 'border-transparent hover:text-gray-600 hover:border-gray-300' }}">
                <i class="fa-regular fa-object-ungroup"></i> PM Category</a>
            </li>
            {{-- PM Data --}}
            <li class="me-2">
                <a href="{{ url('preventive-data') }}" class="inline-block p-4 border-b-2 rounded-t-lg {{ request()->routeIs('preventive*') ? 'tab-active' : 'border-transparent hover:text-gray-600 hover:border-gray-300' }}">
                <i class="fa-regular fa-rectangle-list"></i> PM Data</a>
            </li>
        @endif
        </ul>
    </div>
</div>



                </div>
            </div>
        </div>
