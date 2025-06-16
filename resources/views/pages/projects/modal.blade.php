<!-- Add/Edit Project Modal -->
<div id="addProjectModal"
     tabindex="-1"
     aria-hidden="true"
     class="_LPVUrp9Uina5fcERqWC TYmpscr1PwuC1dpYXDpM ZjE1E_5ejL_PlLNIq3MM uQByIGHtHssL9HoPQXR4 Jq3rRDG6Hsr3eAZ0KJeH _SmdlCf6eUKB_V9S5IDj _dZO1Z7EjPZTzv7NappG D5X3kHheOzrTNzgpkKYX t6gkcSf0Bt4MLItXvDJ_ Q_jg_EPdNf9eDMn1mLI2 Nm7xMnguzOx6J5Ao7yCU _lTTGxW9MVI40FyDCtmr LQrvJzHhtGuotyv_EF_N k6hbvxXxe_du942IR0vX fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center">

  <div class="ahOqFrhzLjivRe8a1kX_ D5X3kHheOzrTNzgpkKYX t6gkcSf0Bt4MLItXvDJ_ M1YFStHQ2scEHZzvz7XX _wYiJGbRZyFZeCc8y7Sf">
    <!-- Modal content -->
    <div class="ahOqFrhzLjivRe8a1kX_ mveJTCIb2WII7J4sY22F _Ybd3WwuTVljUT4vEaM3 _wYiJGbRZyFZeCc8y7Sf mngKhi_Rv06PF57lblDI _1jTZ8KXRZul60S6czNi _aDtgllJkTzUlILozHgX">
      <!-- Modal header -->
      <div class="hD0sTTDgbxakubcHVW2X YRrCJSr_j5nopfm4duUc Q_jg_EPdNf9eDMn1mLI2 sJNGKHxFYdN5Nzml5J2j zQeL_bQRwh9WGEnvS5ug N4SFnsqiVKm1oFHmSTyG">
        <h3 class="y0nOgdpiqOUaFDbjAxwD yM_AorRf2jSON3pDsdrz __9sbu0yrzdhGIkLWNXl OyABRrnTV_kvHV7dJ0uE">Project Form</h3>
        <button type="button" class="zjZIaeYZzHaaBqxD5KzF _k0lTW0vvzboctTxDi2R Q_jg_EPdNf9eDMn1mLI2 mveJTCIb2WII7J4sY22F mW4LfSTbez3WHPeTDguY Z4DH5a4vmjReSFRBpPgz c8dCx6gnV43hTOLV6ks5 _JmTNv5EiHqK2A1jcQSf _7KA5gD55t2lxf9Jkj20 ZnBoTVi7VOJdCLSSU62n RzANcaqunVvlLrO6_tal dMTOiA3mf3FTjlHu6DqW" data-modal-toggle="addProjectModal">
          <svg class="rxe6apEJoEk8r75xaVNG ADSeKHR1DvUUA48Chci_" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"></path>
          </svg>
          <span class="_DVAfiyo21kM68EUVzEQ">Close modal</span>
        </button>
      </div>

      <form id="addProjectForm" method="POST" enctype="multipart/form-data" action="{{ route('projects.store') }}">
          @csrf
          <div class="hD0sTTDgbxakubcHVW2X xCPtuxM4_gihvpPwv9bX iHPddplqYvrN6qWgvntn AqVNvLG_H6VHhym2yKMp">
              <div>
                  <label for="contract" class="TR_P65x9ie7j6uxFo_Cs">Contract</label>
                  <input type="text" name="contract" id="contract" class="_Vb9igHms0hI1PQcvp_S" required>
              </div>

              <div>
                  <label for="operator_name" class="TR_P65x9ie7j6uxFo_Cs">Operator Name</label>
                  <input type="text" name="operator_name" id="operator_name" class="_Vb9igHms0hI1PQcvp_S" required>
              </div>

              <div>
                  <label for="drillingrig" class="TR_P65x9ie7j6uxFo_Cs">Drilling Rig</label>
                  <input type="text" name="drillingrig" id="drillingrig" class="_Vb9igHms0hI1PQcvp_S" required>
              </div>

              <div>
                  <label for="wellname" class="TR_P65x9ie7j6uxFo_Cs">Well Name</label>
                  <input type="text" name="wellname" id="wellname" class="_Vb9igHms0hI1PQcvp_S" required>
              </div>

              <div>
                  <label for="kodeakses" class="TR_P65x9ie7j6uxFo_Cs">Access Code</label>
                  <input type="text" name="kodeakses" id="kodeakses" readonly class="_Vb9igHms0hI1PQcvp_S" value="{{ rand(10000,99999) }}">
              </div>

              <div class="wwofGIyK_H_z3Xjelq8G">
                  <label for="logo" class="TR_P65x9ie7j6uxFo_Cs">Company Logo (JPG, JPEG, PNG)</label>
                  <div class="YRrCJSr_j5nopfm4duUc">
                      <label for="logo-upload" class="YRrCJSr_j5nopfm4duUc">
                          <div class="YRrCJSr_j5nopfm4duUc">
                              <svg aria-hidden="true" class="_hpGev6RXFut0Jm_iRgf" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                              </svg>
                              <p class="TR_P65x9ie7j6uxFo_Cs">Click to upload or drag and drop</p>
                              <p class="gMXmdpOPfqG_3CKkL0VD">PNG, JPG or JPEG (MAX. 800x400px)</p>
                          </div>
                          <input id="logo-upload" name="logo" type="file" accept="image/png,image/jpeg,image/jpg" class="_SmdlCf6eUKB_V9S5IDj" onchange="previewLogo(event)">
                      </label>
                  </div>

                  <div class="mt-2">
                      <img id="logo-preview" src="#" alt="Preview" class="hidden w-[150px] h-[150px] object-contain rounded border border-gray-300" />
                  </div>
              </div>
          </div>

          <div class="Q_jg_EPdNf9eDMn1mLI2">
              <button type="submit" class="custom-btn-submit">
                  <i class="fa-solid fa-save"></i> &nbsp; Save Project
              </button>

              <button data-modal-hide="addProjectModal" type="button"
                  class="_k0lTW0vvzboctTxDi2R bg-gray-300 text-gray-800 px-4 py-2 rounded-lg w-full">
                  Cancel
              </button>
          </div>
      </form>
    </div>
  </div>
</div>
