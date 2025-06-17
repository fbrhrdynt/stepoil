@extends('layouts.app')

@section('content')
@php
    $projects = \App\Models\Project::select('id_project', 'operator_name', 'drillingrig')->get();
@endphp

<div class="xCPtuxM4_gihvpPwv9bX t6gkcSf0Bt4MLItXvDJ_ Nu4HUn5EQpnNJ1itNkrd iHPddplqYvrN6qWgvntn AqVNvLG_H6VHhym2yKMp">
<div class="NM7Z1HBVjN_86WhEcXan mveJTCIb2WII7J4sY22F pXhVRBC8yaUNllmIWxln qUWbS_LTZujDB4XCd11V _Ybd3WwuTVljUT4vEaM3 IvHclGgvMLtYg_ow0uba fzhbbDQ686T8arwvi_bJ _fGhMnSfYmaGrv7DvZ00 _1jTZ8KXRZul60S6czNi">
<div class="container mx-auto px-4 sm:px-8">
    <div class="py-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold leading-tight">Edit Accounts</h2>
        </div>

        <form id="editAccountForm" method="POST" action="{{ route('accounts.update', $user->id_user) }}">
            @csrf
            @method('PUT')

            <div class="hD0sTTDgbxakubcHVW2X xCPtuxM4_gihvpPwv9bX iHPddplqYvrN6qWgvntn AqVNvLG_H6VHhym2yKMp">
                <div>
                    <label for="employee_id" class="TR_P65x9ie7j6uxFo_Cs _Vb9igHms0hI1PQcvp_S">Employee ID</label>
                    <input type="text" name="employee_id" id="employee_id" class="custom-input bg-gray-100 cursor-not-allowed" value="{{ $user->employee_id }}" readonly>
                    <small class="text-sm text-red-600 mt-1 block">
                        <i class="fa-solid fa-ban mr-1"></i> Employee ID cannot be changed.
                    </small>
                </div>
                <div>
                    <label for="employee_name" class="TR_P65x9ie7j6uxFo_Cs _Vb9igHms0hI1PQcvp_S">Employee Name</label>
                    <input type="text" name="employee_name" id="employee_name" class="custom-input" value="{{ $user->employee_name }}" required>
                </div>

                <div>
                    <label for="email" class="TR_P65x9ie7j6uxFo_Cs _Vb9igHms0hI1PQcvp_S">Email</label>
                    <input type="email" name="email" id="email" class="custom-input" value="{{ $user->email }}">
                </div>

                <div>
                    <label for="kode_login" class="TR_P65x9ie7j6uxFo_Cs _Vb9igHms0hI1PQcvp_S">Username</label>
                    <input type="text" name="kode_login" id="kode_login" class="custom-input bg-gray-100 cursor-not-allowed" value="{{ $user->kode_login }}" readonly>
                    <small id="usernameFeedback" class="text-sm mt-1 block text-gray-500">
                        Username must be unique.
                    </small>
                </div>

                <div>
                    <label for="level" class="TR_P65x9ie7j6uxFo_Cs _Vb9igHms0hI1PQcvp_S">Level</label>
                    <select name="level" id="level" class="custom-input" required>
                        <option value="Supervisor" @selected($user->level == 'Supervisor')>Supervisor</option>
                        <option value="Operator" @selected($user->level == 'Operator')>Operator</option>
                        <option value="Staff" @selected($user->level == 'Staff')>Staff</option>
                    </select>
                </div>

                <div>
                    <label for="id_project" class="TR_P65x9ie7j6uxFo_Cs _Vb9igHms0hI1PQcvp_S">Project Assignment</label>
                    <select name="id_project" id="id_project"
                            class="select2 _Vb9igHms0hI1PQcvp_S t6gkcSf0Bt4MLItXvDJ_" required>
                    </select>
                </div>

                <!-- ✅ TOGGLE -->
                <div class="mt-4">
                    <label class="TR_P65x9ie7j6uxFo_Cs _Vb9igHms0hI1PQcvp_S">Change Password?</label>
                    <label class="flex items-center gap-4">
                        <input type="checkbox" id="changePassword" class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-300 rounded-full peer-checked:bg-blue-600 relative">
                            <div class="w-5 h-5 bg-white rounded-full absolute left-0.5 top-0.5 transition-transform peer-checked:translate-x-full"></div>
                        </div>
                        <span class="text-sm">Change Password</span>
                    </label>
                </div>
                <br>
                <!-- ✅ PASSWORD FIELDS -->
                <div id="passwordFields" class="hidden mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="pass_login" class="TR_P65x9ie7j6uxFo_Cs _Vb9igHms0hI1PQcvp_S">New Password</label>
                        <div class="relative">
                            <!-- New Password -->
                            <input type="password" name="pass_login" id="pass_login"
                                class="custom-input"
                                placeholder="Enter New Password"
                                oninput="validatePassword()">
                            <span class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer" onclick="togglePassword('pass_login')">
                                <i class="fa-solid fa-eye text-gray-600" id="togglePass_login"></i>
                            </span>
                        </div>
                        <small id="passwordFeedback" class="text-sm mt-1 block text-gray-500">
                            Password must contain at least one uppercase, one lowercase, one digit, and one special character.
                        </small>
                    </div>

                    <div>
                        <label for="confirm_password" class="TR_P65x9ie7j6uxFo_Cs _Vb9igHms0hI1PQcvp_S">Confirm Password</label>
                        <div class="relative">
                            <!-- Confirm Password -->
                            <input type="password" name="confirm_password" id="confirm_password"
                                class="custom-input"
                                placeholder="Re-type Password"
                                oninput="validateConfirmPassword()">

                            <span class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer" onclick="togglePassword('confirm_password')">
                                <i class="fa-solid fa-eye text-gray-600" id="toggleConfirm_password"></i>
                            </span>
                        </div>
                        <small id="confirmPasswordFeedback" class="text-sm mt-1 block text-gray-500">
                            Make sure it matches the password above.
                        </small>
                    </div>
                </div>

            </div>

            <div class="Q_jg_EPdNf9eDMn1mLI2 UYOSZJ1_pv3B5nt1ujCP rvdRhGyExrNYTA6euxsF SQf297smyJVNzzOO3iQL xr7CqaTHxTvDOrwAH2SW mt-4">
                <button type="submit"
                        class="_k0lTW0vvzboctTxDi2R custom-btn-submit font-semibold px-4 py-2 rounded-lg w-full">
                    <i class="fa-solid fa-save"></i> &nbsp; Save Account
                </button>
                <a href="{{ route('accounts.index') }}"
                   class="_k0lTW0vvzboctTxDi2R bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-4 py-2 rounded-lg w-full text-center block mt-2">
                    Cancel
                </a>
            </div>
        </form>
        @section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toggle = document.getElementById("changePassword");
        const passwordFields = document.getElementById("passwordFields");

        toggle?.addEventListener("change", function () {
            if (this.checked) {
                passwordFields.classList.remove("hidden");
            } else {
                passwordFields.classList.add("hidden");
            }
        });

        // Select2 fix
        const level = document.getElementById('level');
        const idProject = $('#id_project');
        const selectedProject = '{{ $user->id_project }}';
        const projects = @json($projects);

        function updateProjectOptions(levelVal) {
            idProject.empty();
            const options = [{ id: '', text: '-- Select Project --' }];

            if (levelVal === 'Supervisor') {
                options.push({ id: 0, text: 'ALL Projects' });
            }

            projects.forEach(p => {
                options.push({
                    id: p.id_project,
                    text: `${p.operator_name} - ${p.drillingrig}`
                });
            });

            idProject.select2({
                data: options,
                width: '100%',
                placeholder: "-- Select Project --",
                allowClear: true
            });

            idProject.val(selectedProject).trigger('change');
        }

        updateProjectOptions(level.value);

        level.addEventListener('change', function () {
            updateProjectOptions(this.value);
        });
    });
