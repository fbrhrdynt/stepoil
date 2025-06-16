@extends('layouts.app')

@section('title', 'Active Mud Properties | FOTrack')

@section('content')
<div class="xCPtuxM4_gihvpPwv9bX t6gkcSf0Bt4MLItXvDJ_ Nu4HUn5EQpnNJ1itNkrd iHPddplqYvrN6qWgvntn AqVNvLG_H6VHhym2yKMp">
    <div class="NM7Z1HBVjN_86WhEcXan mveJTCIb2WII7J4sY22F pXhVRBC8yaUNllmIWxln qUWbS_LTZujDB4XCd11V _Ybd3WwuTVljUT4vEaM3 IvHclGgvMLtYg_ow0uba fzhbbDQ686T8arwvi_bJ _fGhMnSfYmaGrv7DvZ00 _1jTZ8KXRZul60S6czNi">
        <div class="container mx-auto px-4 sm:px-8">
            <div class="py-8">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-semibold leading-tight">Edit Well Info Detail</h2>
                </div>

                <div class="container">
                    <div id="successActiveMudProperties" class="text-center mb-4" style="display: none;">
                        <i class="fa-solid fa-check-circle fa-2xl" style="font-size: 48px; color: #19ff40;"></i><br><br>
                        <h5 class="text-black">Thank you! Data saved</h5>
                        <h6>Please wait...</h6>
                    </div>

                    <form id="formActiveMudProperties"
                        method="POST"
                        action="{{ route('wellinfo.updateamp', [$project_id, $wellinfo->id_wellinfo]) }}">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="id_wellinfo" value="{{ $details->id_wellinfo }}">
                        <input type="hidden" name="id_details" value="{{ $details->id_details }}">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label>PV</label>
                                <div class="flex">
                                    <input type="text" step="0.01" name="pv" value="{{ $details->pv }}" class="custom-input" required>
                                    <span class="input-group-text ml-2">cps</span>
                                </div>
                            </div>

                            <div>
                                <label>YP</label>
                                <div class="flex">
                                    <input type="text" step="0.01" name="yp" value="{{ $details->yp }}" class="custom-input" required>
                                    <span class="input-group-text ml-2">lbs/100 ft²</span>
                                </div>
                            </div>

                            <div>
                                <label>Sand Content</label>
                                <input type="text" step="0.01" name="sandcontent" value="{{ $details->sandcontent }}" class="custom-input" required>
                            </div>

                            <div>
                                <label>Base Fluid (whole mud)</label>
                                <div class="flex">
                                    <input type="text" step="0.01" name="basefluid" value="{{ $details->basefluid }}" class="custom-input" required>
                                    <span class="input-group-text ml-2">%</span>
                                </div>
                            </div>

                            <div>
                                <label>SG Drill Solid / Cutting</label>
                                <div class="flex">
                                    <input type="text" step="0.01" name="sgdrillsolid" value="{{ $details->sgdrillsolid }}" class="custom-input" required>
                                    <span class="input-group-text ml-2">sp.gr</span>
                                </div>
                            </div>

                            <div>
                                <label>Chlorides</label>
                                <div class="flex">
                                    <input type="text" step="0.01" name="chlorides" value="{{ $details->chlorides }}" class="custom-input" required>
                                    <span class="input-group-text ml-2">mg/L</span>
                                </div>
                            </div>

                            <div>
                                <label>Mud Temperature</label>
                                <div class="flex gap-2">
                                    <input type="text" step="0.01" name="mudtemp" value="{{ $details->mudtemp }}" class="custom-input w-full" required>
                                    <select name="tempunit" class="custom-input w-[80px]">
                                        <option value="degc" {{ $details->tempunit == 'degc' ? 'selected' : '' }}>°C</option>
                                        <option value="degf" {{ $details->tempunit == 'degf' ? 'selected' : '' }}>°F</option>
                                    </select>
                                </div>
                            </div>

                            @if(!in_array($details->mudcheck_type, ['WB-SW', 'WB-WB', 'WB-WBH']))
                            <div>
                                <label>Oil / Water Ratio</label>
                                <input type="text" name="categories1" value="{{ $details->categories1 }}" class="custom-input" required>
                            </div>
                            @endif

                            <div>
                                <label>
                                    @if(in_array($details->mudcheck_type, ['WB-SW', 'WB-WB', 'WB-WBH']))
                                        M B T (kg/m³)
                                    @else
                                        E-Stability (Volt)
                                    @endif
                                </label>
                                <div class="flex">
                                    <input type="text" step="0.01" name="categories2" value="{{ $details->categories2 }}" class="custom-input" required>
                                    <span class="input-group-text ml-2">
                                        @if(in_array($details->mudcheck_type, ['WB-SW', 'WB-WB', 'WB-WBH']))
                                            lb/bbl
                                        @else
                                            Volt
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 text-center">
                            <button type="button" id="saveMudProp" class="custom-btn-submit" onclick="submitActiveMudProperties()">
                                <i class="fa-solid fa-save"></i> &nbsp; Save Data
                            </button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
</div></div>
@endsection

@section('scripts')
<script>
    function submitActiveMudProperties() {
        console.log("Submit function triggered");

        const form = document.getElementById('formActiveMudProperties');
        const button = document.getElementById('saveMudProp');

        button.disabled = true;
        button.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Saving...';

        fetch(form.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
            },
            body: new FormData(form)
        })
        .then(async response => {
            const data = await response.json();

            if (!response.ok) {
                if (response.status === 422 && data.errors) {
                    const firstError = Object.values(data.errors)[0][0];
                    throw new Error(firstError);
                }
                throw new Error(data.message || 'Failed to save data.');
            }

            Swal.fire({
                icon: 'success',
                title: 'Saved!',
                text: 'Active Mud Properties updated successfully.',
                confirmButtonText: 'OK'
            }).then(() => {
                location.reload();
            });
        })
        .catch(error => {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: error.message || 'Something went wrong while saving data.',
            });
        })
        .finally(() => {
            button.disabled = false;
            button.innerHTML = '<i class="fa-solid fa-save"></i> &nbsp; Save Data';
        });
    }
</script>
@endsection


