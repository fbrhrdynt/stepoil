@php
$user = auth()->user();
    $projectId = $user->id_project ?? null;
    $level = $user->level;
@endphp
<div class="YRrCJSr_j5nopfm4duUc wBVMFkIGfrKshbvi2gS1 jtAJHOc7mn7b4IKRO59D h8KYXnua2NT4kTVzieom">
    <aside id="sidebar" class="hidden _LPVUrp9Uina5fcERqWC TYmpscr1PwuC1dpYXDpM uQByIGHtHssL9HoPQXR4 rBEQnDddLcKNSnbv_P6W rhJ7qSuv_H6qJxmzGcAa nUVQqdd_RQjvvOrcRIpD gJkA1vzadgWLGEfN5oKt tydApFk2TI9aladuOmdP gZ3KuFw1JESHhOJhjT8j" aria-label="Sidebar">
    <div id="sidebar-overlay"
        class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden"
        onclick="toggleSidebar(false)">
    </div>

      <div class="uLPch_bqyJDXwe5tynMV _lTTGxW9MVI40FyDCtmr hEIh0_vxSXD_ZBXYxnd0 qUWbS_LTZujDB4XCd11V _Ybd3WwuTVljUT4vEaM3 _Cj_M6jt2eLjDgkBBNgI _9igzqn_6D3Qq5Hcwkfk _fGhMnSfYmaGrv7DvZ00 _1jTZ8KXRZul60S6czNi">
      <div class="flex justify-end p-4">
        <button onclick="toggleSidebar(false)" class="text-2xl">
          &times;
        </button>
      </div>

        <ul class="TVHgSaRh3muGJct_epr9">
          <li>
            <a href="{{ url('/dashboard') }}" class="BpcA_ZTX79XDgSc71n2v YRrCJSr_j5nopfm4duUc Mln3CkDzLcoVQAC3Uqsd t6gkcSf0Bt4MLItXvDJ_ Q_jg_EPdNf9eDMn1mLI2 mveJTCIb2WII7J4sY22F FJRldeiG2gFGZfuKgp88 d3C8uAdJKNl1jzfE9ynq ezMFUVl744lvw6ht0lFe __9sbu0yrzdhGIkLWNXl _7KA5gD55t2lxf9Jkj20 OyABRrnTV_kvHV7dJ0uE OPrb_iG5WDy_7F05BDOX" data-sidebar-collapse-item="">
              <i class="fa-regular fa-house"></i>
              <span class="oA7zcT_42jVeFuWTXQnq _74lpPUMEtHf6F0_fjLe BHrWGjM1Iab_fAz0_91H upQp7iWehfaU8VTbfx_w" data-sidebar-collapse-hide="">Dashboards</span>
            </a>
          </li>
          
        @if (in_array($level, ['Operator', 'Staff']) && $projectId)
          <li>
            <a href="{{ route('projects.details', ['project_id' => $projectId]) }}" class="BpcA_ZTX79XDgSc71n2v YRrCJSr_j5nopfm4duUc Mln3CkDzLcoVQAC3Uqsd t6gkcSf0Bt4MLItXvDJ_ Q_jg_EPdNf9eDMn1mLI2 mveJTCIb2WII7J4sY22F FJRldeiG2gFGZfuKgp88 d3C8uAdJKNl1jzfE9ynq ezMFUVl744lvw6ht0lFe __9sbu0yrzdhGIkLWNXl _7KA5gD55t2lxf9Jkj20 OyABRrnTV_kvHV7dJ0uE OPrb_iG5WDy_7F05BDOX" data-sidebar-collapse-item="">
              <i class="fa-regular fa-file-lines"></i>
              <span class="oA7zcT_42jVeFuWTXQnq _74lpPUMEtHf6F0_fjLe BHrWGjM1Iab_fAz0_91H upQp7iWehfaU8VTbfx_w" data-sidebar-collapse-hide="">My Reports</span>
            </a>
          </li>
          @endif
          <li>
            <a href="{{ url('/projects') }}" class="BpcA_ZTX79XDgSc71n2v YRrCJSr_j5nopfm4duUc Mln3CkDzLcoVQAC3Uqsd t6gkcSf0Bt4MLItXvDJ_ Q_jg_EPdNf9eDMn1mLI2 mveJTCIb2WII7J4sY22F FJRldeiG2gFGZfuKgp88 d3C8uAdJKNl1jzfE9ynq ezMFUVl744lvw6ht0lFe __9sbu0yrzdhGIkLWNXl _7KA5gD55t2lxf9Jkj20 OyABRrnTV_kvHV7dJ0uE OPrb_iG5WDy_7F05BDOX" data-sidebar-collapse-item="">
              <i class="fa-regular fa-server"></i>
              <span class="oA7zcT_42jVeFuWTXQnq _74lpPUMEtHf6F0_fjLe BHrWGjM1Iab_fAz0_91H upQp7iWehfaU8VTbfx_w" data-sidebar-collapse-hide="">Project Access</span>
            </a>
          </li>
          <li>
            <a href="{{ url('/accounts') }}" class="BpcA_ZTX79XDgSc71n2v YRrCJSr_j5nopfm4duUc Mln3CkDzLcoVQAC3Uqsd t6gkcSf0Bt4MLItXvDJ_ Q_jg_EPdNf9eDMn1mLI2 mveJTCIb2WII7J4sY22F FJRldeiG2gFGZfuKgp88 d3C8uAdJKNl1jzfE9ynq ezMFUVl744lvw6ht0lFe __9sbu0yrzdhGIkLWNXl _7KA5gD55t2lxf9Jkj20 OyABRrnTV_kvHV7dJ0uE OPrb_iG5WDy_7F05BDOX" data-sidebar-collapse-item="">
              <i class="fa-regular fa-users-gear"></i>
              <span class="oA7zcT_42jVeFuWTXQnq _74lpPUMEtHf6F0_fjLe BHrWGjM1Iab_fAz0_91H upQp7iWehfaU8VTbfx_w" data-sidebar-collapse-hide="">Accounts</span>
            </a>
          </li>
          <li>
            <a href="{{ url('/preventive-maintenance') }}" class="BpcA_ZTX79XDgSc71n2v YRrCJSr_j5nopfm4duUc Mln3CkDzLcoVQAC3Uqsd t6gkcSf0Bt4MLItXvDJ_ Q_jg_EPdNf9eDMn1mLI2 mveJTCIb2WII7J4sY22F FJRldeiG2gFGZfuKgp88 d3C8uAdJKNl1jzfE9ynq ezMFUVl744lvw6ht0lFe __9sbu0yrzdhGIkLWNXl _7KA5gD55t2lxf9Jkj20 OyABRrnTV_kvHV7dJ0uE OPrb_iG5WDy_7F05BDOX" data-sidebar-collapse-item="">
              <i class="fa-regular fa-calendar-check"></i>
              <span class="oA7zcT_42jVeFuWTXQnq _74lpPUMEtHf6F0_fjLe BHrWGjM1Iab_fAz0_91H upQp7iWehfaU8VTbfx_w" data-sidebar-collapse-hide="">Preventive Maintenance</span>
            </a>
          </li>
          <li>
            <a href="{{ url('/assets-category') }}" class="BpcA_ZTX79XDgSc71n2v YRrCJSr_j5nopfm4duUc Mln3CkDzLcoVQAC3Uqsd t6gkcSf0Bt4MLItXvDJ_ Q_jg_EPdNf9eDMn1mLI2 mveJTCIb2WII7J4sY22F FJRldeiG2gFGZfuKgp88 d3C8uAdJKNl1jzfE9ynq ezMFUVl744lvw6ht0lFe __9sbu0yrzdhGIkLWNXl _7KA5gD55t2lxf9Jkj20 OyABRrnTV_kvHV7dJ0uE OPrb_iG5WDy_7F05BDOX" data-sidebar-collapse-item="">
              <i class="fa-regular fa-tractor"></i>
              <span class="oA7zcT_42jVeFuWTXQnq _74lpPUMEtHf6F0_fjLe BHrWGjM1Iab_fAz0_91H upQp7iWehfaU8VTbfx_w" data-sidebar-collapse-hide="">Company Asset</span>
            </a>
          </li>
          <li>
            <a href="{{ url('/inspection-category') }}" class="BpcA_ZTX79XDgSc71n2v YRrCJSr_j5nopfm4duUc Mln3CkDzLcoVQAC3Uqsd t6gkcSf0Bt4MLItXvDJ_ Q_jg_EPdNf9eDMn1mLI2 mveJTCIb2WII7J4sY22F FJRldeiG2gFGZfuKgp88 d3C8uAdJKNl1jzfE9ynq ezMFUVl744lvw6ht0lFe __9sbu0yrzdhGIkLWNXl _7KA5gD55t2lxf9Jkj20 OyABRrnTV_kvHV7dJ0uE OPrb_iG5WDy_7F05BDOX" data-sidebar-collapse-item="">
              <i class="fa-regular fa-user-nurse"></i>
              <span class="oA7zcT_42jVeFuWTXQnq _74lpPUMEtHf6F0_fjLe BHrWGjM1Iab_fAz0_91H upQp7iWehfaU8VTbfx_w" data-sidebar-collapse-hide="">Inspection Category</span>
            </a>
          </li>
        </ul>
      </div>
    </aside>
</div>

<script>
  function toggleSidebar(open) {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebar-overlay');

    if (open) {
      sidebar.classList.remove('hidden');
      overlay.classList.remove('hidden');
    } else {
      sidebar.classList.add('hidden');
      overlay.classList.add('hidden');
    }
  }

  // Optional: Toggle button (hamburger icon) ID = "hamburger-toggle"
  document.getElementById('hamburger-toggle')?.addEventListener('click', function () {
    toggleSidebar(true);
  });
</script>
