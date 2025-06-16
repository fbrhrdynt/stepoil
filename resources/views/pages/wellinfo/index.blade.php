@extends('layouts.app')
@section('title', 'Detail Projects | FOTrack')

@section('content')

<div class="xCPtuxM4_gihvpPwv9bX t6gkcSf0Bt4MLItXvDJ_ Nu4HUn5EQpnNJ1itNkrd iHPddplqYvrN6qWgvntn AqVNvLG_H6VHhym2yKMp">
    <div class="NM7Z1HBVjN_86WhEcXan mveJTCIb2WII7J4sY22F pXhVRBC8yaUNllmIWxln qUWbS_LTZujDB4XCd11V _Ybd3WwuTVljUT4vEaM3 IvHclGgvMLtYg_ow0uba fzhbbDQ686T8arwvi_bJ _fGhMnSfYmaGrv7DvZ00 _1jTZ8KXRZul60S6czNi">
        <div class="container mx-auto px-4 sm:px-8">

            <div class="py-8">
                <div class="flex justify-between items-center mb-4">
                    <h1 class="text-2xl font-semibold leading-tight">Detail Project</h1>
                    @php
                        $last = $wellinfo->sortByDesc('urut')->first();
                    @endphp

                    <a href="javascript:void(0);" onclick="confirmDownloadSummary('{{ route('wellinfo.downloadSummary', $project->id_project) }}')"
                        class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 ml-2">
                        <i class="fa-regular fa-file-excel"></i> &nbsp;Download Current Well Summary
                    </a>

                    <a href="javascript:void(0);" onclick="confirmCopyWithProject('{{ route('wellinfo.copyWithProject', [$project->id_project, $last->id_wellinfo]) }}')"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        <i class="fa-regular fa-copy"></i> &nbsp;Create New Report with Latest Data
                    </a>

                    <script>
                        function confirmCopyWithProject(url) {
                            Swal.fire({
                                title: 'Copy Previous Report?',
                                text: 'This will duplicate the last report in this project.',
                                icon: 'question',
                                showCancelButton: true,
                                confirmButtonColor: '#2563eb',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Yes, copy it!'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = url;
                                }
                            });
                        }
                        
                        function confirmDownloadSummary(url) {
                            Swal.fire({
                                title: 'Download Current Well Summary?',
                                text: 'This will download the current well summary as an Excel file.',
                                icon: 'question',
                                showCancelButton: true,
                                confirmButtonColor: '#2563eb',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Yes, download it!'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = url;
                                }
                            });
                        }
                    </script>
                </div>

                <div class="overflow-x-auto">
                    <table id="datatable" class="table-sm text-sm w-full whitespace-nowrap border-collapse border border-gray-300 min-w-[1200px]">
                        <thead class="bg-gray-200">
                            <tr>
                                <th>No</th>
                                <th>Report No.</th>
                                <th>Report Date</th>
                                <th>Platform</th>
                                <th>Well Name</th>
                                <th>Spud Date</th>
                                <th>Location</th>
                                <th>Companyman</th>
                                <th>OIM</th>
                                <th>Mud Engineer</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
</section>
{{-- AJAX & DataTables --}}
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("wellinfo.data", ["project_id" => $project->id_project]) }}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'urut', name: 'urut' },
                { data: 'curdate', name: 'curdate' },
                { data: 'platform', name: 'platform' },
                { data: 'wellname', name: 'wellname' },
                { data: 'spud_date', name: 'spud_date' },
                { data: 'location', name: 'location' },
                { data: 'companyman', name: 'companyman' },
                { data: 'oim', name: 'oim' },
                { data: 'mudeng', name: 'mudeng' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    });

document.addEventListener("DOMContentLoaded", function () {
    document.body.addEventListener("click", function (e) {
        if (e.target.closest(".delete-report-btn")) {
            e.preventDefault();
            const btn = e.target.closest(".delete-report-btn");
            const url = btn.getAttribute("data-url");

            Swal.fire({
                title: 'Are you sure?',
                text: 'This report will be permanently deleted.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Yes, delete it!',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to delete URL
                    window.location.href = url;
                }
            });
        }
    });
});
</script>


@endsection
