<form id="formContact" action="contact/save" method="POST">

    <div class="row">
        <div class="col-lg-6">
            <label class="form-label"> Name <span class="text-danger">*</span></label>
            <input type="text" id="contact_name" name="contact_name" class="form-control" maxlength="100" autocomplete="off" required>
        </div>

        <div class="col-lg-6">
            <label class="form-label"> Relationship <span class="text-danger">*</span></label>
            <select id="contact_relation" name="contact_relation" class="form-control" required>
                <option value=""> - Select - </option>
                <option value="Mother"> Ibu Kandung / Mother </option>
                <option value="Father"> Bapa Kandung / Father </option>
                <option value="Adoptive Mother"> Ibu Angkat / Adoptive Mother </option>
                <option value="Adoptive Father"> Bapa Angkat / Adoptive Father </option>
                <option value="Brother"> Abang / Brother </option>
                <option value="Sister"> Kakak / Sister </option>
                <option value="Auntie"> Ibu Saudara / Auntie </option>
                <option value="Uncle"> Bapa Saudara / Uncle </option>
                <option value="Cousin"> Sepupu / Cousin </option>
                <option value="Guardian"> Penjaga / Guardian </option>
            </select>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-lg-6">
            <label class="form-label"> HP No. 1 <span class="text-danger">*</span></label>
            <input type="text" id="contact_phone_1" name="contact_phone_1" class="form-control" maxlength="12" autocomplete="off" onkeypress="return isNumberKey(event)" required>
        </div>
        <div class="col-lg-6">
            <label class="form-label"> HP No. 2 </label>
            <input type="text" id="contact_phone_2" name="contact_phone_2" class="form-control" maxlength="12" autocomplete="off" onkeypress="return isNumberKey(event)">
        </div>
    </div>
    
    <div class="row mt-2">
        <div class="col-lg-12">
            <span class="text-danger">* Indicates a required field</span>
            <center>
                <input type="hidden" id="user_id_contact" name="user_id" placeholder="user_id" readonly>
                <input type="hidden" id="contact_id" name="contact_id" placeholder="contact_id" readonly>
                <button type="submit" id="submitBtn" class="btn btn-info"> <i class='fa fa-save'></i> Save </button>
            </center>
        </div>
    </div>
</form>

<script>
    function getPassData(baseUrl, token, data) {
        var user_id = data.user_id;
        $('#user_id_contact').val(user_id);
    }

    $("#formContact").submit(function(event) {
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
                    const res = await submitApi(url, form.serializeArray(), 'formContact');
                    if (isSuccess(res)) {
                        var user_id = $('#user_id_contact').val();
                        getListContact(user_id);
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