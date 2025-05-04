@php
    $projects = \App\Models\Project::select('id_project', 'operator_name', 'drillingrig')->get();
@endphp

<!-- Add Account Modal -->
<div id="addAccountModal"
     tabindex="-1"
     aria-hidden="true"
     class="_LPVUrp9Uina5fcERqWC TYmpscr1PwuC1dpYXDpM ZjE1E_5ejL_PlLNIq3MM uQByIGHtHssL9HoPQXR4 Jq3rRDG6Hsr3eAZ0KJeH _SmdlCf6eUKB_V9S5IDj _dZO1Z7EjPZTzv7NappG D5X3kHheOzrTNzgpkKYX t6gkcSf0Bt4MLItXvDJ_ Q_jg_EPdNf9eDMn1mLI2 Nm7xMnguzOx6J5Ao7yCU _lTTGxW9MVI40FyDCtmr LQrvJzHhtGuotyv_EF_N k6hbvxXxe_du942IR0vX fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center">

    <div class="ahOqFrhzLjivRe8a1kX_ D5X3kHheOzrTNzgpkKYX t6gkcSf0Bt4MLItXvDJ_ M1YFStHQ2scEHZzvz7XX _wYiJGbRZyFZeCc8y7Sf">
        <div class="ahOqFrhzLjivRe8a1kX_ mveJTCIb2WII7J4sY22F _Ybd3WwuTVljUT4vEaM3 _wYiJGbRZyFZeCc8y7Sf mngKhi_Rv06PF57lblDI _1jTZ8KXRZul60S6czNi _aDtgllJkTzUlILozHgX">
            <div class="hD0sTTDgbxakubcHVW2X YRrCJSr_j5nopfm4duUc Q_jg_EPdNf9eDMn1mLI2 sJNGKHxFYdN5Nzml5J2j zQeL_bQRwh9WGEnvS5ug N4SFnsqiVKm1oFHmSTyG">
                <h3 class="y0nOgdpiqOUaFDbjAxwD yM_AorRf2jSON3pDsdrz __9sbu0yrzdhGIkLWNXl OyABRrnTV_kvHV7dJ0uE">Add New Account</h3>
                <button type="button"
                        class="zjZIaeYZzHaaBqxD5KzF _k0lTW0vvzboctTxDi2R Q_jg_EPdNf9eDMn1mLI2 mveJTCIb2WII7J4sY22F mW4LfSTbez3WHPeTDguY Z4DH5a4vmjReSFRBpPgz c8dCx6gnV43hTOLV6ks5 _JmTNv5EiHqK2A1jcQSf _7KA5gD55t2lxf9Jkj20 ZnBoTVi7VOJdCLSSU62n RzANcaqunVvlLrO6_tal dMTOiA3mf3FTjlHu6DqW"
                        data-modal-toggle="addAccountModal">
                    <svg class="rxe6apEJoEk8r75xaVNG ADSeKHR1DvUUA48Chci_" xmlns="http://www.w3.org/2000/svg" width="24"
                         height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18 17.94 6M18 18 6.06 6"></path>
                    </svg>
                    <span class="_DVAfiyo21kM68EUVzEQ">Close modal</span>
                </button>
            </div>

            <form id="addAccountForm" method="POST" action="{{ route('accounts.store') }}">
                @csrf
                <div class="hD0sTTDgbxakubcHVW2X xCPtuxM4_gihvpPwv9bX iHPddplqYvrN6qWgvntn AqVNvLG_H6VHhym2yKMp">
                    <div>
                        <label for="employee_id" class="TR_P65x9ie7j6uxFo_Cs _Vb9igHms0hI1PQcvp_S">Employee ID</label>
                        <input type="text" name="employee_id" id="employee_id" class="_Vb9igHms0hI1PQcvp_S" required>
                        <small class="text-sm text-gray-500 mt-1 block">
                            <i class="fa-solid fa-circle-info text-blue-500 mr-1"></i>
                            This will be used as the login username.
                        </small>
                    </div>

                    <div>
                        <label for="employee_name" class="TR_P65x9ie7j6uxFo_Cs _Vb9igHms0hI1PQcvp_S">Employee Name</label>
                        <input type="text" name="employee_name" id="employee_name" class="_Vb9igHms0hI1PQcvp_S" required>
                    </div>

                    <div>
                        <label for="email" class="TR_P65x9ie7j6uxFo_Cs _Vb9igHms0hI1PQcvp_S">Email</label>
                        <input type="email" name="email" id="email" class="_Vb9igHms0hI1PQcvp_S">
                    </div>

                    <div>
                        <label for="kode_login" class="TR_P65x9ie7j6uxFo_Cs _Vb9igHms0hI1PQcvp_S">Username</label>
                        <input type="text" name="kode_login" id="kode_login" class="_Vb9igHms0hI1PQcvp_S" required>
                    </div>

                    <div>
                        <label for="pass_login" class="TR_P65x9ie7j6uxFo_Cs _Vb9igHms0hI1PQcvp_S c8dCx6gnV43hTOLV6ks5 ezMFUVl744lvw6ht0lFe __9sbu0yrzdhGIkLWNXl OyABRrnTV_kvHV7dJ0uE">Password</label>
                        <div class="relative">
                            <input type="password" name="pass_login" id="pass_login"
                                class="_Vb9igHms0hI1PQcvp_S t6gkcSf0Bt4MLItXvDJ_ mveJTCIb2WII7J4sY22F pXhVRBC8yaUNllmIWxln vpDN1VEJLu5FmLkr5WCk jtAJHOc7mn7b4IKRO59D olxDi3yL6f0gpdsOFDhx c8dCx6gnV43hTOLV6ks5 __9sbu0yrzdhGIkLWNXl g_BHforHBdFj0wG489Gm IBMq7Y_ATQyy_WCDKR_v Mmx5lX7HVdrWCgh3EpTP jqg6J89cvxmDiFpnV56r OyABRrnTV_kvHV7dJ0uE B6xjPKbspU6m_EWVKPv2 q6szSHqGtBufkToFe_s5 KpCMWe32PQyrSFbZVput border"
                                placeholder="Enter Password" required oninput="validatePassword()">
                            <span class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer" onclick="togglePassword('pass_login')">
                                <i class="fa-solid fa-eye text-gray-600" id="togglePass_login"></i>
                            </span>
                        </div>
                        <small id="passwordFeedback" class="text-sm mt-1 block">
                            Password must contain at least one uppercase, one lowercase, one digit, and one special character (. , ! @ $)
                        </small>
                    </div>

                    <div>
                        <label for="confirm_password" class="TR_P65x9ie7j6uxFo_Cs _Vb9igHms0hI1PQcvp_S c8dCx6gnV43hTOLV6ks5 ezMFUVl744lvw6ht0lFe __9sbu0yrzdhGIkLWNXl OyABRrnTV_kvHV7dJ0uE">Confirm Password</label>
                        <div class="relative">
                            <input type="password" name="confirm_password" id="confirm_password"
                                class="_Vb9igHms0hI1PQcvp_S t6gkcSf0Bt4MLItXvDJ_ mveJTCIb2WII7J4sY22F pXhVRBC8yaUNllmIWxln vpDN1VEJLu5FmLkr5WCk jtAJHOc7mn7b4IKRO59D olxDi3yL6f0gpdsOFDhx c8dCx6gnV43hTOLV6ks5 __9sbu0yrzdhGIkLWNXl g_BHforHBdFj0wG489Gm IBMq7Y_ATQyy_WCDKR_v Mmx5lX7HVdrWCgh3EpTP jqg6J89cvxmDiFpnV56r OyABRrnTV_kvHV7dJ0uE B6xjPKbspU6m_EWVKPv2 q6szSHqGtBufkToFe_s5 KpCMWe32PQyrSFbZVput border"
                                placeholder="Re-type Password" required oninput="validateConfirmPassword()">
                            <span class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer" onclick="togglePassword('confirm_password')">
                                <i class="fa-solid fa-eye text-gray-600" id="toggleConfirm_password"></i>
                            </span>
                        </div>
                        <small id="confirmPasswordFeedback" class="text-sm mt-1 block">
                            Make sure it matches the password above.
                        </small>
                    </div>


                    <div>
                        <label for="level" class="TR_P65x9ie7j6uxFo_Cs _Vb9igHms0hI1PQcvp_S">Level</label>
                        <select name="level" id="level" class="_Vb9igHms0hI1PQcvp_S" required>
                            <option value="">-- Select Level --</option>
                            <option value="Supervisor">Supervisor</option>
                            <option value="Operator">Operator</option>
                            <option value="Staff">Staff</option>
                        </select>
                    </div>

                    <div>
                        <label for="id_project" class="TR_P65x9ie7j6uxFo_Cs _Vb9igHms0hI1PQcvp_S">Project Assignment</label>
                        <select name="id_project" id="id_project"
                                class="select2 _Vb9igHms0hI1PQcvp_S t6gkcSf0Bt4MLItXvDJ_" required>
                            <option value="">-- Select Project --</option>
                            <option value="0" class="all-project-option">ALL Projects</option>
                            @foreach($projects as $project)
                                <option value="{{ $project->id_project }}" class="text-red-500">
                                    {{ $project->operator_name }} - {{ $project->drillingrig }}
                                </option>
                            @endforeach

                        </select>
                    </div>
                </div>

                <div class="Q_jg_EPdNf9eDMn1mLI2 UYOSZJ1_pv3B5nt1ujCP rvdRhGyExrNYTA6euxsF SQf297smyJVNzzOO3iQL xr7CqaTHxTvDOrwAH2SW">
                    <button type="submit"
                            class="_k0lTW0vvzboctTxDi2R t6gkcSf0Bt4MLItXvDJ_ Q_jg_EPdNf9eDMn1mLI2 Nm7xMnguzOx6J5Ao7yCU bg-blue-700 hover:bg-blue-400 text-white font-semibold px-4 py-2 rounded-lg w-full">
                        <i class="fa-solid fa-save"></i> &nbsp; Add Account
                    </button>

                    <button data-modal-hide="addAccountModal" type="button"
                            class="_k0lTW0vvzboctTxDi2R t6gkcSf0Bt4MLItXvDJ_ Q_jg_EPdNf9eDMn1mLI2 Nm7xMnguzOx6J5Ao7yCU bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-4 py-2 rounded-lg w-full">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function togglePassword(fieldId) {
        const input = document.getElementById(fieldId);
        const icon = document.getElementById('toggle' + fieldId.charAt(0).toUpperCase() + fieldId.slice(1));
        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }

    function validatePassword() {
        const password = document.getElementById('pass_login');
        const feedback = document.getElementById('passwordFeedback');
        const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\.\!\@\$\#\%\&\*\^\-])[A-Za-z\d\.\!\@\$\#\%\&\*\^\-]{6,}$/;

        if (regex.test(password.value)) {
            password.classList.remove('border-red-500');
            password.classList.add('border-green-500');
            feedback.textContent = "Strong password ✔️";
            feedback.classList.remove('text-red-500');
            feedback.classList.add('text-green-600');
        } else {
            password.classList.remove('border-green-500');
            password.classList.add('border-red-500');
            feedback.textContent = "Password must contain at least one uppercase, one lowercase, one digit, and one special character (. , ! @ $)";
            feedback.classList.remove('text-green-600');
            feedback.classList.add('text-red-500');
        }

        validateConfirmPassword();
    }

    function validateConfirmPassword() {
        const password = document.getElementById('pass_login');
        const confirmPassword = document.getElementById('confirm_password');
        const feedback = document.getElementById('confirmPasswordFeedback');

        if (confirmPassword.value === password.value && confirmPassword.value !== '') {
            confirmPassword.classList.remove('border-red-500');
            confirmPassword.classList.add('border-green-500');
            feedback.textContent = "Passwords match ✔️";
            feedback.classList.remove('text-red-500');
            feedback.classList.add('text-green-600');
        } else {
            confirmPassword.classList.remove('border-green-500');
            confirmPassword.classList.add('border-red-500');
            feedback.textContent = "Passwords do not match.";
            feedback.classList.remove('text-green-600');
            feedback.classList.add('text-red-500');
        }
    }
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const level = document.getElementById('level');
        const idProject = $('#id_project');

        const allProjectsOption = new Option("ALL Projects", "0", false, false);
        const placeholderOption = new Option("-- Select Project --", "", true, true);
        const projectOptions = [
            @foreach($projects as $project)
                { id: '{{ $project->id_project }}', 
                    text: '{{ $project->operator_name }} - {{ $project->drillingrig }}' },
            @endforeach
        ];

        function initSelect2(options) {
            idProject.empty(); // clear options
            idProject.select2({
                data: options,
                placeholder: "-- Select Project --",
                width: '100%',
                dropdownAutoWidth: true,
                allowClear: true
            });
        }

        function updateProjectOptionsByLevel(levelVal) {
            let options = [{ id: '', text: '-- Select Project --' }];

            if (levelVal === 'Supervisor') {
                options.push({ id: '0', text: 'ALL Projects' });
            }

            options = options.concat(projectOptions);
            initSelect2(options);
        }

        // Init first
        updateProjectOptionsByLevel(level.value);

        // On change level
        level.addEventListener('change', function () {
            updateProjectOptionsByLevel(this.value);
        });
    });
</script>