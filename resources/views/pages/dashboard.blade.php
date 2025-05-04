@extends('layouts.app')

@section('title', 'Dashboard | FOTrack')

@section('content')
<div class="xCPtuxM4_gihvpPwv9bX t6gkcSf0Bt4MLItXvDJ_ Nu4HUn5EQpnNJ1itNkrd iHPddplqYvrN6qWgvntn AqVNvLG_H6VHhym2yKMp">
  <div class="NM7Z1HBVjN_86WhEcXan mveJTCIb2WII7J4sY22F pXhVRBC8yaUNllmIWxln qUWbS_LTZujDB4XCd11V _Ybd3WwuTVljUT4vEaM3 IvHclGgvMLtYg_ow0uba fzhbbDQ686T8arwvi_bJ _fGhMnSfYmaGrv7DvZ00 _1jTZ8KXRZul60S6czNi">
    <div class="container mx-auto px-4 sm:px-8 py-8">

      {{-- Welcome Message --}}
      <div class="mb-8 p-6 bg-white shadow-md rounded-xl border border-gray-200">
          @php
            $user = auth()->user();
              $level = $user->level;
              $name = $user->employee_name;
              $project = $user->project->operator_name ?? '-';
          @endphp

          <h2 class="text-3xl font-extrabold text-gray-900 leading-tight">
              Welcome, {{ $user->employee_name }}
          </h2>

          <p class="text-md text-gray-700 mt-2 leading-relaxed">
              @if ($user->level === 'MASTER')
                  You are logged in as <strong class="text-green-700">Website Administrator</strong>.
              @elseif ($user->level === 'Supervisor')
                  You are logged in as <strong class="text-green-700">Supervisor</strong>. You have access to all available projects.
              @else
                  You are logged in as <strong class="text-green-700">Operator/Staff</strong> assigned to <strong>{{ $project }}</strong>.
              @endif
          </p>
      </div>

      {{-- Card Section --}}
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
          <div class="bg-white p-6 shadow rounded-xl border border-gray-100 text-center">
              <h3 class="text-lg font-semibold text-gray-800 tracking-wide mb-2">Total Projects</h3>
              <p class="text-4xl font-extrabold text-green-600">{{ $totalProjects }}</p>
          </div>

          <div class="bg-white p-6 shadow rounded-xl border border-gray-100 text-center">
              <h3 class="text-lg font-semibold text-gray-800 tracking-wide mb-2">Active Users</h3>
              <p class="text-4xl font-extrabold text-green-600">{{ $activeUsers }}</p>
          </div>

          <div class="bg-white p-6 shadow rounded-xl border border-gray-100 text-center">
              @if (in_array($user->level, ['Operator', 'Staff']))
                  Reports submitted for project <span class="text-green-700 font-bold">
                    {{ $user->project->operator_name ?? '-' }} - {{ $user->project->drillingrig ?? '-' }} - {{ $user->project->wellname ?? '-' }}
                  </span>
              @else
                  Reports Submitted
              @endif
              <p class="text-4xl font-extrabold text-green-600">{{ $reportCount }}</p>
          </div>
      </div>



    </div>
  </div>
  </div>
  </div>

@endsection
