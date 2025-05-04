@extends('layouts.app')

@section('content')

<div class="xCPtuxM4_gihvpPwv9bX t6gkcSf0Bt4MLItXvDJ_ Nu4HUn5EQpnNJ1itNkrd iHPddplqYvrN6qWgvntn AqVNvLG_H6VHhym2yKMp">
    <div class="NM7Z1HBVjN_86WhEcXan mveJTCIb2WII7J4sY22F pXhVRBC8yaUNllmIWxln qUWbS_LTZujDB4XCd11V _Ybd3WwuTVljUT4vEaM3 IvHclGgvMLtYg_ow0uba fzhbbDQ686T8arwvi_bJ _fGhMnSfYmaGrv7DvZ00 _1jTZ8KXRZul60S6czNi">
        <div class="container mx-auto px-4 sm:px-8">
            <div class="py-8">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-semibold leading-tight">Edit Report</h2>
                </div>

                <form action="{{ route('wellinfo.updatefirst', [$project_id, $wellinfo->id_wellinfo]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="curdate" class="block font-medium mb-1">Report Date</label>
                            <input type="date" name="curdate" id="curdate" value="{{ $wellinfo->curdate }}" class="custom-input">
                        </div>

                        <div>
                            <label for="platform" class="block font-medium mb-1">Platform</label>
                            <input type="text" name="platform" id="platform" value="{{ $wellinfo->platform }}" class="custom-input">
                        </div>

                        <div>
                            <label for="wellname" class="block font-medium mb-1">Well Name</label>
                            <input type="text" name="wellname" id="wellname" value="{{ $wellinfo->wellname }}" class="custom-input w-full" required>
                        </div>

                        <div>
                            <label for="spud_date" class="block font-medium mb-1">Spud Date</label>
                            <input type="date" name="spud_date" id="spud_date" value="{{ $wellinfo->spud_date }}" class="custom-input w-full ">
                        </div>

                        <div>
                            <label for="location" class="block font-medium mb-1">Location</label>
                            <input type="text" name="location" id="location" value="{{ $wellinfo->location }}" class="custom-input w-full ">
                        </div>

                        <div>
                            <label for="companyman" class="block font-medium mb-1">Company Man</label>
                            <input type="text" name="companyman" id="companyman" value="{{ $wellinfo->companyman }}" class="custom-input w-full ">
                        </div>

                        <div>
                            <label for="oim" class="block font-medium mb-1">OIM</label>
                            <input type="text" name="oim" id="oim" value="{{ $wellinfo->oim }}" class="custom-input w-full ">
                        </div>

                        <div>
                            <label for="mudeng" class="block font-medium mb-1">BSS Engineer</label>
                            <input type="text" name="mudeng" id="mudeng" value="{{ $wellinfo->mudeng }}" class="custom-input w-full ">
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
</div></div>
@endsection
