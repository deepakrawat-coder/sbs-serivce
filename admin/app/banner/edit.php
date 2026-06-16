<?php
if (isset($_GET['id'])) {
    require '../../includes/conn.php';
    require '../../includes/helper.php';
    $id = intval($_GET['id']);
    $getdataQuery = $conn->query("SELECT * FROM banner WHERE ID = $id");
    $getdata = $getdataQuery->fetch_assoc();
}
?>

<div class="modal-header">
    <h5 class="modal-title">Edit Banner</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>
<div class="card-body">
    <div class="form-validation">
        <form class="needs-validation" role="form" id="form-add-stream" action="/admin/app/banner/update" method="POST"
            enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $getdata['ID'] ?>">
            <input type="hidden" name="updated_file" value="<?= $getdata['Image'] ?>">
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label class="form-label">ProductName<span class="text-danger">*</span></label>
                    <?php $cardArr = getProductFunc($conn); ?>


                    <select name="Product_id" id="Product_id" class="form-control" required>
                        <?php foreach ($cardArr as $card) { ?>
                            <option value="<?= $card['ID'] ?>" <?php if ($getdata['Product_id'] == $card['ID'])
                                  echo "selected"; ?>>
                                <?= $card['Name'] ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label">Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" value="<?= $getdata['Name'] ?>"
                        placeholder="Enter a Banner Name.." required>
                </div>


                <div class="mb-3 col-md-6">
                    <label class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="title" value="<?= $getdata['Title'] ?>" required>
                </div>


                <div class="mb-3 col-md-12">
                    <label class="form-label">Content <span class="text-danger">*</span></label>
                    <textarea class="ckeditor" cols="80" id="editor" name="content"
                        rows="10"><?= $getdata['Content'] ?></textarea>
                </div>


                <div class="col-md-12">
                    <label class="form-label">Images</label>

                    <!-- Existing Images -->
                    <div class="row mb-3">

                        <?php
                        $images = explode(',', $getdata['Image']);

                        foreach ($images as $img) {
                            $img = trim($img);

                            if (!empty($img)) {
                                ?>
                                <div class="col-md-3 text-center mb-3">
                                    <img src="/admin-assets/img/banner/<?= $img ?>" class="img-fluid border rounded mb-2"
                                        style="height:120px;width:100%;object-fit:cover;">

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="delete_images[]"
                                            value="<?= $img ?>">

                                        <label class="form-check-label">
                                            Delete Image
                                        </label>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>

                    </div>

                    <!-- New Images Upload -->
                    <div id="imageContainer">
                        <div class="image-box row mb-2">
                            <div class="col-md-10">
                                <input type="file" class="form-control" name="photo[]"
                                    accept="image/png,image/jpg,image/jpeg,image/svg+xml,image/avif">
                            </div>

                            <div class="col-md-2">
                                <button type="button" class="btn btn-danger" onclick="removeImage(this)">
                                    Remove
                                </button>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-success mt-2" id="addImage">
                        Add More Image
                    </button>
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
    $('#addImage').click(function () {

        $('#imageContainer').append(`
        <div class="image-box row mb-2">
            <div class="col-md-10">
                <input type="file"
                    class="form-control"
                    name="photo[]"
                    accept="image/png,image/jpg,image/jpeg,image/svg+xml,image/avif">
            </div>

            <div class="col-md-2">
                <button type="button"
                    class="btn btn-danger"
                    onclick="removeImage(this)">
                    Remove
                </button>
            </div>
        </div>
    `);

    });

    function removeImage(btn) {
        $(btn).closest('.image-box').remove();
    }
</script>

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