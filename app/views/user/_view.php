<div class="row">
    <div class="alert alert-primary" role="alert">
        <h4 class="alert-heading fw-bold m-0">Personal Information</h4>
    </div>
    <div class="col-lg-10">
        <div class="row">
            <div class="col-lg-4">
                <label style="color : #b3b3cc">Full Name </label><br>
                <span id="user_fullname_view" style="font-weight:bold"></span>
            </div>
            <div class="col-lg-4">
                <label style="color : #b3b3cc">Preferred Name </label><br>
                <span id="user_preferred_name_view" style="font-weight:bold"></span>
            </div>
            <div class="col-lg-4">
                <label style="color : #b3b3cc">NRIC </label><br>
                <span id="user_nric_view" style="font-weight:bold"></span>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-4">
                <label style="color : #b3b3cc">Email </label><br>
                <span id="user_email_view" style="font-weight:bold"></span>
            </div>
            <div class="col-lg-4">
                <label style="color : #b3b3cc">Gender </label><br>
                <span id="user_gender_view" style="font-weight:bold"></span>
            </div>
            <div class="col-lg-4">
                <label style="color : #b3b3cc">Birthdate </label><br>
                <span id="user_dob_view" style="font-weight:bold"></span>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-4">
                <label style="color : #b3b3cc">Contact No. </label><br>
                <span id="user_contact_no_view" style="font-weight:bold"></span>
            </div>
            <div class="col-lg-4">
                <label style="color : #b3b3cc">Race </label><br>
                <span id="user_race_view" style="font-weight:bold"></span>
            </div>
            <div class="col-lg-4">
                <label style="color : #b3b3cc">Religion </label><br>
                <span id="user_religion_view" style="font-weight:bold"></span>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-4">
                <label style="color : #b3b3cc">Address </label><br>
                <span id="user_address_view" style="font-weight:bold"></span>
            </div>
            <div class="col-lg-4">
                <label style="color : #b3b3cc">Postal Code </label><br>
                <span id="user_postcode_view" style="font-weight:bold"></span>
            </div>
            <div class="col-lg-4">
                <label style="color : #b3b3cc">City / State </label><br>
                <span id="user_city_view" style="font-weight:bold"></span> /
                <span id="user_state_view" style="font-weight:bold"></span>
            </div>
        </div>
    </div>
    <div class="col-lg-2">
        <img src="" id="user_avatar_view" alt="user image" class="d-block h-auto ms-0 rounded-3 img-fluid">
    </div>
</div>

<div class="row mt-4">
    <div class="alert alert-primary" role="alert">
        <h4 class="alert-heading fw-bold m-0">Background Education</h4>
    </div>
    <div class="col-lg-12" id="education_view">
    </div>
</div>

<div class="row mt-4">
    <div class="alert alert-primary" role="alert">
        <h4 class="alert-heading fw-bold m-0">Contact Information</h4>
    </div>
    <div class="col-lg-12" id="contact_view">
    </div>
</div>

<script>
    function getPassData(baseUrl, token, data) {
        var path = baseUrl + "public/upload/image/user/";

        $('#user_fullname_view').text(data.user_fullname);
        $('#user_nric_view').text(data.user_nric);
        $('#user_preferred_name_view').text(data.user_preferred_name);
        $('#user_dob_view').text(moment(data.user_dob).format("DD MMMM YYYY"));
        $('#user_email_view').text(data.user_email);
        $('#user_contact_no_view').text(data.user_contact_no);
        $('#user_address_view').text(data.user_address);
        $('#user_city_view').text(data.user_city);
        $('#user_state_view').text(data.user_state);
        $('#user_postcode_view').text(data.user_postcode);
        $('#user_gender_view').text(data.user_gender);
        $('#user_religion_view').text(data.user_religion);
        $('#user_race_view').text(data.user_race);

        $('#user_avatar_view').attr("src", path + data.user_avatar);

        if (data.education || data.contact) {
            for (i = 0; i < data.education.length; i++) {
                addEducation(data.education[i]);
            }

            for (i = 0; i < data.contact.length; i++) {
                addContact(data.contact[i]);
            }
        }
    }

    function addEducation(data = null) {
        $('#education_view').append('\
            <div class="row mt-2 education">\
                <div class="col-lg-3">\
                    <label style="color : #b3b3cc">Level of Education </label><br>\
                    <span style="font-weight:bold">' + data.education_level + '</span>\
                </div>\
                <div class="col-lg-4">\
                    <label style="color : #b3b3cc">Course </label><br>\
                    <span style="font-weight:bold">' + data.education_course + '</span>\
                </div>\
                <div class="col-lg-4">\
                    <label style="color : #b3b3cc">Institutions Name </label><br>\
                    <span style="font-weight:bold">' + data.education_university + '</span>\
                </div>\
                <div class="col-lg-1">\
                    <button class="btn btn-sm btn-info" title="View Attachment"> <i class="fas fa-eye"></i> </button></center>\
                </div>\
            </div>');
    }

    function addContact(data = null) {
        $('#contact_view').append('\
            <div class="row mt-2 contact">\
                <div class="col-lg-4">\
                    <label style="color : #b3b3cc">Name </label><br>\
                    <span style="font-weight:bold">' + data.contact_name + '</span>\
                </div>\
                <div class="col-lg-3">\
                    <label style="color : #b3b3cc">Relationship </label><br>\
                    <span style="font-weight:bold">' + data.contact_relation + '</span>\
                </div>\
                <div class="col-lg-2">\
                    <label style="color : #b3b3cc">Contact No. 1 </label><br>\
                    <span style="font-weight:bold">' + data.contact_phone_1 + '</span>\
                </div>\
                <div class="col-lg-2">\
                    <label style="color : #b3b3cc">Contact No. 2 </label><br>\
                    <span style="font-weight:bold">' + data.contact_phone_2 + '</span>\
                </div>\
            </div>');
    }
</script>