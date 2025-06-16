@extends('layouts.app')

@section('title', 'Edit Well Info Detail | FOTrack')

@section('content')
<div class="xCPtuxM4_gihvpPwv9bX t6gkcSf0Bt4MLItXvDJ_ Nu4HUn5EQpnNJ1itNkrd iHPddplqYvrN6qWgvntn AqVNvLG_H6VHhym2yKMp">
    <div class="NM7Z1HBVjN_86WhEcXan mveJTCIb2WII7J4sY22F pXhVRBC8yaUNllmIWxln qUWbS_LTZujDB4XCd11V _Ybd3WwuTVljUT4vEaM3 IvHclGgvMLtYg_ow0uba fzhbbDQ686T8arwvi_bJ _fGhMnSfYmaGrv7DvZ00 _1jTZ8KXRZul60S6czNi">
        <div class="container mx-auto px-4 sm:px-8">
            <div class="py-8">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-semibold leading-tight">Edit Well Info Detail</h2>
                </div>

                    <div id="successMessage" class="hidden mb-4 px-4 py-3 rounded bg-green-100 border border-green-400 text-green-700 relative">
                        <strong>Success!</strong> Data saved successfully.
                        <button class="absolute top-1 right-2 text-xl leading-none" onclick="document.getElementById('successMessage').classList.add('hidden')">&times;</button>
                    </div>


                    <form id="formWellInfo" method="POST" action="{{ route('wellinfo.updatewell', [$project_id, $details->id_wellinfo]) }}">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="id_details" value="{{ $details->id_details }}">
                        <input type="hidden" name="id_wellinfo" value="{{ $details->id_wellinfo }}">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <div>
                                <label for="mudcheck_type" class="block font-medium mb-1">Mud Check Type</label>
                                <select name="mudcheck_type" id="mudcheck_type" class="custom-input" required>
                                    <option value="">None</option>
                                    @foreach (['WB-SW' => 'Sea Water', 'WB-WB' => 'Water Base', 'WB-WBH' => 'Water Base HPWBM', 'OBM-LT' => 'LT-Oil Base', 'OBM-SB' => 'Synthetic Base', 'OBM-EN' => 'Enviromul'] as $val => $label)
                                        <option value="{{ $val }}" {{ $details->mudcheck_type == $val ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="depth_each" class="block font-medium mb-1">Depth Unit</label>
                                <select name="depth_each" id="depth_each" class="custom-input" onchange="OnChange(this.value)">
                                    <option value="">Choose One</option>
                                    <option value="feet" {{ $details->depth_each == 'feet' ? 'selected' : '' }}>Feet</option>
                                    <option value="metre" {{ $details->depth_each == 'metre' ? 'selected' : '' }}>Metre</option>
                                </select>
                            </div>

                            <div>
                                <label for="depth1bef" class="block font-medium mb-1">Depth 1 Day Before</label>
                                <input type="text" name="depth1bef" id="depth1bef" class="custom-input" value="{{ $details->depth1bef }}" onkeyup="OnChange(this.value)" required>
                            </div>

                            <div>
                                <label for="bitsize" class="block font-medium mb-1">Bit Size (inch)</label>
                                <input type="text" name="bitsize" id="bitsize" class="custom-input" value="{{ $details->bitsize }}" onkeyup="OnChange(this.value)" required>
                            </div>

                            <div>
                                <label for="bittype" class="block font-medium mb-1">Bit Type</label>
                                <input type="text" name="bittype" id="bittype" class="custom-input" value="{{ $details->bittype }}" required>
                            </div>

                            <div>
                                <label for="washout" class="block font-medium mb-1">Washout (%)</label>
                                <input type="text" name="washout" id="washout" class="custom-input" value="{{ $details->washout }}" required>
                            </div>

                            <div>
                                <label for="mudweight" class="block font-medium mb-1">Mud Weight</label>
                                <div class="relative flex rounded-md shadow-sm">
                                    <input type="text" name="mudweight" id="mudweight"
                                        class="custom-input rounded-r-none"
                                        value="{{ $details->mudweight }}" onchange="funcMW(this.value)" required>
                                    <span class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-100 text-gray-700 text-sm">
                                        <input type="text" name="mwunit" id="mwunit" class="custom-input text-sm text-right" value="{{ $details->mwunit }}" readonly>
                                    </span>
                                </div>
                            </div>

                            <div>
                                <label for="curdepth" class="block font-medium mb-1">Current Depth</label>
                                <input type="text" name="curdepth" id="curdepth" class="custom-input" value="{{ $details->curdepth }}" onkeyup="OnChange(this.value)" required>
                            </div>

                            <div>
                                <label for="volholedrill" class="block font-medium mb-1">Vol. Hole Drilled</label>
                                <div class="relative flex rounded-md shadow-sm">
                                    <input type="text" name="volholedrill" id="volholedrill"
                                        class="custom-input rounded-r-none "
                                        value="{{ $details->volholedrill }}" readonly required>
                                    <select name="volholeunit" id="each_volholedrill"
                                            class="custom-input rounded-l-none w-[90px] text-sm text-gray-700"
                                            onchange="OnChange(this.value)">
                                        <option value="bbls" {{ $details->volholeunit == 'bbls' ? 'selected' : '' }}>bbls</option>
                                        <option value="m3" {{ $details->volholeunit == 'm3' ? 'selected' : '' }}>m3</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label for="avgrop" class="block font-medium mb-1">Avg. ROP for Drilling Hours</label>
                                <input type="text" name="avgrop" id="avgrop" class="custom-input" value="{{ $details->avgrop }}" required>
                            </div>

                            <div>
                                <label for="lgsactive" class="block font-medium mb-1">LGS % Active System</label>
                                <input type="text" name="lgsactive" id="lgsactive" class="custom-input" value="{{ $details->lgsactive }}" required>
                            </div>

                            <div>
                                <label for="datenow" class="block font-medium mb-1">Date</label>
                                <input type="date" name="datenow" id="datenow" class="custom-input" value="{{ $details->datenow }}" required>
                            </div>

                            <div>
                                <label for="cirrategpm" class="block font-medium mb-1">Circulating Rate (gpm)</label>
                                <input type="text" name="cirrategpm" id="cirrategpm" class="custom-input" value="{{ $details->cirrategpm }}" required>
                            </div>

                            <div>
                                <label for="hgsactive" class="block font-medium mb-1">HGS % Active System</label>
                                <input type="text" name="hgsactive" id="hgsactive" class="custom-input" value="{{ $details->hgsactive }}" required>
                            </div>

                            <div>
                                <label for="sgbasefluid" class="block font-medium mb-1">SG Base Fluid (sp.gr)</label>
                                <input type="text" name="sgbasefluid" id="sgbasefluid" class="custom-input" value="{{ $details->sgbasefluid }}" required>
                            </div>

                            <div>
                                <label for="fluidtype" class="block font-medium mb-1">Fluid Type</label>
                                <select name="fluidtype" id="fluidtype" class="custom-input" required>
                                    <option value="">None</option>
                                    @foreach (['WB-SW' => 'Sea Water', 'WB-WB' => 'Water Base', 'WB-WBH' => 'Water Base HPWBM', 'OBM-LT' => 'LT-Oil Base', 'OBM-SB' => 'Synthetic Base', 'OBM-EN' => 'Enviromul'] as $val => $label)
                                        <option value="{{ $val }}" {{ $details->fluidtype == $val ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="rigpresentact" class="block font-medium mb-1">Rig Present Activity</label>
                                <input type="text" name="rigpresentact" id="rigpresentact" class="custom-input" value="{{ $details->rigpresentact }}" required>
                            </div>

                            <div>
                                <label for="activesysvol" class="block font-medium mb-1">Active System Vol. (bbls)</label>
                                <input type="text" name="activesysvol" id="activesysvol" class="custom-input" value="{{ $details->activesysvol }}" required>
                            </div>
                        </div>

                        <div class="mt-6">
                            <button type="button" id="saveWellInfo" onclick="submitWellInfo()" class="custom-btn-submit">
                                <i class="fa-solid fa-save"></i> &nbsp; Save Data
                            </button>
                            <a href="{{ route('projects.details', ['project_id' => $project_id]) }}" class="custom-btn-cancel ml-3">
                                Cancel
                            </a>
                        </div>
                    </form>


      

            </div>
        </div>
    </div>
</div></div>
@endsection

@section('scripts')
<script>
    function funcMW(val) {
        const mw = parseFloat(document.getElementById("mudweight").value);
        document.getElementById("mwunit").value = (mw >= 8.33) ? "ppg" : "sp.gr";
    }

    function OnChange(value) {
        let bitsize = parseFloat(document.getElementById("bitsize").value) || 0;
        let curdepth = parseFloat(document.getElementById("curdepth").value) || 0;
        let depth1bef = parseFloat(document.getElementById("depth1bef").value) || 0;

        let bbl = ((bitsize ** 2) / 1029) * (curdepth - depth1bef) * 1.1;
        let m3 = bbl / 6.2898;

        const unit = value || document.getElementById('depth_each').value;

        if (unit === 'feet' || value === 'bbls') {
            document.getElementById('volholedrill').value = bbl.toFixed(2);
            document.getElementById('each_volholedrill').value = 'bbls';
        } else if (unit === 'metre' || value === 'm3') {
            document.getElementById('volholedrill').value = m3.toFixed(2);
            document.getElementById('each_volholedrill').value = 'm3';
        }
    }

    function submitWellInfo() {
        const form = document.getElementById('formWellInfo');
        const button = document.getElementById('saveWellInfo');

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
                title: 'Success',
                text: data.message || 'Well info saved successfully!',
                confirmButtonText: 'OK'
            }).then(() => {
                location.reload();
            });
        })
        .catch(error => {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: error.message || 'Something went wrong while saving!',
            });
        })
        .finally(() => {
            button.disabled = false;
            button.innerHTML = '<i class="fa-solid fa-save"></i> &nbsp; Save Data';
        });
    }
</script>

@endsection
