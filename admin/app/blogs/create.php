<?php require '../../includes/conn.php';
require '../../includes/helper.php'; ?>

<div class="modal-header">
    <h3 class="modal-title">Add Blog</h3>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="card-body">
    <div class="form-validation">

        <form id="form-add-blog"
              action="/admin/app/blogs/store"
              method="POST"
              enctype="multipart/form-data">

            <div class="row">

                <div class="mb-3 col-md-6">
                    <label class="form-label">Product <span class="text-danger">*</span></label>
                    <select name="product_id" class="form-select" required>
                        <option value="">Select Product</option>
                        <?php
                        $products = mysqli_query($conn, 'SELECT id, name FROM product WHERE status = 1 ORDER BY name ASC');
                        while ($row = mysqli_fetch_assoc($products)) {
                            ?>
                            <option value="<?= $row['id']; ?>">
                                <?= htmlspecialchars($row['name']); ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text"
                           name="title"
                           id="title"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label">Slug</label>
                    <input type="text"
                           name="slug"
                           id="slug"
                           class="form-control"
                           placeholder="Auto-generated from title">
                    <small class="text-muted">Leave empty to auto-generate from title</small>
                </div>

              

                <div class="mb-3 col-md-12">
                    <label class="form-label">Short Description</label>
                    <textarea name="short_description"
                              rows="3"
                              class="form-control"
                              placeholder="Brief summary of the blog post"></textarea>
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
                                    class="btn btn-danger btn-sm remove-faq">
                                Remove
                            </button>

                        </div>

                    </div>

                    <button type="button"
                            class="btn btn-success btn-sm mt-2"
                            id="add-faq">
                        + Add FAQ
                    </button>

                </div>

                <div class="mb-3 col-md-12">
                    <label class="form-label">Featured Image <span class="text-danger">*</span></label>
                    <input type="file"
                           name="image"
                           class="form-control"
                           accept="image/*"
                           required>
                    <small class="text-muted">Recommended size: 800x600 pixels</small>
                </div>

            </div>

            <div class="modal-footer">
                <button type="submit"
                        class="btn btn-primary">
                    Save Blog
                </button>
            </div>

        </form>

    </div>
</div>

<script>

// Auto-generate slug from title
$('#title').on('keyup', function() {
    var title = $(this).val();
    var slug = title.toLowerCase()
        .replace(/[^\w\s-]/g, '')  // Remove special characters
        .replace(/\s+/g, '-')       // Replace spaces with hyphens
        .replace(/-+/g, '-');       // Replace multiple hyphens with single hyphen
    
    $('#slug').val(slug);
});

// Add FAQ item
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
                    class="btn btn-danger btn-sm remove-faq">
                Remove
            </button>
        </div>
    `);
});

// Remove FAQ item
$(document).on('click', '.remove-faq', function(){
    $(this).closest('.faq-item').remove();
});

// Form submission
$('#form-add-blog').on('submit', function(e){
    e.preventDefault();

    let formData = new FormData(this);
    
    // Get CKEditor content
    if (CKEDITOR.instances['editor']) {
        formData.append('content', CKEDITOR.instances['editor'].getData());
    }
    
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
        url: this.action,
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        dataType: 'json',

        success: function(data){
            if(data.status == 200){
                $('.modal').modal('hide');
                toastr.success(data.message);
                $('#blog-table').DataTable().ajax.reload(null, false);
            } else {
                toastr.error(data.message);
            }
        },
        
        error: function(xhr, status, error){
            toastr.error('An error occurred while saving the blog');
            console.error(error);
        }
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
    }
    
    .faq-item:hover {
        background-color: #e9ecef;
    }
    
    .remove-faq {
        margin-top: 5px;
    }
</style>