<form id="formApplyLeave" action="leave/userLeaveSave" method="POST">

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label> Leave Type <span class="text-danger">*</span> </label>
                <select id="config_leave_id" name="config_leave_id" class="form-control" required>
                    <option value="">- Select -</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-lg-6">
            <div class="form-group">
                <label> Date From <span class="text-danger">*</span> </label>
                <input type="date" id="leave_date_from" name="leave_date_from" class="form-control" required>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label> Date To <span class="text-danger">*</span> </label>
                <input type="date" id="leave_date_to" name="leave_date_to" class="form-control" required>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="form-group">
                <label> Description <span class="text-danger">*</span> </label>
                <textarea id="leave_description" name="leave_description" class="form-control" autocomplete="off" required></textarea>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-12">
            <span class="text-danger mb-2">* Indicates a required field</span>
            <center>
                <input type="hidden" id="staff_leave_id" name="staff_leave_id" class="form-control" readonly>
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
                    const res = await submitApi(url, form.serializeArray(), 'formApplyLeave', getDataList);
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
</script>