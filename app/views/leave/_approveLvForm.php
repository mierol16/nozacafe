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

        <form id="formApproveLeave" action="leave/approvalLeave" method="POST">
        
        <div class="row mt-2">
            <div class="alert alert-primary" role="alert">
                <h5 class="alert-heading fw-bold m-0">Approve Details</h5>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label> Remarks <span class="text-danger">*</span> </label>
                    <input id="leave_remark" name="leave_remark" class="form-control" autocomplete="off" required>
                </div>
            </div>
            </div>
        
            <div class="row mt-4">
                <div class="col-lg-12">
                    <span class="text-danger mb-2">* Indicates a required field</span>
                    <center>
                        <input type="hidden" id="staff_leave_id" name="staff_leave_id" class="form-control" readonly>
                        <input type="hidden" id="leave_status_form" name="leave_status" class="form-control" readonly>
                        <input type="hidden" id="user_id" name="user_id" class="form-control" readonly>
                        <button type="submit" id="submitBtn" class="btn btn-success">  </button>
                    </center>
                </div>
            </div>
        
        </form>
    </div>
</div>


<script>
    $("#formApproveLeave").submit(function(event) {
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
                    const res = await submitApi(url, form.serializeArray(), 'formApproveLeave', getDataList);

                    if (isSuccess(res)) {
                        setTimeout(function() {
                            $('#generalModal-xl').modal('hide');
                        }, 200);
                    }
                }
            }
        );
    });

    function getPassData(baseUrl, token, data) {

        $('#user_id').val(data.user_id);
        $('#staff_leave_id').val(data.staff_leave_id);
        $('#leave_status_form').val(data.status);

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

        var submitBtn = '';

        if (data.status == 2) {
            $('#submitBtn').attr("class", "btn btn-success");
            submitBtn = '<i class="fa fa-save"></i> Approve';
        } else {
            $('#submitBtn').attr("class", "btn btn-danger");
            submitBtn = '<i class="fa fa-save"></i> Reject';
        }

        $('#submitBtn').html(submitBtn);

        $('#leave_status').html(status);
        $('#leave_name').text(data.leave_name);
        $('#leave_comment').text(data.leave_comment);

        $('#leave_balance').text(data.balance + '/' + data.preset_duration);

        $('#leave_date').html(moment(data.leave_date_from).format("DD/MM/YYYY, dddd") + ' - ' + moment(data.leave_date_to).format("DD/MM/YYYY, dddd"));
    }
</script>