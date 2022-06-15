@extends('app.templates.blade')

@section('content')

<!-- List Table -->
<div class="row">

    <div class="col-12">
        <div class="row g-4">
            <div class="col-6">
                <label class="form-label"> Employee Name </label>
                <select id="staff_filter" class="form-control" onchange="getDataList()">
                </select>
            </div>

            <div class="col-6">
                <label class="form-label"> Year </label>
                <select id="year_filter" class="form-control" onchange="getDataList()">
                </select>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        Records
                        <button type="button" class="btn btn-warning btn-xs float-end ms-2" onclick="getDataList(true)" title="Refresh">
                            <i class="fas fa-redo-alt"></i>
                        </button>
                        <button type="button" class="btn btn-secondary btn-xs float-end" onclick="formModal()">
                            <i class="fas fa-plus"></i> Evaluate
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
                                        <th> Date </th>
                                        <th> Status </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end::Row-->

<script type="text/javascript">
    $(document).ready(function() {
        getSelectYear();
        getSelectUser();
        setTimeout(function() {
            getDataList();
        }, 500);
    });

    async function getSelectYear() {
        const res = await callApi('post', 'performance/getSelectYear');

        if (isSuccess(res)) {
            $('#year_filter').html(res.data);
        } else {
            noti(res.status);
        }
    }

    async function getSelectUser() {
        const res = await callApi('post', 'user/getSelectUser');

        if (isSuccess(res)) {
            $('#staff_filter').html(res.data);
        } else {
            noti(res.status);
        }
    }

    // server side datatable
    async function getDataList(all = false) {
        
        if (all) {
            $('#staff_filter option:eq("")').prop('selected', true);
        }

        generateDatatable('dataList', 'serverside', 'performance/getPerformanceListDt', 'nodatadiv', {
            'userID': $('#staff_filter').val(),
            'year': $('#year_filter').val(),
        });
    }

    async function viewDetail(id) {
        const res = await callApi('post', 'performance/getPerformanceById', id);

        if (isSuccess(res)) {
            loadFileContent('performance/_evaluateView.php', 'generalContent', 'xl', 'Performance Record', res.data);
        } else {
            noti(res.status);
        }
    }

    function formModal(type = 'create', data = null) {
        // loadFormContent(fileToLoad, modalBodyID, modalSize, urlForm, modalTitle, data, modalType);
        loadFileContent('performance/_evaluateForm.php', 'generalContent', 'xl', 'Evaluate Employee', data);
    }
</script>

@endsection