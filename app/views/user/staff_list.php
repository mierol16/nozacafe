@extends('app.templates.blade')

@section('content')

<h4 class="py-3 breadcrumb-wrapper mb-4">
    <span class="text-muted fw-light"> Users /</span> Employee
</h4>

<!-- Users List Table -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    List Employee
                    <button type="button" class="btn btn-warning btn-xs float-end ms-2" onclick="getDataList()" title="Refresh">
                        <i class="fas fa-redo-alt"></i>
                    </button>
                    <button type="button" class="btn btn-secondary btn-xs float-end" onclick="formModal()">
                        <i class="fas fa-plus"></i> Add Employee
                    </button>
                </h5>
            </div>
            <div class="card-body">
                <div id="nodatadiv" style="display: none;"> {{ nodata() }} </div>
                <div id="dataListDiv" class="card-datatable table-responsive" style="display: none;">
                    <table id="dataList" class="table border-top" width="100%">
                        <thead class="table-dark table border-top">
                            <tr>
                                <th> Name </th>
                                <th> Email </th>
                                <th> Contact </th>
                                <th> Status </th>
                                <th width="4%"> Action </th>
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
    });

    // server side datatable
    async function getDataList() {
        generateDatatable('dataList', 'serverside', 'user/getListStaffDt', 'nodatadiv');
    }

    async function viewInfo(id) {
        const res = await callApi('post', "user/getUsersByID", id);

        if(isSuccess(res)) {
            loadFileContent('user/_view.php', 'generalContent', 'fullscreen', 'Employee Information', res.data);
        } else {
            noti(res.status);
        }
    }

    async function updateRecord(id) {
        const res = await callApi('post', "user/getUsersByID", id);

        if (isSuccess(res)) {
            formModal('update', res.data);
        } else {
            noti(res.status);
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
                    const res = await deleteApi(id, 'user/delete', getDataList);
                }
            }
        );
    }

    function formModal(type = 'create', data = null) {
        if (!data) {
            data = {
                role_id: 3
            };
        }
        const modalTitle = (type == 'create') ? 'Register Employee' : 'Update Employee';
        loadFileContent('user/_form.php', 'generalContent', 'fullscreen', modalTitle, data);
    }
</script>

@endsection

<!-- 

 SIMPLE DOCUMENTATION FOR VIEW

 FUNCTION AVAILABLE (USE ONLY IN SCRIPT)
    1) loadFormContent(fileToLoad, modalBodyID, modalSize, urlForm, modalTitle, data, modalType)
    2) loadFileContent(fileToLoad, modalBodyID, modalSize, modalTitle, data, modalType)
    3) callApi(methodToPost, url, id)
    4) submitApi(url, dataFromFormToSubmit, formID, functionNameToReload)
    5) deleteApi(id, url, functionNameToReload)
    6) noti(codeResponse, textToDisplay)
    7) isset(value)

 Notes : 
 - for more global function please go to folder :-
    1) public/framework/js/common.js 
    2) public/framework/php/general.php 

 Reminder :
 - Please avoid redeclare same function name in both file above
       
 -->