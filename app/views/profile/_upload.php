<!-- upload profile -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css" integrity="sha512-zxBiDORGDEAYDdKLuYU9X/JaJo/DPzE42UubfBw9yg8Qvb2YRRIQ8v4KsGHOx2H1/+sdSXyXxLXv5r7tHc9ygg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js" integrity="sha512-Gs+PsXsGkmr+15rqObPJbenQ2wB3qYvTHuJO6YJzPe/dTLvhy0fmae2BcnaozxDo5iaF8emzmCZWbQ1XXiX2Ig==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="row">
    <div class="col-12">
        <input id="image" type="file" name="change_image" class="form-control mb-4" accept="image/x-png,image/jpeg,image/jpg">

        <div style="position: relative; display:inline-block;">
            <div id="resizer" class="mt-2"></div>
            <center>
                <button class="btn rotate float-lef" data-deg="90" id="undoBtn" style="display: none;">
                    <i class="fa fa-undo"></i>
                </button>
                <button class="btn rotate float-right" data-deg="-90" id="redoBtn" style="display: none;">
                    <i class="fa fa-redo"></i>
                </button>
            </center>
        </div>
        <hr>

        <div class="alert alert-warning" role="alert">
            <span class="form-text text-muted"><b> A few notes before you upload a new profile picture </b></span>
            <span class="form-text text-muted">
                <ul>
                    <li> Upload only file with extension jpeg and png. </li>
                    <li> Files size support only <b><i style="color: red"> 4 MB. </i> </b></li>
                    <li> Please wait for the upload to complete. </li>
                </ul>
            </span>
        </div>
        <center>
            <label>
                <input type="hidden" name="user_id" id="user_id" placeholder="user_id">
                <input type="hidden" name="role_id" id="role_id" placeholder="role_id">
                <input type="hidden" id="current_userid">
                <input type="hidden" name="baseUrl" id="baseUrl">
                <input type="hidden" id="filename" name="filename">
                <button type="submit" id="uploadBtn" class="btn btn-info" disabled>
                    <i class="fa fa-upload" aria-hidden="true"></i> Upload
                </button>
            </label>
        </center>
    </div>
</div>

