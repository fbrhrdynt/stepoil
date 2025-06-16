@extends('layouts.app')

@section('title', 'Equipments - Desanders | FOTrack')

@section('content')
<div class="xCPtuxM4_gihvpPwv9bX t6gkcSf0Bt4MLItXvDJ_ Nu4HUn5EQpnNJ1itNkrd iHPddplqYvrN6qWgvntn AqVNvLG_H6VHhym2yKMp">
    <div class="NM7Z1HBVjN_86WhEcXan mveJTCIb2WII7J4sY22F pXhVRBC8yaUNllmIWxln qUWbS_LTZujDB4XCd11V _Ybd3WwuTVljUT4vEaM3 IvHclGgvMLtYg_ow0uba fzhbbDQ686T8arwvi_bJ _fGhMnSfYmaGrv7DvZ00 _1jTZ8KXRZul60S6czNi">
        <div class="container mx-auto px-4 sm:px-8">
            <div class="py-8">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-semibold leading-tight"><u>Desanders Details</u></h2>
                </div>

                <form id="formDesanders" method="POST" action="{{ route('wellinfo.updateDesanders', [$project_id, $wellinfo->id_wellinfo]) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id_wellinfo" value="{{ $wellinfo->id_wellinfo }}">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

                        <div>
                            <label>Running Hours</label>
                            <input type="number" step="0.01" name="run_hour" value="{{ $desander->run_hour }}" class="custom-input" oninput="calculateDesander()">
                        </div>

                        <div>
                            <label>Feed Rate (gal/min)</label>
                            <input type="text" name="feed_rate" value="{{ $desander->feed_rate }}" class="custom-input bg-gray-100" readonly>
                        </div>

                        <div class="flex flex-col">
                            <label>Feed Density</label>
                            <div class="flex items-center gap-2">
                                <input type="number" step="0.01" name="feed_dens" value="{{ $desander->feed_dens }}" class="custom-input w-full" oninput="calculateDesander(); updateUnit('feed_dens')">
                                <span id="unit_feed_dens" class="text-sm text-gray-600 min-w-[50px]">ppg</span>
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label>Overflow Density</label>
                            <div class="flex items-center gap-2">
                                <input type="number" step="0.01" name="overflow_dens" value="{{ $desander->overflow_dens }}" class="custom-input w-full" oninput="calculateDesander(); updateUnit('overflow_dens')">
                                <span id="unit_overflow_dens" class="text-sm text-gray-600 min-w-[50px]">ppg</span>
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label>Underflow Density</label>
                            <div class="flex items-center gap-2">
                                <input type="number" step="0.01" name="underflow_dens" value="{{ $desander->underflow_dens }}" class="custom-input w-full" oninput="calculateDesander(); updateUnit('underflow_dens')">
                                <span id="unit_underflow_dens" class="text-sm text-gray-600 min-w-[50px]">ppg</span>
                            </div>
                        </div>

                        <div>
                            <label>Vol Discharge (bbls)</label>
                            <input type="number" step="0.01" name="vol_discharge" value="{{ $desander->vol_discharge }}" class="custom-input" oninput="calculateDesander()">
                        </div>

                        <div>
                            <label>Mud-on-Cuttings</label>
                            <input type="number" step="0.01" name="mudoncuttings" value="{{ $desander->mudoncuttings }}" class="custom-input" oninput="calculateDesander()">
                        </div>

                        <div>
                            <label>Vol Mud Discharge (bbls)</label>
                            <input type="text" name="volmud_discharge" value="{{ $desander->volmud_discharge }}" class="custom-input bg-gray-100" readonly>
                        </div>

                        <div>
                            <label>Head Pressure (psi)</label>
                            <input type="number" step="0.01" name="head_pressure" value="{{ $desander->head_pressure }}" class="custom-input">
                        </div>
                    </div>

                    <div class="mt-6 text-center">
                        <button type="button" id="saveDesanders" onclick="submitDesanders()" class="custom-btn-submit">
                            <i class="fa-regular fa-floppy-disk"></i> &nbsp; SAVE DATA
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div></div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    calculateDesander();
    updateUnit('feed_dens');
    updateUnit('overflow_dens');
    updateUnit('underflow_dens');
});

function calculateDesander() {
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
function submitDesanders() {
    const form = document.getElementById('formDesanders');
    const button = document.getElementById('saveDesanders');

    button.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Saving...';
    button.disabled = true;

    fetch(form.action, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        },
        body: new FormData(form)
    })
    .then(res => {
        if (!res.ok) return res.json().then(err => { throw err; });
        return res.json();
    })
    .then(data => {
        if (data.success) {
            const redirectUrl = "{{ url('projects/details/' . $project_id . '/' . $wellinfo->id_wellinfo . '/desilters') }}";
            let countdown = 5;

            const interval = setInterval(() => {
                if (countdown <= 0) {
                    clearInterval(interval);
                    window.location.href = redirectUrl;
                }
                countdown--;
            }, 1000);

            Swal.fire({
                title: 'Data Saved Successfully!',
                html: `You will be redirected to <b>Desilter</b> in <b><span id="des-countdown">5</span></b> seconds.<br><br>
                       Click <b>Go Now</b> to proceed immediately, or <b>Stay</b> to remain on this page.`,
                icon: 'success',
                showCancelButton: true,
                confirmButtonText: 'Go Now',
                cancelButtonText: 'Stay Here',
                didOpen: () => {
                    const content = Swal.getHtmlContainer();
                    const $cd = content.querySelector('#des-countdown');
                    const updateInterval = setInterval(() => {
                        $cd.textContent = countdown;
                        if (countdown <= 0) clearInterval(updateInterval);
                    }, 1000);
                }
            }).then((result) => {
                clearInterval(interval);
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
