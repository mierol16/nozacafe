<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="alert alert-primary" role="alert">
                <h5 class="alert-heading fw-bold m-0">Applicant Details</h5>
            </div>
            <div class="col-lg-6">
                <label style="color : #b3b3cc">Employee No</label><br>
                <span id="user_no" style="font-weight:bold"></span>
            </div>
            <div class="col-lg-6">
                <label style="color : #b3b3cc">Full Name</label><br>
                <span id="user_fullname" style="font-weight:bold"></span>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-6">
                <label style="color : #b3b3cc">Email</label><br>
                <span id="user_email" style="font-weight:bold"></span>
            </div>
            <div class="col-lg-6">
                <label style="color : #b3b3cc">Contact No</label><br>
                <span id="user_contact_no" style="font-weight:bold"></span>
            </div>
        </div>
    </div>

    <div class="col-lg-12">

        <div class="row mt-2">
            <div class="alert alert-primary" role="alert">
                <h5 class="alert-heading fw-bold m-0">Leave Details</h5>
            </div>
            <div class="col-lg-4">
                <label style="color : #b3b3cc">Leave Status </label><br>
                <span id="leave_status" style="font-weight:bold"></span>
            </div>
            <div class="col-lg-4">
                <label style="color : #b3b3cc">Leave Type </label><br>
                <span id="leave_name" style="font-weight:bold"></span>
            </div>
            <div class="col-lg-4">
                <label style="color : #b3b3cc">Leave Balance </label><br>
                <span id="leave_balance" style="font-weight:bold"></span>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-lg-4">
                <label style="color : #b3b3cc">Leave Date </label><br>
                <span id="leave_date" style="font-weight:bold"></span>
            </div>
            <div class="col-lg-4">
                <label style="color : #b3b3cc">Leave Description </label><br>
                <span id="leave_comment" style="font-weight:bold"></span>
            </div>
            <div class="col-lg-4">
                <label style="color : #b3b3cc">Attachment </label><br>
                <button class="btn btn-xs btn-success" id="preview_file" title="Attachment"><i class="fas fa-folder-open"></i> </button>
            </div>
        </div>

        
        <div class="row mt-2">
            <div class="alert alert-primary" role="alert">
                <h5 class="alert-heading fw-bold m-0">Approval Details</h5>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label style="color : #b3b3cc"> Remarks </label><br>
                    <span id="leave_remark" style="font-weight:bold"> - </span>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label style="color : #b3b3cc"> Admin Action Taken Date </label><br>
                    <span id="date_taken" style="font-weight:bold"> - </span>
                </div>
            </div>
        </div>
    </div>
</div>
    


<script>

    function getPassData(baseUrl, token, data) {

        $('#user_fullname').text(data.user_fullname);
        $('#user_no').text(data.user_no);
        $('#user_email').text(data.user_email);
        $('#user_contact_no').text(data.user_contact_no);

        if (data.files) {
            var files = data.files;
            $('#preview_file').attr("onclick", "previewPDF('" + files.files_path + "', '" + files.files_extension + "')");
        } else {
            $('#preview_file').attr("disabled", true);
            $('#preview_file').attr("class", "btn btn-xs btn-danger");
            $('#preview_file').html('<i class="fas fa-times"></i>');
        }

        var status = '';

        if (data.leave_status == 1) {
            status = '<h4 class="m-0"><span class="badge bg-warning">Waiting for Approval</span></h4>';
        } else if (data.leave_status == 2) {
            status = '<h4 class="m-0"><span class="badge bg-success">Approved</span></h4>';
        } else if (data.leave_status == 3) {
            status = '<h4 class="m-0"><span class="badge bg-danger">Not Approved</span></h4>';
        } else {
            status = '';
        }

        $('#leave_status').html(status);
        $('#leave_name').text(data.leave_name);
        $('#leave_comment').text(data.leave_comment);
        $('#leave_remark').text(data.leave_remark);
        $('#date_taken').text(moment(data.updated_at).format("DD/MM/YYYY hh:mm A"));

        $('#leave_balance').text(data.balance + '/' + data.preset_duration);

        $('#leave_date').html(moment(data.leave_date_from).format("DD/MM/YYYY, dddd") + ' - ' + moment(data.leave_date_to).format("DD/MM/YYYY, dddd"));
    }
</script>