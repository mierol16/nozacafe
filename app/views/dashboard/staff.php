@extends('app.templates.blade')

@section('content')

<div class="row g-4">
    <div class="col-sm-6 col-xl-4">
        <div class="card bg-soft-warning">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                    <div class="content-left">
                        <span>All Leave</span>
                        <div class="d-flex align-items-end mt-2">
                            <h2 class="mb-0 me-2" id="allLeave">0</h2>
                        </div>
                    </div>
                    <span class="badge bg-soft-warning rounded p-2">
                        <i class="mdi mdi-calendar-blank-outline" style="font-size: 60px; opacity: 0.7;"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-4">
        <div class="card bg-soft-success">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                    <div class="content-left">
                        <span>Approved Leave</span>
                        <div class="d-flex align-items-end mt-2">
                            <h2 class="mb-0 me-2" id="appLeave">0</h2>
                        </div>
                    </div>
                    <span class="badge bg-soft-success rounded p-2">
                        <i class="mdi mdi-calendar-check-outline" style="font-size: 60px; opacity: 0.7;"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-4">
        <div class="card bg-soft-danger">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                    <div class="content-left">
                        <span>Rejected Leave</span>
                        <div class="d-flex align-items-end mt-2">
                            <h2 class="mb-0 me-2" id="rejLeave">0</h2>
                        </div>
                    </div>
                    <span class="badge bg-soft-danger rounded p-2">
                        <i class="mdi mdi-calendar-remove-outline" style="font-size: 60px; opacity: 0.7;"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-2">
    <div class="col-sm-12 col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Employee's QR </h4>
                <center>
                    <img src="" id="qr_view" alt="qr image" class="img-fluid" width="77%">
                </center>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-xl-6">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Today Attendance </h4>
                    <table class="table table-borderless" id="attendanceData" width="100%">
                    </table>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div>
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Who's on leave today <small id="today"></small></h4>
                    <div id="showData">
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        countLeaveUser('{{ $userID }}');
        getQR('{{$userID}}');
        getAttData('{{ $userID }}');
        getLeaveData();

        var date = new Date();
        $('#today').html('( ' + moment(date).format("DD/MM/YYYY, dddd") + ' )');
    });

    async function countLeaveUser(id) {
        const res = await callApi('post', "leave/countAllUserLeave", id);
        // check if request is success
        if (isSuccess(res)) {
            var data = res.data
            $('#allLeave').html(data.all);
            $('#appLeave').html(data.approve);
            $('#rejLeave').html(data.reject);
        } else {
            noti(res.status); // show error message
        }
    }

    async function getAttData(id) {
        const res = await callApi('post', "attendance/getAttendanceByUser", id);
        // check if request is success
        if (isSuccess(res)) {
            $('#attendanceData').html(res.data);
        } else {
            noti(res.status); // show error message
        }
    }

    async function getLeaveData() {
        const res = await callApi('post', "leave/getTodayLeave");

        // check if request is success
        if (isSuccess(res)) {
            $('#showData').append(res.data);
        } else {
            noti(res.status); // show error message
        }
    }

    async function getQR(id) {
        const res = await callApi('post', "user/getQRbyUserID", id);

        if (isSuccess(res)) {
            const data = res.data;
            $("#qr_view").attr("src", data.files_path);
        } else {
            noti(res.status);
        }
    }
</script>

@endsection