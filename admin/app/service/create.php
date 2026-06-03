<?php require '../../includes/conn.php';
require '../../includes/helper.php'; ?>

<div class="modal-header">
    <h3 class="modal-title">Add Service</h3>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="card-body">
    <div class="form-validation">

        <form id="form-add-service"
              action="/admin/app/service/store"
              method="POST"
              enctype="multipart/form-data">

            <div class="row">

                <div class="mb-3 col-md-6">
                    <label class="form-label">Service Category <span class="text-danger">*</span></label>
                    <select name="service_category" class="form-select" required>
                        <option value="">Select Category</option>
                        <?php
                        $category = mysqli_query($conn, 'SELECT * FROM service_category ORDER BY Name ASC');
                        while ($row = mysqli_fetch_assoc($category)) {
                            ?>
                            <option value="<?= $row['ID']; ?>">
                                <?= $row['Name']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text"
                           name="title"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label">Rating</label>
                    <input type="number"
                           name="rating"
                           step="0.1"
                           min="0"
                           max="5"
                           class="form-control">
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label">Slug</label>
                    <input type="text"
                           name="slug"
                           class="form-control">
                </div>

                <div class="mb-3 col-md-12">
                    <label class="form-label">Short Description</label>
                    <textarea name="short_description"
                              rows="3"
                              class="form-control"></textarea>
                </div>

                <div class="mb-3 col-md-12">
                    <label class="form-label">Content <span class="text-danger">*</span></label>
                    <textarea class="ckeditor" cols="80" id="editor" name="content" rows="10"></textarea>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">FAQs</label>

                    <div id="faq-wrapper">

                        <div class="faq-item border p-3 mb-2">

                            <div class="mb-2">
                                <input type="text"
                                       name="faq_question[]"
                                       class="form-control"
                                       placeholder="Question">
                            </div>

                            <div class="mb-2">
                                <textarea name="faq_answer[]"
                                          class="form-control"
                                          rows="2"
                                          placeholder="Answer"></textarea>
                            </div>

                            <button type="button"
                                    class="btn btn-danger remove-faq">
                                Remove
                            </button>

                        </div>

                    </div>

                    <button type="button"
                            class="btn btn-success mt-2"
                            id="add-faq">
                        Add FAQ
                    </button>

                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label">Meta Title</label>
                    <input type="text"
                           name="meta_title"
                           class="form-control">
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label">Meta Keywords</label>
                    <input type="text"
                           name="meta_key"
                           class="form-control">
                </div>

                <div class="mb-3 col-md-12">
                    <label class="form-label">Meta Description</label>
                    <textarea name="meta_description"
                              rows="3"
                              class="form-control"></textarea>
                </div>

                <div class="mb-3 col-md-12">
                    <label class="form-label">Image <span class="text-danger">*</span></label>
                    <input type="file"
                           name="image"
                           class="form-control"
                           accept="image/*"
                           required>
                </div>

            </div>

            <div class="modal-footer">
                <button type="submit"
                        class="btn btn-primary">
                    Save Service
                </button>
            </div>

        </form>

    </div>
</div>

<script>

$('#add-faq').click(function(){

    $('#faq-wrapper').append(`
        <div class="faq-item border p-3 mb-2">

            <div class="mb-2">
                <input type="text"
                       name="faq_question[]"
                       class="form-control"
                       placeholder="Question">
            </div>

            <div class="mb-2">
                <textarea name="faq_answer[]"
                          class="form-control"
                          rows="2"
                          placeholder="Answer"></textarea>
            </div>

            <button type="button"
                    class="btn btn-danger remove-faq">
                Remove
            </button>

        </div>
    `);

});

$(document).on('click','.remove-faq',function(){
    $(this).closest('.faq-item').remove();
});

$('#form-add-service').on('submit',function(e){

    e.preventDefault();

    let formData = new FormData(this);
  formData.append('content', CKEDITOR.instances['editor'].getData());
    $.ajax({
        url: this.action,
        type:'POST',
        data:formData,
        contentType:false,
        processData:false,
        dataType:'json',

        success:function(data){

            if(data.status == 200){

                $('.modal').modal('hide');

                toastr.success(data.message);

                $('#service-table')
                    .DataTable()
                    .ajax
                    .reload(null,false);

            }else{

                toastr.error(data.message);

            }

        }

    });

});

</script>
<script>
    CKEDITOR.replace('editor');
</script>