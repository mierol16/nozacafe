<form id="formUser" action="user/save" method="POST">

    <div class="row">
        <div class="col-lg-6 col-md-12 p-4 fill border-right psbar">
            <div class="row">
                <div class="alert alert-primary" role="alert">
                    <h6 class="alert-heading fw-bold mb-1">Personal Information</h6>
                </div>
            </div>
        
            <div class="row">
                <div class="col-md-8">
                    <label class="form-label">Full Name <span class="text-danger">*</span></label>
                    <input type="text" id="user_fullname" name="user_fullname" class="form-control maxlength-input" maxlength="100" autocomplete="off" onKeyUP="this.value = this.value.toUpperCase();" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">NRIC No.<span class="text-danger">*</span></label>
                    <input type="text" id="user_nric" name="user_nric" class="form-control maxlength-input" maxlength="15" autocomplete="off" required>
                </div>
            </div>
        
            <div class="row mt-2">
                <div class="col-md-6">
                    <label class="form-label">Preferred Name <span class="text-danger">*</span></label>
                    <input type="text" id="user_preferred_name" name="user_preferred_name" class="form-control maxlength-input" maxlength="15" autocomplete="off" onKeyUP="ucfirstVal(this.value, 'user_preferred_name');" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Birthdate<span class="text-danger">*</span></label>
                    <input type="text" id="user_dob" name="user_dob" class="form-control maxlength-input" maxlength="15" autocomplete="off" required>
                </div>
            </div>
        
            <div class="row mt-2">
                <div class="col-md-6">
                    <label class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" id="user_email" name="user_email" class="form-control maxlength-input" maxlength="50" autocomplete="off" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Contact / HP No <span class="text-danger">*</span></label>
                    <input type="text" id="user_contact_no" name="user_contact_no" class="form-control maxlength-input" maxlength="13" autocomplete="off" onkeypress="return isNumberKey(event)" required>
                </div>
            </div>
        
            <div class="row mt-2">
                <div class="col-md-12">
                    <label class="form-label"> Address <span class="text-danger">*</span></label>
                    <textarea id="user_address" name="user_address" class="form-control maxlength-input" maxlength="250" autocomplete="off" rows="3" onKeyUP="this.value = this.value.toUpperCase();" required></textarea>
                </div>
            </div>
        
            <div class="row mt-2">
                <div class="col-md-4">
                    <label class="form-label"> Postal Code <span class="text-danger">*</span></label>
                    <input type="text" id="user_postcode" name="user_postcode" class="form-control maxlength-input" maxlength="8" autocomplete="off" onkeypress="return isNumberKey(event)" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label"> City <span class="text-danger">*</span></label>
                    <input type="text" id="user_city" name="user_city" class="form-control maxlength-input" maxlength="25" autocomplete="off" onKeyUP="this.value = this.value.toUpperCase();" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label"> State <span class="text-danger">*</span></label>
                    <select id="user_state" name="user_state" class="form-control" required>
                        <option value=""> - Select - </option>
                        <option value="JOHOR">Johor</option>
                        <option value="KEDAH">Kedah</option>
                        <option value="KELANTAN">Kelantan</option>
                        <option value="KUALA LUMPUR">Kuala Lumpur</option>
                        <option value="LABUAN">Labuan</option>
                        <option value="MELAKA">Melaka</option>
                        <option value="NEGERI SEMBILAN">Negeri Sembilan</option>
                        <option value="PAHANG">Pahang</option>
                        <option value="PULAU PINANG">Pulau Pinang</option>
                        <option value="PERAK">Perak</option>
                        <option value="PERLIS">Perlis</option>
                        <option value="PUTRAJAYA">Putrajaya</option>
                        <option value="SABAH">Sabah</option>
                        <option value="SARAWAK">Sarawak</option>
                        <option value="SELANGOR">Selangor</option>
                        <option value="TERENGGANU">Terengganu</option>
                    </select>
                </div>
            </div>
        
            <div class="row mt-2">
                <div class="col-md-4">
                    <label class="form-label"> Gender <span class="text-danger">*</span></label>
                    <select id="user_gender" name="user_gender" class="form-control" required>
                        <option value=""> - Select - </option>
                        <option value="Male"> Male </option>
                        <option value="Female"> Female </option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label"> Religion </label>
                    <select id="user_religion" name="user_religion" class="form-control">
                        <option value=""> - Select - </option>
                        <option value="Islam"> Islam </option>
                        <option value="Buddhism"> Buddhism </option>
                        <option value="Christianity"> Christianity </option>
                        <option value="Hinduism"> Hinduism </option>
                        <option value="Sikhism "> Sikhism </option>
                        <option value="Others"> Others </option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label"> Race </label>
                    <select id="user_race" name="user_race" class="form-control">
                        <option value=""> - Select - </option>
                        <option value="Melayu"> Melayu </option>
                        <option value="Chinese"> Chinese </option>
                        <option value="Indian"> Indian </option>
                        <option value="Others"> Others </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 p-4 fill border-right psbar">
            <div class="row">
                <div class="alert alert-primary" role="alert">
                    <button type="button" id="add_input_education" class="btn btn-success btn-sm px-2 float-end" onclick="addEducation()">
                        <i class="fas fa-plus"></i>
                    </button>
                    <h6 class="alert-heading fw-bold mb-1">Background Education</h6>
                </div>
            </div>

            <div id="education_row">
            </div>
        
            <div class="row mt-2">
                <div class="alert alert-primary" role="alert">
                    <button type="button" class="btn btn-success btn-sm px-2 float-end" onclick="addContact()">
                        <i class="fas fa-plus"></i>
                    </button>
                    <h6 class="alert-heading fw-bold mb-1">Contact Information</h6>
                </div>
            </div>

            <div id="contact_row">
            </div>
        
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-12">
            <span class="text-danger">* Indicates a required field</span>
            <center>
                <input type="hidden" id="user_id" name="user_id" class="form-control" readonly>
                <input type="hidden" id="role_id" name="role_id" class="form-control" readonly>
                <input type="hidden" id="user_avatar" name="user_avatar" class="form-control" readonly>
                <button type="submit" id="submitBtn" class="btn btn-info"> <i class='fa fa-save'></i> Save </button>
            </center>
        </div>
    </div>
