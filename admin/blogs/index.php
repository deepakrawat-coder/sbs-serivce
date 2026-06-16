<?php
include ($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/header-top.php');
?>

<style>
    .modal-dialog.modal-dialog-centered {
        max-width: 1200px !important;
    }
</style>

<?php include ($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/header-bottom.php'); ?>
<?php include ($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/top-menu.php'); ?>
<?php include ($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/menu.php'); ?>

<div class="element-areaa">
    <div class="demo-view">
        <div class="container-fluid pt-0 ps-0 pe-lg-4 pe-0">

            <div class="col-xl-12">
                <div class="card dz-card" id="accordion-four">

                    <div class="card-header flex-wrap d-flex justify-content-between">
                        <div>
                            <h4 class="card-title">Blogs</h4>
                        </div>

                        <button type="button"
                            class="btn btn-primary mb-2"
                            data-bs-toggle="modal"
                            onclick="add('blogs','md')"
                            data-bs-target="#modalGrid">
                            Add Blog
                        </button>
                    </div>

                    <div class="tab-content" id="myTabContent-3">

                        <div class="tab-pane fade show active"
                            id="withoutBorder"
                            role="tabpanel">

                            <div class="card-body pt-0">

                                <div class="table-responsive">

                                    <table id="blog-table"
                                        class="display table"
                                        style="min-width:1200px">

                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Image</th>
                                                <th>Product </th>
                                                <th>Title</th>
                                                <th>Slug</th>
                                                <th>Short Description</th>
                                                <th>Status</th>
                                                <!-- <th>FAQ</th> -->
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody></tbody>

                                    </table>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<?php include ($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/footer-top.php'); ?>

<script>

$(document).ready(function() {

    var table = $('#blog-table').DataTable({

        processing: true,

        ajax: {
            url: '/admin/app/blogs/server',
            type: 'POST'
        },

        columns: [

            {
                data: 'No'
            },

            {
                data: 'Image',
                render: function(data) {

                    if(data){
                        return '<img src="' + data + '" width="60" height="60" style="object-fit:cover;border-radius:5px;">';
                    }

                    return '-';
                }
            },

            {
                data: 'Product_Name',
                render: function(data) {
                    return data ? data : '-';
                }
            },

            {
                data: 'Title'
            },

            {
                data: 'Slug'
            },

            {
                data: 'Short_Description',
                render: function(data) {
                    if(data && data.length > 50) {
                        return '<span title="' + data + '">' + data.substring(0, 50) + '...</span>';
                    }
                    return data ? data : '-';
                }
            },

            {
                data: 'Status',
                render: function(data, type, row) {

                    var checked = data == 1 ? 'checked' : '';

                    return '<label class="switch">' +
                        '<input onclick="changeStatus(\'blogs\', \'' + row.ID + '\')" type="checkbox" ' + checked + '>' +
                        '<span class="slider round"></span>' +
                        '</label>';
                }
            },

            // {
            //     data: 'FAQ',
            //     render: function(data) {
            //         if(data) {
            //             try {
            //                 var faqData = typeof data === 'string' ? JSON.parse(data) : data;
            //                 if(Array.isArray(faqData) && faqData.length > 0) {
            //                     return '<button type="button" class="btn btn-sm btn-info" onclick="viewFAQ(\'' + row.ID + '\')">View FAQ (' + faqData.length + ')</button>';
            //                 }
            //             } catch(e) {
            //                 return '<span class="badge bg-secondary">Invalid</span>';
            //             }
            //         }
            //         return '<span class="badge bg-light">No FAQ</span>';
            //     }
            // },

            {
                data: 'Created_At',
                render: function(data) {
                    if(data) {
                        return new Date(data).toLocaleDateString();
                    }
                    return '-';
                }
            },

            {
                data: 'ID',
                render: function(data, type, row) {

                    return `
                        <div class="ms-auto">

                            <a href="javascript:void(0);"
                                onclick="edit('blogs','${data}','md')"
                                class="btn btn-primary btn-xs sharp me-1">
                                <i class="fas fa-pencil-alt"></i>
                            </a>

                          

                            <a href="javascript:void(0);"
                                onclick="destroy('blogs','${data}')"
                                class="btn btn-danger btn-xs sharp">
                                <i class="fa fa-trash"></i>
                            </a>

                        </div>
                    `;
                }
            }

        ],
            'searching': true,
            'paging': true,
            'lengthChange': true,
        });

        $('input[aria-controls="blog-table"]').keyup(function() {
            var searchValue = $(this).val();
            table.search(searchValue).draw();
        });
    });

    // Function to view FAQ
    // function viewFAQ(id) {
    //     $.ajax({
    //         url: '/admin/app/blog/get-faq',
    //         type: 'POST',
    //         data: { id: id },
    //         success: function(response) {
    //             var faqData = JSON.parse(response);
    //             var faqHtml = '<div class="faq-container">';
                
    //             if(Array.isArray(faqData) && faqData.length > 0) {
    //                 faqData.forEach(function(item, index) {
    //                     faqHtml += `
    //                         <div class="faq-item mb-3">
    //                             <strong>Q${index + 1}: ${item.question}</strong>
    //                             <p class="mt-2">A: ${item.answer}</p>
    //                             <hr>
    //                         </div>
    //                     `;
    //                 });
    //             } else {
    //                 faqHtml += '<p>No FAQ available</p>';
    //             }
                
    //             faqHtml += '</div>';
                
    //             $('#modalGrid .modal-body').html(faqHtml);
    //             $('#modalGrid .modal-title').html('FAQ Details');
    //             $('#modalGrid').modal('show');
    //         }
    //     });
    // }

</script>

<!-- Additional CSS for FAQ modal -->
<!-- <style>
    .faq-container {
        max-height: 500px;
        overflow-y: auto;
    }
    .faq-item {
        padding: 10px;
        background: #f8f9fa;
        border-radius: 5px;
    }
    .faq-item strong {
        color: #3b7ddd;
    }
    .faq-item hr {
        margin-top: 10px;
        margin-bottom: 0;
    }
</style> -->

<?php
include ($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/footer-bottom.php');
?>