<script>
    function getPassData(baseUrl, token, data) {
        $('#role_id').val(data.role_id);
        $('#user_id').val(data.user_id);
        $('#current_userid').val(data.current_userid);
        $('#baseUrl').val(baseUrl);
    }

    $("#formApplication").submit(function(event) {
        event.preventDefault();
    });

    // upload image
    $(function() {
        var croppie = null;
        var el = document.getElementById('resizer');

        $.base64ImageToBlob = function(str) {
            // extract content type and base64 payload from original string
            var pos = str.indexOf(';base64,');
            var type = str.substring(5, pos);
            var b64 = str.substr(pos + 8);

            // decode base64
            var imageContent = atob(b64);

            // create an ArrayBuffer and a view (as unsigned 8-bit)
            var buffer = new ArrayBuffer(imageContent.length);
            var view = new Uint8Array(buffer);

            // fill the view, using the decoded base64
            for (var n = 0; n < imageContent.length; n++) {
                view[n] = imageContent.charCodeAt(n);
            }

            // convert ArrayBuffer to Blob
            var blob = new Blob([buffer], {
                type: type
            });

            return blob;
        }

        $.getImage = function(input, croppie) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    croppie.bind({
                        url: e.target.result,
                    });
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image").on("change", function(event) {
            // croppie.destroy();

            var fileExtension = ['jpeg', 'jpg', 'png'];
            if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                toastr.error("Only formats are allowed : " + fileExtension.join(', '));
                $("#uploadBtn").attr('disabled', true);
                $('#image').val(''); // this will clear the input val.
                $('#resizer').empty();
                $("#uploadBtn").attr('disabled', true);
                $('#undoBtn').hide();
                $('#redoBtn').hide();
            } else {
                if (this.files[0].size > 2621440) {
                    noti(500, "Please upload a file less than 2MB. Thank you!");
                    $("#uploadBtn").attr('disabled', true);
                    $('#image').val(''); // this will clear the input val.
                    $('#resizer').empty();
                    $("#uploadBtn").attr('disabled', true);
                    $('#undoBtn').hide();
                    $('#redoBtn').hide();
                } else {
                    $('#filename').val(this.files[0].name); // this will clear the input val.
                    $('#undoBtn').show();
                    $('#redoBtn').show();
                    // Initailize croppie instance and assign it to global variable
                    croppie = new Croppie(el, {
                        viewport: {
                            width: 250,
                            height: 250,
                            type: 'square'
                        },
                        boundary: {
                            width: 350,
                            height: 350
                        },

                        // // resize controls
                        // resizeControls: {
                        //     width: true,
                        //     height: true
                        // },

                        // // enable image resize
                        enableResize: false,

                        // // show image zoom control
                        // showZoomer: true,

                        // // image zoom with mouse wheel
                        // mouseWheelZoom: false,

                        // enable exif orientation reading
                        enableExif: false,

                        // restrict zoom so image cannot be smaller than viewport
                        enforceBoundary: true,

                        // enable orientation
                        enableOrientation: true,

                        // enable key movement
                        // enableKeyMovement: true,
                    });
                    $.getImage(event.target, croppie);
                    $("#uploadBtn").attr('disabled', false);
                }
            }
        });

        $("#uploadBtn").on("click", function() {

            /* get cropped image
                result({ type, size, format, quality, circle })
                type: The type of result to return:
                    'base64':  returns a the cropped image encoded in base64
                    'html': returns html of the image positioned within an div of hidden overflow
                    'blob': returns a blob of the cropped image
                    'rawcanvas': returns the canvas element allowing you to manipulate prior to getting the resulted image
                size: The size of the cropped image defaults to 'viewport'
                    'viewport': the size of the resulting image will be the same width and height as the viewport
                    'original': the size of the resulting image will be at the original scale of the image
                    {width, height}: an object defining the width and height. If only one dimension is specified, the other will be calculated using the viewport aspect ratio.
                format: The image format. Valid values:'jpeg'|'png'|'webp'
                quality: between 0 and 1 indicating image quality.
                circle: force the result to be cropped into a circle
                */

            croppie.result('base64').then(async function(base64) {
                var baseurl = $('#baseUrl').val();
                const formData = {
                    'image': base64,
                    'filename': $('#filename').val(),
                    'user_id': $('#user_id').val(),
                    'role_id': $('#role_id').val(),
                };

                // const submitBtnText = $('#submitForm').html();
                loadingBtn('uploadBtn', true); // block button from submit
                const res = await callApi('POST', 'user/uploadProfile', formData);
                if (isSuccess(res.status)) {

                    var userIDupdate = $('#user_id').val();
                    var sessionUser = $('#current_userid').val();

                    var newAvatar = res.data.data['user_avatar'];
                    $("#user_avatar_view").attr("src", baseurl + 'upload/image/user/' + newAvatar);

                    if (userIDupdate == sessionUser) {
                        $("#profileImageBladeAvatar").attr("src", baseurl + 'upload/image/user/' + newAvatar);
                        $("#profileImageMenuBladeAvatar").attr("src", baseurl + 'upload/image/user/' + newAvatar);
                    }

                    setTimeout(function() {
                        // $('#generaloffcanvas-right').modal('hide');
                        $('#generaloffcanvas-right').offcanvas('toggle');
                    }, 500);

                    noti(res.status, 'Profile update');

                } else {
                    noti(res.status);
                }
                loadingBtn('uploadBtn', false, '<i class="fa fa-upload" aria-hidden="true"></i> Update'); // unblock button from submit
            });
        });

        // To Rotate Image Left or Right
        $(".rotate").on("click", function() {
            croppie.rotate(parseInt($(this).data('deg')));
        });

        $('#generaloffcanvas-right').on('hidden.bs.modal', function(e) {
            $('#image').val(''); // this will clear the input val.
            $('#undoBtn').hide();
            $('#redoBtn').hide();
            // This function will call immediately after model close
            // To ensure that old croppie instance is destroyed on every model close
            setTimeout(function() {
                croppie.destroy();
            }, 100);
        })

    });
</script>