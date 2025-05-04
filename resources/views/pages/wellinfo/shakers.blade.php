@extends('layouts.app')

@section('title', 'Equipments - Shakers | FOTrack')

@section('content')
<div class="xCPtuxM4_gihvpPwv9bX t6gkcSf0Bt4MLItXvDJ_ Nu4HUn5EQpnNJ1itNkrd iHPddplqYvrN6qWgvntn AqVNvLG_H6VHhym2yKMp">
    <div class="NM7Z1HBVjN_86WhEcXan mveJTCIb2WII7J4sY22F pXhVRBC8yaUNllmIWxln qUWbS_LTZujDB4XCd11V _Ybd3WwuTVljUT4vEaM3 IvHclGgvMLtYg_ow0uba fzhbbDQ686T8arwvi_bJ _fGhMnSfYmaGrv7DvZ00 _1jTZ8KXRZul60S6czNi">
        <div class="container mx-auto px-4 sm:px-8">
            <div class="py-8">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-semibold leading-tight">Shakers Data</h2>
                </div>

                <form id="formShaker"
                    method="POST"
                    action="{{ route('wellinfo.updateShakers', [$project_id, $wellinfo->id_wellinfo]) }}">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="id_wellinfo" value="{{ $details->id_wellinfo }}">
                    <input type="hidden" name="id_details" value="{{ $details->id_details }}">

                    <div class="space-y-4">
                        @for($i = 1; $i <= 6; $i++)
                        <div class="grid grid-cols-4 gap-4 items-center text-center">
                            <input type="text" name="sh{{ $i }}_name" value="Shaker #{{ $i }}" class="custom-input" readonly>
                            <input type="text" name="sh{{ $i }}_model" value="{{ $details->{'sh'.$i.'_model'} }}" class="custom-input" placeholder="Model Shaker #{{ $i }}">
                            <input type="text" name="sh{{ $i }}_screensize" value="{{ $details->{'sh'.$i.'_screensize'} }}" class="custom-input" placeholder="Screen Size">
                            <input type="text" name="sh{{ $i }}_runninghour" value="{{ $details->{'sh'.$i.'_runninghour'} }}" class="custom-input" placeholder="Running Hour">
                        </div>
                        @endfor
                    </div>

                    <div class="mt-4">
                        <label for="screens_changed" class="block font-medium mb-1">Screens Changed</label>
                        <input type="text" name="screens_changed" id="screens_changed"
                            value="{{ $details->screens_changed }}"
                            placeholder="Insert info about screen changes"
                            class="custom-input w-full">
                    </div>

                    <div class="mt-6 text-center">
                        <button type="button" id="saveShaker" onclick="submitShaker()" class="custom-btn-submit">
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
    function submitShaker() {
        const form = document.getElementById('formShaker');
        const button = document.getElementById('saveShaker');

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
                handleRedirectPrompt();
            } else {
                alert(data.error || 'Failed to save data.');
            }
        })
        .catch(err => {
            console.error(err);
            alert('An unexpected error occurred.');
        })
        .finally(() => {
            button.innerHTML = '<i class="fa-regular fa-floppy-disk"></i> Save Data';
            button.disabled = false;
        });
    }

    function handleRedirectPrompt() {
        let countdown = 5;
        const redirectUrl = "{{ url("projects/details/$project_id/{$wellinfo->id_wellinfo}/centrifuge-1") }}";

        const interval = setInterval(() => {
            if (countdown === 0) {
                clearInterval(interval);
                window.location.href = redirectUrl;
            }
            countdown--;
        }, 1000);

        const proceed = confirm(
            "Data has been successfully saved.\n\nYou will be redirected to Centrifuge 1 in 5 seconds.\n\nClick OK to continue now, or Cancel to stay on this page."
        );

        if (proceed) {
            clearInterval(interval);
            window.location.href = redirectUrl;
        } else {
            clearInterval(interval);
            location.reload(); // ✅ Force form refresh with updated data
        }
    }

</script>
@endsection
