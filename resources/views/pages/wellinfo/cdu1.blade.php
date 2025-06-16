@extends('layouts.app')

@section('title', 'Equipments - Cutting Dryer 1 | FOTrack')

@section('content')
<div class="xCPtuxM4_gihvpPwv9bX t6gkcSf0Bt4MLItXvDJ_ Nu4HUn5EQpnNJ1itNkrd iHPddplqYvrN6qWgvntn AqVNvLG_H6VHhym2yKMp">
    <div class="NM7Z1HBVjN_86WhEcXan mveJTCIb2WII7J4sY22F pXhVRBC8yaUNllmIWxln qUWbS_LTZujDB4XCd11V _Ybd3WwuTVljUT4vEaM3 IvHclGgvMLtYg_ow0uba fzhbbDQ686T8arwvi_bJ _fGhMnSfYmaGrv7DvZ00 _1jTZ8KXRZul60S6czNi">
        <div class="container mx-auto px-4 sm:px-8">
            <div class="py-8">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-semibold leading-tight"><u>Cutting Dryer 1 Details</u></h2>
                </div>

                <form id="formCDU1" method="POST" action="{{ route('wellinfo.updateCDU1', [$project_id, $wellinfo->id_wellinfo]) }}">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="id_wellinfo" value="{{ $details->id_wellinfo }}">
                    <input type="hidden" name="id_details" value="{{ $details->id_details }}">
                    <input type="hidden" id="depth_each" value="{{ $details->depth_each }}">
                    <input type="hidden" id="mwunit" value="{{ $details->mwunit }}">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                        <div>
                            <label>Serial Number</label>
                            <input type="text" name="cdu1_sn" value="{{ $details->cdu1_sn }}" class="custom-input">
                        </div>

                        <div>
                            <label>Model</label>
                            <select name="cdu1_model" class="custom-input">
                                @foreach(['CSI', 'WSM01', 'WSM02', 'WSM03', 'WSM04'] as $model)
                                    <option value="{{ $model }}" {{ $details->cdu1_model === $model ? 'selected' : '' }}>{{ $model }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label>Screen Size (inch)</label>
                            <input type="number" step="0.01" name="cdu1_screensize" value="{{ $details->cdu1_screensize }}" class="custom-input">
                        </div>

                        <div>
                            <label>Running Hour (hrs)</label>
                            <input type="number" step="0.01" name="cdu1_runninghour" value="{{ $details->cdu1_runninghour }}" class="custom-input">
                        </div>

                        <div>
                            <label>Centrate Mud Weight ({{ $details->mwunit }})</label>
                            <input type="number" step="0.01" name="cdu1_centrateppg" value="{{ $details->cdu1_centrateppg }}" class="custom-input">
                        </div>

                        <div>
                            <label>Scroll / Screen RPM</label>
                            <input type="number" step="0.01" name="cdu1_scroll" value="{{ $details->cdu1_scroll }}" class="custom-input">
                        </div>

                        <div>
                            <label>Sample Depth ({{ $details->depth_each }})</label>
                            <input type="number" step="0.01" name="cdu1_sampledepth" value="{{ $details->cdu1_sampledepth }}" class="custom-input">
                        </div>
                    </div>

                    <div class="mt-6 text-center">
                        <button type="button" id="saveCDU1" onclick="submitCDU1()" class="custom-btn-submit">
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
    function submitCDU1() {
        const form = document.getElementById('formCDU1');
        const button = document.getElementById('saveCDU1');

        button.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Saving...';
        button.disabled = true;

        fetch(form.action, {
            method: 'POST', // Jika pakai @method('PUT'), FormData tetap valid
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
            },
            body: new FormData(form)
        })
        .then(async res => {
            const data = await res.json();
            if (!res.ok) throw new Error(data.message || 'Failed to save.');
            if (data.success) {
                handleRedirectToCDU2();
            } else {
                throw new Error(data.error || 'Saving failed.');
            }
        })
        .catch(error => {
            console.error('Fetch Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: error.message || 'An unexpected error occurred.',
            });
        })
        .finally(() => {
            button.innerHTML = '<i class="fa-regular fa-floppy-disk"></i> Save Data';
            button.disabled = false;
        });
    }

    function handleRedirectToCDU2() {
        let seconds = 5;
        const redirectUrl = "{{ url("projects/details/$project_id/{$wellinfo->id_wellinfo}/cdu-2") }}";

        const timer = setInterval(() => {
            if (seconds <= 0) {
                clearInterval(timer);
                window.location.href = redirectUrl;
            }
            seconds--;
        }, 1000);

        Swal.fire({
            title: 'Data Saved!',
            html: `You will be redirected to <b>Cutting Dryer 2</b> in <b><span id="countdown">5</span></b> seconds.<br><br>
                Click <b>Go Now</b> to redirect immediately, or <b>Stay</b> to remain on this page.`,
            icon: 'success',
            showCancelButton: true,
            confirmButtonText: 'Go Now',
            cancelButtonText: 'Stay Here',
            didOpen: () => {
                const content = Swal.getHtmlContainer();
                const $countdown = content.querySelector('#countdown');
                const countdownInterval = setInterval(() => {
                    $countdown.textContent = seconds;
                    if (seconds <= 0) clearInterval(countdownInterval);
                }, 1000);
            }
        }).then((result) => {
            clearInterval(timer);
            if (result.isConfirmed) {
                window.location.href = redirectUrl;
            } else {
                location.reload();
            }
        });
    }
</script>


@endsection