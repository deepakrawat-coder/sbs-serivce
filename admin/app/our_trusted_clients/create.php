<?php require '../../includes/conn.php';
require '../../includes/helper.php'; ?>

<div class="modal-header">
    <h5 class="modal-title">Add Our Clients</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>
<div class="card-body">
    <div class="form-validation">
        <form class="needs-validation" role="form" id="form-add-stream" action="/admin/app/our_trusted_clients/store"
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
                    <input type="text" class="form-control" name="name" placeholder="Enter a  Name.."
                        required>
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label">Photo <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="photo"
                        accept="image/png, image/jpg, image/jpeg, image/svg, image/avif" required>
                </div>

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
                // formData.append('content', CKEDITOR.instances['editor'].getData());


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