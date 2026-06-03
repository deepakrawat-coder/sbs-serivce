<?php
require '../../includes/conn.php';
require '../../includes/helper.php';

$id = (int) $_GET['id'];

$query = mysqli_query($conn, "
    SELECT *
    FROM service_category
    WHERE ID = '$id'
");

$row = mysqli_fetch_assoc($query);
?>

<div class="modal-header">
    <h3 class="modal-title">Edit Service Category</h3>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="card-body">
    <div class="form-validation">
        <form class="needs-validation"
              id="form-edit-service-category"
              action="/admin/app/service-category/update"
              method="POST"
              enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?= $row['ID']; ?>">

            <div class="row">

                <div class="mb-3 col-md-6">
                    <label class="form-label">
                        Product <span class="text-danger">*</span>
                    </label>

                    <select name="product_id" class="form-select" required>
                        <?php
                        $prodRes = mysqli_query($conn, '
                            SELECT ID, Name
                            FROM product
                            ORDER BY Name
                        ');

                        while ($p = mysqli_fetch_assoc($prodRes)) {
                            $selected = ($p['ID'] == $row['Product_ID']) ? 'selected' : '';

                            echo '<option value="' . $p['ID'] . '" ' . $selected . '>'
                                . htmlspecialchars($p['Name'])
                                . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label">
                        Name <span class="text-danger">*</span>
                    </label>

                    <input type="text"
                           name="name"
                           class="form-control"
                           value="<?= htmlspecialchars($row['Name']); ?>"
                           required>
                </div>

            </div>

            <div class="modal-footer text-end">
                <button type="submit"
                        class="btn btn-primary btn-cons btn-animated from-left">
                    <span>Update</span>
                </button>
            </div>

        </form>
    </div>
</div>

<script>
$(function () {
    $('#form-edit-service-category').validate({
        errorPlacement: function(error, element) {
            error.insertAfter(element);
        }
    });
});

$("#form-edit-service-category").on("submit", function(e) {
    e.preventDefault();

    if ($(this).valid()) {

        var formData = new FormData(this);

        $.ajax({
            url: this.action,
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',

            success: function(data) {

                if (data.status == 200) {

                    $('.modal').modal('hide');

                    toastr.success(data.message, 'Success');

                    $('#serivce-category-table')
                        .DataTable()
                        .ajax.reload(null, false);

                } else {

                    toastr.error(data.message, 'Error');

                }
            }
        });
    }
});
</script>