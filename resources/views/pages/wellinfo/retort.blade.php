@extends('layouts.app')

@section('title', 'Retort Worksheet | FOTrack')

@section('content')
<style>
    .retort-table {
        min-width: 900px;
        font-size: 12px;
    }

    .retort-table label {
        font-size: 12px;
        font-weight: 600;
        text-align: center;
        width: 70% !important;
    }

    .retort-table input {
        width: 90% !important;
        height: 28px;
        padding: 2px 4px;
        font-size: 12px;
        text-align: center;
        border-radius: 0.5rem !important;
    }

    .retort-table td {
        padding: 2px 6px;
        vertical-align: middle;
    }

    .retort-table tr:hover {
        background-color: rgb(202, 202, 202);
    }

    .retort-table tr.active-row {
        background-color: #e8f0ff !important;
    }

    .header-row {
        background-color: #f0f0f0;
        font-size: 13px;
        font-weight: bold;
    }

    .retort-scroll-wrapper {
        overflow-x: auto;
        white-space: nowrap;
        padding-bottom: 8px;
    }

    .retort-table tr {
        line-height: 1.2;
    }

    .form-control {
        margin: 0;
    }

    .bg-gray {
        background-color: #e5e5e5 !important;
    }

    input[readonly] {
        background-color: #c1c1c1 !important;
        color: #000000;
    }

    .custom-btn-submit {
        padding: 4px 18px;
        font-size: 13px;
    }
</style>

