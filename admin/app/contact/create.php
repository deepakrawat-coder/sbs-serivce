<?php require '../../includes/conn.php';
require '../../includes/helper.php'; ?>

<div class="modal-header">
    <h5 class="modal-title">Add Contact</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>
<div class="card-body">
    <div class="form-validation">
        <form class="needs-validation" role="form" id="form-add-stream" action="/admin/app/contact/store" method="POST"
            enctype="multipart/form-data">
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
                    <label class="form-label">Address <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="address" placeholder="Enter the address.." required>
                </div>

                <div class="mb-3 col-md-6">
                    <label for="number" class="form-label"> Phone Number <span
                            class="text-danger fw-bold">*</span></label>
                    <input type="tel" name="phone" id="number" placeholder="Phone No.*"
                        onkeypress="return onlyNumberKey(event)" maxlength="10" minlength="10" required
                        class="form-control">
                </div>

                <div class="mb-3 col-md-6">
                    <label for="email" class="form-label"> Email <span class="text-danger fw-bold">*</span></label>
                    <input type="email" name="email" id="email" placeholder="Enter Email Address" class="form-control">
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
    function onlyNumberKey(evt) {
        let charCode = evt.which ? evt.which : evt.keyCode;
        // allow only 0–9
        if (charCode < 48 || charCode > 57) {
            return false;
        }
        return true;
    }
</script>

<script>
    $(document).ready(function () {

        $("#form-add-stream").validate({
            rules: {
                address: "required",
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                },
            },

            messages: {
                address: "Please enter your address",
                email: "Please enter a valid email",
                phone: {
                    required: "Please enter phone number",
                    minlength: "Must be 10 digits",
                    digits: "Only numbers allowed"
                },
            },

            submitHandler: function (form) {

                let formData = new FormData(form);

                $.ajax({
                    url: form.action,
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    cache: false,
                    dataType: "json",
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
                    error: function (xhr, status, err) {
                        console.log(err);
                        toastr.error("Something went wrong!");
                    }
                });

                return false;
            }
        });

    });
</script>