</form>

<script>
    function getPassData(baseUrl, token, data) {
        $('#role_id').val(data.role_id);
        $('#user_avatar').val("default/user.png");
        addEducation();
        addContact();
    }

    function ucfirstVal(value, id) {
        let textUpper = capitalize(value);
        $('#' + id).val(textUpper);
    }

    $("#formUser").submit(function(event) {
        event.preventDefault();

        const form = $(this);
        const url = form.attr('action');

        cuteAlert({
            type: 'question',
            title: 'Are you sure?',
            message: 'Form will be submitted!',
            closeStyle: 'circle',
            cancelText: 'Abort',
            confirmText: 'Yes, Confirm!',
        }).then(
            async (e) => {
                if (e == 'confirm') {
                    const res = await submitApi(url, form.serializeArray(), 'formUser', getDataList);
                }
            }
        );
    });

    function addEducation(data = null) {
        var i = $('.education').length;
        $('#education_row').append('\
            <div class="row mt-2 education" id="edu' + i + '">\
                <div class="col-md-1 text-center">\
                    <label class="form-label"><span></span></label>\
                    <button type="button" id="remove_input_education" class="btn btn-danger btn-sm px-2 mt-3" onclick="removeEdu(' + i + ')">\
                        <i class="fas fa-minus"></i>\
                    </button>\
                </div>\
                <div class="col-md-3">\
                    <label class="form-label">Level of Education<span class="text-danger">*</span></label>\
                    <input type="text" id="education_level' + i +'" name="education_level[]" class="form-control maxlength-input" maxlength="20" autocomplete="off" required>\
                    <input type="hidden" id="education_id' + i +'" name="education_id[]" class="form-control" readonly>\
                </div>\
                <div class="col-md-4">\
                    <label class="form-label">Course<span class="text-danger">*</span></label>\
                    <input type="text" id="education_course' + i +'" name="education_course[]" class="form-control maxlength-input" maxlength="30" autocomplete="off" required>\
                </div>\
                <div class="col-md-4">\
                    <label class="form-label">University<span class="text-danger">*</span></label>\
                    <input type="text" id="education_university' + i +'" name="education_university[]" class="form-control maxlength-input" maxlength="50" autocomplete="off" required>\
                </div>\
            </div>');
        i++;
      }

      function removeEdu(i) {
          $('#edu' + i).remove();
      }

      function addContact(data = null) {
        var i = $('.contact').length;
        $('#contact_row').append('\
            <div class="row mt-2 contact" id="hp' + i + '">\
                <div class="col-md-1 text-center">\
                    <label class="form-label"><span></span></label>\
                    <button type="button" id="remove_input_contact" class="btn btn-danger btn-sm px-2 mt-3" onclick="removeHp(' + i + ')">\
                        <i class="fas fa-minus"></i>\
                    </button>\
                </div>\
                <div class="col-md-4">\
                    <label class="form-label">Name<span class="text-danger">*</span></label>\
                    <input type="text" id="contact_name' + i +'" name="contact_name[]" class="form-control maxlength-input" maxlength="100" autocomplete="off" required>\
                    <input type="hidden" id="contact_id' + i +'" name="contact_id[]" class="form-control" readonly>\
                </div>\
                <div class="col-md-3">\
                    <label class="form-label">Relationship<span class="text-danger">*</span></label>\
                    <input type="text" id="contact_relation' + i +'" name="contact_relation[]" class="form-control maxlength-input" maxlength="15" autocomplete="off" required>\
                </div>\
                <div class="col-md-2">\
                    <label class="form-label">HP No. 1<span class="text-danger">*</span></label>\
                    <input type="text" id="contact_phone_1' + i +'" name="contact_phone_1[]" class="form-control maxlength-input" maxlength="13" autocomplete="off" onkeypress="return isNumberKey(event)" required>\
                </div>\
                <div class="col-md-2">\
                    <label class="form-label">HP No. 2</label>\
                    <input type="text" id="contact_phone_2' + i +'" name="contact_phone_2[]" class="form-control maxlength-input" maxlength="13" autocomplete="off" onkeypress="return isNumberKey(event)">\
                </div>\
            </div>');
        i++;
      }

      function removeHp(i) {
          $('#hp' + i).remove();
      }
</script>

<!-- 

 SIMPLE DOCUMENTATION FOR VIEW

 FUNCTION AVAILABLE (USE ONLY IN SCRIPT)
    1) loadFormContent(fileToLoad, modalBodyID, modalSize, urlForm, modalTitle, data, modalType)
    2) loadFileContent(fileToLoad, modalBodyID, modalSize, modalTitle, res.data, modalType)
    3) callApi(methodToPost, url, id)
    4) submitForm(url, dataFromFormToSubmit, formID, functionNameToReload)
    5) deleteData(id, url, functionNameToReload)
    6) noti(codeResponse, textToDisplay)
    7) isset(value)

 Notes : 
 - for more global function please go to folder :-
    1) public/framework/js/common.js 
    2) public/framework/php/general.php 

 Reminder :
 - Please avoid redeclare same function name in both file above
       
 -->