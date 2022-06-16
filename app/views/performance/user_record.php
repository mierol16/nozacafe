@extends('app.templates.blade')

@section('content')

<!-- List Table -->
<div class="row">

    <div class="col-12">

        <div class="row mt-4">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        Records
                        <button type="button" class="btn btn-warning btn-sm float-end ms-2" onclick="getDataList()" title="Refresh">
                            <i class="fas fa-redo-alt"></i>
                        </button>
                        <select id="year_filter" class="form-control float-end ms-2" style="width: 20%;" onchange="getDataList()">
                        </select>
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

    // server side datatable
    async function getDataList() {

        generateDatatable('dataList', 'serverside', 'performance/getPerformanceListDt', 'nodatadiv', {
            'userID': '{{$userID}}',
            'year': $('#year_filter').val(),
        });
    }

    async function viewDetail(id) {
        const res = await callApi('post', 'performance/getPerformanceById', id);

        if (isSuccess(res)) {
            if (res.data.performance_status == 1) {
                loadFileContent('performance/_evaluateView.php', 'generalContent', 'xl', 'Performance Record', res.data);
            } else {
                loadFileContent('performance/_evaluateStaffForm.php', 'generalContent', 'xl', 'Performance Record', res.data);
            }
        } else {
            noti(res.status);
        }
    }
</script>

@endsection