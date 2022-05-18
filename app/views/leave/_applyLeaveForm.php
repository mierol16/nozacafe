<form id="formApplyLeave" action="leave/userLeaveSave" method="POST">

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label> Leave Type <span class="text-danger">*</span> </label>
                <select id="config_leave_id" name="config_leave_id" onchange="countBal()" class="form-control" required>
                    <option value="">- Select -</option>
                </select>
                <span id="countBal" class="text-danger"></span>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-lg-6">
            <div class="form-group">
                <label> Date From <span class="text-danger">*</span> </label>
                <input type="date" id="leave_date_from" name="leave_date_from" onchange="countDays()" class="form-control" required>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label> Date To <span class="text-danger">*</span> </label>
                <input type="date" id="leave_date_to" name="leave_date_to" onchange="countDays()" class="form-control" required>
            </div>
        </div>
        <span id="alertLeave" class="text-danger"></span>
    </div>

    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="form-group">
                <label> Description <span class="text-danger">*</span> </label>
                <textarea id="leave_comment" name="leave_comment" class="form-control" autocomplete="off" required></textarea>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-lg-12">
            <label class="form-label"> Upload Cert </label>
            <input type="file" name="leave_file" class="form-control" accept="image/x-png,image/jpeg,image/jpg, .pdf">
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
    </div>

    <div class="row mt-4">
        <div class="col-lg-12">
            <span class="text-danger mb-2">* Indicates a required field</span>
            <center>
                <input type="hidden" id="staff_leave_id" name="staff_leave_id" class="form-control" readonly>
                <input type="hidden" id="user_id" name="user_id" class="form-control" readonly>
                <button type="submit" id="submitBtn" class="btn btn-success"> <i class='fa fa-save'></i> Save </button>
            </center>
        </div>
    </div>

</form>

<script>
    $("#formApplyLeave").submit(function(event) {
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
                    const res = await submitApi(url, form.serializeArray(), 'formApplyLeave');
                    
                    if (isSuccess(res)) {
                        const user_id = $('#user_id').val();
                        getDataList(user_id);
                    }
                }
            }
        );
    });

    function getPassData(baseUrl, token, data) {
        getSelectLeave();
    }

    async function getSelectLeave() {
        const res = await callApi('post', "leave/getListConfigByUserID");
        // check if request is success
        if (isSuccess(res)) {
            $('#config_leave_id').html(res.data);
        } else {
            noti(res.status); // show error message
        }
    }

    async function countDays() {
        var leave_id = $('#config_leave_id').val();
        if (leave_id == "" || leave_id == null) {
            return noti(500, 'Leave type is required');
        }

        const res = await callApi('post', "leave/countDayLeave", {
            'user_id': $('#user_id').val(),
            'config_leave_id': $('#config_leave_id').val(),
            'leave_date_from': $('#leave_date_from').val(),
            'leave_date_to': $('#leave_date_to').val(),
        });
        // check if request is success
        if (isSuccess(res)) {
            $('#alertLeave').empty();
            $('#submitBtn').attr('disabled', false);

            var data = res.data;

            var days = parseFloat(data.days);
            var bal = parseFloat(data.balance);

            if (bal != 0.0) {
                if (days > bal) {
                    $('#submitBtn').attr('disabled', true);
                    $('#alertLeave').html("<i>You don't have enough balance remaining</i>");
                }
            } else {
                $('#submitBtn').attr('disabled', true);
                $('#alertLeave').html("<i>You don't have enough balance remaining</i>");
            }
        } else {
            noti(res.status); // show error message
        }

    }

    async function countBal() {
        const res = await callApi('post', "leave/countBalLeave", {
            'user_id': $('#user_id').val(),
            'config_leave_id': $('#config_leave_id').val(),
        });
        // check if request is success
        if (isSuccess(res)) {
            var bal = parseFloat(res.data);;
            if (res.data < 0.0) {
                bal = 0.0;
                $('#submitBtn').attr('disabled', true);
            }
            $('#countBal').html('<i>' + bal + ' days remaining</i>');
        } else {
            noti(res.status); // show error message
        }

    }
</script>