@extends('app.templates.blade')

@section('content')

<!-- Header -->
<div class="row">
    <div class="col-12">
        <div class="card bg-picture mb-4">
            <div class="d-flex align-items-top" style="height: 250px">
                <img src="{{ asset('img/bg.jpg') }}" alt="Banner image" class="rounded-top img-fluid">
            </div>
            <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4" style="margin-top: -4rem;">
                <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                    <div style="position: relative; display:inline-block;">
                        <img src="" id="user_avatar_view" alt="user image" class="ms-4 mt-4 rounded-circle avatar-xxl img-thumbnail img-fluid">
                        <a href="javascript:void(0)" onclick="updateProfile('{{$userID}}')" class="btn btn-icon btn-xs btn-info" style="position: absolute; top: 50px; right: -3px;" title="Change profile">
                            <i class="fas fa-camera" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <div class="flex-grow-1 mt-3 mt-sm-5">
                    <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                        <div class="user-profile-info">
                            <h4 id="user_fullname"></h4>
                            <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                <li class="list-inline-item fw-semibold">
                                    <i class=" fas fa-address-card" aria-hidden="true"></i>
                                    <span id="user_nric" style="color : #b3b3cc"></span>
                                </li>
                                <li class="list-inline-item fw-semibold">
                                    <i class="fas fa-envelope"></i>
                                    <span id="user_email" style="color : #b3b3cc"></span>
                                </li>
                                <li class="list-inline-item fw-semibold">
                                    <i class="fas fa-phone-square"></i>
                                    <span id="user_contact_no" style="color : #b3b3cc"></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Header -->

