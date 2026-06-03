<?php require '../../includes/conn.php';
require '../../includes/helper.php'; ?>

<div class="modal-header">
    <h5 class="modal-title">Add Why Choose</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="card-body">
    <div class="form-validation">
        <form class="needs-validation" role="form" id="form-add-stream" action="/admin/app/why_choose/store"
            method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label class="form-label">ProductName<span class="text-danger">*</span></label>
                    <?php $cardArr = getProductFunc($conn); ?>


                    <select name="Product_id" id="Product_id" class="form-control" required>
                        <?php foreach ($cardArr as $card) { ?>
                            <option value="<?= $card['ID'] ?>"><?= $card['Name'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label">Photo <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="photo"
                        accept="image/png, image/jpg, image/jpeg, image/svg, image/avif" required>
                </div>

                <!-- <div class="mb-3 col-md-6">
                    <label class="form-label">Title<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="title" placeholder="Enter a Title.." required>
                </div>


                <div class="mb-3 col-md-12">
                    <label class="form-label">Content <span class="text-danger">*</span></label>
                    <textarea class="ckeditor" cols="80" id="editor" name="content" rows="10"></textarea>
                </div> -->
                <div id="dynamicFields">

                    <div class="box border p-3 mb-3">
                        <label class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="title[]" placeholder="Enter Title" required>

                        <label class="form-label mt-3">Content <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="content[]" rows="3" placeholder="Enter Content"
                            required></textarea>

                        <button type="button" class="btn btn-danger btn-sm mt-2"
                            onclick="removeBox(this)">Remove</button>
                    </div>

                </div>

                <button type="button" class="btn btn-success mt-2" onclick="addBox()">+ Add More</button>

                <div class="modal-footer clearfix text-end">
                    <div class="col-md-4 m-t-10 sm-m-t-10">
                        <button aria-label="" type="submit" class="btn btn-primary btn-cons btn-animated from-left">
                            <span>Save</span>
                        </button>
                    </div>
                </div>
        </form>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>


<link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    function addBox() {
        let html = `
        <div class="box border p-3 mb-3">
            <label class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="title[]" placeholder="Enter Title" required>

            <label class="form-label mt-3">Content <span class="text-danger">*</span></label>
            <textarea class="form-control" name="content[]" rows="3" placeholder="Enter Content" required></textarea>

            <button type="button" class="btn btn-danger btn-sm mt-2" onclick="removeBox(this)">Remove</button>
        </div>
        `;

        document.getElementById("dynamicFields").insertAdjacentHTML("beforeend", html);
    }

    function removeBox(btn) {
        btn.parentElement.remove();
    }
</script>

<script>
    $(document).ready(function () {
        $('#form-add-stream').validate({
            rules: {
                Product_id: {
                    required: true
                }
            },
            messages: {
                position: {
                    required: "Please enter the position.",
                    number: "Please enter a valid number for the position.",
                    min: "Position must be at least 0."
                }
            },
            highlight: function (element) {
                $(element).addClass('error');
                $(element).closest('.form-control').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).removeClass('error');
                $(element).closest('.form-control').removeClass('has-error');
            },
            // submitHandler: function (form) {
            //     var formData = new FormData(form);
            //     formData.append('content', CKEDITOR.instances['editor'].getData());


            //     $.ajax({
            //         url: form.action,
            //         type: 'POST',
            //         data: formData,
            //         cache: false,
            //         contentType: false,
            //         processData: false,
            //         dataType: 'json',
            //         success: function (data) {
            //             if (data.status == 200) {
            //                 $('.modal').modal('hide');
            //                 toastr.success(data.message, 'Success');
            //                 $('#courses-table').DataTable().ajax.reload(null, false);
            //             } else {
            //                 $(':input[type="submit"]').prop('disabled', false);
            //                 toastr.error(data.message, 'Error');
            //             }
            //         },
            //         error: function (xhr, textStatus, errorThrown) {
            //             toastr.error('Error submitting form: ' + errorThrown, 'Error');
            //         }
            //     });
            //     return false;
            // }

            submitHandler: function (form) {

                var formData = new FormData(form);

                $.ajax({
                    url: form.action,
                    type: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',

                    success: function (data) {

                        if (data.status == 200) {

                            $('.modal').modal('hide');

                            toastr.success(data.message);

                            $('#blogs-table').DataTable().ajax.reload(null, false);

                        } else {

                            toastr.error(data.message);
                        }
                    },

                    error: function (xhr) {
                        console.log(xhr.responseText);
                        toastr.error('Something went wrong');
                    }
                });

                return false;
            }
        });
    });
</script>

<!-- <script>
    CKEDITOR.replace('editor');
</script> -->