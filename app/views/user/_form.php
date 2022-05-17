<form id="formUser" action="user/register" method="POST">

    <div class="row">
        <div class="col-lg-4 col-md-12 p-4 fill border-right">
            <div class="row">
                <div class="alert alert-primary" role="alert">
                    <h4 class="alert-heading fw-bold mb-1">Personal Information</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <label class="form-label">Full Name <span class="text-danger">*</span></label>
                    <input type="text" id="user_fullname" name="user_fullname" class="form-control" maxlength="100" autocomplete="off" onKeyUP="this.value = this.value.toUpperCase();" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Preferred Name <span class="text-danger">*</span></label>
                    <input type="text" id="user_preferred_name" name="user_preferred_name" class="form-control" maxlength="15" autocomplete="off" onKeyUP="ucfirstVal(this.value, 'user_preferred_name');" required>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-6">
                    <label class="form-label">NRIC No. <span class="text-danger">*</span></label>
                    <input type="text" id="user_nric" name="user_nric" class="form-control" maxlength="15" autocomplete="off" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" id="user_email" name="user_email" class="form-control" maxlength="50" autocomplete="off" required>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-4">
                    <label class="form-label">Contact / HP No <span class="text-danger">*</span></label>
                    <input type="text" id="user_contact_no" name="user_contact_no" class="form-control" maxlength="13" autocomplete="off" onkeypress="return isNumberKey(event)" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Birthdate<span class="text-danger">*</span></label>
                    <input type="date" id="user_dob" name="user_dob" class="form-control" autocomplete="off" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label"> Gender <span class="text-danger">*</span></label>
                    <select id="user_gender" name="user_gender" class="form-control" required>
                        <option value=""> - Select - </option>
                        <option value="Male"> Male </option>
                        <option value="Female"> Female </option>
                    </select>
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
                <div class="col-md-6">
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
                <div class="col-md-6">
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

        <div class="col-lg-4 col-md-12 p-4 fill border-right h-100 show" data-simplebar="init">
            <div class="row">
                <div class="alert alert-primary" role="alert">
                    <button type="button" id="add_input_education" class="btn btn-success btn-sm px-2 float-end" onclick="addEducation()">
                        <i class="fas fa-plus"></i>
                    </button>
                    <h4 class="alert-heading fw-bold mb-1">Background Education</h4>
                </div>
            </div>

            <div id="education_row">
            </div>

            <div class="row mt-1">
                <div class="alert alert-primary" role="alert">
                    <button type="button" class="btn btn-success btn-sm px-2 float-end" onclick="addContact()">
                        <i class="fas fa-plus"></i>
                    </button>
                    <h4 class="alert-heading fw-bold mb-1">Contact Information</h4>
                </div>
            </div>

            <div id="contact_row">
            </div>
        </div>

        <div class="col-lg-4 col-md-12 p-4 fill border-right">
            <div class="row">
                <div class="alert alert-primary" role="alert">
                    <h4 class="alert-heading fw-bold mb-1">Leave Information</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <label class="form-label"> Preset Leave <span class="text-danger">*</span></label>
                    <select id="leave_preset" name="leave_preset" class="form-control" onchange="getDisplayLeavePreset(this.value)" required>
                        <option value=""> - Select - </option>
                    </select>
                    <div id="showDetail" class="mt-2"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-lg-12">
            <span class="text-danger p-4">* Indicates a required field</span>
            <center>
                <input type="hidden" id="user_id" name="user_id" class="form-control" readonly>
                <input type="hidden" id="role_id" name="role_id" class="form-control" readonly>
                <input type="hidden" id="config_leave_id" name="config_leave_id" class="form-control" readonly>
                <input type="hidden" id="user_avatar" name="user_avatar" class="form-control" readonly>
                <button type="submit" id="submitBtn" class="btn btn-success"> <i class='fa fa-save'></i> Save </button>
            </center>
        </div>
    </div>
</form>

