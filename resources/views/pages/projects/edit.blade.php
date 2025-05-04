@extends('layouts.app')

@section('content')
<div class="xCPtuxM4_gihvpPwv9bX t6gkcSf0Bt4MLItXvDJ_ Nu4HUn5EQpnNJ1itNkrd iHPddplqYvrN6qWgvntn AqVNvLG_H6VHhym2yKMp">
<div class="NM7Z1HBVjN_86WhEcXan mveJTCIb2WII7J4sY22F pXhVRBC8yaUNllmIWxln qUWbS_LTZujDB4XCd11V _Ybd3WwuTVljUT4vEaM3 IvHclGgvMLtYg_ow0uba fzhbbDQ686T8arwvi_bJ _fGhMnSfYmaGrv7DvZ00 _1jTZ8KXRZul60S6czNi">
<div class="container mx-auto px-4 sm:px-8">
    <div class="py-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold leading-tight">Edit Project</h2>
        </div>
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('projects.update', $project->id_project) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
            <div class="hD0sTTDgbxakubcHVW2X xCPtuxM4_gihvpPwv9bX iHPddplqYvrN6qWgvntn AqVNvLG_H6VHhym2yKMp">
                <div>
                <label for="contract" class="TR_P65x9ie7j6uxFo_Cs _Vb9igHms0hI1PQcvp_S c8dCx6gnV43hTOLV6ks5 ezMFUVl744lvw6ht0lFe __9sbu0yrzdhGIkLWNXl OyABRrnTV_kvHV7dJ0uE">Contract</label>
                <input type="text" name="contract" id="contract" class="_Vb9igHms0hI1PQcvp_S t6gkcSf0Bt4MLItXvDJ_ mveJTCIb2WII7J4sY22F pXhVRBC8yaUNllmIWxln vpDN1VEJLu5FmLkr5WCk jtAJHOc7mn7b4IKRO59D olxDi3yL6f0gpdsOFDhx c8dCx6gnV43hTOLV6ks5 __9sbu0yrzdhGIkLWNXl g_BHforHBdFj0wG489Gm IBMq7Y_ATQyy_WCDKR_v Mmx5lX7HVdrWCgh3EpTP jqg6J89cvxmDiFpnV56r OyABRrnTV_kvHV7dJ0uE B6xjPKbspU6m_EWVKPv2 q6szSHqGtBufkToFe_s5 KpCMWe32PQyrSFbZVput" placeholder="Contract" value="{{ $project->contract }}" required>
                <small class="flex items-center gap-1 text-red-600 text-sm mt-1">
                    <i class="fa-solid fa-ban text-red-500"></i> This field cannot be modified.
                </small>    
            </div>

                <div>
                <label for="operator_name" class="TR_P65x9ie7j6uxFo_Cs _Vb9igHms0hI1PQcvp_S c8dCx6gnV43hTOLV6ks5 ezMFUVl744lvw6ht0lFe __9sbu0yrzdhGIkLWNXl OyABRrnTV_kvHV7dJ0uE">Operator Name</label>
                <input type="text" name="operator_name" id="operator_name" class="_Vb9igHms0hI1PQcvp_S t6gkcSf0Bt4MLItXvDJ_ mveJTCIb2WII7J4sY22F pXhVRBC8yaUNllmIWxln vpDN1VEJLu5FmLkr5WCk jtAJHOc7mn7b4IKRO59D olxDi3yL6f0gpdsOFDhx c8dCx6gnV43hTOLV6ks5 __9sbu0yrzdhGIkLWNXl g_BHforHBdFj0wG489Gm IBMq7Y_ATQyy_WCDKR_v Mmx5lX7HVdrWCgh3EpTP jqg6J89cvxmDiFpnV56r OyABRrnTV_kvHV7dJ0uE B6xjPKbspU6m_EWVKPv2 q6szSHqGtBufkToFe_s5 KpCMWe32PQyrSFbZVput" placeholder="Operator Name" value="{{ $project->operator_name }}" required>
                </div>

                <div>
                <label for="drillingrig" class="TR_P65x9ie7j6uxFo_Cs _Vb9igHms0hI1PQcvp_S c8dCx6gnV43hTOLV6ks5 ezMFUVl744lvw6ht0lFe __9sbu0yrzdhGIkLWNXl OyABRrnTV_kvHV7dJ0uE">Drilling Rig</label>
                <input type="text" name="drillingrig" id="drillingrig" class="_Vb9igHms0hI1PQcvp_S t6gkcSf0Bt4MLItXvDJ_ mveJTCIb2WII7J4sY22F pXhVRBC8yaUNllmIWxln vpDN1VEJLu5FmLkr5WCk jtAJHOc7mn7b4IKRO59D olxDi3yL6f0gpdsOFDhx c8dCx6gnV43hTOLV6ks5 __9sbu0yrzdhGIkLWNXl g_BHforHBdFj0wG489Gm IBMq7Y_ATQyy_WCDKR_v Mmx5lX7HVdrWCgh3EpTP jqg6J89cvxmDiFpnV56r OyABRrnTV_kvHV7dJ0uE B6xjPKbspU6m_EWVKPv2 q6szSHqGtBufkToFe_s5 KpCMWe32PQyrSFbZVput" placeholder="Drilling Rig" value="{{ $project->drillingrig }}" required>
                </div>

                <div>
                <label for="wellname" class="TR_P65x9ie7j6uxFo_Cs _Vb9igHms0hI1PQcvp_S c8dCx6gnV43hTOLV6ks5 ezMFUVl744lvw6ht0lFe __9sbu0yrzdhGIkLWNXl OyABRrnTV_kvHV7dJ0uE">Well Name</label>
                <input type="text" name="wellname" id="wellname" class="_Vb9igHms0hI1PQcvp_S t6gkcSf0Bt4MLItXvDJ_ mveJTCIb2WII7J4sY22F pXhVRBC8yaUNllmIWxln vpDN1VEJLu5FmLkr5WCk jtAJHOc7mn7b4IKRO59D olxDi3yL6f0gpdsOFDhx c8dCx6gnV43hTOLV6ks5 __9sbu0yrzdhGIkLWNXl g_BHforHBdFj0wG489Gm IBMq7Y_ATQyy_WCDKR_v Mmx5lX7HVdrWCgh3EpTP jqg6J89cvxmDiFpnV56r OyABRrnTV_kvHV7dJ0uE B6xjPKbspU6m_EWVKPv2 q6szSHqGtBufkToFe_s5 KpCMWe32PQyrSFbZVput" placeholder="Well Name" value="{{ $project->wellname }}" required>
                </div>

                <div>
                <label for="kodeakses" class="TR_P65x9ie7j6uxFo_Cs _Vb9igHms0hI1PQcvp_S c8dCx6gnV43hTOLV6ks5 ezMFUVl744lvw6ht0lFe __9sbu0yrzdhGIkLWNXl OyABRrnTV_kvHV7dJ0uE">Access Code</label>
                <input type="text" name="kodeakses" id="kodeakses" value="{{ rand(10000,99999) }}" readonly class="_Vb9igHms0hI1PQcvp_S t6gkcSf0Bt4MLItXvDJ_ mveJTCIb2WII7J4sY22F pXhVRBC8yaUNllmIWxln vpDN1VEJLu5FmLkr5WCk jtAJHOc7mn7b4IKRO59D olxDi3yL6f0gpdsOFDhx c8dCx6gnV43hTOLV6ks5 __9sbu0yrzdhGIkLWNXl g_BHforHBdFj0wG489Gm IBMq7Y_ATQyy_WCDKR_v Mmx5lX7HVdrWCgh3EpTP jqg6J89cvxmDiFpnV56r OyABRrnTV_kvHV7dJ0uE B6xjPKbspU6m_EWVKPv2 q6szSHqGtBufkToFe_s5 KpCMWe32PQyrSFbZVput" value="{{ $project->kodeakses }}" placeholder="Access Code">
                <small class="flex items-center gap-1 text-red-600 text-sm mt-1">
                    <i class="fa-solid fa-ban text-red-500"></i> This field cannot be modified.
                </small>    
                </div>

                <div>
                <label for="wellname" class="TR_P65x9ie7j6uxFo_Cs _Vb9igHms0hI1PQcvp_S c8dCx6gnV43hTOLV6ks5 ezMFUVl744lvw6ht0lFe __9sbu0yrzdhGIkLWNXl OyABRrnTV_kvHV7dJ0uE">Current Company Logo</label>
                @if($project->logo)
                    <div class="mt-2">
                        <img src="{{ asset('isi/logos/' . $project->logo) }}" alt="Logo Preview" class="w-[150px] h-[150px] object-contain rounded border border-gray-300" />
                    </div>
                    @endif
                </div>

                <div class="wwofGIyK_H_z3Xjelq8G">
                    <label for="logo" class="TR_P65x9ie7j6uxFo_Cs _Vb9igHms0hI1PQcvp_S c8dCx6gnV43hTOLV6ks5 ezMFUVl744lvw6ht0lFe __9sbu0yrzdhGIkLWNXl OyABRrnTV_kvHV7dJ0uE">Update Company Logo (JPG, JPEG, PNG)</label>
                    
                    <small class="text-sm text-gray-500 block mt-1">
                            <i class="fa-solid fa-circle-info text-blue-500 mr-1"></i> If logo is not changed, you can ignore this field.
                    </small>
                    <div class="YRrCJSr_j5nopfm4duUc t6gkcSf0Bt4MLItXvDJ_ Q_jg_EPdNf9eDMn1mLI2 Nm7xMnguzOx6J5Ao7yCU">
                        <label for="logo-upload" class="YRrCJSr_j5nopfm4duUc lF8IBOHHY_0eQ2mr5ba1 t6gkcSf0Bt4MLItXvDJ_ SA5DoMHfwOFtY4h_qzuM e8VqoQNK0mbkRFDL3LMV Q_jg_EPdNf9eDMn1mLI2 Nm7xMnguzOx6J5Ao7yCU mveJTCIb2WII7J4sY22F b0rXX23llDSn6PZwxAyx olKvC3XA85ljIesOcoAC">
                            <div class="YRrCJSr_j5nopfm4duUc e8VqoQNK0mbkRFDL3LMV Q_jg_EPdNf9eDMn1mLI2 Nm7xMnguzOx6J5Ao7yCU gyULXFQVgjg7SZF8X3HH">
                                <svg aria-hidden="true" class="_hpGev6RXFut0Jm_iRgf Mln3CkDzLcoVQAC3Uqsd hlT3pgfpx11BUFMWNdhc" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                </svg>
                                <p class="TR_P65x9ie7j6uxFo_Cs">Click to upload or drag and drop</p>
                                <p class="gMXmdpOPfqG_3CKkL0VD">PNG, JPG or JPEG (MAX. 800x400px)</p>
                            </div>
                            <input id="logo-upload" name="logo" type="file" accept="image/png,image/jpeg,image/jpg" class="_SmdlCf6eUKB_V9S5IDj max-w-[300px] h-[200px] mx-auto w-full p-4 flex flex-col justify-center items-center border-2 border-dashed border-gray-300 rounded-lg cursor-pointer hover:bg-gray-100 transition" onchange="previewLogo(event)">
                        </label>
                    </div>
                    

                    <!-- Preview -->
                    <div class="mt-2">
                        <img id="logo-preview" src="#" alt="Preview" class="hidden w-[150px] h-[150px] object-contain rounded border border-gray-300" />
                    </div>
                </div>

            </div>

            <div class="Q_jg_EPdNf9eDMn1mLI2 UYOSZJ1_pv3B5nt1ujCP rvdRhGyExrNYTA6euxsF SQf297smyJVNzzOO3iQL xr7CqaTHxTvDOrwAH2SW">
                <button type="submit" class="_k0lTW0vvzboctTxDi2R t6gkcSf0Bt4MLItXvDJ_ Q_jg_EPdNf9eDMn1mLI2 Nm7xMnguzOx6J5Ao7yCU bg-blue-700 hover:bg-blue-400 text-white font-semibold px-4 py-2 rounded-lg w-full"><i class="fa-solid fa-save"></i> &nbsp; Save Project
                </button>

                <button data-modal-hide="addProjectModal" onclick="resetForm()"
                        type="button"
                        class="_k0lTW0vvzboctTxDi2R t6gkcSf0Bt4MLItXvDJ_ Q_jg_EPdNf9eDMn1mLI2 Nm7xMnguzOx6J5Ao7yCU bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-4 py-2 rounded-lg w-full">
                    Cancel
                </button>

            </div>
            </form>
        <script>
    function showAlert(message, color = 'green') {
        const alertBox = document.createElement('div');
        alertBox.className = `fixed top-5 right-5 z-50 px-4 py-3 bg-${color}-100 border border-${color}-400 text-${color}-700 rounded shadow`;
        alertBox.innerHTML = `<strong>${color === 'green' ? 'Success:' : 'Error:'}</strong> ${message}`;
        document.body.appendChild(alertBox);
        setTimeout(() => alertBox.remove(), 6000);
    }

    document.addEventListener("DOMContentLoaded", function () {
        const form = document.querySelector("form");
        const submitBtn = form.querySelector("button[type='submit']");

        form.addEventListener("submit", function (e) {
            e.preventDefault();

            const formData = new FormData(form);
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Saving...';

            // force method override
            formData.append('_method', 'PUT');

            fetch(form.action, {
                method: "POST", // karena pakai _method=PUT
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                },
                body: formData
            })
            .then(async response => {
                const isJson = response.headers.get("content-type")?.includes("application/json");
                const data = isJson ? await response.json() : null;

                if (!response.ok || !data?.success) {
                    throw new Error(data?.message || "Failed to update project.");
                }

                // ✅ Save message to localStorage
                localStorage.setItem("projectUpdateSuccess", data.message || "Project updated successfully.");

                // ✅ Redirect ke halaman projects
                window.location.href = "{{ route('projects.index') }}";
            })
            .catch(error => {
                console.error("Update Error:", error);
                showAlert("An error occurred while updating the project.", 'red');
            })
            .finally(() => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="fa-solid fa-save"></i> &nbsp; Save Project';
            });
        });
    });
</script>

    </div>
</div>
{{-- PREVIEW COMPANY LOGO--}}
<script>
    function previewLogo(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('logo-preview');

        if (!file) {
            preview.classList.add('hidden');
            return;
        }

        const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];
        if (!allowedTypes.includes(file.type)) {
            alert("Only JPG, JPEG, and PNG files are allowed.");
            event.target.value = '';
            preview.classList.add('hidden');
            return;
        }

        if (file.size > 512000) { // 500KB
            alert("File size must be less than 500KB.");
            event.target.value = '';
            preview.classList.add('hidden');
            return;
        }

        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
        };
        reader.readAsDataURL(file);
    }
</script>
</div>
    </div>
</div>
</div>
</section>
@endsection