<div class="xCPtuxM4_gihvpPwv9bX t6gkcSf0Bt4MLItXvDJ_ Nu4HUn5EQpnNJ1itNkrd iHPddplqYvrN6qWgvntn AqVNvLG_H6VHhym2yKMp">
    <div class="NM7Z1HBVjN_86WhEcXan mveJTCIb2WII7J4sY22F pXhVRBC8yaUNllmIWxln qUWbS_LTZujDB4XCd11V _Ybd3WwuTVljUT4vEaM3 IvHclGgvMLtYg_ow0uba fzhbbDQ686T8arwvi_bJ _fGhMnSfYmaGrv7DvZ00 _1jTZ8KXRZul60S6czNi">
        <div class="container mx-auto px-4 sm:px-8">
            <div class="py-8">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-semibold leading-tight">Retort Worksheet</h2>
                </div>

                <div class="alert-notice" style="text-color: red !important">
                    <i class="fa-solid fa-circle-exclamation"></i> Please fill in the number 0 (zero) in the unused column
                </div>

                <form method="POST" action="{{ route('wellinfo.updateRetort', ['project_id' => $wellinfo['id_project'], 'wellinfo_id' => $wellinfo['id_wellinfo']]) }}">
                    @csrf
                    @method('PUT')

                    <div class="retort-scroll-wrapper">
                        <table class="retort-table table table-bordered">
                            <thead>
                                <tr class="header-row text-center">
                                    <td>Parameter</td>
                                    <td>Shaker Overflow</td>
                                    <td>Cutting Dryer</td>
                                    <td>Centrifuge 1</td>
                                    <td>Centrifuge 2</td>
                                    <td>Centrifuge 3</td>
                                </tr>
                            </thead>
                            @php
                                $prefixes = ['sh', 'cdu', 'cf1', 'cf2', 'cf3'];
                                $unit = ucwords($details['volholeunit'] ?? 'Bbl');
                                $fields = [
                                    'basefluid' => 'Base Fluids fr whole Mud (%)',
                                    'sgbasefluid' => 'SG Base Fluids (sp.gr)',
                                    'sgdrillsolid' => 'SG Drill Solids/Cutting (sp.gr)',
                                    'sampledepth' => 'Sample Depth',
                                    'sampletime' => 'Sample Time',
                                    'emptycell' => 'Empty Cell (gm)',
                                    'emptycellwetsamp' => 'Empty Cell + Wet Sample (gm)',
                                    'celldrycut' => 'Cell + Dry Cuttings Wt (gm)',
                                    'emptycylinder' => 'Empty Cylinder (gm)',
                                    'wtcylwaterbf' => 'Wt Cyl + Water + BaseFluid (gm)',
                                    'watervolin' => 'Water Vol in Cylinder (ml)',
                                    'basefluidvolincyl' => 'Base Fluids Vol in Cylinder (ml)',
                                    'massofcutting' => 'Mass of Wet Cuttings (gm)',
                                    'massofdry' => 'Mass of Dry Cuttings (gm)',
                                    'wtofwaterbf' => 'Wt of Water & Base Fluids (gm)',
                                    'massofbf' => 'Mass of Base Fluids (gm)',
                                    'mudoncutting' => 'Mud-on-Cuttings (vol/vol)',
                                    'volmuddisc' => "Vol Mud Discharge ($unit)",
                                    'volbfoildisc' => "Vol Base Fluid / Oil Discharge ($unit)",
                                    'ooc' => 'OOC ( Oil On Cuttings ) %',
                                ];
                                $autoCalculated = [
                                    'massofcutting', 'massofdry', 'wtofwaterbf', 'massofbf',
                                    'basefluidvolincyl', 'mudoncutting', 'volmuddisc', 'volbfoildisc', 'ooc'
                                ];
                            @endphp

                            <tbody>
                            @foreach ($fields as $fieldKey => $fieldLabel)
                                <tr>
                                    <td><label>{{ $fieldLabel }}</label></td>

                                    {{-- Global Fields --}}
                                    @if (in_array($fieldKey, ['basefluid', 'sgbasefluid', 'sgdrillsolid']))
                                        @foreach ($prefixes as $idx => $prefix)
                                            <td>
                                                <input type="text"
                                                    name="{{ $fieldKey }}"
                                                    {{ $idx === 0 ? "id=$fieldKey" : '' }}
                                                    value="{{ old($fieldKey, $details[$fieldKey]) }}"
                                                    readonly
                                                    class="form-control text-center bg-gray">
                                            </td>
                                        @endforeach
                                    @else
                                        @foreach ($prefixes as $prefix)
                                            @php
                                                $name = "rt_{$prefix}_{$fieldKey}";
                                                $value = old($name, $retorts[$name] ?? '');
                                                $readonly = in_array($fieldKey, $autoCalculated)
                                                    ? 'readonly class=form-control bg-gray'
                                                    : 'class=form-control';
                                            @endphp
                                            <td>
                                            @if ($fieldKey === 'sampletime')
                                                @php
                                                    $formattedTime = '00:00';
                                                    if (is_numeric($value)) {
                                                        $hours = floor($value / 60);
                                                        $minutes = $value % 60;
                                                        $formattedTime = sprintf('%02d:%02d', $hours, $minutes);
                                                    }
                                                @endphp
                                                <input type="time"
                                                    name="{{ $name }}"
                                                    id="{{ $name }}"
                                                    value="{{ $formattedTime }}"
                                                    class="form-control">
                                            @else
                                                <input type="text"
                                                    name="{{ $name }}"
                                                    id="{{ $name }}"
                                                    value="{{ $value }}"
                                                    {!! $readonly !!}>
                                            @endif

                                            </td>
                                        @endforeach
                                    @endif
                                </tr>
                            @endforeach

                            {{-- % of Cuttings Discharged --}}
                            @php
                                $defaultPerCuttings = ['sh' => 90, 'cdu' => 80, 'cf1' => 100, 'cf2' => 100, 'cf3' => 100];
                            @endphp
                            <tr>
                                <td><label><b>% of Cuttings Discharged</b></label></td>
                                @foreach ($prefixes as $prefix)
                                    @php
                                        $name = "rt_{$prefix}_percofcutting";
                                        $value = $defaultPerCuttings[$prefix];
                                    @endphp
                                    <td>
                                        <input type="text"
                                            name="{{ $name }}"
                                            id="{{ $name }}"
                                            value="{{ $value }}"
                                            readonly
                                            class="form-control bg-gray">
                                    </td>
                                @endforeach
                            </tr>

                            {{-- Cumulative Section --}}
                            <tr class="header-row text-center">
                                <td colspan="6">Cumulative Oil / Mud Recovered</td>
                            </tr>
                            <tr>
                                <td><label>Oil Recovered ({{ $unit }})</label></td>
                                <td>
                                    <input type="text" name="oil_recovered" id="oil_recovered"
                                        class="form-control bg-gray"
                                        value="{{ number_format($retorts['oil_recovered'] ?? 0, 2) }}"
                                        readonly>
                                </td>
                                <td colspan="4"></td>
                            </tr>
                            <tr>
                                <td><label>Mud Recovered ({{ $unit }})</label></td>
                                <td>
                                    <input type="text" name="mud_recovered" id="mud_recovered"
                                        class="form-control bg-gray"
                                        value="{{ number_format($retorts['mud_recovered'] ?? 0, 2) }}"
                                        readonly>
                                </td>
                                <td>
                                    <input type="text" name="cum_oil" id="cum_oil"
                                        class="form-control"
                                        value="{{ number_format($retorts['cum_oil'] ?? 0, 2) }}">
                                </td>
                                <td>
                                    <input type="text" name="cum_mud" id="cum_mud"
                                        class="form-control"
                                        value="{{ number_format($retorts['cum_mud'] ?? 0, 2) }}">
                                </td>
                                <td colspan="2"></td>
                            </tr>
                            </tbody>

                        </table>
                    </div>

                    {{-- Hidden Fields for JS --}}
                    @foreach (['sgbasefluid', 'basefluid', 'mudweight', 'sgdrillsolid', 'volholedrill', 'cf1_volcake', 'cf2_volcake', 'cf3_volcake'] as $key)
                        <input type="hidden" id="{{ $key }}" value="{{ $details[$key] }}">
                    @endforeach

                    {{-- Finalize Hidden Fields --}}
                    <input type="hidden" name="vctodryer_bbls" id="vctodryer_bbls">
                    <input type="hidden" name="vctodryer_m3" id="vctodryer_m3">
                    <input type="hidden" name="vcfrdryer_bbls" id="vcfrdryer_bbls">
                    <input type="hidden" name="vcfrdryer_m3" id="vcfrdryer_m3">
                    <input type="hidden" name="vcfrcf1_bbls" id="vcfrcf1_bbls">
                    <input type="hidden" name="vcfrcf1_m3" id="vcfrcf1_m3">
                    <input type="hidden" name="vcfrcf2_bbls" id="vcfrcf2_bbls">
                    <input type="hidden" name="vcfrcf2_m3" id="vcfrcf2_m3">
                    <input type="hidden" name="vcfrcf3_bbls" id="vcfrcf3_bbls">
                    <input type="hidden" name="vcfrcf3_m3" id="vcfrcf3_m3">

                    <div class="mt-4 text-center">
                        <button type="submit" class="btn btn-dark custom-btn-submit">
                            <i class="fa-regular fa-floppy-disk"></i> &nbsp; SAVE DATA
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div></div>

@include('pages.wellinfo.retort-js')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: '{{ session('success') }}',
        timer: 2500,
        showConfirmButton: false
    });
</script>
@endif

@endsection
