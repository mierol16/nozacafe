@extends('app.templates.blade')

@section('content')

<h4 class="py-3 breadcrumb-wrapper mb-4">
    <span class="text-muted fw-light"> Leave /</span> My Leave
</h4>

<!-- List Table -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    List Leaves
                    <button type="button" class="btn btn-warning btn-xs float-end ms-2" onclick="getDataList('{{$userID}}')" title="Refresh">
                        <i class="fas fa-redo-alt"></i>
                    </button>
                    <button type="button" class="btn btn-secondary btn-xs float-end" onclick="formModal()">
                        <i class="fas fa-plus"></i> Apply Leave
                    </button>
                </h5>
            </div>
            <div class="card-body">
                <div id="nodatadiv" style="display: none;"> {{ nodata() }} </div>
                <div id="dataListDiv" class="card-datatable table-responsive" style="display: none;">
                    <table id="dataList" class="table border-top" width="100%">
                        <thead class="table-dark table border-top">
                            <tr>
                                <th> Leave Type </th>
                                <th> Date </th>
                                <th> Apply on </th>
                                <th> Status </th>
                                <th width="2%"> Action </th>
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
        getDataList('{{$userID}}');
    });

    // server side datatable
    async function getDataList(id) {
        generateDatatable('dataList', 'serverside', 'leave/getListByUserIDDt', 'nodatadiv', {
            id: id,
        });
    }

    async function viewRecord(id) {
        const res = await callApi('post', "leave/getLeaveByUserID", id);
        // check if request is success
        if (isSuccess(res)) {
            formModal('update', res.data);
        } else {
            noti(res.status); // show error message
        }
    }

    function deleteRecord(id) {
        cuteAlert({
            type: 'question',
            title: 'Are you sure?',
            message: 'Records will be permanently deleted !',
            closeStyle: 'circle',
            cancelText: 'Abort',
            confirmText: 'Yes, Confirm!',
        }).then(
            async (e) => {
                if (e == 'confirm') {
                    const res = await deleteApi(id, 'leave/delete', getDataList);
                }
            }
        );
    }

    function formModal(type = 'create', data = null) {
        // loadFormContent(fileToLoad, modalBodyID, modalSize, urlForm, modalTitle, data, modalType);
        loadFormContent('leave/_applyLeaveForm.php', 'generalContent', 'lg', 'leave/userLeaveSave', 'Apply Leave', data);
    }
</script>

@endsection