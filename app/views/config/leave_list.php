@extends('app.templates.blade')

@section('content')

<h4 class="py-3 breadcrumb-wrapper mb-4">
    <span class="text-muted fw-light"> Settings /</span> Leaves
</h4>

<!-- List Table -->
<div class="row">
    <div class="col-6 col-md-12">
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

    <div class="col-6 col-md-12">
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
                <div id="nodatadivPreset" style="display: none;"> {{ nodata() }} </div>
                <div id="dataListPresetDiv" class="card-datatable table-responsive" style="display: none;">
                    <table id="dataListPreset" class="table border-top" width="100%">
                        <thead class="table-dark table border-top">
                            <tr>
                                <th> Name </th>
                                <th> Total Leave </th>
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
        getDataList();
        getDataPresetList();
    });

    // server side datatable
    async function getDataList() {
        generateDatatable('dataList', 'serverside', 'leave/getListDt', 'nodatadiv');
    }

    // server side datatable
    async function getDataPresetList() {
        generateDatatable('dataListPreset', 'serverside', 'leave/getPresetListDt', 'nodatadivPreset');
    }

    async function updateRecord(id) {
        const res = await callApi('post', "leave/getLeaveByID", id);
        // check if request is success
        if (isSuccess(res)) {
            formModal('update', res.data);
        } else {
            noti(res.status); // show error message
        }
    }

    async function updatePresetRecord(id) {
        const res = await callApi('post', "leave/getPresetByID", id);
        // check if request is success
        if (isSuccess(res)) {
            presetFormModal('update', res.data);
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

    function deletePresetRecord(id) {
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
                    const res = await deleteApi(id, 'leave/deletePreset', getDataPresetList);
                }
            }
        );
    }

    function formModal(type = 'create', data = null) {
        const modalTitle = (type == 'create') ? 'Register Leave' : 'Update Leave';
        const urlForm = (type == 'create') ? 'leave/create' : 'leave/update';
        loadFormContent('config/_leaveForm.php', 'generalContent', 'md', urlForm, modalTitle, data);
    }

    function presetFormModal(type = 'create', data = null) {
        const modalTitle = (type == 'create') ? 'Register Preset' : 'Update Preset';
        loadFormContent('config/_presetLeaveForm.php', 'generalContent', 'md', 'leave/presetSave', modalTitle, data);
    }
</script>

@endsection