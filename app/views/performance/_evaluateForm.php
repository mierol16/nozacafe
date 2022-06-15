<form id="formEvaluate" action="performance/save" method="POST">

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label> Employee Name <span class="text-danger">*</span> </label>
                <select id="staff_user" name="staff_user" class="form-control" required>
                </select>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label> Year </label>
                <input id="performance_year" name="performance_year" class="form-control" readonly>
            </div>
        </div>
    </div>

    <div class="row mt-2">
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
                                <input type="radio" name="attendance" id="attendance" value="0" checked style="display: none"> 
                                <input type="radio" name="attendance" id="attendance" value="1" onchange="getRating(value, id)"> 
                            </center>
                        </td>
                        <td> <center> <input type="radio" name="attendance" id="attendance" value="2" onchange="getRating(value, id)"> </center></td>
                        <td> <center> <input type="radio" name="attendance" id="attendance" value="3" onchange="getRating(value, id)"> </center></td>
                        <td> <center> <input type="radio" name="attendance" id="attendance" value="4" onchange="getRating(value, id)"> </center></td>
                        <td> <center> <input type="radio" name="attendance" id="attendance" value="5" onchange="getRating(value, id)"> </center></td>
                        <td> <center> <input type="input" class="form-control" style="text-align:center;" name="attendance_mark" id="attendance_mark" readonly> </center></td>
                        <td rowspan="6" style="vertical-align : middle;text-align:center;"> <center> <input type="text" class="form-control" style="text-align:center;" id="performance_gred" name="performance_gred" readonly> </center></td>
                    </tr>
                    <tr id="cooperation">
                        <td> &nbsp;&nbsp; Cooperation </td>
                        <td> 
                            <center> 
                                <input type="radio" name="cooperation" id="cooperation" value="0" checked style="display: none"> 
                                <input type="radio" name="cooperation" id="cooperation" value="1" onchange="getRating(value, id)"> 
                            </center>
                        </td>
                        <td> <center> <input type="radio" name="cooperation" id="cooperation" value="2" onchange="getRating(value, id)"> </center></td>
                        <td> <center> <input type="radio" name="cooperation" id="cooperation" value="3" onchange="getRating(value, id)"> </center></td>
                        <td> <center> <input type="radio" name="cooperation" id="cooperation" value="4" onchange="getRating(value, id)"> </center></td>
                        <td> <center> <input type="radio" name="cooperation" id="cooperation" value="5" onchange="getRating(value, id)"> </center></td>
                        <td> <center> <input type="input" class="form-control" style="text-align:center;" name="cooperation_mark" id="cooperation_mark" readonly> </center></td>
                    </tr>
                    <tr id="responsibility">
                        <td> &nbsp;&nbsp; Responsibility </td>
                        <td> 
                            <center> 
                                <input type="radio" name="responsibility" id="responsibility" value="0" checked style="display: none"> 
                                <input type="radio" name="responsibility" id="responsibility" value="1" onchange="getRating(value, id)"> 
                            </center>
                        </td>
                        <td> <center> <input type="radio" name="responsibility" id="responsibility" value="2" onchange="getRating(value, id)"> </center></td>
                        <td> <center> <input type="radio" name="responsibility" id="responsibility" value="3" onchange="getRating(value, id)"> </center></td>
                        <td> <center> <input type="radio" name="responsibility" id="responsibility" value="4" onchange="getRating(value, id)"> </center></td>
                        <td> <center> <input type="radio" name="responsibility" id="responsibility" value="5" onchange="getRating(value, id)"> </center></td>
                        <td> <center> <input type="input" class="form-control" style="text-align:center;" name="responsibility_mark" id="responsibility_mark" readonly> </center></td>
                    </tr>
                    <tr id="behavior">
                        <td> &nbsp;&nbsp; Behavior </td>
                        <td> 
                            <center> 
                                <input type="radio" name="behavior" id="behavior" value="0" checked style="display: none"> 
                                <input type="radio" name="behavior" id="behavior" value="1" onchange="getRating(value, id)"> 
                            </center>
                        </td>
                        <td> <center> <input type="radio" name="behavior" id="behavior" value="2" onchange="getRating(value, id)"> </center></td>
                        <td> <center> <input type="radio" name="behavior" id="behavior" value="3" onchange="getRating(value, id)"> </center></td>
                        <td> <center> <input type="radio" name="behavior" id="behavior" value="4" onchange="getRating(value, id)"> </center></td>
                        <td> <center> <input type="radio" name="behavior" id="behavior" value="5" onchange="getRating(value, id)"> </center></td>
                        <td> <center> <input type="input" class="form-control" style="text-align:center;" name="behavior_mark" id="behavior_mark" readonly> </center></td>
                    </tr>
                    <tr id="trust">
                        <td> &nbsp;&nbsp; Trust </td>
                        <td> 
                            <center> 
                                <input type="radio" name="trust" id="trust" value="0" checked style="display: none"> 
                                <input type="radio" name="trust" id="trust" value="1" onchange="getRating(value, id)"> 
                            </center>
                        </td>
                        <td> <center> <input type="radio" name="trust" id="trust" value="2" onchange="getRating(value, id)"> </center></td>
                        <td> <center> <input type="radio" name="trust" id="trust" value="3" onchange="getRating(value, id)"> </center></td>
                        <td> <center> <input type="radio" name="trust" id="trust" value="4" onchange="getRating(value, id)"> </center></td>
                        <td> <center> <input type="radio" name="trust" id="trust" value="5" onchange="getRating(value, id)"> </center></td>
                        <td> <center> <input type="input" class="form-control" style="text-align:center;" name="trust_mark" id="trust_mark" readonly> </center></td>
                    </tr>
                    <tr>
                        <td> &nbsp;&nbsp; Total marks </td>
                        <td colspan="5"> 
                            <center> 
                                Gred 1 = 0%-20%, 2 = 21%-40%, 3 = 41%-60%, 4 = 61%-80%, 5 = 81%-100%
                            </center>
                        </td>
                        <td> <center> <input type="text" class="form-control" style="text-align:center;" name="total_mark" id="total_mark" value="%" readonly> </center></td>
                    </tr>
                    <tr id="performance_comment">
                        <td> &nbsp;&nbsp; Comments </td>
                        <td colspan="7"> <center> <input type="text" class="form-control" name="performance_comment" id="performance_comment"> </center></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-lg-6">
            <div class="form-group">
                <label> Administrator Remarks <span class="text-danger">*</span> </label>
                <input type="text" class="form-control" name="performance_admin_remark" name="performance_admin_remark" required>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label> Date <span class="text-danger">*</span> </label>
                <input type="date" class="form-control" name="admin_remark_date" name="admin_remark_date" required>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-lg-12" style="border-style: solid; border-color: red; border-width: 1px;">
            <p class="m-0">*Employer need to evaluates an employee’s  work performance regarding aboved criteria.</p>
            <p class="m-0">*Please give remark, select date and save.</p>
            <p class="m-0">*The specificity of the assessment is final based on the current annual performance.</p>
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

