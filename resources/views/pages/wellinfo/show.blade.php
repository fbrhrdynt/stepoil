@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">


<div class="xCPtuxM4_gihvpPwv9bX t6gkcSf0Bt4MLItXvDJ_ Nu4HUn5EQpnNJ1itNkrd iHPddplqYvrN6qWgvntn AqVNvLG_H6VHhym2yKMp">
    <div class="NM7Z1HBVjN_86WhEcXan mveJTCIb2WII7J4sY22F pXhVRBC8yaUNllmIWxln qUWbS_LTZujDB4XCd11V _Ybd3WwuTVljUT4vEaM3 IvHclGgvMLtYg_ow0uba fzhbbDQ686T8arwvi_bJ _fGhMnSfYmaGrv7DvZ00 _1jTZ8KXRZul60S6czNi">
        <div class="container mx-auto px-4 sm:px-8">
            <div class="py-8">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-semibold leading-tight">Report Details</h2>
                </div>
                <div class="flex gap-4 items-center">
                    {{-- LOCK / UNLOCK --}}
                    @if($wellinfo->lockreport === 'NO')
                    <button 
                        onclick="confirmLock({{ $wellinfo->id_wellinfo }})"
                        class="group relative flex items-center justify-center w-10 h-10 rounded-full bg-blue-100 hover:bg-blue-600 transition-all duration-200"
                        title="Lock Report">
                        <i class="fa-solid fa-lock text-blue-600 group-hover:text-white text-lg"></i>
                    </button>
                    <script>
                    function confirmLock(wellinfoId) {
                        Swal.fire({
                            title: 'Lock this report?',
                            text: "Once locked, the report can no longer be modified.",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#aaa',
                            confirmButtonText: 'Yes, lock it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/wellinfo/lock/' + wellinfoId;
                            }
                        });
                    }
                    </script>
                    @else
                    {{-- UNLOCK via Swal --}}
                    <a href="javascript:void(0)" 
                        onclick="unlockWithCode({{ $wellinfo->id_wellinfo }})"
                        class="group relative flex items-center justify-center w-10 h-10 rounded-full bg-blue-100 hover:bg-blue-600 transition-all duration-200"
                        title="Unlock Report">
                        <i class="fa-solid fa-unlock text-blue-600 group-hover:text-white text-lg"></i>
                    </a>
                    <script>
                    function unlockWithCode(wellinfoId) {
                        Swal.fire({
                            title: 'Enter Access Code',
                            input: 'text',
                            inputLabel: 'Access Code',
                            inputPlaceholder: 'Enter the project access code',
                            showCancelButton: true,
                            confirmButtonText: 'Unlock',
                            cancelButtonText: 'Cancel',
                            inputAttributes: {
                                maxlength: 20,
                                autocapitalize: 'off',
                                autocorrect: 'off'
                            },
                            preConfirm: (accessCode) => {
                                if (!accessCode) {
                                    Swal.showValidationMessage('Access code cannot be empty');
                                    return false;
                                }

                                return fetch(`/wellinfo/unlock/${wellinfoId}`, {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                        'Accept': 'application/json'
                                    },
                                    body: JSON.stringify({ kodeakses: accessCode })
                                })
                                .then(response => {
                                    return response.json().then(data => {
                                        if (!response.ok) {
                                            throw new Error(data.message || 'Invalid or failed access code.');
                                        }
                                        return data;
                                    });
                                })
                                .catch(error => {
                                    Swal.showValidationMessage(error.message);
                                });
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Unlocked!',
                                    text: result.value.message || 'The report has been successfully unlocked.',
                                    confirmButtonText: 'OK'
                                }).then(() => {
                                    window.location.reload();
                                });
                            }
                        });
                    }
                    </script>


                        {{-- PRINT --}}
                        <button onclick="onPrintClick()" 
                        class="group relative flex items-center justify-center w-10 h-10 rounded-full bg-green-100 hover:bg-green-800 transition-all duration-200"
                        title="Print Report">
                        <i class="fa fa-print text-green-800 group-hover:text-gray-100 text-lg transition-all duration-200"></i>
                        </button>
                        <form id="pdfForm" method="POST" action="{{ route('pdf.generateWithChart', [$projectId, $wellinfoId]) }}" target="pdfFrame">
                            @csrf
                            <input type="hidden" name="chartBase64" id="chartBase64">
                        </form>
                        <canvas id="oocChart" width="400" height="300" class="hidden" hidden></canvas>

                        {{-- DOWNLOAD --}}
                        <form id="downloadForm" method="POST" action="{{ route('pdf.generateWithChart', [$projectId, $wellinfoId]) }}" target="_blank">
                            @csrf
                            <input type="hidden" name="chartBase64" id="chartBase64Download">
                            <input type="hidden" name="download" value="1">
                            <button type="button" onclick="onDownloadClick()" 
                                class="group relative flex items-center justify-center w-10 h-10 rounded-full bg-blue-100 hover:bg-blue-600 transition-all duration-200"
                                title="Download Report">
                                <i class="fa fa-download text-blue-600 group-hover:text-white text-lg"></i>
                            </button>
                        </form>



                    @endif
                </div>

                </div>

                <div class="bg-white rounded-lg shadow p-6 text-sm sm:text-base">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <p class="text-gray-500">Report Date</p>
                            <p class="font-medium text-gray-800">{{ \Carbon\Carbon::parse($wellinfo->curdate)->format('F d, Y') }}</p>
                        </div>
                        <div>
                            <p class="text-gray-500">Spud Date</p>
                            <p class="font-medium text-gray-800">{{ \Carbon\Carbon::parse($wellinfo->spud_date)->format('F d, Y') }}</p>
                        </div>

                        <div>
                            <p class="text-gray-500">Platform</p>
                            <p class="font-medium text-gray-800">{{ $wellinfo->platform }}</p>
                        </div>
                        <div>
                            <p class="text-gray-500">Well Name</p>
                            <p class="font-medium text-gray-800">{{ $wellinfo->wellname }}</p>
                        </div>

                        <div>
                            <p class="text-gray-500">Location</p>
                            <p class="font-medium text-gray-800">{{ $wellinfo->location }}</p>
                        </div>
                        <div>
                            <p class="text-gray-500">Company Man</p>
                            <p class="font-medium text-gray-800">{{ $wellinfo->companyman }}</p>
                        </div>

                        <div>
                            <p class="text-gray-500">OIM</p>
                            <p class="font-medium text-gray-800">{{ $wellinfo->oim }}</p>
                        </div>
                        <div>
                            <p class="text-gray-500">Mud Engineer</p>
                            <p class="font-medium text-gray-800">{{ $wellinfo->mudeng }}</p>
                        </div>

                        <div>
                            <p class="text-gray-500">Report No.</p>
                            <p class="font-medium text-gray-800">{{ $wellinfo->urut }}</p>
                        </div>

                        <div>
                            <p class="text-gray-500">Lock Status</p>
                            <p class="font-semibold text-{{ $wellinfo->lockreport === 'YES' ? 'red' : 'green' }}-600">
                                {{ $wellinfo->lockreport === 'YES' ? 'Locked' : 'Unlocked' }}
                            </p>
                        </div>
                    </div>
                </div>

                {{-- PDF Viewer --}}
                @if($wellinfo->lockreport === 'YES')
                <div id="pdfViewer" class="mt-6 hidden">
                    <div id="loadingMessage" class="text-gray-600 italic mb-2">Generating report...</div>
                    <iframe id="pdfFrame" name="pdfFrame" width="100%" height="800px" class="border rounded shadow"></iframe>
                </div>

                @endif

                <div class="mt-6">
                    <a href="{{ route('projects.details', ['project_id' => $project->id_project]) }}" class="text-blue-600 hover:underline">&larr; Back to Project Details</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>

