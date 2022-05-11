@extends('app.templates.blade')

@section('content')

<h4 class="py-3 breadcrumb-wrapper mb-4">
    <span class="text-muted fw-light"> Leave /</span> Rejected Leave
</h4>

<div class="row g-4 mb-4">
    <div class="col-sm-6 col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                    <div class="content-left">
                        <span>New Leave</span>
                        <div class="d-flex align-items-end mt-2">
                            <h2 class="mb-0 me-2" id="newLeave">0</h2>
                        </div>
                    </div>
                    <span class="badge bg-warning rounded p-2">
                        <i class="mdi mdi-calendar-account-outline mdi-48px"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                    <div class="content-left">
                        <span>Approved Leave</span>
                        <div class="d-flex align-items-end mt-2">
                            <h2 class="mb-0 me-2" id="approveLeave">0</h2>
                        </div>
                    </div>
                    <span class="badge bg-success rounded p-2">
                        <i class="mdi mdi-calendar-check-outline mdi-48px"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                    <div class="content-left">
                        <span>Rejected Leave</span>
                        <div class="d-flex align-items-end mt-2">
                            <h2 class="mb-0 me-2" id="rejectLeave">0</h2>
                        </div>
                    </div>
                    <span class="badge bg-danger rounded p-2">
                        <i class="mdi mdi-calendar-remove-outline mdi-48px"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- List Table -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Rejected Leave
                    <button type="button" class="btn btn-warning btn-xs float-end ms-2" onclick="getDataList()" title="Refresh">
                        <i class="fas fa-redo-alt"></i>
                    </button>
                </h5>
            </div>
            <div class="card-body">
                <div id="nodatadiv" style="display: none;"> {{ nodata() }} </div>
                <div id="dataListDiv" class="card-datatable table-responsive" style="display: none;">
                    <table id="dataList" class="table border-top" width="100%">
                        <thead class="table-dark table border-top">
                            <tr>
                                <th> Employee Name </th>
                                <th> Leave Type </th>
                                <th> Date </th>
                                <th> Remark </th>
                                <th> Status </th>
                                <th width="3%"> Action </th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end::Row-->

<script type="text/javascript">
    $(document).ready(function() {
        countLeave();
        getDataList();
    });

    // server side datatable
    async function getDataList() {
        generateDatatable('dataList', 'serverside', 'leave/getListRejectDt', 'nodatadiv');
    }

    async function viewDetail(id) {
        const res = await callApi('post', "leave/getLeaveDetailByID", id);
        // check if request is success
        if (isSuccess(res)) {
            loadFileContent('leave/_leaveView.php', 'generalContent', 'xl', 'Leave View', res.data);
        } else {
            noti(res.status); // show error message
        }
    }

    async function countLeave() {
        const res = await callApi('post', "leave/countLeave");
        // check if request is success
        if (isSuccess(res)) {
            const data = res.data;
            $('#approveLeave').html(data.approve);
            $('#newLeave').html(data.new);
            $('#rejectLeave').html(data.reject);
        } else {
            noti(res.status); // show error message
        }
    }

    async function approveLeave(id) {
        const res = await callApi('post', "leave/getLeaveDetailByID", id);
        loadFileContent('leave/_approveLvForm.php', 'generalContent', 'xl', 'Leave Approval Form', res.data);
    }

    async function rejectLeave(id) {
        const res = await callApi('post', "leave/getLeaveDetailByID", id);
        loadFileContent('leave/_rejectLvForm.php', 'generalContent', 'xl', 'Leave Reject Form', res.data);
    }

    // function formModal(type = 'create', data = null) {
    //     // loadFormContent(fileToLoad, modalBodyID, modalSize, urlForm, modalTitle, data, modalType);
    //     loadFormContent('leave/_applyLeaveForm.php', 'generalContent', 'lg', 'leave/userLeaveSave', 'Apply Leave', data);
    // }
</script>

@endsection