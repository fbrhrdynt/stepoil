@extends('layouts.app')
@section('title', 'Personnel | FOTrack')
@section('content')

<div class="xCPtuxM4_gihvpPwv9bX t6gkcSf0Bt4MLItXvDJ_ Nu4HUn5EQpnNJ1itNkrd iHPddplqYvrN6qWgvntn AqVNvLG_H6VHhym2yKMp">
    <div class="NM7Z1HBVjN_86WhEcXan mveJTCIb2WII7J4sY22F pXhVRBC8yaUNllmIWxln qUWbS_LTZujDB4XCd11V _Ybd3WwuTVljUT4vEaM3 IvHclGgvMLtYg_ow0uba fzhbbDQ686T8arwvi_bJ _fGhMnSfYmaGrv7DvZ00 _1jTZ8KXRZul60S6czNi">
        <div class="container mx-auto px-4 sm:px-8">
            <div class="py-8">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-semibold leading-tight">Step Oiltools Engineers</h2>
                </div>

@if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Update Successful',
                text: '{{ session('success') }}',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            });
        });
    </script>
@endif
@if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                html: `{!! implode('<br>', $errors->all()) !!}`,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Close'
            });
        });
    </script>
@endif



                <form action="{{ route('personnel.update', [$project_id, $wellinfo_id]) }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="ds1_name" class="block font-medium mb-1">Day Shift 1</label>
                            <input type="text" name="ds1_name" id="ds1_name"
                                value="{{ old('ds1_name', $personnel->ds1_name) }}"
                                class="custom-input" placeholder="e.g. John Doe">
                        </div>

                        <div>
                            <label for="ns1_name" class="block font-medium mb-1">Night Shift 1</label>
                            <input type="text" name="ns1_name" id="ns1_name"
                                value="{{ old('ns1_name', $personnel->ns1_name) }}"
                                class="custom-input" placeholder="e.g. Jane Smith">
                        </div>

                        <div>
                            <label for="ds2_name" class="block font-medium mb-1">Day Shift 2</label>
                            <input type="text" name="ds2_name" id="ds2_name"
                                value="{{ old('ds2_name', $personnel->ds2_name) }}"
                                class="custom-input" placeholder="e.g. Albert Davis">
                        </div>

                        <div>
                            <label for="ns2_name" class="block font-medium mb-1">Night Shift 2</label>
                            <input type="text" name="ns2_name" id="ns2_name"
                                value="{{ old('ns2_name', $personnel->ns2_name) }}"
                                class="custom-input" placeholder="e.g. Emma Wilson">
                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="custom-btn-submit">
                            <i class="fa-solid fa-save"></i> &nbsp; Save Changes
                        </button> &nbsp;
                        <a href="{{ route('projects.details', ['project_id' => $project_id]) }}" class="custom-btn-cancel">
                            Cancel
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
</div>
@endsection