<!-- Details -->
<div class="row">
    <div class="col-lg-2 col-md-2 col-sm-2">
        <div class="nav flex-column nav-pills nav-pills-tab" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active show mb-1" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true">Profile</a>
            <a class="nav-link mb-1" id="v-pills-leave-tab" data-bs-toggle="pill" href="#v-pills-leave" role="tab" aria-controls="v-pills-leave" aria-selected="true">Leave</a>
            <a class="nav-link mb-1" id="v-pills-emergency-tab" data-bs-toggle="pill" href="#v-pills-emergency" role="tab" aria-controls="v-pills-emergency" aria-selected="true">Emergency</a>
            <a class="nav-link mb-1" id="v-pills-setting-tab" data-bs-toggle="pill" href="#v-pills-setting" role="tab" aria-controls="v-pills-setting" aria-selected="false">Account Settings</a>
        </div>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-10">
        <div class="tab-content pt-0">
            <div class="tab-pane fade active show" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="card mb-4">
                            <div class="card-body">
                                <small class="text-muted text-uppercase">About</small>
                                <ul class="list-unstyled mb-4 mt-3">
                                    <li class="d-flex align-items-center mb-3">
                                        <i class="fas fa-user"></i>
                                        <span class="fw-semibold mx-2">Preferred Name:</span>
                                        <span id="user_preferred_name_view">-</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-3">
                                        <i class="far fa-check-circle"></i>
                                        <span class="fw-semibold mx-2">Status:</span>
                                        <span id="user_status_view">-</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-3"><i class="far fa-star"></i>
                                        <span class="fw-semibold mx-2">Role:</span>
                                        <span id="role_name_view">-</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-3"><i class="fas fa-transgender"></i>
                                        <span class="fw-semibold mx-2">Gender:</span>
                                        <span id="user_gender_view">-</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="card mb-4">
                            <div class="card-body">
                                <small class="text-muted text-uppercase">Personal Information</small>
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="list-unstyled mb-4 mt-3">
                                            <li class="d-flex align-items-center mb-3">
                                                <i class="fas fa-map-marker-alt"></i>
                                                <span class="fw-semibold mx-2">Address:</span>
                                                <span id="user_address_view">-</span>
                                            </li>
                                            <li class="d-flex align-items-center mb-3">
                                                <i class="fas fa-map-marked-alt"></i>
                                                <span class="fw-semibold mx-2">Postal Code:</span>
                                                <span id="user_postcode_view">-</span>
                                            </li>
                                            <li class="d-flex align-items-center mb-3"><i class="fas fa-map-signs"></i>
                                                <span class="fw-semibold mx-2">City:</span>
                                                <span id="user_city_view">-</span>
                                            </li>
                                            <li class="d-flex align-items-center mb-3"><i class="fas fa-flag"></i>
                                                <span class="fw-semibold mx-2">State:</span>
                                                <span id="user_state_view">-</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul class="list-unstyled mb-4 mt-3">
                                            <li class="d-flex align-items-center mb-3">
                                                <i class="fas fa-birthday-cake"></i>
                                                <span class="fw-semibold mx-2">Birthdate:</span>
                                                <span id="user_dob_view">-</span>
                                            </li>
                                            <li class="d-flex align-items-center mb-3">
                                                <i class="fas fa-handshake"></i>
                                                <span class="fw-semibold mx-2">Race:</span>
                                                <span id="user_race_view">-</span>
                                            </li>
                                            <li class="d-flex align-items-center mb-3"><i class="fas fa-book-open"></i>
                                                <span class="fw-semibold mx-2">Religion:</span>
                                                <span id="user_religion_view">-</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <small class="text-muted text-uppercase">Education</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-leave" role="tabpanel" aria-labelledby="v-pills-leave-tab">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-12">
                                <button type="button" class="btn btn-warning btn-sm float-end ms-2" onclick="getDataList('{{ $userID }}')" title="Refresh">
                                    <i class="fa fa-refresh"></i>
                                </button>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <div id="nodatadiv"> {{ nodata() }} </div>
                                <div id="dataListDiv" class="card-datatable table-responsive" style="display: none;">
                                    <table id="dataList" class="table border-top" width="100%">
                                        <thead class="table-dark table border-top">
                                            <tr>
                                                <th> Student Name </th>
                                                <th> Level </th>
                                                <th> Class </th>
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
            </div>
            <div class="tab-pane fade" id="v-pills-emergency" role="tabpanel" aria-labelledby="v-pills-emergency-tab">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-12">
                                <button type="button" class="btn btn-warning btn-sm float-end ms-2" onclick="getDataList('{{ $userID }}')" title="Refresh">
                                    <i class="fa fa-refresh"></i>
                                </button>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <div id="nodatadiv"> {{ nodata() }} </div>
                                <div id="dataListDiv" class="card-datatable table-responsive" style="display: none;">
                                    <table id="dataList" class="table border-top" width="100%">
                                        <thead class="table-dark table border-top">
                                            <tr>
                                                <th> Student Name </th>
                                                <th> Level </th>
                                                <th> Class </th>
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
            </div>
            <div class="tab-pane fade" id="v-pills-setting" role="tabpanel" aria-labelledby="v-pills-setting-tab">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-header">Change Password</h5>
                        <form id="formAccountSettings" method="POST" action="user/save" class="fv-plugins-bootstrap5 fv-plugins-framework">
                            <div class="row">
                                <div class="mb-3 col-md-6 form-password-toggle fv-plugins-icon-container">
                                    <label class="form-label" for="newPassword">New Password</label>
                                    <div class="input-group input-group-merge has-validation">
                                        <input class="form-control" type="password" id="newPassword" name="user_password" placeholder="············">
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>

                                <div class="mb-3 col-md-6 form-password-toggle fv-plugins-icon-container">
                                    <label class="form-label" for="confirmPassword">Confirm New Password</label>
                                    <div class="input-group input-group-merge has-validation">
                                        <input class="form-control" type="password" name="confirmPassword" id="confirmPassword" placeholder="············">
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <div class="col-12 mb-4">
                                    <p class="fw-semibold mt-2">Password Requirements:</p>
                                    <ul class="ps-3 mb-0">
                                        <li class="mb-1">
                                            Minimum 8 characters long - the more, the better
                                        </li>
                                        <li class="mb-1">At least one lowercase character</li>
                                        <li>At least one number, symbol, or whitespace character</li>
                                    </ul>
                                </div>
                                <div class="col-12 mt-1">
                                    <input type="hidden" name="user_id" id="user_id" value="{{ $userID }}">
                                    <button type="submit" id="submitBtn" class="btn btn-info"> <i class='fa fa-save'></i> Save changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ User Profile Content -->