<script>
function onPrintClick() {
    const canvas = document.getElementById('oocChart');
    const ctx = canvas.getContext('2d');

    const viewer = document.getElementById('pdfViewer');
    const loading = document.getElementById('loadingMessage');
    viewer.classList.remove('hidden');
    loading.style.display = 'block';

    const oocData = {!! json_encode([
        $retorts->rt_sh_ooc ?? 0,
        $retorts->rt_cdu_ooc ?? 0,
        $retorts->rt_cf1_ooc ?? 0,
        $retorts->rt_cf2_ooc ?? 0,
        $retorts->rt_cf3_ooc ?? 0,
    ]) !!};

    const maxY = Math.max(...oocData);
    const dynamicMax = maxY < 10 ? 10 : Math.ceil(maxY + 1);

    // Destroy chart sebelumnya jika ada
    if (window.oocChartInstance) {
        window.oocChartInstance.destroy();
    }

    window.oocChartInstance = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Shakers', 'Dryer', 'Cfuge 1', 'Cfuge 2', 'Cfuge 3'],
            datasets: [{
                label: '% Oil-on-Cuttings',
                data: oocData,
                backgroundColor: 'rgba(43, 117, 68, 1)',
                borderColor: 'rgba(0, 100, 0, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: false,
            animation: false,
            plugins: {
                datalabels: {
                    anchor: 'end',
                    align: 'top',
                    color: '#000',
                    font: {
                        weight: 'bold',
                        size: 10
                    },
                    formatter: function(value) {
                        const num = parseFloat(value);
                        return isNaN(num) ? '' : num.toFixed(2);
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    suggestedMax: dynamicMax,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        },
        plugins: [ChartDataLabels] // <-- WAJIB!
    });

    setTimeout(() => {
        const base64 = canvas.toDataURL('image/png');
        document.getElementById('chartBase64').value = base64;
        document.getElementById('pdfForm').submit();

        const iframe = document.querySelector('iframe[name="pdfFrame"]');
        iframe.onload = () => loading.style.display = 'none';
    }, 500);
}


function onDownloadClick() {
    const canvas = document.getElementById('oocChart');
    const ctx = canvas.getContext('2d');

    const oocData = {!! json_encode([
        $retorts->rt_sh_ooc ?? 0,
        $retorts->rt_cdu_ooc ?? 0,
        $retorts->rt_cf1_ooc ?? 0,
        $retorts->rt_cf2_ooc ?? 0,
        $retorts->rt_cf3_ooc ?? 0,
    ]) !!};

    const maxY = Math.max(...oocData);
    const dynamicMax = maxY < 10 ? 10 : Math.ceil(maxY + 1);

    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Shakers', 'Dryer', 'C’fuge 1', 'C’fuge 2', 'C’fuge 3'],
            datasets: [{
                label: '% Oil-on-Cuttings',
                data: oocData,
                backgroundColor: 'rgba(43, 117, 68, 1)'
            }]
        },
        options: {
            responsive: false,
            animation: false,
            plugins: {
                datalabels: {
                    anchor: 'end',
                    align: 'top',
                    color: '#000',
                    font: {
                        weight: 'bold'
                    },
                    formatter: function(value) {
                        const num = parseFloat(value);
                        return isNaN(num) ? '' : num.toFixed(2);
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    suggestedMax: dynamicMax,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        },
        plugins: [ChartDataLabels]
    });

    setTimeout(() => {
        const base64 = canvas.toDataURL('image/png');
        document.getElementById('chartBase64Download').value = base64;
        document.getElementById('downloadForm').submit();
    }, 500);
}
</script>

@endsection
