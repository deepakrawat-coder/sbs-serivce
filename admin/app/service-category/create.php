<?php require '../../includes/conn.php';
require '../../includes/helper.php'; ?>
<div class="modal-header">
  <h3 class="modal-title">Add Service Category</h3>
  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>
<div class="card-body">
  <div class="form-validation">
    <form class="needs-validation" id="form-add-service-category" action="/admin/app/service-category/store" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="mb-3 col-md-6">
          <label class="form-label">Product<span class="text-danger">*</span></label>
          <select name="product_id" class="form-select" required>
            <?php
            $prodRes = mysqli_query($conn, "SELECT ID, Name FROM product ORDER BY Name");
            while ($p = mysqli_fetch_assoc($prodRes)) {
                echo "<option value='{$p['ID']}'>{$p['Name']}</option>";
            }
            ?>
          </select>
        </div>
        <div class="mb-3 col-md-6">
          <label class="form-label">Name<span class="text-danger">*</span></label>
          <input type="text" name="name" class="form-control" placeholder="Enter a Name.." required>
        </div>
      </div>
      <div class="modal-footer text-end">
        <button type="submit" class="btn btn-primary btn-cons btn-animated from-left"><span>Save</span></button>
      </div>
    </form>
  </div>
</div>
<script>
  $(function () {
    $('#form-add-service-category').validate({
      errorPlacement: function (error, element) {
        error.insertAfter(element);
      }
    });
  });
  $("#form-add-service-category").on("submit", function (e) {
    if ($(this).valid()) {
      var formData = new FormData(this);
      $.ajax({
        url: this.action,
        type: 'post',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (data) {
          if (data.status == 200) {
            $('.modal').modal('hide');
            toastr.success(data.message, 'Success');
            $('#serivce-category-table').DataTable().ajax.reload(null, false);
          } else {
            toastr.error(data.message, 'Error');
          }
        }
      });
      e.preventDefault();
    }
  });
</script>