<script type="text/javascript">
    $(document).ready(function() {
        getUserData('{{ $userID }}');
        // setTimeout(function() {
        //     getDataList('{{ $userID }}');
        // }, 100);
    });

    async function getUserData(id) {
        const res = await callApi('post', "user/getUsersByID", id);

        var path = "{{ asset('upload/image/user/') }}";

        $('#user_nric').text(res.data.user_nric);
        $('#user_fullname').text(res.data.user_fullname);
        $('#user_email').text(res.data.user_email);
        $('#user_contact_no').text(res.data.user_contact_no);
        $("#user_avatar_view").attr("src", path + res.data.user_avatar);

        $('#user_preferred_name_view').text(res.data.user_preferred_name);
        $('#user_dob_view').text(moment(data.user_dob).format("DD MMMM YYYY"));
        $('#user_address_view').text(data.user_address);
        $('#user_city_view').text(data.user_city);
        $('#user_state_view').text(data.user_state);
        $('#user_postcode_view').text(data.user_postcode);
        $('#user_gender_view').text(data.user_gender);
        $('#user_religion_view').text(data.user_religion);
        $('#user_race_view').text(data.user_race);
        
        $('#user_status_view').text((res.data.user_status == '1') ? 'Active' : 'Inactive');
        $('#role_name_view').text((res.data.role_id == '2') ? 'Administrator' : (res.data.role_id == '3') ? 'Employee' : 'Superadmin');
    }

    // server side datatable
    async function getDataList(id) {
        generateDatatable('dataList', 'serverside', 'student/getListChildrenDt', 'nodatadiv', {
            'userID': id
        });
    }

    async function viewStud(id) {
        const res = await callApi('post', "student/getStudentByID", id);
        // check if request is success
        if (isSuccess(res)) {
            loadFileContent('student/_studentView.php', 'generalContent', 'fullscreen', 'Student Information', res.data);
        } else {
            noti(res.status); // show error message
        }
    }

    async function updateRecord(id, encodeID, baseURL) {
        window.location.href = baseURL + 'student/profile/' + encodeID;
    }

    async function updateProfile(id, data = null) {
        data = {
            role_id: 5,
            user_id: id,
            current_userid: "{{ session()->get('userID') }}",
        };
        // loadFormContent('application/application_form.php', null, null, 'application/addNewApplication', 'New Application', data, 'offcanvas');
        loadFileContent('user/_upload.php', 'generalContent', null, 'Upload Profile', data, 'offcanvas');
    }

    $("#formAccountSettings").submit(function(event) {
        event.preventDefault();

        const form = $(this);
        const url = form.attr('action');
        var errorMessage = "";

        if (errorMessage = validatePassword()) {
            return noti(500, errorMessage);
        }

        cuteAlert({
            type: 'question',
            title: 'Are you sure?',
            message: 'Password will be change!',
            closeStyle: 'circle',
            cancelText: 'Abort',
            confirmText: 'Yes, Confirm!',
        }).then(
            async (e) => {
                if (e == 'confirm') {
                    const res = await submitApi(url, form.serializeArray(), 'formAccountSettings');
                    if (res.status == 200) {
                        setTimeout(function() {
                            $('#formAccountSettings').each(function() {
                                this.reset();
                            });
                        }, 200);
                    }
                }
            }
        );
    });

    function validatePassword() {

        var newPass = $('#newPassword').val();
        var confirmPass = $('#confirmPassword').val();

        if (newPass != confirmPass)
            return 'Your passwords does not match.';
        if (newPass.length < 8)
            return 'Your password must be at least 8 characters.';
        if (newPass.search(/[a-z]/) < 0)
            return "Your password must contain at least one lowercase letter.";
        if (newPass.search(/[0-9]/) < 0 && newPass.search(/[!@#$%^&* ]/) < 0)
            return "Your password must contain at least one digit, symbol, or whitespace.";
    }
</script>

@endsection