</script>
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
            feedback.textContent = "Strong password ✔️";
            feedback.style.color = '#22c55e'; // green text
        } else {
            feedback.textContent = "Password must contain at least one uppercase, one lowercase, one digit, and one special character.";
            feedback.style.color = '#ef4444'; // red text
        }

        validateConfirmPassword(); // Trigger confirm match check too
    }

    function validateConfirmPassword() {
        const password = document.getElementById('pass_login');
        const confirmPassword = document.getElementById('confirm_password');
        const feedback = document.getElementById('confirmPasswordFeedback');

        if (confirmPassword.value === password.value && confirmPassword.value !== '') {
            feedback.textContent = "Passwords match ✔️";
            feedback.style.color = '#22c55e';
        } else {
            feedback.textContent = "Passwords do not match.";
            feedback.style.color = '#ef4444';
        }
    }
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const kodeLoginInput = document.getElementById('kode_login');
    const feedback = document.getElementById('usernameFeedback');
    const userId = "{{ $user->id_user }}";

    let debounceTimeout = null;

    kodeLoginInput.addEventListener('input', function () {
        clearTimeout(debounceTimeout);

        const username = this.value.trim();
        if (!username) {
            feedback.textContent = "Username cannot be empty.";
            feedback.style.color = "#ef4444"; // merah
            return;
        }

        debounceTimeout = setTimeout(() => {
            fetch(`{{ route('accounts.checkUsername') }}?kode_login=${username}&id=${userId}`)
                .then(res => res.json())
                .then(data => {
                    if (data.exists) {
                        feedback.textContent = "❌ Username is already taken.";
                        feedback.style.color = "#ef4444";
                        kodeLoginInput.classList.add("border-red-500");
                        kodeLoginInput.classList.remove("border-green-500");
                    } else {
                        feedback.textContent = "✅ Username is available.";
                        feedback.style.color = "#22c55e";
                        kodeLoginInput.classList.add("border-green-500");
                        kodeLoginInput.classList.remove("border-red-500");
                    }
                })
                .catch(() => {
                    feedback.textContent = "⚠️ Could not verify username.";
                    feedback.style.color = "#ef4444";
                });
        }, 400); // debounce
    });
});
</script>


