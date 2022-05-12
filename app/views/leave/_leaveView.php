<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-primary" role="alert">
            <h5 class="alert-heading fw-bold mb-1">Leave Details</h5>
        </div>
        <table class="table table-bordered table-sm" width="100%">
            <tbody>
                <tr>
                    <td width="15%" style="background-color: #323a46; color: #fff;">
                        <strong>Employee Name</strong>
                    </td>
                    <td width="30%"><span id="user_fullname" style="font-weight:bold"></span></td>
                    <td width="15%" style="background-color: #323a46; color: #fff;">
                        <strong>Employee No</strong>
                    </td>
                    <td width="30%"><span id="user_no" style="font-weight:bold"></span></td>
                </tr>
                <tr>
                    <td width="15%" style="background-color: #323a46; color: #fff;">
                        <strong>Employee Email</strong>
                    </td>
                    <td width="30%"><span id="user_email" style="font-weight:bold"></span></td>
                    <td width="15%" style="background-color: #323a46; color: #fff;">
                        <strong>Contact No</strong>
                    </td>
                    <td width="30%"><span id="user_contact_no" style="font-weight:bold"></span></td>
                </tr>
                <tr>
                    <td width="15%" style="background-color: #323a46; color: #fff;">
                        <strong>Leave Type</strong>
                    </td>
                    <td width="30%"><span id="leave_name" style="font-weight:bold"></span></td>
                    <td width="15%" style="background-color: #323a46; color: #fff;">
                        <strong>Leave Balance</strong>
                    </td>
                    <td width="30%"><span id="leave_balance" style="font-weight:bold"></span></td>
                </tr>
                <tr>
                    <td width="15%" style="background-color: #323a46; color: #fff;">
                        <strong>Leave Date</strong>
                    </td>
                    <td width="30%"><span id="leave_date" style="font-weight:bold"></span></td>
                    <td width="15%" style="background-color: #323a46; color: #fff;">
                        <strong>Leave Status</strong>
                    </td>
                    <td width="30%"><span id="leave_status"></span></td>
                </tr>
                <tr>
                    <td style="background-color: #323a46; color: #fff;">
                        <strong>Leave Description</strong>
                    </td>
                    <td colspan="3" width="30%"><span id="leave_comment" style="font-weight:bold">N/A</span></td>
                </tr>
                <tr>
                    <td width="15%" style="background-color: #323a46; color: #fff;">
                        <strong>Admin Remark</strong>
                    </td>
                    <td width="30%"><span id="leave_remark" style="font-weight:bold"> - </span></td>
                    <td width="15%" style="background-color: #323a46; color: #fff;">
                        <strong>Admin Action Taken Date</strong>
                    </td>
                    <td width="30%"><span id="date_taken" style="font-weight:bold"> - </span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
    


<script>

    function getPassData(baseUrl, token, data) {

        $('#user_fullname').text(data.user_fullname);
        $('#user_no').text(data.user_no);
        $('#user_email').text(data.user_email);
        $('#user_contact_no').text(data.user_contact_no);

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

        var balance = data.preset_duration - data.leave_duration;

        $('#leave_balance').text(balance + '/' + data.preset_duration);

        $('#leave_date').html(moment(data.leave_date_from).format("DD/MM/YYYY, dddd") + ' - ' + moment(data.leave_date_to).format("DD/MM/YYYY, dddd"));
    }
</script>