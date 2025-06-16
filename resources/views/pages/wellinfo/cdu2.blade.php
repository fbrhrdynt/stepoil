@extends('layouts.app')

@section('title', 'Equipments - Cutting Dryer 2 | FOTrack')

@section('content')
<div class="xCPtuxM4_gihvpPwv9bX t6gkcSf0Bt4MLItXvDJ_ Nu4HUn5EQpnNJ1itNkrd iHPddplqYvrN6qWgvntn AqVNvLG_H6VHhym2yKMp">
    <div class="NM7Z1HBVjN_86WhEcXan mveJTCIb2WII7J4sY22F pXhVRBC8yaUNllmIWxln qUWbS_LTZujDB4XCd11V _Ybd3WwuTVljUT4vEaM3 IvHclGgvMLtYg_ow0uba fzhbbDQ686T8arwvi_bJ _fGhMnSfYmaGrv7DvZ00 _1jTZ8KXRZul60S6czNi">
        <div class="container mx-auto px-4 sm:px-8">
            <div class="py-8">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-semibold leading-tight"><u>Cutting Dryer 2 Details</u></h2>
                </div>

                <form id="formCDU2" method="POST" action="{{ route('wellinfo.updateCDU2', [$project_id, $wellinfo->id_wellinfo]) }}">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="id_wellinfo" value="{{ $details->id_wellinfo }}">
                    <input type="hidden" name="id_details" value="{{ $details->id_details }}">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label>Serial Number</label>
                            <input type="text" name="cdu2_sn" value="{{ $details->cdu2_sn }}" class="custom-input">
                        </div>

                        <div>
                            <label>Model</label>
                            <select name="cdu2_model" class="custom-input">
                                @foreach(['CSI', 'WSM01', 'WSM02', 'WSM03', 'WSM04'] as $model)
                                    <option value="{{ $model }}" {{ $details->cdu2_model == $model ? 'selected' : '' }}>{{ $model }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label>Screen Size (inch)</label>
                            <input type="number" step="0.01" name="cdu2_screensize" value="{{ $details->cdu2_screensize }}" class="custom-input">
                        </div>

                        <div>
                            <label>Running Hour (hrs)</label>
                            <input type="number" step="0.01" name="cdu2_runninghour" value="{{ $details->cdu2_runninghour }}" class="custom-input">
                        </div>

                        <div>
                            <label>Centrate Mud Weight ({{ $details->mwunit }})</label>
                            <input type="number" step="0.01" name="cdu2_centrateppg" value="{{ $details->cdu2_centrateppg }}" class="custom-input">
                        </div>

                        <div>
                            <label>Scroll / Screen RPM</label>
                            <input type="number" step="0.01" name="cdu2_scroll" value="{{ $details->cdu2_scroll }}" class="custom-input">
                        </div>

                        <div>
                            <label>Sample Depth ({{ $details->depth_each }})</label>
                            <input type="number" step="0.01" name="cdu2_sampledepth" value="{{ $details->cdu2_sampledepth }}" class="custom-input">
                        </div>
                    </div>

                    <div class="mt-6 text-center">
                        <button type="button" id="saveCDU2" onclick="submitCDU2()" class="custom-btn-submit">
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
    function submitCDU2() {
        const form = document.getElementById('formCDU2');
        const button = document.getElementById('saveCDU2');

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
                handleRedirectPromptCDU2();
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Failed',
                    text: data.error || 'Failed to save data.'
                });
            }
        })
        .catch(err => {
            console.error(err);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'An unexpected error occurred.'
            });
        })
        .finally(() => {
            button.innerHTML = '<i class="fa-regular fa-floppy-disk"></i> Save Data';
            button.disabled = false;
        });
    }

    function handleRedirectPromptCDU2() {
        let countdown = 5;
        const redirectUrl = "{{ url("projects/details/$project_id/{$wellinfo->id_wellinfo}/desanders") }}";

        const interval = setInterval(() => {
            if (countdown <= 0) {
                clearInterval(interval);
                window.location.href = redirectUrl;
            }
            countdown--;
        }, 1000);

        Swal.fire({
            title: 'Success!',
            html: `You will be redirected to <b>Desanders</b> in <b><span id="cd-countdown">5</span></b> seconds.<br><br>
                Click <b>Go Now</b> to proceed immediately, or <b>Stay</b> to remain on this page.`,
            icon: 'success',
            showCancelButton: true,
            confirmButtonText: 'Go Now',
            cancelButtonText: 'Stay Here',
            didOpen: () => {
                const content = Swal.getHtmlContainer();
                const $cdCountdown = content.querySelector('#cd-countdown');
                const intervalCountdown = setInterval(() => {
                    $cdCountdown.textContent = countdown;
                    if (countdown <= 0) clearInterval(intervalCountdown);
                }, 1000);
            }
        }).then((result) => {
            clearInterval(interval);
            if (result.isConfirmed) {
                window.location.href = redirectUrl;
            } else {
                location.reload(); // Refresh to reflect saved data
            }
        });
    }
</script>

@endsection
