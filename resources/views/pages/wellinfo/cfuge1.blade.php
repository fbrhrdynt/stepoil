@extends('layouts.app')

@section('title', 'Equipments - Centrifuge 1 | FOTrack')

@section('content')
<div class="xCPtuxM4_gihvpPwv9bX t6gkcSf0Bt4MLItXvDJ_ Nu4HUn5EQpnNJ1itNkrd iHPddplqYvrN6qWgvntn AqVNvLG_H6VHhym2yKMp">
    <div class="NM7Z1HBVjN_86WhEcXan mveJTCIb2WII7J4sY22F pXhVRBC8yaUNllmIWxln qUWbS_LTZujDB4XCd11V _Ybd3WwuTVljUT4vEaM3 IvHclGgvMLtYg_ow0uba fzhbbDQ686T8arwvi_bJ _fGhMnSfYmaGrv7DvZ00 _1jTZ8KXRZul60S6czNi">
        <div class="container mx-auto px-4 sm:px-8">
            <div class="py-8">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-semibold leading-tight"><u>Centrifuge 1 Details</u></h2>
                </div>

                <form id="formCentrifuge1" method="POST"
                    action="{{ route('wellinfo.updateCentrifuge1', [$project_id, $wellinfo->id_wellinfo]) }}">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="id_wellinfo" value="{{ $details->id_wellinfo }}">
                    <input type="hidden" name="id_details" value="{{ $details->id_details }}">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- SAP Number --}}
                        <div>
                            <label for="cf1_sn" class="block font-medium mb-1">SAP Number</label>
                            <input type="text" name="cf1_sn" id="cf1_sn" value="{{ $details->cf1_sn }}" class="custom-input w-full">
                        </div>

                        {{-- Model --}}
                        <div>
                            <label for="cf1_model" class="block font-medium mb-1">Model</label>
                            <select name="cf1_model" id="cf1_model" class="custom-input w-full">
                                <option value="">Choose One</option>
                                @foreach(['7200VFD'=>'DE-7200 VFD','1000FHD'=>'DE-1000 FHD','1000VFD'=>'DE-1000 VFD','1000GBD'=>'DE-1000 GBD','1000FRDRYER'=>'DE-1000 fr DRYER','HNH'=>'CENTRIFUGE H&H','CSI'=>'CENTRIFUGE CSI'] as $key => $label)
                                    <option value="{{ $key }}" {{ $details->cf1_model == $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Mode of Operation --}}
                        <div>
                            <label for="cf1_modeofopr" class="block font-medium mb-1">Mode of Operation</label>
                            <select name="cf1_modeofopr" id="cf1_modeofopr" class="custom-input w-full">
                                <option value="">Choose One</option>
                                @foreach(['FRDREYR' => 'FR DRYER', 'SLDREMOVAL' => 'SOLID REMOVAL', 'BARITE' => 'BARITE RECOVERY'] as $key => $label)
                                    <option value="{{ $key }}" {{ $details->cf1_modeofopr == $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Weir Plate Setting --}}
                        <div>
                            <label for="cf1_weirplate" class="block font-medium mb-1">Weir Plate Setting (mm)</label>
                            <input type="text" name="cf1_weirplate" id="cf1_weirplate" value="{{ $details->cf1_weirplate }}" class="custom-input w-full">
                        </div>

                        {{-- Bowl Speed --}}
                        <div>
                            <label for="cf1_bowlspeed" class="block font-medium mb-1">Bowl Speed (rpm)</label>
                            <input type="text" name="cf1_bowlspeed" id="cf1_bowlspeed" value="{{ $details->cf1_bowlspeed }}" class="custom-input w-full">
                        </div>

                        {{-- Bowl Conveyor Differential Speed --}}
                        <div>
                            <label for="cf1_bowlconv" class="block font-medium mb-1">Bowl Conveyor Differential Speed (rpm)</label>
                            <input type="text" name="cf1_bowlconv" id="cf1_bowlconv" value="{{ $details->cf1_bowlconv }}" class="custom-input w-full">
                        </div>

                        {{-- Feed-in Suction From --}}
                        <div>
                            <label for="cf1_feedsuc" class="block font-medium mb-1">Feed-in Suction From</label>
                            <select name="cf1_feedsuc" id="cf1_feedsuc" class="custom-input w-full">
                                <option value="">Choose One</option>
                                @foreach(['INTERMEDIATETANK','SANDTRAPTANK','ACTIVETANK','HOLDINGTANK','CUTTINGSKIPS','OVERBOARD'] as $item)
                                    <option value="{{ $item }}" {{ $details->cf1_feedsuc == $item ? 'selected' : '' }}>{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Effluent Return To --}}
                        <div>
                            <label for="cf1_effluentreturn" class="block font-medium mb-1">Effluent Return To</label>
                            <select name="cf1_effluentreturn" id="cf1_effluentreturn" class="custom-input w-full">
                                <option value="">Choose One</option>
                                @foreach(['INTERMEDIATETANK','SANDTRAPTANK','ACTIVETANK','HOLDINGTANK','CUTTINGSKIPS','OVERBOARD'] as $item)
                                    <option value="{{ $item }}" {{ $details->cf1_effluentreturn == $item ? 'selected' : '' }}>{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Underflow Discharge To --}}
                        <div>
                            <label for="cf1_underflow" class="block font-medium mb-1">Underflow Discharge To</label>
                            <select name="cf1_underflow" id="cf1_underflow" class="custom-input w-full">
                                <option value="">Choose One</option>
                                @foreach(['INTERMEDIATETANK','SANDTRAPTANK','ACTIVETANK','HOLDINGTANK','CUTTINGSKIPS','OVERBOARD','JUMBOBAG'] as $item)
                                    <option value="{{ $item }}" {{ $details->cf1_underflow == $item ? 'selected' : '' }}>{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Running Hour --}}
                        <div>
                            <label for="cf1_runninghour" class="block font-medium mb-1">Running Hour</label>
                            <input type="text" name="cf1_runninghour" id="cf1_runninghour" value="{{ $details->cf1_runninghour }}" class="custom-input w-full">
                        </div>

                        {{-- Feed-in Rate --}}
                        <div>
                            <label for="cf1_feedinrate" class="block font-medium mb-1">Feed-in Rate (Gpm)</label>
                            <input type="text" name="cf1_feedinrate" id="cf1_feedinrate" value="{{ $details->cf1_feedinrate }}" class="custom-input w-full">
                        </div>

                        {{-- Feed-in Density --}}
                        <div>
                            <label for="cf1_feedindensity" class="block font-medium mb-1">Feed-in Density ({{ $details->mwunit }})</label>
                            <input type="text" name="cf1_feedindensity" id="cf1_feedindensity" value="{{ $details->cf1_feedindensity }}" class="custom-input w-full">
                        </div>

                        {{-- Centrate Density --}}
                        <div>
                            <label for="cf1_centratedens" class="block font-medium mb-1">Centrate Density ({{ $details->mwunit }})</label>
                            <input type="text" name="cf1_centratedens" id="cf1_centratedens" value="{{ $details->cf1_centratedens }}" class="custom-input w-full">
                        </div>

                        {{-- Cake Discard Density --}}
                        <div>
                            <label for="cf1_cakediscdens" class="block font-medium mb-1">Cake Discard Density ({{ $details->mwunit }})</label>
                            <input type="text" name="cf1_cakediscdens" id="cf1_cakediscdens" value="{{ $details->cf1_cakediscdens }}" class="custom-input w-full">
                        </div>

                        {{-- Auto Fields (Read-only) --}}
                        <div>
                            <label for="cf1_centratereturn" class="block font-medium mb-1">Centrate Return Rate (Gpm)</label>
                            <input type="text" name="cf1_centratereturn" id="cf1_centratereturn" value="{{ $details->cf1_centratereturn }}" class="custom-input w-full bg-gray-200" readonly>
                        </div>

                        <div>
                            <label for="cf1_cakediscflow" class="block font-medium mb-1">Cake Discard Flow Rate (Gpm)</label>
                            <input type="text" name="cf1_cakediscflow" id="cf1_cakediscflow" value="{{ $details->cf1_cakediscflow }}" class="custom-input w-full bg-gray-200" readonly>
                        </div>

                        <div>
                            <label for="cf1_masscake" class="block font-medium mb-1">Mass Wet Discharge / Day ({{ $details->volholeunit == 'bbls' ? 'M/Ton' : 'Lbs' }})</label>
                            <input type="text" name="cf1_masscake" id="cf1_masscake" value="{{ $details->cf1_masscake }}" class="custom-input w-full bg-gray-200" readonly>
                        </div>

                        <div>
                            <label for="cf1_volcake" class="block font-medium mb-1">Volume Cake Discharge ({{ $details->volholeunit }})</label>
                            <input type="text" name="cf1_volcake" id="cf1_volcake" value="{{ $details->cf1_volcake }}" class="custom-input w-full bg-gray-200" readonly>
                        </div>
                    </div>

                    <div class="mt-6 text-center">
                    <button type="button" id="saveCentrifuge1" onclick="submitCentrifuge1()" class="custom-btn-submit">
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
    function submitCentrifuge1() {
        const form = document.getElementById('formCentrifuge1');
        const button = document.getElementById('saveCentrifuge1');

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
                handleRedirectPromptCentrifuge();
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

    function handleRedirectPromptCentrifuge() {
        let countdown = 5;
        const redirectUrl = "{{ url("projects/details/$project_id/{$wellinfo->id_wellinfo}/centrifuge-2") }}";

        const timerInterval = setInterval(() => {
            if (countdown <= 0) {
                clearInterval(timerInterval);
                window.location.href = redirectUrl;
            }
            countdown--;
        }, 1000);

        Swal.fire({
            title: 'Data Saved!',
            html: `You will be redirected to <b>Centrifuge 2</b> in <b><span id="countdown">5</span></b> seconds.<br><br>
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
                    if (countdown <= 0) {
                        clearInterval(countdownInterval);
                    }
                }, 1000);
            }
        }).then((result) => {
            clearInterval(timerInterval);
            if (result.isConfirmed) {
                window.location.href = redirectUrl;
            } else {
                location.reload(); // tetap di halaman
            }
        });
    }
</script>


<script>
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        return !(charCode > 31 && (charCode < 48 || charCode > 57)) || charCode === 46;
    }

    function Perubahan1() {
        let feedInRate = parseFloat(document.getElementById("cf1_feedinrate").value) || 0;
        let feedDensity = parseFloat(document.getElementById("cf1_feedindensity").value) || 0;
        let centrateDensity = parseFloat(document.getElementById("cf1_centratedens").value) || 0;
        let cakeDensity = parseFloat(document.getElementById("cf1_cakediscdens").value) || 0;
        let runningHour = parseFloat(document.getElementById("cf1_runninghour").value) || 0;
        let volUnit = "{{ $details->volholeunit }}";

        let cakeFlow = 0;
        if (cakeDensity !== centrateDensity) {
            cakeFlow = feedInRate * (feedDensity - centrateDensity) / (cakeDensity - centrateDensity);
        }

        let centrateReturn = feedInRate - cakeFlow;
        let volCake = runningHour * (cakeFlow * 60 / 42); // in bbl
        let massCake;

        if (volUnit === 'bbls') {
            massCake = (((cakeFlow * 42) * cakeDensity) * 0.45359237 / 1000) * runningHour;
        } else {
            massCake = (((cakeFlow * 42) * cakeDensity)) * runningHour; // in lbs
            volCake = volCake / 6.2898; // convert to m3
        }

        document.getElementById("cf1_cakediscflow").value = cakeFlow.toFixed(2);
        document.getElementById("cf1_centratereturn").value = centrateReturn.toFixed(2);
        document.getElementById("cf1_volcake").value = volCake.toFixed(2);
        document.getElementById("cf1_masscake").value = massCake.toFixed(2);
    }

    // Auto trigger on input
    document.querySelectorAll('#cf1_feedinrate, #cf1_feedindensity, #cf1_centratedens, #cf1_cakediscdens, #cf1_runninghour')
        .forEach(el => el.addEventListener('input', Perubahan1));
</script>
@endsection
