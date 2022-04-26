<form id="formUser" action="user/save" method="POST">

    <div class="row">
        <div class="col-lg-6 col-md-12 p-4 fill border-right">
            <div class="row">
                <div class="alert alert-primary" role="alert">
                    <h6 class="alert-heading fw-bold mb-1">Personal Information</h6>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <label class="form-label">Full Name <span class="text-danger">*</span></label>
                    <input type="text" id="user_fullname" name="user_fullname" class="form-control" maxlength="100" autocomplete="off" onKeyUP="this.value = this.value.toUpperCase();" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">NRIC No. <span class="text-danger">*</span></label>
                    <input type="text" id="user_nric" name="user_nric" class="form-control" maxlength="15" autocomplete="off" required>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-6">
                    <label class="form-label">Preferred Name <span class="text-danger">*</span></label>
                    <input type="text" id="user_preferred_name" name="user_preferred_name" class="form-control" maxlength="15" autocomplete="off" onKeyUP="ucfirstVal(this.value, 'user_preferred_name');" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Birthdate<span class="text-danger">*</span></label>
                    <input type="date" id="user_dob" name="user_dob" class="form-control" autocomplete="off" required>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-6">
                    <label class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" id="user_email" name="user_email" class="form-control" maxlength="50" autocomplete="off" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Contact / HP No <span class="text-danger">*</span></label>
                    <input type="text" id="user_contact_no" name="user_contact_no" class="form-control" maxlength="13" autocomplete="off" onkeypress="return isNumberKey(event)" required>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-12">
                    <label class="form-label"> Address <span class="text-danger">*</span></label>
                    <textarea id="user_address" name="user_address" class="form-control" maxlength="250" autocomplete="off" rows="3" onKeyUP="this.value = this.value.toUpperCase();" required></textarea>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-4">
                    <label class="form-label"> Postal Code <span class="text-danger">*</span></label>
                    <input type="text" id="user_postcode" name="user_postcode" class="form-control" maxlength="8" autocomplete="off" onkeypress="return isNumberKey(event)" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label"> City <span class="text-danger">*</span></label>
                    <input type="text" id="user_city" name="user_city" class="form-control" maxlength="25" autocomplete="off" onKeyUP="this.value = this.value.toUpperCase();" required>
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
        <div class="col-lg-6 col-md-12 p-4 fill border-right">
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

    <div class="row mt-2">
        <div class="col-lg-12">
            <span class="text-danger p-4">* Indicates a required field</span>
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
        console.log(data);
        $('#user_id').val(data.user_id);
        $('#role_id').val(data.role_id);

        $('#user_fullname').val(data.user_fullname);
        $('#user_nric').val(data.user_nric);
        $('#user_preferred_name').val(data.user_preferred_name);
        $('#user_dob').val(data.user_dob);
        $('#user_email').val(data.user_email);
        $('#user_contact_no').val(data.user_contact_no);
        $('#user_address').val(data.user_address);
        $('#user_city').val(data.user_city);
        $('#user_state').val(data.user_state);
        $('#user_postcode').val(data.user_postcode);
        $('#user_gender').val(data.user_gender);
        $('#user_religion').val(data.user_religion);
        $('#user_race').val(data.user_race);

        $('#user_avatar').val("default/user.png");

        if (data.education || data.contact) {
            for (i = 0; i < data.education.length; i++) {
                addEducation(data.education[i]);
            }

            for (i = 0; i < data.contact.length; i++) {
                addContact(data.contact[i]);
            }
        } else {
            addEducation();
            addContact();
        }

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

                    if (isSuccess(res)) {
                        setTimeout(function() {
                            $('#generalModal-fullscreen').modal('hide');
                        }, 200);
                    }
                }
            }
        );
    });

    function addEducation(data = null) {
        var maxIndex = 5;
        var i = $('.education').length;

        if (i < maxIndex) {
            var education_level = (data != null) ? data.education_level : '';
            var education_course = (data != null) ? data.education_course : '';
            var education_university = (data != null) ? data.education_university : '';
            var education_id = (data != null) ? data.education_id : '';
            var btnRemove = (data != null) ? 'onclick="deleteEdu(' + education_id + ', ' + i + ')"' : 'onclick="removeEdu(' + i + ')"';

            $('#education_row').append('\
            <div class="row mt-2 education_div" data-row="' + i + '">\
                <div class="col-md-3">\
                    <label class="form-label">Level of Education <span class="text-danger">*</span></label>\
                    <input type="text" name="education_level[]" class="form-control" value="' + education_level + '" maxlength="20" autocomplete="off" required>\
                    <input type="hidden" name="education_id[]" class="form-control" value="' + education_id + '" readonly>\
                </div>\
                <div class="col-md-4">\
                    <label class="form-label">Course <span class="text-danger">*</span></label>\
                    <input type="text" name="education_course[]" class="form-control" value="' + education_course + '" maxlength="30" autocomplete="off" required>\
                </div>\
                <div class="col-md-4">\
                    <label class="form-label">Institutions Name <span class="text-danger">*</span></label>\
                    <input type="text" name="education_university[]" class="form-control" value="' + education_university + '" maxlength="50" autocomplete="off" required>\
                </div>\
                <div class="col-md-1 mt-1 text-center">\
                    <button type="button" id="remove_input_education" class="btn btn-danger btn-sm px-2 mt-3 education_btn" ' + btnRemove + '>\
                        <i class="fas fa-minus"></i>\
                    </button>\
                </div>\
                <div class="col-md-12 mt-2 mb-2">\
                    <div class="form-group">\
                        <label> Upload Attachement </label>\
                        <input type="file" name="education_file[]" class="form-control" accept="image/x-png,image/jpeg,image/jpg, .pdf">\
                        <input type="hidden" name="files_id[]" class="form-control" value="" readonly>\
                    </div>\
                </div>\
            </div>');
            i++;
        } else {
            noti(500, 'Only ' + maxIndex + ' education are allowed!');
        }
    }

    function removeEdu(i) {
        $('#edu' + i).remove();

        var inputEduCount = $('.education').length;
        if (inputEduCount == 0) {
            addEducation();
        } else {
            const divArr = document.getElementsByClassName('education_div');
            const btnArr = document.getElementsByClassName('education_btn');
            console.log('array : ', divArr);

            let curr = 0;
            for (i = 0; i < divArr.length; i++) {
                var oldValue = divArr[i].attributes[1].value;
                var newValue = curr;
                divArr[i].setAttribute('data-row', newValue);
                btnArr[i].setAttribute('onclick', 'removeEdu(' + curr + ')');
                curr++;
            }
        }
    }

    async function deleteEdu(id, i) {
        cuteAlert({
            type: 'question',
            title: 'Are you sure?',
            message: 'Records will be permanently deleted !',
            closeStyle: 'circle',
            cancelText: 'Abort',
            confirmText: 'Yes, Confirm!',
        }).then(
            async (e) => {
                if (e == 'confirm') {
                    const res = await deleteApi(id, 'education/delete');

                    if (isSuccess(res)) {
                        removeEdu(i);
                    }
                }
            }
        );
    }

    function addContact(data = null) {
        var maxIndex = 3;
        var i = $('.contact_div').length;

        if (i < maxIndex) {
            var contact_name = (data != null) ? data.contact_name : '';
            var contact_relation = (data != null) ? data.contact_relation : '';
            var contact_phone_1 = (data != null) ? data.contact_phone_1 : '';
            var contact_phone_2 = (data != null) ? data.contact_phone_2 : '';
            var contact_id = (data != null) ? data.contact_id : '';
            var btnRemove = (data != null) ? 'onclick="deleteHp(' + contact_id + ', ' + i + ')"' : 'onclick="removeHp(' + i + ')"';

            $('#contact_row').append('\
            <div class="row mt-2 contact_div" data-row="' + i + '">\
                <div class="col-md-4">\
                    <label class="form-label">Name <span class="text-danger">*</span></label>\
                    <input type="text" name="contact_name[]" class="form-control contact_input" maxlength="100" autocomplete="off" value="' + contact_name + '" required>\
                    <input type="hidden" name="contact_id[]" class="form-control contact_input contact_id" value="' + contact_id + '" readonly>\
                </div>\
                <div class="col-md-3">\
                    <label class="form-label">Relationship <span class="text-danger">*</span></label>\
                    <input type="text" name="contact_relation[]" class="form-control contact_input" maxlength="15" autocomplete="off" value="' + contact_relation + '" required>\
                </div>\
                <div class="col-md-2">\
                    <label class="form-label">HP No. 1 <span class="text-danger">*</span></label>\
                    <input type="text" name="contact_phone_1[]" class="form-control contact_input" maxlength="13" autocomplete="off" onkeypress="return isNumberKey(event)" value="' + contact_phone_1 + '" required>\
                </div>\
                <div class="col-md-2">\
                    <label class="form-label">HP No. 2</label>\
                    <input type="text" name="contact_phone_2[]" class="form-control contact_input" maxlength="13" autocomplete="off" onkeypress="return isNumberKey(event) value="' + contact_phone_2 + '"">\
                </div>\
                <div class="col-md-1 mt-1 text-center">\
                    <button type="button" id="remove_input_contact" class="btn btn-danger btn-sm px-2 mt-3 contact_btn" ' + btnRemove + '>\
                        <i class="fas fa-minus"></i>\
                    </button>\
                </div>\
            </div>');
            i++;
        } else {
            noti(500, 'Only ' + maxIndex + ' contact are allowed!');
        }
    }

    function removeHp(i) {
        $('.contact_div[data-row="' + i + '"]').remove();
        var inputHpCount = $('.contact_div').length;

        if (inputHpCount == 0) {
            addContact();
        } else {
            const divArr = document.getElementsByClassName('contact_div');
            const btnArr = document.getElementsByClassName('contact_btn');
            const ids = document.getElementsByClassName('contact_id');

            let curr = 0;
            for (i = 0; i < divArr.length; i++) {
                var oldValue = divArr[i].attributes[1].value;
                var newValue = curr;
                var id = ids[i].attributes[3].value;

                divArr[i].setAttribute('data-row', newValue);
                if (id != '') {
                    btnArr[i].setAttribute('onclick', 'deleteHp(' + id + ',' + oldValue + ')');
                } else {
                    btnArr[i].setAttribute('onclick', 'removeHp(' + curr + ')');
                }
                curr++;
            }
        }
    }

    async function deleteHp(id, i) {
        cuteAlert({
            type: 'question',
            title: 'Are you sure?',
            message: 'Records will be permanently deleted !',
            closeStyle: 'circle',
            cancelText: 'Abort',
            confirmText: 'Yes, Confirm!',
        }).then(
            async (e) => {
                if (e == 'confirm') {
                    const res = await deleteApi(id, 'contact/delete');

                    if (isSuccess(res)) {
                        removeHp(i);
                    }
                }
            }
        );
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