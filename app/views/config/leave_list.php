@extends('app.templates.blade')

@section('content')

<h4 class="py-3 breadcrumb-wrapper mb-4">
    <span class="text-muted fw-light"> Settings /</span> Leaves
</h4>

<!-- List Table -->
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    List Leaves
                    <button type="button" class="btn btn-warning btn-xs float-end ms-2" onclick="getDataList()" title="Refresh">
                        <i class="fas fa-redo-alt"></i>
                    </button>
                    <button type="button" class="btn btn-secondary btn-xs float-end" onclick="formModal()">
                        <i class="fas fa-plus"></i> Add Leave
                    </button>
                </h5>
            </div>
            <div class="card-body">
                <div id="nodatadiv" style="display: none;"> {{ nodata() }} </div>
                <div id="dataListDiv" class="card-datatable table-responsive" style="display: none;">
                    <table id="dataList" class="table border-top" width="100%">
                        <thead class="table-dark table border-top">
                            <tr>
                                <th> Leave Name </th>
                                <th> Description </th>
                                <th width="2%"> Action </th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Preset Leaves
                    <button type="button" class="btn btn-warning btn-xs float-end ms-2" onclick="getDataPresetList()" title="Refresh">
                        <i class="fas fa-redo-alt"></i>
                    </button>
                    <button type="button" class="btn btn-secondary btn-xs float-end" onclick="presetFormModal()">
                        <i class="fas fa-plus"></i> Add Preset
                    </button>
                </h5>
            </div>
            <div class="card-body">
            </div>
        </div>
    </div>
</div>
<!--end::Row-->

<script type="text/javascript">
    $(document).ready(function() {
        getDataList();
        getDataPresetList();
    });

    // server side datatable
    async function getDataList() {
        generateDatatable('dataList', 'serverside', 'leave/getListDt', 'nodatadiv');
    }

    // // server side datatable
    // async function getDataPresetList() {
    //     generateDatatable('dataList', 'serverside', 'leave/getPresetListDt', 'nodatadivPreset');
    // }

    async function updateRecord(id) {
        const res = await callApi('post', "leave/getLeaveByID", id);
        // check if request is success
        if (isSuccess(res)) {
            formModal('update', res.data);
        } else {
            noti(res.status); // show error message
        }
    }

    // async function assignRecord(id) {
    //     const res = await callApi('post', "leave/getLeaveByID", id);
    //     // check if request is success
    //     if (isSuccess(res)) {
    //         assignModal('update', res.data);
    //     } else {
    //         noti(res.status); // show error message
    //     }
    // }

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
        const modalTitle = (type == 'create') ? 'Register Leave' : 'Update Leave';
        const urlForm = (type == 'create') ? 'leave/create' : 'leave/update';
        // loadFormContent(fileToLoad, modalBodyID, modalSize, urlForm, modalTitle, data, modalType);
        loadFormContent('config/_leaveForm.php', 'generalContent', 'md', urlForm, modalTitle, data);
    }
</script>

@endsection