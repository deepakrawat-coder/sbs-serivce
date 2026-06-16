<?php
require '../../includes/conn.php';
require '../../includes/helper.php';

$id = (int) $_GET['id'];

$blog = mysqli_fetch_assoc(
    mysqli_query($conn, "
        SELECT *
        FROM blogs
        WHERE ID = '$id'
    ")
);

$faqs = [];

if (!empty($blog['faq'])) {
    $faqs = json_decode($blog['faq'], true);
}
?>

<div class="modal-header">
    <h3 class="modal-title">Edit Blog</h3>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="card-body">
    <div class="form-validation">

        <form id="form-edit-blog"
              action="/admin/app/blogs/update"
              method="POST"
              enctype="multipart/form-data">

            <input type="hidden"
                   name="id"
                   value="<?= htmlspecialchars($blog['ID']); ?>">

            <div class="row">

                <div class="mb-3 col-md-6">
                    <label class="form-label">
                        Product
                        <span class="text-danger">*</span>
                    </label>

                    <select name="product_id"
                            class="form-select"
                            required>

                        <option value="">Select Product</option>

                        <?php
                        $products = mysqli_query(
                            $conn,
                            'SELECT id, name FROM product WHERE status = 1 ORDER BY name ASC'
                        );

                        while ($row = mysqli_fetch_assoc($products)) {
                            ?>
                            <option value="<?= htmlspecialchars($row['id']); ?>"
                                <?= ($row['id'] == $blog['Product_ID']) ? 'selected' : ''; ?>>
                                <?= htmlspecialchars($row['name']); ?>
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
                           id="title"
                           class="form-control"
                           value="<?= htmlspecialchars($blog['title']); ?>"
                           required>
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label">Slug</label>

                    <input type="text"
                           name="slug"
                           id="slug"
                           class="form-control"
                           value="<?= htmlspecialchars($blog['slug']); ?>"
                           placeholder="Auto-generated from title">
                    <small class="text-muted">Leave empty to auto-generate from title</small>
                </div>

           

                <div class="mb-3 col-md-12">
                    <label class="form-label">
                        Short Description
                    </label>

                    <textarea name="short_description"
                              rows="3"
                              class="form-control"
                              placeholder="Brief summary of the blog post"><?= htmlspecialchars($blog['short_description']); ?></textarea>
                </div>

                <div class="mb-3 col-md-12">
                    <label class="form-label">Content <span class="text-danger">*</span></label>
                    <textarea class="ckeditor" cols="80" id="editor" name="content"
                        rows="10"><?= htmlspecialchars($blog['content']); ?></textarea>
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
                                            class="btn btn-danger btn-sm remove-faq">
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
                                        class="btn btn-danger btn-sm remove-faq">
                                    Remove
                                </button>
                            </div>

                        <?php } ?>

                    </div>

                    <button type="button"
                            class="btn btn-success btn-sm mt-2"
                            id="add-faq">
                        + Add FAQ
                    </button>

                </div>

                <div class="mb-3 col-md-12">

                    <label class="form-label">
                        Current Image
                    </label>

                    <br>

                    <?php if (!empty($blog['image'])) { ?>
                        <img src="<?= htmlspecialchars($blog['image']); ?>"
                             width="150"
                             height="150"
                             style="object-fit: cover;"
                             class="img-thumbnail mb-3">
                        <br>
                        <small class="text-muted">Current featured image</small>
                    <?php } ?>

                    <input type="file"
                           name="image"
                           class="form-control mt-2"
                           accept="image/*">
                    <small class="text-muted">Leave empty to keep current image. Recommended size: 800x600 pixels</small>

                </div>

            </div>

            <div class="modal-footer">
                <button type="submit"
                        class="btn btn-primary">
                    Update Blog
                </button>
            </div>

        </form>

    </div>
</div>

<script>
$(document).ready(function() {
    
    // Auto-generate slug from title
    $('#title').on('keyup', function() {
        var title = $(this).val();
        var slug = title.toLowerCase()
            .replace(/[^\w\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-');
        
        // Only auto-fill if slug is empty or was auto-generated
        var currentSlug = $('#slug').val();
        if (!currentSlug || currentSlug === $('#slug').attr('data-auto')) {
            $('#slug').val(slug);
            $('#slug').attr('data-auto', slug);
        }
    });
    
    // Store initial slug value
    $('#slug').attr('data-auto', $('#slug').val());
    
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
                        class="btn btn-danger btn-sm remove-faq">
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
    $('#form-edit-blog').on('submit', function(e) {
        e.preventDefault();
        
        // Check if CKEditor is initialized
        if (typeof CKEDITOR !== 'undefined' && CKEDITOR.instances.editor) {
            // Update the textarea with CKEditor content
            CKEDITOR.instances.editor.updateElement();
        }
        
        let formData = new FormData(this);
        
        // Prepare FAQ as JSON
        let questions = $('input[name="faq_question[]"]').map(function() { return $(this).val(); }).get();
        let answers = $('textarea[name="faq_answer[]"]').map(function() { return $(this).val(); }).get();
        
        let faqArray = [];
        for(let i = 0; i < questions.length; i++) {
            if(questions[i] && answers[i]) {
                faqArray.push({
                    question: questions[i],
                    answer: answers[i]
                });
            }
        }
        
        formData.append('faq', JSON.stringify(faqArray));
        
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
                    if ($.fn.DataTable && $('#blog-table').length) {
                        $('#blog-table')
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
                    toastr.error('An error occurred while updating the blog.');
                } else {
                    alert('An error occurred while updating the blog.');
                }
            }
        });
    });
});
</script>

<script>
    // Initialize CKEditor
    if (typeof CKEDITOR !== 'undefined') {
        CKEDITOR.replace('editor');
    }
</script>

<style>
    .faq-item {
        background-color: #f8f9fa;
        border-radius: 5px;
        transition: all 0.3s ease;
    }
    
    .faq-item:hover {
        background-color: #e9ecef;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }
    
    .remove-faq {
        margin-top: 5px;
    }
    
    .img-thumbnail {
        object-fit: cover;
        border-radius: 8px;
    }
</style>