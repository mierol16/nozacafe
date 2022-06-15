<div class="row">
    <div class="row">
        <div class="col-12">
        <table border="0" width="80%">
            <tbody>
                <tr style="height: 40px;">
                    <td width="15%"> <label style="color : #b3b3cc">Employee Name</label></td>
                    <td width="85%">: <span id="user_fullname_view" style="font-weight:bold"></span></td>
                </tr>
                <tr style="height: 40px;">
                    <td width="15%"> <label style="color : #b3b3cc">Year</label></td>
                    <td width="85%">: <span id="performance_year_view" style="font-weight:bold"></span></td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>

    <div class="row mt-4">
        <div id="dataListDiv" class="card-datatable table-responsive">
            <div class="col-md-12 col-sm-12 col-12 text-justify mb-2">
                <center>
                    Grading Scale: 
                    <span class="badge bg-info">1. Poor </span> 
                    <span class="badge bg-info">2. Unsatisfactory </span> 
                    <span class="badge bg-info">3. Satisfactory </span>
                    <span class="badge bg-info">4. Very Satisfactory </span>
                    <span class="badge bg-info">5. Outstanding </span>
                </center>
            </div>
            <table class="table table-bordered table-striped" width="100%">
                <thead class="table-dark table border-top">
                    <tr>
                        <th width="15%" style="text-align: center"> Criteria </th>
                        <th width="8%" style="text-align: center"> 1 </th>
                        <th width="8%" style="text-align: center"> 2 </th>
                        <th width="8%" style="text-align: center"> 3 </th>
                        <th width="8%" style="text-align: center"> 4 </th>
                        <th width="8%" style="text-align: center"> 5 </th>
                        <th width="10%" style="text-align: center"> Mark </th>
                        <th width="10%" style="text-align: center"> Grade </th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="attendance">
                        <td> &nbsp;&nbsp; Attendance </td>
                        <td> 
                            <center> 
                                <span id="attendance_mark_1" style="font-weight:bold"></span>
                            </center>
                        </td>
                        <td> <center> <span id="attendance_mark_2" style="font-weight:bold"></span> </center></td>
                        <td> <center> <span id="attendance_mark_3" style="font-weight:bold"></span> </center></td>
                        <td> <center> <span id="attendance_mark_4" style="font-weight:bold"></span> </center></td>
                        <td> <center> <span id="attendance_mark_5" style="font-weight:bold"></span> </center></td>
                        <td> <center> <span id="attendance_mark_view" style="font-weight:bold"></span> </center></td>
                        <td rowspan="6" style="vertical-align : middle;text-align:center;"> <center> <span id="performance_gred_view" style="font-weight:bold"></span> </center></td>
                    </tr>
                    <tr id="cooperation">
                        <td> &nbsp;&nbsp; Cooperation </td>
                        <td> 
                            <center> 
                            <span id="cooperation_mark_1" style="font-weight:bold"></span>
                            </center>
                        </td>
                        <td> <center> <span id="cooperation_mark_2" style="font-weight:bold"></span> </center></td>
                        <td> <center> <span id="cooperation_mark_3" style="font-weight:bold"></span></center></td>
                        <td> <center> <span id="cooperation_mark_4" style="font-weight:bold"></span> </center></td>
                        <td> <center> <span id="cooperation_mark_5" style="font-weight:bold"></span> </center></td>
                        <td> <center> <span id="cooperation_mark_view" style="font-weight:bold"></span> </center></td>
                    </tr>
                    <tr id="responsibility">
                        <td> &nbsp;&nbsp; Responsibility </td>
                        <td> 
                            <center> 
                            <span id="responsibility_mark_1" style="font-weight:bold"></span>
                            </center>
                        </td>
                        <td> <center> <span id="responsibility_mark_2" style="font-weight:bold"></span> </center></td>
                        <td> <center> <span id="responsibility_mark_3" style="font-weight:bold"></span> </center></td>
                        <td> <center> <span id="responsibility_mark_4" style="font-weight:bold"></span> </center></td>
                        <td> <center> <span id="responsibility_mark_5" style="font-weight:bold"></span> </center></td>
                        <td> <center> <span id="responsibility_mark_view" style="font-weight:bold"></span> </center></td>
                    </tr>
                    <tr id="behavior">
                        <td> &nbsp;&nbsp; Behavior </td>
                        <td> 
                            <center> 
                                <span id="behavior_mark_1" style="font-weight:bold"></span>
                            </center>
                        </td>
                        <td> <center> <span id="behavior_mark_2" style="font-weight:bold"></span> </center></td>
                        <td> <center> <span id="behavior_mark_3" style="font-weight:bold"></span> </center></td>
                        <td> <center> <span id="behavior_mark_4" style="font-weight:bold"></span> </center></td>
                        <td> <center> <span id="behavior_mark_5" style="font-weight:bold"></span> </center></td>
                        <td> <center> <span id="behavior_mark_view" style="font-weight:bold"></span> </center></td>
                    </tr>
                    <tr id="trust">
                        <td> &nbsp;&nbsp; Trust </td>
                        <td> 
                            <center> 
                                <span id="trust_mark_1" style="font-weight:bold"></span>
                            </center>
                        </td>
                        <td> <center> <span id="trust_mark_2" style="font-weight:bold"></span> </center></td>
                        <td> <center> <span id="trust_mark_3" style="font-weight:bold"></span> </center></td>
                        <td> <center> <span id="trust_mark_4" style="font-weight:bold"></span> </center></td>
                        <td> <center> <span id="trust_mark_5" style="font-weight:bold"></span> </center></td>
                        <td> <center> <span id="trust_mark_view" style="font-weight:bold"></span> </center></td>
                    </tr>
                    <tr>
                        <td> &nbsp;&nbsp; Total marks </td>
                        <td colspan="5"> 
                            <center> 
                                Gred 1 = 0%-20%, 2 = 21%-40%, 3 = 41%-60%, 4 = 61%-80%, 5 = 81%-100%
                            </center>
                        </td>
                        <td> <center> <span id="total_mark_view" style="font-weight:bold"></span> </center></td>
                    </tr>
                    <tr>
                        <td> &nbsp;&nbsp; Comments </td>
                        <td colspan="7"> <center> <span id="performance_comment_view" style="font-weight:bold"></span> </center></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <form id="formEvaluateApprove" action="performance/approveSave" method="POST">
        <div class="row mt-2">
            <div class="col-lg-6">
                <div class="form-group">
                    <label> Employee Remarks <span class="text-danger">*</span> </label>
                    <input type="text" class="form-control" name="performance_staff_remark" name="performance_staff_remark" required>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label> Date <span class="text-danger">*</span> </label>
                    <input type="date" class="form-control" name="staff_remark_date" name="staff_remark_date" required>
                </div>
            </div>
        </div>
    
        <div class="row mt-2">
            <div class="col-lg-12" style="border-style: solid; border-color: red; border-width: 1px;">
                <p class="m-0">*Employees should check and update (give remark) in front of the employer.</p>
                <p class="m-0">*Please enter the date and click save.</p>
                <input id="checkAgree" type="checkbox" required> I agree and accept the I agree with the performance made by the employer.
            </div>
        </div>
    
        <div class="row mt-4">
            <div class="col-lg-12">
                <span class="text-danger mb-2">* Indicates a required field</span>
                <center>
                    <input type="hidden" id="performance_id" name="performance_id" class="form-control" readonly>
                    <input type="hidden" id="user_id" name="user_id" class="form-control" readonly>
                    <button type="submit" id="submitBtn" class="btn btn-success"> <i class='fa fa-save'></i> Save </button>
                </center>
            </div>
        </div>
    </form>

