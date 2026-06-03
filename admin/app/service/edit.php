<?php
require '../../includes/conn.php';
require '../../includes/helper.php';

$id = (int) $_GET['id'];

$service = mysqli_fetch_assoc(
    mysqli_query($conn, "
        SELECT *
        FROM service
        WHERE ID = '$id'
    ")
);

$faqs = [];

if (!empty($service['FAQ'])) {
    $faqs = json_decode($service['FAQ'], true);
}
?>

<div class="modal-header">
    <h3 class="modal-title">Edit Service</h3>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="card-body">
    <div class="form-validation">

        <form id="form-edit-service"
              action="/admin/app/service/update"
              method="POST"
              enctype="multipart/form-data">

            <input type="hidden"
                   name="id"
                   value="<?= htmlspecialchars($service['ID']); ?>">

            <div class="row">

                <div class="mb-3 col-md-6">
                    <label class="form-label">
                        Service Category
                        <span class="text-danger">*</span>
                    </label>

                    <select name="service_category"
                            class="form-select"
                            required>

                        <option value="">Select Category</option>

                        <?php
                        $category = mysqli_query(
                            $conn,
                            'SELECT * FROM service_category ORDER BY Name ASC'
                        );

                        while ($row = mysqli_fetch_assoc($category)) {
                            ?>
                            <option value="<?= htmlspecialchars($row['ID']); ?>"
                                <?= ($row['ID'] == $service['Service_Category']) ? 'selected' : ''; ?>>
                                <?= htmlspecialchars($row['Name']); ?>
                            </option>
                        <?php } ?>

                    </select>
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label">
                        Title
                        <span class="text-danger">*</span>
                    </label>

                    <input type="text"
                           name="title"
                           class="form-control"
                           value="<?= htmlspecialchars($service['Title']); ?>"
                           required>
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label">Rating</label>

                    <input type="number"
                           name="rating"
                           step="0.1"
                           min="0"
                           max="5"
                           class="form-control"
                           value="<?= htmlspecialchars($service['Rating']); ?>">
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label">Slug</label>

                    <input type="text"
                           name="slug"
                           class="form-control"
                           value="<?= htmlspecialchars($service['Slug']); ?>">
                </div>

                <div class="mb-3 col-md-12">
                    <label class="form-label">
                        Short Description
                    </label>

                    <textarea name="short_description"
                              rows="3"
                              class="form-control"><?= htmlspecialchars($service['Short_Description']); ?></textarea>
                </div>

                <div class="mb-3 col-md-12">
                    <label class="form-label">Content <span class="text-danger">*</span></label>
                    <textarea class="ckeditor" cols="80" id="editor" name="content"
                        rows="10"><?= $service['Content'] ?></textarea>
                </div>

                <div class="col-md-12 mb-3">

                    <label class="form-label">FAQs</label>

                    <div id="faq-wrapper">

                        <?php if (!empty($faqs)) { ?>

                            <?php foreach ($faqs as $index => $faq) { ?>
                                <div class="faq-item border p-3 mb-2">
                                    <div class="mb-2">
                                        <input type="text"
                                               name="faq_question[]"
                                               class="form-control"
                                               placeholder="Question"
                                               value="<?= htmlspecialchars($faq['question']); ?>">
                                    </div>
                                    <div class="mb-2">
                                        <textarea name="faq_answer[]"
                                                  class="form-control"
                                                  rows="2"
                                                  placeholder="Answer"><?= htmlspecialchars($faq['answer']); ?></textarea>
                                    </div>
                                    <button type="button"
                                            class="btn btn-danger remove-faq">
                                        Remove
                                    </button>
                                </div>
                            <?php } ?>

                        <?php } else { ?>

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

                        <?php } ?>

                    </div>

                    <button type="button"
                            class="btn btn-success mt-2"
                            id="add-faq">
                        Add FAQ
                    </button>

                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label">
                        Meta Title
                    </label>

                    <input type="text"
                           name="meta_title"
                           class="form-control"
                           value="<?= htmlspecialchars($service['Meta_Title']); ?>">
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label">
                        Meta Keywords
                    </label>

                    <input type="text"
                           name="meta_key"
                           class="form-control"
                           value="<?= htmlspecialchars($service['Meta_Key']); ?>">
                </div>

                <div class="mb-3 col-md-12">
                    <label class="form-label">
                        Meta Description
                    </label>

                    <textarea name="meta_description"                       
                              rows="3"
                              class="form-control"><?= htmlspecialchars($service['Meta_Description']); ?></textarea>
                </div>

                <div class="mb-3 col-md-12">

                    <label class="form-label">
                        Current Image
                    </label>

                    <br>

                    <?php if (!empty($service['Image'])) { ?>
                        <img src="<?= htmlspecialchars($service['Image']); ?>"
                             width="120"
                             class="img-thumbnail mb-3">
                    <?php } ?>

                    <input type="file"
                           name="image"
                           class="form-control"
                           accept="image/*">

                </div>

            </div>

            <div class="modal-footer">
                <button type="submit"
                        class="btn btn-primary">
                    Update Service
                </button>
            </div>

        </form>

    </div>
</div>

<script>
$(document).ready(function() {
    // Add FAQ item
    $('#add-faq').click(function() {
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

    // Remove FAQ item (event delegation for dynamically added elements)
    $(document).on('click', '.remove-faq', function() {
        $(this).closest('.faq-item').remove();
    });

    // Form submission
    $('#form-edit-service').on('submit', function(e) {
        e.preventDefault();
        
        // Check if CKEditor is initialized
        if (typeof CKEDITOR !== 'undefined' && CKEDITOR.instances.editor) {
            // Update the textarea with CKEditor content
            CKEDITOR.instances.editor.updateElement();
        }
        
        let formData = new FormData(this);
        
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            
            success: function(data) {
                if (data.status == 200) {
                    // Close modal
                    $('.modal').modal('hide');
                    
                    // Show success message
                    if (typeof toastr !== 'undefined') {
                        toastr.success(data.message);
                    } else {
                        alert(data.message);
                    }
                    
                    // Reload DataTable
                    if ($.fn.DataTable && $('#service-table').length) {
                        $('#service-table')
                            .DataTable()
                            .ajax
                            .reload(null, false);
                    }
                } else {
                    if (typeof toastr !== 'undefined') {
                        toastr.error(data.message);
                    } else {
                        alert(data.message);
                    }
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', error);
                if (typeof toastr !== 'undefined') {
                    toastr.error('An error occurred while updating the service.');
                } else {
                    alert('An error occurred while updating the service.');
                }
            }
        });
    });
});
</script>
<script>
    CKEDITOR.replace('editor');
</script>