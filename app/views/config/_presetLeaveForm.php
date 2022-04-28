<form id="formPreset" action="leave/presetSave" method="POST">

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label> Present Name <span class="text-danger">*</span> </label>
                <input type="text" id="preset_name" name="preset_name" class="form-control" maxlength="50" autocomplete="off" onkeyup="this.value = this.value.toUpperCase();" required>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="form-group">
                <label> Role <span class="text-danger">*</span> </label>
                <select id="role_id" name="role_id" class="form-control" required>
                    <option value=""> - Select - </option>
                </select>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-12">

            <div id="dataListLeaveDiv" class="card-datatable table-responsive">
                <table id="dataListLeave" class="table table-bordered table-striped" width="100%">
                    <thead class="table-dark table border-top">
                        <tr>
                            <th width="2%"> # </th>
                            <th> Leave Type </th>
                            <th width="25%"> Duration</th>
                        </tr>
                    </thead>
                    <tbody id="leave"></tbody>
                </table>
            </div>

        </div>
    </div>

    <div class="row mt-2">
        <div class="col-lg-12">
            <span class="text-danger mb-2">* Indicates a required field</span>
            <center class="mt-4">
                <input type="hidden" id="preset_leave_id" name="preset_leave_id" class="form-control" readonly>
                <button type="submit" id="submitBtn" class="btn btn-success"> <i class='fa fa-save'></i> Save </button>
            </center>
        </div>
    </div>

</form>

<script>
    $("#formPreset").submit(function(event) {
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
                    const res = await submitApi(url, form.serializeArray(), 'formPreset', getDataPresetList);
                }
            }
        );
    });

    function getPassData(baseUrl, token, data) {
        const ids = (data != null) ? data['leave_id_array'] : null;
        const values = (data != null) ? data['leave_duration_array'] : null;
        const role_id = (data != null) ? data.role_id : null;
        getSelectRole(role_id);
        getListLeave(ids, values);
    }

    async function getSelectRole(roleID = null) {
        const res = await callApi('post', "roles/getListSelect", roleID);
        // check if request is success
        if (isSuccess(res)) {
            $('#role_id').html(res.data);
        } else {
            noti(res.status); // show error message
        }
    }

    async function getListLeave(ids = null, values = null) {
        const res = await callApi('post', "leave/getLeaveListTD", {
            id: ids,
            duration: values,
        });
        // check if request is success
        if (isSuccess(res)) {
            $('#leave').empty();
            $('#leave').html(res.data);
        } else {
            noti(res.status); // show error message
        }
    }

    function inputRead(check, id) {
        
        if (check.checked == true) {
            // alert('checked');
            $('#duration' + id).attr('readonly', false);
        } else {
            $('#duration' + id).attr('readonly', true);
            // alert('null');

        }
    };
</script>