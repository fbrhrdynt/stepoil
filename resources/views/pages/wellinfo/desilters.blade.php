@extends('layouts.app')

@section('title', 'Equipments - Desilters | FOTrack')

@section('content')
<div class="xCPtuxM4_gihvpPwv9bX t6gkcSf0Bt4MLItXvDJ_ Nu4HUn5EQpnNJ1itNkrd iHPddplqYvrN6qWgvntn AqVNvLG_H6VHhym2yKMp">
    <div class="NM7Z1HBVjN_86WhEcXan mveJTCIb2WII7J4sY22F pXhVRBC8yaUNllmIWxln qUWbS_LTZujDB4XCd11V _Ybd3WwuTVljUT4vEaM3 IvHclGgvMLtYg_ow0uba fzhbbDQ686T8arwvi_bJ _fGhMnSfYmaGrv7DvZ00 _1jTZ8KXRZul60S6czNi">
        <div class="container mx-auto px-4 sm:px-8">
            <div class="py-8">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-semibold leading-tight"><u>Desilters Details</u></h2>
                </div>

                <form id="formDesilters" method="POST" action="{{ route('wellinfo.updateDesilters', [$project_id, $wellinfo_id]) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id_wellinfo" value="{{ $wellinfo_id }}">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

                        <div>
                            <label>Running Hours</label>
                            <input type="number" step="0.01" name="run_hour" value="{{ $desilter->run_hour }}" class="custom-input" oninput="calculateDesilter()">
                        </div>

                        <div>
                            <label>Feed Rate (gal/min)</label>
                            <input type="text" name="feed_rate" value="{{ $desilter->feed_rate }}" class="custom-input bg-gray-100" readonly>
                        </div>

                        <div class="flex flex-col">
                            <label>Feed Density</label>
                            <div class="flex items-center gap-2">
                                <input type="number" step="0.01" name="feed_dens" value="{{ $desilter->feed_dens }}" class="custom-input w-full" oninput="calculateDesilter(); updateUnit('feed_dens')">
                                <span id="unit_feed_dens" class="text-sm text-gray-600 min-w-[50px]">ppg</span>
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label>Overflow Density</label>
                            <div class="flex items-center gap-2">
                                <input type="number" step="0.01" name="overflow_dens" value="{{ $desilter->overflow_dens }}" class="custom-input w-full" oninput="calculateDesilter(); updateUnit('overflow_dens')">
                                <span id="unit_overflow_dens" class="text-sm text-gray-600 min-w-[50px]">ppg</span>
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label>Underflow Density</label>
                            <div class="flex items-center gap-2">
                                <input type="number" step="0.01" name="underflow_dens" value="{{ $desilter->underflow_dens }}" class="custom-input w-full" oninput="calculateDesilter(); updateUnit('underflow_dens')">
                                <span id="unit_underflow_dens" class="text-sm text-gray-600 min-w-[50px]">ppg</span>
                            </div>
                        </div>

                        <div>
                            <label>Vol Discharge (bbls)</label>
                            <input type="number" step="0.01" name="vol_discharge" value="{{ $desilter->vol_discharge }}" class="custom-input" oninput="calculateDesilter()">
                        </div>

                        <div>
                            <label>Mud-on-Cuttings</label>
                            <input type="number" step="0.01" name="mudoncuttings" value="{{ $desilter->mudoncuttings }}" class="custom-input" oninput="calculateDesilter()">
                        </div>

                        <div>
                            <label>Vol Mud Discharge (bbls)</label>
                            <input type="text" name="volmud_discharge" value="{{ $desilter->volmud_discharge }}" class="custom-input bg-gray-100" readonly>
                        </div>

                        <div>
                            <label>Head Pressure (psi)</label>
                            <input type="number" step="0.01" name="head_pressure" value="{{ $desilter->head_pressure }}" class="custom-input">
                        </div>
                    </div>

                    <div class="mt-6 text-center">
                        <button type="button" id="saveDesilter" onclick="submitDesilter()" class="custom-btn-submit">
                            <i class="fa-regular fa-floppy-disk"></i> &nbsp; SAVE DATA
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    calculateDesilter();
    updateUnit('feed_dens');
    updateUnit('overflow_dens');
    updateUnit('underflow_dens');
});

function calculateDesilter() {
    const runHour = parseFloat(document.querySelector('[name="run_hour"]').value) || 0;
    const volDischarge = parseFloat(document.querySelector('[name="vol_discharge"]').value) || 0;
    const feedDens = parseFloat(document.querySelector('[name="feed_dens"]').value) || 0;
    const overflowDens = parseFloat(document.querySelector('[name="overflow_dens"]').value) || 0;
    const underflowDens = parseFloat(document.querySelector('[name="underflow_dens"]').value) || 0;
    const mudCuttings = parseFloat(document.querySelector('[name="mudoncuttings"]').value) || 0;

    let feedRate = 0;
    let volMudDischarge = 0;

    if (runHour > 0 && (feedDens - overflowDens) !== 0) {
        feedRate = (42 / (60 * runHour)) * volDischarge * (underflowDens - overflowDens) / (feedDens - overflowDens);
    }

    volMudDischarge = mudCuttings * volDischarge * (1 + mudCuttings);

    document.querySelector('[name="feed_rate"]').value = isNaN(feedRate) ? '—' : feedRate.toFixed(2);
    document.querySelector('[name="volmud_discharge"]').value = isNaN(volMudDischarge) ? '—' : volMudDischarge.toFixed(2);
}

function updateUnit(fieldName) {
    const value = parseFloat(document.querySelector(`[name="${fieldName}"]`).value);
    const unitEl = document.getElementById(`unit_${fieldName}`);

    if (unitEl) {
        unitEl.innerText = (value >= 8.33) ? 'ppg' : 'sp.gr';
    }
}
</script>
<script>
function submitDesilter() {
    const form = document.getElementById('formDesilters');
    const button = document.getElementById('saveDesilter');

    button.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Saving...';
    button.disabled = true;

    const formData = new FormData(form);
    formData.append('_method', 'PUT');

    fetch(form.action, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        },
        body: formData
    })
    .then(async res => {
        const contentType = res.headers.get('content-type') || '';
        if (!res.ok) {
            if (contentType.includes('application/json')) {
                const error = await res.json();
                throw error;
            } else {
                throw new Error("Response is not valid JSON.");
            }
        }
        return res.json();
    })

    .then(data => {
        if (data.success) {
            const redirectUrl = "{{ url('projects/details/' . $project_id . '/' . $wellinfo_id . '/retort') }}";

            Swal.fire({
                title: 'Data Saved Successfully!',
                text: 'Do you want to continue to the Retort Worksheet Page?',
                icon: 'success',
                showCancelButton: true,
                confirmButtonText: 'Yes, go to Retort',
                cancelButtonText: 'Stay Here'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = redirectUrl;
                } else {
                    location.reload();
                }
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Save Failed',
                text: data.error || "Unknown error."
            });
        }
    })
    .catch(err => {
        Swal.fire({
            icon: 'error',
            title: 'Unexpected Error',
            text: err.message || JSON.stringify(err)
        });
    })
    .finally(() => {
        button.innerHTML = '<i class="fa-regular fa-floppy-disk"></i> Save Data';
        button.disabled = false;
    });
}
</script>

@endsection