<script>
    function getPassData(baseUrl, token, data) {
        // console.log(data);
        const preset = (data.leave) ? data.leave[0].preset_id : null;
        const config_leave = (data.leave) ? data.leave[0].config_leave_id : null;

        $('#user_id').val(data.user_id);
        $('#role_id').val(data.role_id);
        $('#config_leave_id').val(config_leave);

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
            getDisplayLeavePreset(preset);
        } else {
            addEducation();
            addContact();
        }
        getSelectLeavePreset(preset);
    }

    function ucfirstVal(value, id) {
        let textUpper = capitalize(value);
        $('#' + id).val(textUpper);
    }

    async function getSelectLeavePreset(id = null) {
        const res = await callApi('post', "leave/getListPreset", id);
        // check if request is success
        if (isSuccess(res)) {
            $('#leave_preset').empty();
            $('#leave_preset').html(res.data);
        } else {
            noti(res.status); // show error message
        }
    }

    async function getDisplayLeavePreset(id = '') {
        if (id != '') {
            const res = await callApi('post', "leave/getDisplayTblListPreset", id);
            // check if request is success
            if (isSuccess(res)) {
                $('#showDetail').empty();
                $('#showDetail').html(res.data);
            } else {
                noti(res.status); // show error message
                $('#showDetail').empty();
            }
        } else {
            $('#showDetail').empty();
        }
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
        var i = $('.education_div').length;

        if (i < maxIndex) {
            var education_level = (data != null) ? data.education_level : '';
            var education_course = (data != null) ? data.education_course : '';
            var education_university = (data != null) ? data.education_university : '';
            var education_id = (data != null) ? data.education_id : '';
            var btnRemove = (data != null) ? 'onclick="deleteEdu(' + education_id + ', ' + i + ')"' : 'onclick="removeEdu(' + i + ')"';

            var listFiles = '';

            if (data != null) {

                const files = data.files;
                display = files.files_name + '<span id="upload' + files.files_id + '" class="float-end"><i class="fa fa-eye" style="color:blue" onclick="previewPDF(\'' + files.files_path + '\', \'' + files.files_extension + '\')"></i></span><hr>';

                listFiles = '<tr class="table-dark">\
                                <td colspan="3">\
                                    Files \
                                </td>\
                                </tr>\
                                <tr>\
                                <td colspan="3">\
                                    ' + display + '\
                                </td>\
                                </tr>';
            }

            $('#education_row').append('\
                <div class="row education_div" data-row="' + i + '">\
                    <table class="table table-bordered table-sm">\
                        <thead class="table-dark">\
                            <tr>\
                                <th colspan="3"> <span id="text' + i + '" class="countEdu" data-row="' + i + '"> Education #' + (i + 1) + '</span> </th>\
                            </tr>\
                        </thead>\
                        <tbody>\
                            <tr>\
                                <td>\
                                    <label class="form-label">Level of Education <span class="text-danger">*</span></label>\
                                    <input type="text" name="education_level[]" class="form-control education_input" value="' + education_level + '" maxlength="50" autocomplete="off" required>\
                                    <input type="hidden" name="education_id[]" class="form-control education_input education_id" value="' + education_id + '" readonly>\
                                </td>\
                                <td>\
                                    <label class="form-label">Course <span class="text-danger">*</span></label>\
                                    <input type="text" name="education_course[]" class="form-control education_input" value="' + education_course + '" maxlength="100" autocomplete="off" required>\
                                </td>\
                                <td rowspan="2">\
                                    <center>\
                                        <button type="button" id="remove_input_education" class="btn btn-danger btn-sm px-2 education_btn" ' + btnRemove + '>\
                                            <i class="fas fa-minus"></i>\
                                        </button>\
                                    </center>\
                                </td>\
                            </tr>\
                            <tr>\
                                <td>\
                                    <label class="form-label">Institutions Name <span class="text-danger">*</span></label>\
                                    <input type="text" name="education_university[]" class="form-control education_input" value="' + education_university + '" maxlength="255" onKeyUP="this.value = this.value.toUpperCase();" autocomplete="off" required>\
                                </td>\
                                <td>\
                                    <label class="form-label"> Upload Attachement </label>\
                                    <input type="file" name="education_file[]" class="form-control" accept="image/x-png,image/jpeg,image/jpg, .pdf">\
                                </td>\
                            </tr>\
                            ' + listFiles + '\
                        </tbody>\
                    </table>\
                </div>');
            i++;
        } else {
            noti(500, 'Only ' + maxIndex + ' education are allowed!');
        }
    }

    function removeEdu(i) {
        $('.education_div[data-row="' + i + '"]').remove();

        var inputEduCount = $('.education_div').length;
        if (inputEduCount == 0) {
            addEducation();
        } else {
            const divArr = document.getElementsByClassName('education_div');
            const btnArr = document.getElementsByClassName('education_btn');
            const ids = document.getElementsByClassName('education_id');
            const textCount = document.getElementsByClassName('countEdu');

            let curr = 0;
            for (i = 0; i < divArr.length; i++) {
                var oldValue = divArr[i].attributes[1].value;
                var newValue = curr;
                var id = ids[i].attributes[3].value;

                divArr[i].setAttribute('data-row', newValue);

                var textCountids = textCount[i].attributes[0].value;
                $('#' + textCountids).text('Education #' + (newValue + 1));
                textCount[i].setAttribute('id', newValue);
                textCount[i].setAttribute('data-row', newValue);

                if (id != '') {
                    btnArr[i].setAttribute('onclick', 'deleteEdu(' + id + ',' + oldValue + ')');
                } else {
                    btnArr[i].setAttribute('onclick', 'removeEdu(' + curr + ')');
                }
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
            <div class="row contact_div" data-row="' + i + '">\
                <table class="table table-bordered table-sm">\
                    <thead class="table-dark">\
                        <tr>\
                        <th colspan="3"> <span id="text' + i + '" class="countContact" data-row="' + i + '"> Contact #' + (i + 1) + '</span> </th>\
                        </tr>\
                    </thead>\
                    <tbody>\
                        <tr>\
                            <td>\
                                <label class="form-label">Name <span class="text-danger">*</span></label>\
                                <input type="text" name="contact_name[]" class="form-control contact_input" maxlength="100" autocomplete="off" value="' + contact_name + '" required>\
                                <input type="hidden" name="contact_id[]" class="form-control contact_input contact_id" value="' + contact_id + '" readonly>\
                            </td>\
                            <td>\
                                <label class="form-label">Relationship <span class="text-danger">*</span></label>\
                                <select id="contact_relation" name="contact_relation[]" class="form-control relation' + i + '" required>\
                                    <option value=""> - Select - </option>\
                                    <option value="Mother"> Ibu Kandung / Mother </option>\
                                    <option value="Father"> Bapa Kandung / Father </option>\
                                    <option value="Adoptive Mother"> Ibu Angkat / Adoptive Mother </option>\
                                    <option value="Adoptive Father"> Bapa Angkat / Adoptive Father </option>\
                                    <option value="Brother"> Abang / Brother </option>\
                                    <option value="Sister"> Kakak / Sister </option>\
                                    <option value="Auntie"> Ibu Saudara / Auntie </option>\
                                    <option value="Uncle"> Bapa Saudara / Uncle </option>\
                                    <option value="Cousin"> Sepupu / Cousin </option>\
                                    <option value="Guardian"> Penjaga / Guardian </option>\
                                </select>\
                            </td>\
                            <td rowspan="2">\
                                <center>\
                                    <button type="button" id="remove_input_contact" class="btn btn-danger btn-sm px-2 contact_btn" ' + btnRemove + '>\
                                        <i class="fas fa-minus"></i>\
                                    </button>\
                                </center>\
                            </td>\
                        </tr>\
                        <tr>\
                            <td>\
                                <label class="form-label">HP No. 1 <span class="text-danger">*</span></label>\
                                <input type="text" name="contact_phone_1[]" class="form-control contact_input" maxlength="12" autocomplete="off" onkeypress="return isNumberKey(event)" value="' + contact_phone_1 + '" required>\
                            </td>\
                            <td>\
                                <label class="form-label">HP No. 2</label>\
                                <input type="text" name="contact_phone_2[]" class="form-control contact_input" maxlength="12" autocomplete="off" onkeypress="return isNumberKey(event) value="' + contact_phone_2 + '"">\
                            </td>\
                        </tr>\
                    </tbody>\
                </table>\
            </div>');
            $('.relation' + i).val(contact_relation);
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
            const textCountCntact = document.getElementsByClassName('countContact');

            let curr = 0;
            for (i = 0; i < divArr.length; i++) {
                var oldValue = divArr[i].attributes[1].value;
                var newValue = curr;
                var id = ids[i].attributes[3].value;

                divArr[i].setAttribute('data-row', newValue);

                var textCountids = textCountCntact[i].attributes[0].value;
                $('#' + textCountids).text('Contact #' + (newValue + 1));
                textCountCntact[i].setAttribute('id', newValue);
                textCountCntact[i].setAttribute('data-row', newValue);

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

    async function removeUploadFile(id) {
        cuteAlert({
            type: 'question',
            title: 'Are you sure?',
            message: 'Files will be permanently deleted !',
            closeStyle: 'circle',
            cancelText: 'Abort',
            confirmText: 'Yes, Confirm!',
        }).then(
            async (e) => {
                if (e == 'confirm') {
                    const res = await deleteApi(id, 'files/delete');
                    $('.upload' + id).remove();
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