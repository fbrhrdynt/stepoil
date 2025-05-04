@extends('layouts.app')
@section('title', 'Daily Waste & Average ROC | FOTrack')
@section('content')
<!-- 🔴 CSS Force Style -->
<style>
.force-border-red {
    border: 2px solid red !important;
}

.force-text-red {
    color: red !important;
}
</style>
<div class="xCPtuxM4_gihvpPwv9bX t6gkcSf0Bt4MLItXvDJ_ Nu4HUn5EQpnNJ1itNkrd iHPddplqYvrN6qWgvntn AqVNvLG_H6VHhym2yKMp">
    <div class="NM7Z1HBVjN_86WhEcXan mveJTCIb2WII7J4sY22F pXhVRBC8yaUNllmIWxln qUWbS_LTZujDB4XCd11V _Ybd3WwuTVljUT4vEaM3 IvHclGgvMLtYg_ow0uba fzhbbDQ686T8arwvi_bJ _fGhMnSfYmaGrv7DvZ00 _1jTZ8KXRZul60S6czNi">
        <div class="container mx-auto px-4 sm:px-8">
            <div class="py-8">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-semibold leading-tight"><u>Daily Waste & Average ROC</u></h2>
                </div>
                <form method="POST" action="{{ route('wellinfo.daily-waste.update', [$project_id, $wellinfo_id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex flex-col">
                            <label>Daily Waste Generated (Mud & Cuttings) (bbls)</label>
                            <div class="flex items-center gap-2">
                                <input type="text" step="0.01" name="dailywaste_generated" id="dailywaste_generated"
                                    value="{{ old('dailywaste_generated', $total_cuttings_discharge ?? ($data->dailywaste_generated ?? '')) }}"
                                    class="custom-input w-full" readonly>
                                <span id="" class="text-sm text-gray-600 min-w-[50px]">Bbls</span>
                            </div>
                        </div>

                        <div>
                            <label for="avg_moc" class="block text-sm font-medium text-gray-700">
                                Average MOC (Method of Cuttings)
                            </label>
                            <div class="flex items-center gap-2">
                                <input type="number" name="avg_moc" id="avg_moc" step="0.01"
                                value="{{ old('avg_moc', $avg_moc ?? ($data->avg_moc ?? '')) }}"
                                class="custom-input" readonly>
                                <span id="" class="text-sm text-gray-600 min-w-[50px]">vol/vol</span>
                            </div>
                        </div>

                        <div>
                            <label for="avg_discharge" class="block text-sm font-medium text-gray-700">
                                Average Discharge % OOC (%)
                            </label>
                            <div class="flex items-center gap-2">
                                <input type="number" name="avg_discharge" id="avg_discharge" step="0.01"
                                value="{{ old('avg_discharge', $data->avg_discharge ?? '') }}"
                                class="custom-input" readonly>
                                <span id="" class="text-sm text-gray-600 min-w-[50px]">%</span>
                            </div>
                        </div>
                    </div>

                    <br><br>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- 🟢 STEPOILTOOLS ACTIVITIES -->
                        <div class="row mb-2">
                            <div class="col col-md-2">
                                STEPOILTOOLS ACTIVITIES
                            </div>
                            <div class="col col-md-6">
                                <span style="font-size: small;"><i>* Max 230 Character.</i></span>
                                <textarea class="form-control custom-input" maxlength="230"
                                    name="bssactivity" id="bssactivity" rows="5"
                                    oninput="validateCharCount('bssactivity', 230, 'bssCharCount')"
                                >{{ old('bssactivity', $additional->bssactivity ?? '') }}</textarea>
                                <div id="bssCharCount" class="text-sm text-gray-500 mt-1">230 Character left</div>
                            </div>
                        </div>

                        <!-- 🔵 RIG / OTHER ACTIVITIES -->
                        <div class="row mb-2">
                            <div class="col col-md-2">
                                RIG / OTHER ACTIVITIES
                            </div>
                            <div class="col col-md-6">
                                <span style="font-size: small;"><i>* Max 230 Character.</i></span>
                                <textarea class="form-control custom-input" maxlength="230"
                                    name="rigactivity" id="rigactivity" rows="5"
                                    oninput="validateCharCount('rigactivity', 230, 'rigCharCount')"
                                >{{ old('rigactivity', $additional->rigactivity ?? '') }}</textarea>
                                <div id="rigCharCount" class="text-sm text-gray-500 mt-1">230 Character left</div>
                            </div>
                        </div>
                    </div>

                    <div class="pt-4 flex gap-3">
                        <button type="submit" class="custom-btn-submit">
                            <i class="fa-solid fa-save"></i> &nbsp; Save Changes
                        </button>
                        <a href="{{ url()->previous() }}" class="custom-btn-cancel">
                            <i class="fa-solid fa-xmark"></i> &nbsp; Cancel
                        </a>
                    </div>
                </form>
                    <script>
                        function updateCharCountById(textareaId, maxChars, displayId) {
                            const input = document.getElementById(textareaId);
                            const counter = document.getElementById(displayId);
                            const remaining = maxChars - input.value.length;
                            counter.innerText = `${remaining} Character left`;
                        }
                    </script>
                    <!-- 🔧 JavaScript: Validasi dan UI -->
                    <script>
                    function validateCharCount(textareaId, maxLength, counterId) {
                        const textarea = document.getElementById(textareaId);
                        const counter = document.getElementById(counterId);
                        const currentLength = textarea.value.length;

                        if (currentLength > maxLength) {
                            // Potong teks dan beri class merah
                            textarea.value = textarea.value.substring(0, maxLength);
                            textarea.classList.add('force-border-red');
                            counter.classList.add('force-text-red');
                            counter.innerHTML = `<span class="font-semibold">Limit reached (230 characters)</span>`;
                        } else {
                            textarea.classList.remove('force-border-red');
                            counter.classList.remove('force-text-red');
                            counter.innerText = `${maxLength - currentLength} Character left`;
                        }
                    }
                    </script>
            </div>
        </div>
    </div>
</div></div>
@endsection
