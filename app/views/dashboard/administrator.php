@extends('app.templates.blade')

@section('content')

<div class="row g-4">
    <div class="col-sm-6 col-xl-6">
        <div class="card bg-soft-info">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                    <div class="content-left">
                        <span>All Employees</span>
                        <div class="d-flex align-items-end mt-2">
                            <h2 class="mb-0 me-2" id="allStaff">0</h2>
                        </div>
                    </div>
                    <span class="badge bg-soft-info rounded p-2">
                        <i class="mdi mdi-account-multiple-outline" style="font-size: 60px; opacity: 0.7;"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-6">
        <div class="card bg-soft-success">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                    <div class="content-left">
                        <span>All Leaves</span>
                        <div class="d-flex align-items-end mt-2">
                            <h2 class="mb-0 me-2" id="allLeave">0</h2>
                        </div>
                    </div>
                    <span class="badge bg-soft-success rounded p-2">
                        <i class="mdi mdi-calendar-blank-outline" style="font-size: 60px; opacity: 0.7;"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-2">
    <div class="col-sm-12 col-xl-8">
        <div class="card">
            <div class="card-body">

                <div id="calendar"></div>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div>
    <div class="col-sm-12 col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Who's on leave today <small id="today"></small></h4>
                <div id="showData">
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        countUsers();
        countLeave();
        getLeaveData();

        var date = new Date();
        $('#today').html('( ' + moment(date).format("DD/MM/YYYY, dddd") + ' )');
    });

    async function countUsers() {
        const res = await callApi('post', "user/countAllUser");
        // check if request is success
        if (isSuccess(res)) {
            $('#allStaff').html(res.data);
        } else {
            noti(res.status); // show error message
        }
    }

    async function countLeave() {
        const res = await callApi('post', "leave/countAllLeave");
        // check if request is success
        if (isSuccess(res)) {
            $('#allLeave').html(res.data);
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
</script>

@endsection