<script>
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById('editAccountForm');
    const submitBtn = form.querySelector("button[type='submit']");

    if (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            const formData = new FormData(form);
            formData.append('_method', 'PUT');

            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Saving...';

            fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: data.message,
                        timer: 2000,
                        showConfirmButton: false,
                    }).then(() => {
                        window.location.href = "{{ route('accounts.index') }}";
                    });
                } else {
                    if (data.errors) {
                        const messages = Object.values(data.errors)
                            .map(msgArr => msgArr.join(' '))
                            .join('\n');
                        showSweetAlert('Validation Error', messages, 'error');
                    } else {
                        showSweetAlert('Failed', data.message || "Update failed.", 'error');
                    }
                }
            })
            .catch(err => {
                console.error("Fetch error:", err);
                showSweetAlert("Error", "Something went wrong!", "error");
            })
            .finally(() => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="fa fa-save"></i> &nbsp; Save Account';
            });
        });
    }

    // ✅ Jalankan setelah halaman sudah di-redirect ke index
    const successMessage = localStorage.getItem('accountSuccess');
    if (successMessage) {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: successMessage,
            timer: 3000,
            showConfirmButton: false,
            toast: true,
            position: 'top-end'
        });
        localStorage.removeItem('accountSuccess');
    }

    // ✅ SweetAlert helper (tidak perlu dipanggil kalau langsung Swal.fire seperti di atas)
    function showSweetAlert(title, message, icon = 'success') {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: data.message,
            timer: 2000,
            showConfirmButton: false,
            toast: true,
            position: 'top-end',
            willClose: () => {
                window.location.href = "{{ route('accounts.index') }}";
            }
        });
    }
});
</script>


@endsection

</div>
    </div>
</div>
</div>
</section>
@endsection
