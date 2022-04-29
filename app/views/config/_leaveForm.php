<form id="formLeave" action="leave/create" method="POST">

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label> Leave Name <span class="text-danger">*</span> </label>
                <input type="text" id="leave_name" name="leave_name" class="form-control" maxlength="50" autocomplete="off" required>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="form-group">
                <label> Description <span class="text-danger">*</span> </label>
                <textarea id="leave_description" name="leave_description" class="form-control" autocomplete="off" required></textarea>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="form-group">
                <label> Carry Foward <span class="text-danger">*</span> </label>
                <input type="number" id="leave_carry" name="leave_carry" class="form-control" min="0" step=".5" value="0" autocomplete="off" required></input>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-12">
            <span class="text-danger mb-2">* Indicates a required field</span>
            <center>
                <input type="hidden" id="leave_id" name="leave_id" class="form-control" readonly>
                <button type="submit" id="submitBtn" class="btn btn-success"> <i class='fa fa-save'></i> Save </button>
            </center>
        </div>
    </div>

</form>

<script>
    $("#formLeave").submit(function(event) {
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
                    const res = await submitApi(url, form.serializeArray(), 'formLeave', getDataList);
                }
            }
        );
    });
</script>