</div>

<script>
    $("#formEvaluateApprove").submit(function(event) {
        event.preventDefault();

        const form = $(this);
        const url = form.attr('action');

        cuteAlert({
            type: 'question',
            title: 'Are you sure?',
            message: 'Form will be submitted!',
            closeStyle: 'circle',
            cancelText: 'Abort',
            confirmText: 'Yes, Confirm!',
        }).then(
            async (e) => {
                if (e == 'confirm') {
                    const res = await submitApi(url, form.serializeArray(), 'formEvaluateApprove', getDataList);

                    if (isSuccess(res)) {
                        setTimeout(function() {
                            $('#generalModal-xl').modal('hide');
                        }, 200);
                    }
                }
            }
        );
    });

    function getPassData(baseUrl, token, data) {
        var check = '<i class="fas fa-check"></i>';

        $('#performance_id').val(data.performance_id);
        $('#user_id').val(data.user_id);

        $('#user_fullname_view').text(data.user_fullname);
        $('#performance_year_view').text(data.performance_year);

        $('#attendance_mark_' + data.attendance_mark).html(check);
        $('#cooperation_mark_' + data.attendance_mark).html(check);
        $('#responsibility_mark_' + data.attendance_mark).html(check);
        $('#behavior_mark_' + data.attendance_mark).html(check);
        $('#trust_mark_' + data.attendance_mark).html(check);

        $('#attendance_mark_view').text(data.attendance_mark);
        $('#cooperation_mark_view').text(data.cooperation_mark);
        $('#responsibility_mark_view').text(data.responsibility_mark);
        $('#behavior_mark_view').text(data.behavior_mark);
        $('#trust_mark_view').text(data.trust_mark);

        $('#total_mark_view').text(data.total_mark + ' %');
        $('#performance_gred_view').text(data.performance_gred);
        $('#performance_comment_view').text(data.performance_comment);

        $('#performance_admin_remark_view').text(data.performance_admin_remark);
        $('#admin_remark_date_view').text(moment(data.admin_remark_date).format("DD/MM/YYYY"));

        var status = '';

        if (data.performance_status == 1) {
            status = '<i class="far fa-check-square"></i>';
            $('#performance_staff_remark_view').text(data.performance_staff_remark);
            $('#staff_remark_date_view').text(moment(data.staff_remark_date).format("DD/MM/YYYY"));
        } else {
            status = '<i class="far fa-square"></i>'
        }

        $('#agree_condition').html(status);
    }
</script>