<script>
    $("#formEvaluate").submit(function(event) {
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
                    const res = await submitApi(url, form.serializeArray(), 'formEvaluate', getDataList);

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
        getSelectYear();
        getSelectUser();

        const d = new Date();
        $('#performance_year').val(d.getFullYear());
    }

    async function getSelectUser() {
        const res = await callApi('post', 'performance/getSelectUser');

        if (isSuccess(res)) {
            $('#staff_user').html(res.data);
        } else {
            noti(res.status);
        }
    }

    function getRating(val, id) {
        $('#' + id + '_mark').val(val);

        calculateTotal();
    }

    function calculateTotal() {
        let attendance = $('#attendance_mark').val();
        let cooperation = $('#cooperation_mark').val();
        let responsibility = $('#responsibility_mark').val();
        let behavior = $('#behavior_mark').val();
        let trust = $('#trust_mark').val();
        let total = 0;
        let grade = 0;
        console.log(attendance, cooperation, responsibility, behavior, trust);

        let sum = (+attendance + +cooperation + +responsibility + +behavior + +trust);
        total = (sum/25)*100
        console.log("sum total", sum, total);

        if (total >= 0 && total <= 20) {
            grade = 1
        } else if (total > 20 && total <= 40) {
            grade = 2
        } else if (total > 40 && total <= 60) {
            grade = 3
        } else if (total > 60 && total <= 80) {
            grade = 4
        } else if (total > 80 && total <= 100) {
            grade = 5
        }

        $('#total_mark').val(Math.round(total) + ' %');
        $('#performance_gred').val(grade);
    }
</script>