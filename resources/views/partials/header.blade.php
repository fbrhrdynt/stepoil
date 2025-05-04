@php
$user = auth()->user();
    $projectId = $user->id_project ?? null;
    $level = $user->level;
@endphp
<nav id="toggleMobileMenu" class="_SmdlCf6eUKB_V9S5IDj EpUSgjHdM6oyMXUiK_8_ pVSXSlnJdgskzP7BxPBe qUWbS_LTZujDB4XCd11V RZmKBZs1E1eXw8vkE6jY rj_iYr4F_CzsjsQb4tdu fzhbbDQ686T8arwvi_bJ _fGhMnSfYmaGrv7DvZ00 Yv6MasvLpkmInnA0LqbC">
    <div>
      <div class="YRrCJSr_j5nopfm4duUc Q_jg_EPdNf9eDMn1mLI2">
      <ul class="CidV7gB_4Epg62AqLG57 YRrCJSr_j5nopfm4duUc t6gkcSf0Bt4MLItXvDJ_ e8VqoQNK0mbkRFDL3LMV c8dCx6gnV43hTOLV6ks5 ezMFUVl744lvw6ht0lFe _fb3vYPWtkqW992C6ulg">
        <li class="_Vb9igHms0hI1PQcvp_S EpUSgjHdM6oyMXUiK_8_ _fGhMnSfYmaGrv7DvZ00 N3Gb8rTHzm26fWGpfaqP DbhHGkoka_w0cBWkTEdT">
            <a href="{{ url('/dashboard') }}" class="_Vb9igHms0hI1PQcvp_S WLibwhDKgps6unDTx3Tu _Ug_Q6ECU4Wr7QZRLWyU RZmKBZs1E1eXw8vkE6jY i8v96MUlFwGv9qJUkAx7 _6MyV8SXoSWq_PQ6KWI6 NoMYHiWi1FFNSSKvv2nd ofhEsdQ5AMe1IGmhT2W4 fZf6W_ZtzEh6EEqmWMA9" aria-current="page">Home</a>
        </li>

        {{-- My Reports - hanya Operator & Staff --}}
        @if (in_array($level, ['Operator', 'Staff']) && $projectId)
        <li class="_Vb9igHms0hI1PQcvp_S EpUSgjHdM6oyMXUiK_8_ _fGhMnSfYmaGrv7DvZ00 N3Gb8rTHzm26fWGpfaqP DbhHGkoka_w0cBWkTEdT">
            <a href="{{ route('projects.details', ['project_id' => $projectId]) }}"
                class="_Vb9igHms0hI1PQcvp_S RZmKBZs1E1eXw8vkE6jY i8v96MUlFwGv9qJUkAx7 PeR2JZ9BZHYIH8Ea3F36 BIBfHAEYGeb5lUUwLfr_ X_TeYrVHov7W38aAzSIk NoMYHiWi1FFNSSKvv2nd XIIs8ZOri3wm8Wnj9N_y tF6D6kE6t02Uv7sjyD4L vOAl8Rxpm90wAOreazXP">
                My Reports
            </a>
        </li>
        @endif

        {{-- Project Access - MASTER & Supervisor --}}
        @if (in_array($level, ['MASTER', 'Supervisor']))
        <li class="_Vb9igHms0hI1PQcvp_S EpUSgjHdM6oyMXUiK_8_ _fGhMnSfYmaGrv7DvZ00 N3Gb8rTHzm26fWGpfaqP DbhHGkoka_w0cBWkTEdT">
            <a href="{{ url('/projects') }}" class="_Vb9igHms0hI1PQcvp_S RZmKBZs1E1eXw8vkE6jY i8v96MUlFwGv9qJUkAx7 PeR2JZ9BZHYIH8Ea3F36 BIBfHAEYGeb5lUUwLfr_ X_TeYrVHov7W38aAzSIk NoMYHiWi1FFNSSKvv2nd XIIs8ZOri3wm8Wnj9N_y tF6D6kE6t02Uv7sjyD4L vOAl8Rxpm90wAOreazXP">
                Project Access
            </a>
        </li>

        <li class="_Vb9igHms0hI1PQcvp_S EpUSgjHdM6oyMXUiK_8_ _fGhMnSfYmaGrv7DvZ00 N3Gb8rTHzm26fWGpfaqP DbhHGkoka_w0cBWkTEdT">
            <a href="{{ url('/accounts') }}" class="_Vb9igHms0hI1PQcvp_S RZmKBZs1E1eXw8vkE6jY i8v96MUlFwGv9qJUkAx7 PeR2JZ9BZHYIH8Ea3F36 BIBfHAEYGeb5lUUwLfr_ X_TeYrVHov7W38aAzSIk NoMYHiWi1FFNSSKvv2nd XIIs8ZOri3wm8Wnj9N_y tF6D6kE6t02Uv7sjyD4L vOAl8Rxpm90wAOreazXP">
                Accounts
            </a>
        </li>
        @endif

        {{-- Preventive Maintenance - Supervisor, Operator, Staff --}}
        @if (in_array($level, ['MASTER', 'Supervisor', 'Operator', 'Staff']))
        <li class="_Vb9igHms0hI1PQcvp_S EpUSgjHdM6oyMXUiK_8_ _fGhMnSfYmaGrv7DvZ00 N3Gb8rTHzm26fWGpfaqP DbhHGkoka_w0cBWkTEdT">
            <a href="{{ url('/preventive-maintenance') }}" class="_Vb9igHms0hI1PQcvp_S RZmKBZs1E1eXw8vkE6jY i8v96MUlFwGv9qJUkAx7 PeR2JZ9BZHYIH8Ea3F36 BIBfHAEYGeb5lUUwLfr_ X_TeYrVHov7W38aAzSIk NoMYHiWi1FFNSSKvv2nd XIIs8ZOri3wm8Wnj9N_y tF6D6kE6t02Uv7sjyD4L vOAl8Rxpm90wAOreazXP">
                Preventive Maintenance
            </a>
        </li>
        @endif

        {{-- PM - hanya Staff --}}
        @if (in_array($level, ['MASTER', 'Supervisor', 'Staff']))
        <li class="_Vb9igHms0hI1PQcvp_S EpUSgjHdM6oyMXUiK_8_ _fGhMnSfYmaGrv7DvZ00 N3Gb8rTHzm26fWGpfaqP DbhHGkoka_w0cBWkTEdT">
            <a href="{{ url('/assets-category') }}" class="_Vb9igHms0hI1PQcvp_S RZmKBZs1E1eXw8vkE6jY i8v96MUlFwGv9qJUkAx7 PeR2JZ9BZHYIH8Ea3F36 BIBfHAEYGeb5lUUwLfr_ X_TeYrVHov7W38aAzSIk NoMYHiWi1FFNSSKvv2nd XIIs8ZOri3wm8Wnj9N_y tF6D6kE6t02Uv7sjyD4L vOAl8Rxpm90wAOreazXP">
                Company Asset
            </a>
        </li>
        @endif

        {{-- PM - hanya Staff --}}
        @if (in_array($level, ['MASTER', 'Supervisor', 'Staff']))
        <li class="_Vb9igHms0hI1PQcvp_S EpUSgjHdM6oyMXUiK_8_ _fGhMnSfYmaGrv7DvZ00 N3Gb8rTHzm26fWGpfaqP DbhHGkoka_w0cBWkTEdT">
            <a href="{{ url('/inspection-category') }}" class="_Vb9igHms0hI1PQcvp_S RZmKBZs1E1eXw8vkE6jY i8v96MUlFwGv9qJUkAx7 PeR2JZ9BZHYIH8Ea3F36 BIBfHAEYGeb5lUUwLfr_ X_TeYrVHov7W38aAzSIk NoMYHiWi1FFNSSKvv2nd XIIs8ZOri3wm8Wnj9N_y tF6D6kE6t02Uv7sjyD4L vOAl8Rxpm90wAOreazXP">
                Inspection Category
            </a>
        </li>
        @endif
    </ul>
      </div>
    </div>
  </nav>
</header>