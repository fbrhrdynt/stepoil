@extends('layouts.app')
@section('title', 'Cuttings by Passed (to Overboard) | FOTrack')
@section('content')

<div class="xCPtuxM4_gihvpPwv9bX t6gkcSf0Bt4MLItXvDJ_ Nu4HUn5EQpnNJ1itNkrd iHPddplqYvrN6qWgvntn AqVNvLG_H6VHhym2yKMp">
    <div class="NM7Z1HBVjN_86WhEcXan mveJTCIb2WII7J4sY22F pXhVRBC8yaUNllmIWxln qUWbS_LTZujDB4XCd11V _Ybd3WwuTVljUT4vEaM3 IvHclGgvMLtYg_ow0uba fzhbbDQ686T8arwvi_bJ _fGhMnSfYmaGrv7DvZ00 _1jTZ8KXRZul60S6czNi">
        <div class="container mx-auto px-4 sm:px-8">
            <div class="py-8">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-semibold leading-tight" style="color: red;">Cuttings by Passed (to Overboard) - MAINTENANCE</h2>
                </div>

                @if(session('success'))
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            Swal.fire({
                                icon: 'success',
                                title: 'Update Successful',
                                text: '{{ session('success') }}',
                                confirmButtonColor: '#267544'
                            });
                        });
                    </script>
                @endif

                @if($errors->any())
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            Swal.fire({
                                icon: 'error',
                                title: 'Submission Failed',
                                html: `{!! implode('<br>', $errors->all()) !!}`,
                                confirmButtonColor: '#dc2626'
                            });
                        });
                    </script>
                @endif


                <form method="POST" action="{{ route('wellinfo.updateBypassed', [$project_id, $wellinfo_id]) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="mb-6">
                            <label for="percentage" class="block text-sm font-medium text-gray-700 mb-2">
                                Percentage (%) Cuttings By-Passed
                            </label>

                            <div class="flex items-center space-x-4">
                                <!-- Input angka -->
                                <div class="flex items-center space-x-1">
                                    <input type="number" name="percentage" id="percentageInput" min="0" max="100" step="1"
                                        value="{{ old('percentage', $data->percentage ?? 0) }}"
                                        class="custom-input w-20 text-center"
                                        oninput="syncSliderWithInput(this.value)">
                                    <span class="text-sm text-gray-500">%</span>
                                </div>

                                <!-- Slider -->
                                <div class="relative w-full h-4 bg-gray-200 rounded-full">
                                    <div id="percentageTrack" class="absolute h-full bg-green-500 rounded-full" style="width: 0%;"></div>
                                    <div id="percentageThumb"
                                        class="absolute -top-1 w-5 h-5 rounded-full cursor-pointer shadow"
                                        style="left: 0%; background-color: #16a34a;" 
                                        onmousedown="startDrag(event)"></div>
                                </div>
                            </div>
                        </div>

                        <!-- FROM DEPTH -->
                        <div>
                            <label for="from_depth" class="block text-sm font-medium text-gray-700">From Depth</label>
                            <div class="flex gap-2">
                                <input type="number" name="from_depth" id="fromDepthInput" step="0.01"
                                    value="{{ old('from_depth', $data->from_depth ?? '') }}"
                                    class="custom-input w-full" />

                                <select name="each_from_depth" id="each_from_depth" class="custom-input w-28">
                                    <option value="Metre" {{ (old('each_from_depth', $data->each_from_depth ?? '') === 'Metre') ? 'selected' : '' }}>Metre</option>
                                    <option value="Feet" {{ (old('each_from_depth', $data->each_from_depth ?? '') === 'Feet') ? 'selected' : '' }}>Feet</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label for="volume" class="block text-sm font-medium text-gray-700">Volume (bbls)</label>
                            <input type="number" name="volume" id="volumeInput" step="0.01"
                                value="{{ old('volume', $data->volume ?? '') }}"
                                class="custom-input"/>
                        </div>

                        <!-- TO DEPTH -->
                        <div>
                            <label for="to_depth" class="block text-sm font-medium text-gray-700">To Depth</label>
                            <div class="flex gap-2">
                                <input type="number" name="to_depth" id="toDepthInput" step="0.01"
                                    value="{{ old('to_depth', $data->to_depth ?? '') }}"
                                    class="custom-input w-full"/>

                                <select name="each_to_depth" id="each_to_depth" class="custom-input w-28">
                                    <option value="Metre" {{ (old('each_to_depth', $data->each_to_depth ?? '') === 'Metre') ? 'selected' : '' }}>Metre</option>
                                    <option value="Feet" {{ (old('each_to_depth', $data->each_to_depth ?? '') === 'Feet') ? 'selected' : '' }}>Feet</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="pt-4 flex gap-3">
                        <button type="submit" class="custom-btn-submit">
                            <i class="fa-solid fa-save"></i> &nbsp; Save Changes
                        </button>
                    </div>
                </form>

<script>
    const input = document.getElementById('percentageInput');
    const track = document.getElementById('percentageTrack');
    const thumb = document.getElementById('percentageThumb');
    const sliderContainer = thumb.parentElement;

    function updateSlider(value) {
        let percentage = parseInt(value);
        if (isNaN(percentage) || percentage < 0) percentage = 0;
        if (percentage > 100) percentage = 100;

        input.value = percentage; // Bilangan bulat tanpa koma
        track.style.width = percentage + '%';
        thumb.style.left = `calc(${percentage}% - 10px)`; // posisi - lebar thumb/2

        // Dynamic color change
        if (percentage <= 50) {
            track.className = 'absolute h-full bg-green-500 rounded-full';
            thumb.style.backgroundColor = '#16a34a'; // green
        } else if (percentage <= 80) {
            track.className = 'absolute h-full bg-yellow-500 rounded-full';
            thumb.style.backgroundColor = '#eab308'; // yellow
        } else {
            track.className = 'absolute h-full bg-red-600 rounded-full';
            thumb.style.backgroundColor = '#dc2626'; // red
        }
    }

    function syncSliderWithInput(value) {
        updateSlider(value);
    }

    function syncInputWithMouse(x) {
        const rect = sliderContainer.getBoundingClientRect();
        const offset = x - rect.left;
        const percentage = Math.round((offset / rect.width) * 100);
        updateSlider(percentage);
    }

    function startDrag(e) {
        document.onmousemove = (ev) => syncInputWithMouse(ev.clientX);
        document.onmouseup = () => {
            document.onmousemove = null;
            document.onmouseup = null;
        };
    }

    // Init
    document.addEventListener('DOMContentLoaded', () => {
        updateSlider(input.value);
    });
</script>




            </div>
        </div>
    </div>
</div></div>
@endsection
