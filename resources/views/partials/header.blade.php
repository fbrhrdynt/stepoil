@php
$user = auth()->user();
$projectId = $user->id_project ?? null;
$level = $user->level;
@endphp

<style>
  /* Reset & basic */
  body {
    margin: 0; padding: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    transition: background-color 0.3s, color 0.3s;
  }

  /* Navbar */
  .navbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: #222;
    color: #eee;
    padding: 0.5rem 1rem;
  }

  .navbar .logo-container {
    display: flex;
    align-items: center;
    cursor: pointer;
    gap: 0.5rem;
  }

  .navbar .logo-container img {
    height: 32px;
  }

  .navbar .logo-container span {
    font-weight: 600;
    font-size: 1.1rem;
    user-select: none;
  }

  .navbar .actions {
    display: flex;
    align-items: center;
    gap: 1rem;
  }

  /* Hamburger icon */
  .hamburger {
    font-size: 1.4rem;
    cursor: pointer;
    user-select: none;
  }

  /* Dark mode button */
  .btn-darkmode {
    background: none;
    border: 1.5px solid #eee;
    border-radius: 4px;
    color: #eee;
    cursor: pointer;
    padding: 0.3rem 0.8rem;
    font-size: 0.9rem;
    transition: background-color 0.3s, color 0.3s;
    user-select: none;
  }

  .btn-darkmode:hover {
    background-color: #eee;
    color: #222;
  }

  /* Profile icon */
  .profile-icon {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    overflow: hidden;
    border: 1.5px solid #eee;
    cursor: pointer;
  }

  .profile-icon img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  /* Sidebar menu */
  .sidebar-menu {
    position: fixed;
    top: 0; left: 0;
    height: 100vh;
    width: 250px;
    background-color: #222;
    color: #eee;
    padding: 2rem 1rem;
    transform: translateX(-260px);
    transition: transform 0.3s ease;
    overflow-y: auto;
    z-index: 1000;
  }

  .sidebar-menu.active {
    transform: translateX(0);
  }

  .sidebar-menu ul {
    list-style: none;
    padding: 0;
  }

  .sidebar-menu li {
    margin-bottom: 1rem;
  }

  .sidebar-menu a {
    color: #eee;
    text-decoration: none;
    font-weight: 600;
  }

  .sidebar-menu a:hover {
    text-decoration: underline;
  }

  /* Light mode styles */
  body.light-mode {
    background-color: #f4f4f4;
    color: #222;
  }

  body.light-mode .navbar {
    background-color: #eee;
    color: #222;
  }

  body.light-mode .btn-darkmode {
    border-color: #222;
    color: #222;
  }

  body.light-mode .btn-darkmode:hover {
    background-color: #222;
    color: #eee;
  }

  body.light-mode .profile-icon {
    border-color: #222;
  }

  body.light-mode .sidebar-menu {
    background-color: #eee;
    color: #222;
  }

  body.light-mode .sidebar-menu a {
    color: #222;
  }

  /* Responsive */
  @media (min-width: 768px) {
    .sidebar-menu {
      width: 300px;
    }
  }
  
</style>

<header>
  <nav class="navbar">
    <div class="logo-container" id="btnToggleMenu" aria-label="Toggle Menu">
    <button id="btnToggleMenu" class="mobile-menu-toggle"><i class="fa-solid fa-bars"></i> </button>
      <img src="{{ asset('isi/icons_fotrack/fotrack.png') }}" alt="FOTrack Logo" />
      <span>Field Operation Track System</span>
    </div>

    <div class="actions">

      <div class="profile-icon" title="{{ $user->name ?? 'User Profile' }}">
        @if(isset($user->profile_photo_url))
          <img src="{{ $user->profile_photo_url }}" alt="Profile Photo" />
        @else
          <img src="{{ asset('default-profile.png') }}" alt="Default Profile Icon" />
        @endif
      </div>
    </div>
  </nav>

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

<script>
  document.getElementById('btnToggleMenu').addEventListener('click', function() {
    const menu = document.getElementById('toggleMobileMenu');
    if (menu.style.display === 'block' || menu.style.display === '') {
      menu.style.display = 'none';
    } else {
      menu.style.display = 'block';
    }
  });

  const btnToggleMenu = document.getElementById('btnToggleMenu');
  const sidebarMenu = document.getElementById('sidebarMenu');

  btnToggleMenu.addEventListener('click', () => {
    sidebarMenu.classList.toggle('active');
  });

  // Theme toggle global
  const btnDarkMode = document.getElementById('btnToggleDarkMode');
  const body = document.body;

  function setMode(mode) {
    if (mode === 'light') {
      body.classList.add('light-mode');
      btnDarkMode.textContent = 'Light Mode';
    } else {
      body.classList.remove('light-mode');
      btnDarkMode.textContent = 'Dark Mode';
    }
    localStorage.setItem('fotrack-theme', mode);
  }

  // Load saved theme dari localStorage, default dark
  const savedTheme = localStorage.getItem('fotrack-theme') || 'dark';
  setMode(savedTheme);

  btnDarkMode.addEventListener('click', () => {
    if (body.classList.contains('light-mode')) {
      setMode('dark');
    } else {
      setMode('light');
    }
  });
</script>
