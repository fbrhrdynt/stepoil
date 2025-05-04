@extends('layouts.app')
@section('title', 'Preventive Maintenance | FOTrack')
@section('content')
<div class="xCPtuxM4_gihvpPwv9bX t6gkcSf0Bt4MLItXvDJ_ Nu4HUn5EQpnNJ1itNkrd iHPddplqYvrN6qWgvntn AqVNvLG_H6VHhym2yKMp">
<div class="NM7Z1HBVjN_86WhEcXan mveJTCIb2WII7J4sY22F pXhVRBC8yaUNllmIWxln qUWbS_LTZujDB4XCd11V _Ybd3WwuTVljUT4vEaM3 IvHclGgvMLtYg_ow0uba fzhbbDQ686T8arwvi_bJ _fGhMnSfYmaGrv7DvZ00 _1jTZ8KXRZul60S6czNi">
<div class="container mx-auto px-4 sm:px-8">
    <div class="py-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold leading-tight">Preventive Mainatenance Files</h2>
        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($categories as $category)
                <div class="bg-white shadow-md rounded-lg p-4 border border-gray-200">
                    <h3 class="text-lg font-bold text-green-800 mb-2">{{ $category->name }}</h3>

                    @if($category->data->count())
                        <ul class="space-y-2">
                            @foreach($category->data as $file)
                                <li class="flex items-center justify-between text-sm border-b pb-1">
                                    <div>
                                        <span class="font-medium">{{ $file->title }}</span><br>
                                        <span class="text-xs text-gray-500">({{ $file->file_type }}, {{ number_format($file->file_size / 1024, 1) }} KB)</span>
                                    </div>
                                    <a href="{{ asset('storage/' . $file->file_path) }}" target="_blank"
                                    class="text-blue-600 hover:underline" title="Download {{ $file->title }}"><i class="fa-regular fa-download"></i></a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-400 italic text-sm">No files available.</p>
                    @endif
                </div>
            @empty
                <p class="text-gray-500 col-span-full">No categories found.</p>
            @endforelse
        </div>


    </div>
</div>

</div>
    </div>
</div>
</div>
</section>
@endsection

