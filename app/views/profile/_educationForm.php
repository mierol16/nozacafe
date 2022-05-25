<form id="formEducation" action="education/save" method="POST">

    <div class="row">
        <div class="col-lg-6">
            <label class="form-label"> Level of Education <span class="text-danger">*</span></label>
            <input type="text" id="education_level" name="education_level" class="form-control" maxlength="50" autocomplete="off" required>
        </div>

        <div class="col-lg-6">
            <label class="form-label"> Course <span class="text-danger">*</span></label>
            <input type="text" id="education_course" name="education_course" class="form-control" maxlength="100" autocomplete="off" required>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-lg-12">
            <label class="form-label"> Institute Name <span class="text-danger">*</span></label>
            <input type="text" id="education_university" name="education_university" class="form-control" onKeyUP="this.value = this.value.toUpperCase();" maxlength="255" autocomplete="off" required>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-lg-6">
            <label class="form-label"> Upload Cert <span class="text-danger">*</span></label>
            <input type="file" name="education_file" class="form-control" accept="image/x-png,image/jpeg,image/jpg, .pdf" required>
            <div class="alert alert-warning mt-2" role="alert">
                <span class="form-text text-muted"><b> A few notes before you upload certification </b></span>
                <span class="form-text text-muted">
                    <ul>
                        <li> Upload only file with extension jpeg, png and pdf. </li>
                        <li> Files size support <b><i style="color: red"> 5 MB only. </i> </b></li>
                        <li> Please wait for the upload to complete. </li>
                    </ul>
                </span>
            </div>
        </div>
        <div id="listFilesDiv" class="col-lg-6" style="display: none;">
            <label class="form-label"> Files </label>
            <div id="listFiles"></div>
        </div>
    </div>
    
    <div class="row mt-2">
        <div class="col-lg-12">
            <span class="text-danger">* Indicates a required field</span>
            <center>
                <input type="hidden" id="user_id_education" name="user_id" placeholder="user_id" readonly>
                <input type="hidden" id="education_id" name="education_id" placeholder="education_id" readonly>
                <input type="hidden" id="files_id" name="files_id" placeholder="files_id" readonly>
                <button type="submit" id="submitBtn" class="btn btn-info"> <i class='fa fa-save'></i> Save </button>
            </center>
        </div>
    </div>
</form>

<script>
    function getPassData(baseUrl, token, data) {
        var user_id = data.user_id;
        $('#user_id_education').val(user_id);

        if (data != null) {
            $('#listFilesDiv').show();

            const files = data.files;
            $('#files_id').val(files.files_id);
            // var preview = (files.files_extension == 'pdf') ? 'previewPDF(\'' + files.files_path + '\', \'' + files.files_extension + '\')' : 'previewIMG(\'' + files.files_path + '\', \'' + files.files_extension + '\')';
            var display = files.files_name + '<span id="upload' + files.files_id + '" class="float-end"><i class="fa fa-eye" style="color:blue" onclick="previewPDF(\'' + files.files_path + '\', \'' + files.files_mime + '\')"></i></span><hr>';

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

        $('#listFiles').append('<table class="table table-bordered table-sm">\
                    <tbody>\
                        ' + listFiles + '\
                    </tbody>\
                </table>');
    }

    $("#formEducation").submit(function(event) {
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
                    const res = await submitApi(url, form.serializeArray(), 'formEducation');
                    if (isSuccess(res)) {
                        var user_id = $('#user_id_education').val();
                        getListEdu(user_id);
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