@extends('app.templates.blade')

@section('content')

<!-- List Table -->
<div class="row">

    <div class="col-12">
        <div class="row g-4">
            <div class="col-4">
                <label class="form-label"> Employee Name </label>
                <select id="staff_filter" class="form-control" onchange="getDataList()">
                </select>
            </div>

            <div class="col-2">
                <label class="form-label"> Month </label>
                <select id="month_filter" class="form-control" onchange="getDataList()">
                    <option value="01"> 01 - January </option>
                    <option value="02"> 02 - Febuary </option>
                    <option value="03"> 03 - March </option>
                    <option value="04"> 04 - April </option>
                    <option value="05"> 05 - May </option>
                    <option value="06"> 06 - June </option>
                    <option value="07"> 07 - July </option>
                    <option value="08"> 08 - August </option>
                    <option value="09"> 09 - September </option>
                    <option value="10"> 10 - October </option>
                    <option value="11"> 11 - November </option>
                    <option value="12"> 12 - December </option>
                </select>
            </div>

            <div class="col-2">
                <label class="form-label"> Year </label>
                <select id="year_filter" class="form-control" onchange="getDataList()">
                </select>
            </div>

            <div class="col-4">
                <label class="form-label"> Record </label>
                <input type="text" id="scannerInput" name="user_no" class="form-control" oninput="saveAttendance()" placeholder="Enter Employee's No" autofocus>
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
                            <button type="button" class="btn btn-primary btn-xs float-end ms-2" id="printBtn" onclick="printTable()" title="Print">
                                <i class="fas fa-print"></i> Print
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
                                        <th> Time In </th>
                                        <th> Time Out </th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <table id="printAttendance" class="table table-bordered border-top" width="100%" style="display: none;background-color: white;">
                <thead class="table-dark table border-top">
                    <tr>
                        <th> Employee Name </th>
                        <th width="10%"> Date </th>
                        <th width="15%"> Time In </th>
                        <th width="15%"> Time Out </th>
                    </tr>
                </thead>
                <tbody id="printDataList"></tbody>
            </table>

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
            focusInput();
        }, 500);
    });

    function focusInput() {
        $("#scannerInput").css("background", "#FFFECE");
        $("#scannerInput").focus();
        setTimeout(function() {
            focusInput();
        }, 5000);
    }

    async function getSelectYear() {
        const res = await callApi('post', 'attendance/getSelectYear');

        if (isSuccess(res)) {
            $('#year_filter').html(res.data);

            var date = new Date();
            $('#month_filter option:eq(' + date.getMonth() + ')').prop('selected', true);
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

        generateDatatable('dataList', 'serverside', 'attendance/getAttendanceListDt', 'nodatadiv', {
            'userID': $('#staff_filter').val(),
            'month': $('#month_filter').val(),
            'year': $('#year_filter').val(),
        });
    }

    async function printTable() {
        const res = await callApi('post', 'attendance/getAttendanceList', {
            'userID': $('#staff_filter').val(),
            'month': $('#month_filter').val(),
            'year': $('#year_filter').val(),
        });

        if (isSuccess(res)) {
            $('#printDataList').html(res.data);
            $('#printAttendance').show();
            setTimeout(function() {
                print('printAttendance');
            }, 200);
            setTimeout(function() {
                $('#printAttendance').hide();
            }, 2000);
        } else {
            noti(res.status);
        }
    }

    async function saveAttendance() {
        var userNo = $('#scannerInput').val();

        if (userNo.length > 6) {
            $('#scannerInput').prop('disabled', true);
            // call api to record
            const res = await callApi('post', "attendance/recordAttendance", {
                'userNo': userNo,
                'attendance_status': 1,
            });

            if (isSuccess(res)) {
                var resCode = parseInt(res.data.resCode);
                var message = (resCode == 500) ? res.data.message : 'Attendance record';
                noti(resCode, message);
                getDataList();
                $('#scannerInput').prop('disabled', false);
                $('#scannerInput').val('');
                focusInput();
            } else {
                noti(res.status); // show error message
            }
        }
    }
</script>

@endsection