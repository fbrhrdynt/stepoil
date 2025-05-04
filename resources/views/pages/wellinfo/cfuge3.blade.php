@extends('layouts.app')

@section('title', 'Equipments - Centrifuge 3 | FOTrack')

@section('content')
<div class="xCPtuxM4_gihvpPwv9bX t6gkcSf0Bt4MLItXvDJ_ Nu4HUn5EQpnNJ1itNkrd iHPddplqYvrN6qWgvntn AqVNvLG_H6VHhym2yKMp">
    <div class="NM7Z1HBVjN_86WhEcXan mveJTCIb2WII7J4sY22F pXhVRBC8yaUNllmIWxln qUWbS_LTZujDB4XCd11V _Ybd3WwuTVljUT4vEaM3 IvHclGgvMLtYg_ow0uba fzhbbDQ686T8arwvi_bJ _fGhMnSfYmaGrv7DvZ00 _1jTZ8KXRZul60S6czNi">
        <div class="container mx-auto px-4 sm:px-8">
            <div class="py-8">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-semibold leading-tight"><u>Centrifuge 3 Details</u></h2>
                </div>

                <form id="formCentrifuge3" method="POST" action="{{ route('wellinfo.updateCentrifuge3', [$project_id, $wellinfo->id_wellinfo]) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id_wellinfo" value="{{ $details->id_wellinfo }}">
                    <input type="hidden" name="id_details" value="{{ $details->id_details }}">
                    <input type="hidden" id="volholeunit" value="{{ $details->volholeunit }}">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label>SAP Number</label>
                            <input type="text" name="cf3_sn" value="{{ $details->cf3_sn }}" class="custom-input">
                        </div>

                        <div>
                            <label>Model</label>
                            <select name="cf3_model" class="custom-input">
                                @foreach(['7200VFD', '1000FHD', '1000VFD', '1000GBD', '1000FRDRYER', 'HNH', 'CSI'] as $opt)
                                    <option value="{{ $opt }}" {{ $details->cf3_model == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label>Mode of Operation</label>
                            <select name="cf3_modeofopr" class="custom-input">
                                @foreach(['FRDREYR', 'SLDREMOVAL', 'BARITE'] as $opt)
                                    <option value="{{ $opt }}" {{ $details->cf3_modeofopr == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label>Weir Plate Setting (mm)</label>
                            <input type="text" name="cf3_weirplate" value="{{ $details->cf3_weirplate }}" class="custom-input">
                        </div>

                        <div>
                            <label>Bowl Speed (rpm)</label>
                            <input type="text" name="cf3_bowlspeed" value="{{ $details->cf3_bowlspeed }}" class="custom-input">
                        </div>

                        <div>
                            <label>Bowl-Conveyor Diff. Speed (rpm)</label>
                            <input type="text" name="cf3_bowlconv" value="{{ $details->cf3_bowlconv }}" class="custom-input">
                        </div>

                        <div>
                            <label>Feed-in Suction From</label>
                            <select name="cf3_feedsuc" class="custom-input">
                                @foreach(['INTERMEDIATETANK','SANDTRAPTANK','ACTIVETANK','HOLDINGTANK','CUTTINGSKIPS','OVERBOARD'] as $opt)
                                    <option value="{{ $opt }}" {{ $details->cf3_feedsuc == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label>Effluent Return To</label>
                            <select name="cf3_effluentreturn" class="custom-input">
                                @foreach(['INTERMEDIATETANK','SANDTRAPTANK','ACTIVETANK','HOLDINGTANK','CUTTINGSKIPS','OVERBOARD'] as $opt)
                                    <option value="{{ $opt }}" {{ $details->cf3_effluentreturn == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label>Underflow Discharge To</label>
                            <select name="cf3_underflow" class="custom-input">
                                @foreach(['INTERMEDIATETANK','SANDTRAPTANK','ACTIVETANK','HOLDINGTANK','CUTTINGSKIPS','OVERBOARD','JUMBOBAG'] as $opt)
                                    <option value="{{ $opt }}" {{ $details->cf3_underflow == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label>Running Hour (hrs)</label>
                            <input type="text" name="cf3_runninghour" id="cf3_runninghour" value="{{ $details->cf3_runninghour }}" class="custom-input" onkeyup="Perubahan3()">
                        </div>

                        <div>
                            <label>Feed-in Rate (Gpm)</label>
                            <input type="text" name="cf3_feedinrate" id="cf3_feedinrate" value="{{ $details->cf3_feedinrate }}" class="custom-input" onkeyup="Perubahan3()">
                        </div>

                        <div>
                            <label>Feed-in Density ({{ $details->mwunit }})</label>
                            <input type="text" name="cf3_feedindensity" id="cf3_feedindensity" value="{{ $details->cf3_feedindensity }}" class="custom-input" onkeyup="Perubahan3()">
                        </div>

                        <div>
                            <label>Centrate Density ({{ $details->mwunit }})</label>
                            <input type="text" name="cf3_centratedens" id="cf3_centratedens" value="{{ $details->cf3_centratedens }}" class="custom-input" onkeyup="Perubahan3()">
                        </div>

                        <div>
                            <label>Cake Discard Density ({{ $details->mwunit }})</label>
                            <input type="text" name="cf3_cakediscdens" id="cf3_cakediscdens" value="{{ $details->cf3_cakediscdens }}" class="custom-input" onkeyup="Perubahan3()">
                        </div>

                        <div>
                            <label>Centrate Return Rate (Gpm)</label>
                            <input type="text" name="cf3_centratereturn" id="cf3_centratereturn" value="{{ $details->cf3_centratereturn }}" class="custom-input" readonly>
                        </div>

                        <div>
                            <label>Cake Discard Flow Rate (Gpm)</label>
                            <input type="text" name="cf3_cakediscflow" id="cf3_cakediscflow" value="{{ $details->cf3_cakediscflow }}" class="custom-input" readonly>
                        </div>

                        <div>
                            <label>{{ $details->volholeunit == 'bbls' ? 'M.Ton Wet Discharge / Day' : 'Lbs Wet Discharge / Day' }}</label>
                            <input type="text" name="cf3_masscake" id="cf3_masscake" value="{{ $details->cf3_masscake }}" class="custom-input" readonly>
                        </div>

                        <div>
                            <label>Volume Cake Discharge ({{ $details->volholeunit }})</label>
                            <input type="text" name="cf3_volcake" id="cf3_volcake" value="{{ $details->cf3_volcake }}" class="custom-input" readonly>
                        </div>
                    </div>

                    <div class="mt-6 text-center">
                        <button type="button" id="saveCentrifuge3" onclick="submitCentrifuge3()" class="custom-btn-submit">
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
function Perubahan3() {
    const inRate = parseFloat(document.getElementById("cf3_feedinrate").value) || 0;
    const densIn = parseFloat(document.getElementById("cf3_feedindensity").value) || 0;
    const densOut = parseFloat(document.getElementById("cf3_centratedens").value) || 0;
    const densCake = parseFloat(document.getElementById("cf3_cakediscdens").value) || 0;
    const runHrs = parseFloat(document.getElementById("cf3_runninghour").value) || 0;
    const unit = document.getElementById("volholeunit").value;

    const cakeFlow = inRate * (densIn - densOut) / (densCake - densOut);
    const centrate = inRate - cakeFlow;
    const volCake = runHrs * (cakeFlow * 60 / 42);
    const massCakeMTon = (((cakeFlow * 42) * densCake) * 0.45359237 / 1000) * runHrs;

    document.getElementById("cf3_cakediscflow").value = cakeFlow.toFixed(2);
    document.getElementById("cf3_centratereturn").value = centrate.toFixed(2);

    if (unit.includes('bbls')) {
        document.getElementById("cf3_masscake").value = massCakeMTon.toFixed(2);
        document.getElementById("cf3_volcake").value = volCake.toFixed(2);
    } else {
        const mtonM3 = (massCakeMTon / runHrs) / 0.45359 * 1000;
        const volCakeM3 = volCake / 6.2898;
        document.getElementById("cf3_masscake").value = mtonM3.toFixed(2);
        document.getElementById("cf3_volcake").value = volCakeM3.toFixed(2);
    }
}

function submitCentrifuge3() {
    const form = document.getElementById('formCentrifuge3');
    const button = document.getElementById('saveCentrifuge3');
    button.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Saving...';
    button.disabled = true;

    fetch(form.action, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: new FormData(form)
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            handleRedirectToDryer1();
        } else {
            alert(data.error || 'Failed to save data.');
        }
    })
    .catch(() => {
        alert('An unexpected error occurred.');
    })
    .finally(() => {
        button.innerHTML = '<i class="fa-regular fa-floppy-disk"></i> Save Data';
        button.disabled = false;
    });
}

function handleRedirectToDryer1() {
    let seconds = 5;
    const redirectUrl = "{{ url("projects/details/$project_id/{$wellinfo->id_wellinfo}/cutting-dryer-1") }}";

    const interval = setInterval(() => {
        if (seconds <= 0) {
            clearInterval(interval);
            window.location.href = redirectUrl;
        }
        seconds--;
    }, 1000);

    const confirmRedirect = confirm("Data has been successfully saved.\n\nYou will be redirected to Cutting Dryer 1 in 5 seconds.\n\nClick OK to go now, or Cancel to stay.");

    if (confirmRedirect) {
        clearInterval(interval);
        window.location.href = redirectUrl;
    } else {
        location.reload();
    }
}
</script>
@endsection
