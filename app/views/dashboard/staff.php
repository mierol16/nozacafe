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

<script type="text/javascript">
    $(document).ready(function() {
        countLeaveUser('{{ $userID }}');
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
</script>

@endsection