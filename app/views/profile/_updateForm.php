<form id="formUpdateUser" action="user/update" method="POST">

    <div class="row">
        <div class="col-lg-12 col-md-12 p-4 fill border-right">
            <div class="row">
                <div class="alert alert-primary" role="alert">
                    <h4 class="alert-heading fw-bold m-0">Personal Information</h4>
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
    </div>

    <div class="row mt-2">
        <div class="col-lg-12">
            <span class="text-danger p-4">* Indicates a required field</span>
            <center>
                <input type="hidden" id="user_id_update" name="user_id" class="form-control" readonly>
                <input type="hidden" id="role_id" name="role_id" class="form-control" readonly>
                <button type="submit" id="submitBtn" class="btn btn-success"> <i class='fa fa-save'></i> Save </button>
            </center>
        </div>
    </div>
</form>

<script>
    function getPassData(baseUrl, token, data) {
        console.log(data);
        
        $('#user_id_update').val(data.user_id);
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
    }

    function ucfirstVal(value, id) {
        let textUpper = capitalize(value);
        $('#' + id).val(textUpper);
    }

    $("#formUpdateUser").submit(function(event) {
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
                    const res = await submitApi(url, form.serializeArray(), 'formUpdateUser');

                    if (isSuccess(res)) {
                        var user_id = $('#user_id').val();
                        getUserData(user_id);
                        setTimeout(function() {
                            $('#generalModal-xl').modal('hide');
                        }, 200);
                    }
                }
            }
        );
    });
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