<?php require '../../includes/conn.php';
require '../../includes/helper.php'; ?>

<div class="modal-header">
    <h5 class="modal-title">Add About us</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>
<div class="card-body">
    <div class="form-validation">
        <form class="needs-validation" role="form" id="form-add-stream" action="/admin/app/about_us/store"
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
                    <label class="form-label">Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" placeholder="Enter a Name.." required>
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label">Year Exp <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="year_exp" placeholder="Enter a exp.." required>
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label">Circle Text <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="circle_text" placeholder="Enter a circle text.."
                        required>
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label">Photo <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="photo"
                        accept="image/png, image/jpg, image/jpeg, image/svg, image/avif" required>
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label">Phone <span class="text-danger">*</span></label>
                    <input type="tel" id="number" class="form-control" name="phone"
                        onkeypress="return onlyNumberKey(event)" maxlength="10" minlength="10"
                        requiredplaceholder="Enter a phone.." required>
                </div>
               
                <div class="mb-3 col-md-12">
                    <label class="form-label">Content <span class="text-danger">*</span></label>
                    <textarea class="ckeditor" cols="80" id="editor" name="content" rows="10"></textarea>
                </div>


                <!-- <hr>
                <h3>SEO</h3>


                <div class="mb-3 col-md-6">
                    <label class="form-label">Meta Title
                    </label>
                    <input type="text" class="form-control" name="meta_title" placeholder="Enter a Meta Title..">
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Meta Key
                    </label>
                    <input type="text" class="form-control" name="meta_key" placeholder="Enter a Meta Key..">
                </div>
                <div class="mb-3 col-md-12">
                    <label class="form-label">Meta Description</label>
                    <textarea cols="2" class="form-control" name="meta_description"
                        placeholder="Enter a Meta Description.."></textarea>
                </div> -->

                <!-- <div class="mb-3 col-md-12">
                    <label class="form-label">Order By <span class="text-danger">*</span></label>
                    <input type="number" min="0" class="form-control" name="position" placeholder="Enter a Position.."
                        required>
                </div> -->

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



<script>
    $(document).ready(function () {
        $('#form-add-stream').validate({
            rules: {
                name: {
                    required: true
                },
                Short_Name: {
                    required: true
                },
                position: {
                    required: true,
                    number: true,
                    min: 0
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
            submitHandler: function (form) {
                var formData = new FormData(form);
                formData.append('content', CKEDITOR.instances['editor'].getData());


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
                            toastr.success(data.message, 'Success');
                            $('#blogs-table').DataTable().ajax.reload(null, false);
                        } else {
                            $(':input[type="submit"]').prop('disabled', false);
                            toastr.error(data.message, 'Error');
                        }
                    },
                    error: function (xhr, textStatus, errorThrown) {
                        toastr.error('Error submitting form: ' + errorThrown, 'Error');
                    }
                });
                return false;
            }
        });
    });
</script>



<script>
    CKEDITOR.replace('editor');
</script>