@extends('app.templates.blade')

@section('content')

<!-- Header -->
<div class="row">
    <div class="col-12">
        <div class="card bg-picture mb-4">
            <div class="d-flex align-items-top" style="height: 250px">
                <img src="{{ asset('img/bg.jpg') }}" alt="Banner image" class="rounded-top img-fluid">
                @if (session()->get('userID') != $userID)
                <a href="{{ ($currentSubSidebar == 'staff') ? url('user/employee') : url('user/admin') }}" class="btn btn-default p-2 border-all" style="position: absolute; top: 12px; left: -10px; z-index: 1;background-color:#FC3131;box-shadow:0 10px 20px -10px #FC3131;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left" style="color: white;">
                        <line x1="19" y1="12" x2="5" y2="12"></line>
                        <polyline points="12 19 5 12 12 5"></polyline>
                    </svg>
                    <span style="color: white;">Back to list</span>
                </a>
                @endif
            </div>
            <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4" style="margin-top: -4rem;">
                <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                    <div style="position: relative; display:inline-block;">
                        <img src="" id="user_avatar_view" alt="user image" class="ms-4 mt-4 rounded-circle avatar-xxl img-thumbnail img-fluid">
                        @if (session()->get('userID') == $userID)
                        <a href="javascript:void(0)" onclick="updateProfile('{{$userID}}')" class="btn btn-icon btn-xs btn-info" style="position: absolute; top: 50px; right: -3px;" title="Change profile">
                            <i class="fas fa-camera" aria-hidden="true"></i>
                        </a>
                        @endif
                    </div>
                </div>
                <div class="flex-grow-1 mt-3 mt-sm-5">
                    <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                        <div class="user-profile-info">
                            <small id="user_no"></small>
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
            @if (session()->get('userID') == $userID)
            <a class="nav-link mb-1" id="v-pills-setting-tab" data-bs-toggle="pill" href="#v-pills-setting" role="tab" aria-controls="v-pills-setting" aria-selected="false">Account Settings</a>
            @endif
        </div>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-10">
        <div class="tab-content pt-0">
            <div class="tab-pane fade active show" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="card mb-4">
                            <div class="card-body">
                                <small class="text-muted text-uppercase">QR Code</small><br>
                                <center>
                                    <img src="" id="qr_view" alt="qr image" class="img-fluid" width="77%">
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
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
                                    <div class="col-md-9">
                                        <small class="text-muted text-uppercase">Personal Information</small>
                                        <div class="row">
                                            <div class="col-md-7">
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
                                            <div class="col-md-5">
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
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <small class="text-muted text-uppercase">Education</small>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="button" class="btn btn-warning btn-xs float-end ms-2" title="Refresh" onclick="getListEdu('{{$userID}}')">
                                            <i class="fas fa-redo-alt"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-12">
                                        <div id="nodatadivEducation"> {{ nodata() }} </div>
                                        <div id="dataListEducationDiv" class="card-datatable table-responsive" style="display: none;">
                                            <table id="dataListEducation" class="table border-top" width="100%">
                                                <thead class="table-dark table border-top">
                                                    <tr>
                                                        <th> Institution Name </th>
                                                        <th> Education Level </th>
                                                        <th> Education Course </th>
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
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-leave" role="tabpanel" aria-labelledby="v-pills-leave-tab">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-12">
                                <button type="button" class="btn btn-warning btn-xs float-end ms-2" onclick="getDataListLeave('{{ $userID }}')" title="Refresh">
                                    <i class="fas fa-redo-alt"></i>
                                </button>
                                @if (session()->get('userID') == $userID) 
                                <a href="{{ url('leave/userLeave') }}" class="btn btn-info btn-xs float-end">
                                    go to Leave Page <i class="fas fa-arrow-right"></i>
                                </a>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <div id="nodatadivLeave"> {{ nodata() }} </div>
                                <div id="dataListLeaveDiv" class="card-datatable table-responsive" style="display: none;">
                                <table id="dataListLeave" class="table border-top" width="100%">
                                        <thead class="table-dark table border-top">
                                            <tr>
                                                <th> Leave Type </th>
                                                <th> Date </th>
                                                <th> Apply on </th>
                                                <th> Status </th>
                                                @if (session()->get('userID') == $userID)
                                                <th width="2%"> Action </th>
                                                @endif
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
                                <button type="button" class="btn btn-warning btn-sm float-end ms-2" onclick="getListContact('{{ $userID }}')" title="Refresh">
                                    <i class="fas fa-redo-alt"></i>
                                </button>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <div id="nodatadivContact"> {{ nodata() }} </div>
                                <div id="dataListContactDiv" class="card-datatable table-responsive" style="display: none;">
                                    <table id="dataListContact" class="table border-top" width="100%">
                                        <thead class="table-dark table border-top">
                                            <tr>
                                                <th> Name </th>
                                                <th> Relationship </th>
                                                <th> HP No. 1 </th>
                                                <th> HP No. 2 </th>
                                                @if (session()->get('userID') == $userID)
                                                <th width="2%"> Action </th>
                                                @endif
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
        setTimeout(function() {
            getQR('{{$userID}}');
            getDataListLeave('{{$userID}}');
            getListEdu('{{$userID}}');
            getListContact('{{$userID}}');
        }, 100);
    });

    async function getUserData(id) {
        const res = await callApi('post', "user/getUsersByID", id);

        var path = "{{ asset('upload/image/user/') }}";

        $('#user_nric').text(res.data.user_nric);
        $('#user_no').text(res.data.user_no);
        $('#user_fullname').text(res.data.user_fullname);
        $('#user_email').text(res.data.user_email);
        $('#user_contact_no').text(res.data.user_contact_no);
        $("#user_avatar_view").attr("src", path + res.data.user_avatar);
        $('#user_status_view').text((res.data.user_status == '1') ? 'Active' : 'Inactive');
        $('#role_name_view').text((res.data.role_id == '2') ? 'Administrator' : (res.data.role_id == '3') ? 'Employee' : 'Superadmin');

        $('#user_preferred_name_view').text(res.data.user_preferred_name);
        $('#user_dob_view').text(moment(res.data.user_dob).format("DD MMMM YYYY"));
        $('#user_address_view').text(res.data.user_address);
        $('#user_city_view').text(res.data.user_city);
        $('#user_state_view').text(res.data.user_state);
        $('#user_postcode_view').text(res.data.user_postcode);
        $('#user_gender_view').text(res.data.user_gender);
        $('#user_religion_view').text(res.data.user_religion);
        $('#user_race_view').text(res.data.user_race);
        
    }

    // server side datatable
    async function getDataListLeave(id) {
        generateDatatable('dataListLeave', 'serverside', 'leave/getListByUserIDDt', 'nodatadivLeave', {
            id: id,
        });
    }

    // server side datatable
    async function getListEdu(id) {
        generateDatatable('dataListEducation', 'serverside', 'education/getListByUserIDDt', 'nodatadivEducation', {
            id: id,
        });
    }

    // server side datatable
    async function getListContact(id) {
        generateDatatable('dataListContact', 'serverside', 'contact/getListByUserIDDt', 'nodatadivContact', {
            id: id,
        });
    }

    async function updateRecord(id, type) {
        const url = (type == 'education') ? "education/getDataByID" : "contact/getContactByID";
        const res = await callApi('post', url, id);

        if (isSuccess(res)) {
            (type == 'education') ? addEdu('update', res.data) : addContact('update', res.data)
        } else {
            noti(res.status);
        }
    }

    async function viewRecord(id) {
        const res = await callApi('post', "education/getDataByID", id);

        if (isSuccess(res)) {
            const data = res.data;

            if (data != null) {

                const files = data.files;
                previewPDF(files.files_path, files.files_extension);
            }

        } else {
            noti(res.status);
        }
    }

    function deleteRecord(id, type) {
        const url = (type == 'education') ? 'education/delete' : 'contact/delete';
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
                    const res = await deleteApi(id, url, getDataList);
                }
            }
        );
    }

    async function updateProfile(id, data = null) {
        data = {
            role_id: "{{ session()->get('roleID') }}",
            user_id: id,
            current_userid: "{{ session()->get('userID') }}",
        };
        // loadFormContent('application/application_form.php', null, null, 'application/addNewApplication', 'New Application', data, 'offcanvas');
        loadFileContent('profile/_upload.php', 'generalContent', null, 'Upload Profile', data, 'offcanvas');
    }

    function addEdu(type = 'create', data = null) {
        const modalTitle = (type == 'create') ? 'Add Education' : 'Update Education';
        const urlForm = (type == 'create') ? 'education/save' : 'education/save';

        if (data == null) {
            data = {
                'user_id': '{{$userID}}',
            };
        }

        loadFormContent('profile/_educationForm.php', 'generalContent', 'xl', urlForm, modalTitle, data);
    }

    function addContact(type = 'create', data = null) {
        const modalTitle = (type == 'create') ? 'Add Emergency Contact' : 'Update Emergency Contact';
        const urlForm = (type == 'create') ? 'contact/save' : 'contact/save';

        if (data == null) {
            data = {
                'user_id': '{{$userID}}',
            };
        }

        loadFormContent('profile/_contactForm.php', 'generalContent', 'xl', urlForm, modalTitle, data);
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