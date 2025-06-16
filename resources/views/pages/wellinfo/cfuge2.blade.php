@extends('layouts.app')

@section('title', 'Equipments - Centrifuge 2 | FOTrack')

@section('content')
<div class="xCPtuxM4_gihvpPwv9bX t6gkcSf0Bt4MLItXvDJ_ Nu4HUn5EQpnNJ1itNkrd iHPddplqYvrN6qWgvntn AqVNvLG_H6VHhym2yKMp">
    <div class="NM7Z1HBVjN_86WhEcXan mveJTCIb2WII7J4sY22F pXhVRBC8yaUNllmIWxln qUWbS_LTZujDB4XCd11V _Ybd3WwuTVljUT4vEaM3 IvHclGgvMLtYg_ow0uba fzhbbDQ686T8arwvi_bJ _fGhMnSfYmaGrv7DvZ00 _1jTZ8KXRZul60S6czNi">
        <div class="container mx-auto px-4 sm:px-8">
            <div class="py-8">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-semibold leading-tight"><u>Centrifuge 2 Details</u></h2>
                </div>

                <form id="formCentrifuge2" method="POST" action="{{ route('wellinfo.updateCentrifuge2', [$project_id, $wellinfo->id_wellinfo]) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id_wellinfo" value="{{ $details->id_wellinfo }}">
                    <input type="hidden" name="id_details" value="{{ $details->id_details }}">
                    <input type="hidden" id="volholeunit" value="{{ $details->volholeunit }}">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label>SAP Number</label>
                            <input type="text" name="cf2_sn" value="{{ $details->cf2_sn }}" class="custom-input">
                        </div>

                        <div>
                            <label>Model</label>
                            <select name="cf2_model" class="custom-input">
                                @foreach(['7200VFD', '1000FHD', '1000VFD', '1000GBD', '1000FRDRYER', 'HNH', 'CSI'] as $opt)
                                    <option value="{{ $opt }}" {{ $details->cf2_model == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label>Mode of Operation</label>
                            <select name="cf2_modeofopr" class="custom-input">
                                @foreach(['FRDREYR', 'SLDREMOVAL', 'BARITE'] as $opt)
                                    <option value="{{ $opt }}" {{ $details->cf2_modeofopr == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label>Weir Plate Setting (mm)</label>
                            <input type="text" name="cf2_weirplate" value="{{ $details->cf2_weirplate }}" class="custom-input">
                        </div>

                        <div>
                            <label>Bowl Speed (rpm)</label>
                            <input type="text" name="cf2_bowlspeed" value="{{ $details->cf2_bowlspeed }}" class="custom-input">
                        </div>

                        <div>
                            <label>Bowl-Conveyor Diff. Speed (rpm)</label>
                            <input type="text" name="cf2_bowlconv" value="{{ $details->cf2_bowlconv }}" class="custom-input">
                        </div>

                        <div>
                            <label>Feed-in Suction From</label>
                            <select name="cf2_feedsuc" class="custom-input">
                                @foreach(['INTERMEDIATETANK','SANDTRAPTANK','ACTIVETANK','HOLDINGTANK','CUTTINGSKIPS','OVERBOARD'] as $opt)
                                    <option value="{{ $opt }}" {{ $details->cf2_feedsuc == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label>Effluent Return To</label>
                            <select name="cf2_effluentreturn" class="custom-input">
                                @foreach(['INTERMEDIATETANK','SANDTRAPTANK','ACTIVETANK','HOLDINGTANK','CUTTINGSKIPS','OVERBOARD'] as $opt)
                                    <option value="{{ $opt }}" {{ $details->cf2_effluentreturn == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label>Underflow Discharge To</label>
                            <select name="cf2_underflow" class="custom-input">
                                @foreach(['INTERMEDIATETANK','SANDTRAPTANK','ACTIVETANK','HOLDINGTANK','CUTTINGSKIPS','OVERBOARD','JUMBOBAG'] as $opt)
                                    <option value="{{ $opt }}" {{ $details->cf2_underflow == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label>Running Hour (hrs)</label>
                            <input type="text" name="cf2_runninghour" id="cf2_runninghour" value="{{ $details->cf2_runninghour }}" class="custom-input" onkeyup="Perubahan2()">
                        </div>

                        <div>
                            <label>Feed-in Rate (Gpm)</label>
                            <input type="text" name="cf2_feedinrate" id="cf2_feedinrate" value="{{ $details->cf2_feedinrate }}" class="custom-input" onkeyup="Perubahan2()">
                        </div>

                        <div>
                            <label>Feed-in Density ({{ $details->mwunit }})</label>
                            <input type="text" name="cf2_feedindensity" id="cf2_feedindensity" value="{{ $details->cf2_feedindensity }}" class="custom-input" onkeyup="Perubahan2()">
                        </div>

                        <div>
                            <label>Centrate Density ({{ $details->mwunit }})</label>
                            <input type="text" name="cf2_centratedens" id="cf2_centratedens" value="{{ $details->cf2_centratedens }}" class="custom-input" onkeyup="Perubahan2()">
                        </div>

                        <div>
                            <label>Cake Discard Density ({{ $details->mwunit }})</label>
                            <input type="text" name="cf2_cakediscdens" id="cf2_cakediscdens" value="{{ $details->cf2_cakediscdens }}" class="custom-input" onkeyup="Perubahan2()">
                        </div>

                        <div>
                            <label>Centrate Return Rate (Gpm)</label>
                            <input type="text" name="cf2_centratereturn" id="cf2_centratereturn" value="{{ $details->cf2_centratereturn }}" class="custom-input" readonly>
                        </div>

                        <div>
                            <label>Cake Discard Flow Rate (Gpm)</label>
                            <input type="text" name="cf2_cakediscflow" id="cf2_cakediscflow" value="{{ $details->cf2_cakediscflow }}" class="custom-input" readonly>
                        </div>

                        <div>
                            <label>{{ $details->volholeunit == 'bbls' ? 'M.Ton Wet Discharge / Day' : 'Lbs Wet Discharge / Day' }}</label>
                            <input type="text" name="cf2_masscake" id="cf2_masscake" value="{{ $details->cf2_masscake }}" class="custom-input" readonly>
                        </div>

                        <div>
                            <label>Volume Cake Discharge ({{ $details->volholeunit }})</label>
                            <input type="text" name="cf2_volcake" id="cf2_volcake" value="{{ $details->cf2_volcake }}" class="custom-input" readonly>
                        </div>
                    </div>

                    <div class="mt-6 text-center">
                        <button type="button" onclick="submitCentrifuge2()" class="custom-btn-submit">
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
    function submitCentrifuge2() {
        const form = document.getElementById('formCentrifuge2');
        const button = event.target;
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
        .then(async res => {
            const data = await res.json();
            if (!res.ok) throw new Error(data.message || 'Failed to save data.');

            if (data.success) {
                handleRedirectPrompt(); // tampilkan SweetAlert redirect
            } else {
                throw new Error(data.error || 'Failed to save data.');
            }
        })
        .catch(err => {
            console.error(err);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: err.message || 'An unexpected error occurred.',
            });
        })
        .finally(() => {
            button.innerHTML = '<i class="fa-regular fa-floppy-disk"></i> Save Data';
            button.disabled = false;
        });
    }

    function handleRedirectPrompt() {
        let countdown = 5;
        const redirectUrl = "{{ url("projects/details/$project_id/{$wellinfo->id_wellinfo}/centrifuge-3") }}";

        const timerInterval = setInterval(() => {
            if (countdown <= 0) {
                clearInterval(timerInterval);
                window.location.href = redirectUrl;
            }
            countdown--;
        }, 1000);

        Swal.fire({
            title: 'Data Saved!',
            html: `You will be redirected to <b>Centrifuge 3</b> in <b><span id="countdown">5</span></b> seconds.<br><br>
                Click <b>Go Now</b> to redirect immediately, or <b>Stay</b> to remain here.`,
            icon: 'success',
            showCancelButton: true,
            confirmButtonText: 'Go Now',
            cancelButtonText: 'Stay Here',
            didOpen: () => {
                const content = Swal.getHtmlContainer();
                const $countdown = content.querySelector('#countdown');
                const countdownInterval = setInterval(() => {
                    $countdown.textContent = countdown;
                    if (countdown <= 0) clearInterval(countdownInterval);
                }, 1000);
            }
        }).then((result) => {
            clearInterval(timerInterval);
            if (result.isConfirmed) {
                window.location.href = redirectUrl;
            } else {
                location.reload(); // muat ulang halaman dengan data baru
            }
        });
    }
</script>

<script>
function Perubahan2() {
    let fr = parseFloat(document.getElementById("cf2_feedinrate").value) || 0;
    let fd = parseFloat(document.getElementById("cf2_feedindensity").value) || 0;
    let cd = parseFloat(document.getElementById("cf2_centratedens").value) || 0;
    let dd = parseFloat(document.getElementById("cf2_cakediscdens").value) || 0;
    let rh = parseFloat(document.getElementById("cf2_runninghour").value) || 0;
    let unit = document.getElementById("volholeunit").value;

    let cakediscflow = (fr * (fd - cd)) / (dd - cd);
    let centratereturn = fr - cakediscflow;
    let volCakeDischarge = rh * (cakediscflow * 60 / 42);
    let wetDischargeTon = (((cakediscflow * 42) * dd) * 0.45359237 / 1000) * rh;

    document.getElementById("cf2_cakediscflow").value = cakediscflow.toFixed(2);
    document.getElementById("cf2_centratereturn").value = centratereturn.toFixed(2);

    if (unit.includes("bbls")) {
        document.getElementById("cf2_masscake").value = wetDischargeTon.toFixed(2);
        document.getElementById("cf2_volcake").value = volCakeDischarge.toFixed(2);
    } else {
        const lbs = (wetDischargeTon / rh) / 0.45359 * 1000;
        document.getElementById("cf2_masscake").value = lbs.toFixed(2);
        document.getElementById("cf2_volcake").value = (volCakeDischarge / 6.2898).toFixed(2);
    }
}
</script>
@endsection