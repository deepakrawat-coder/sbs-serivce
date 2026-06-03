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
                            <h4 class="card-title">Services</h4>
                        </div>

                        <button type="button"
                            class="btn btn-primary mb-2"
                            data-bs-toggle="modal"
                            onclick="add('service','md')"
                            data-bs-target="#modalGrid">
                            Add Service
                        </button>
                    </div>

                    <div class="tab-content" id="myTabContent-3">

                        <div class="tab-pane fade show active"
                            id="withoutBorder"
                            role="tabpanel">

                            <div class="card-body pt-0">

                                <div class="table-responsive">

                                    <table id="service-table"
                                        class="display table"
                                        style="min-width:1200px">

                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Image</th>
                                                <th>Category</th>
                                                <th>Title</th>
                                                <th>Rating</th>
                                                <th>Slug</th>
                                                <th>Status</th>
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

    var table = $('#service-table').DataTable({

        processing: true,

        ajax: {
            url: '/admin/app/service/server',
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
                data: 'Category_Name'
            },

            {
                data: 'Title'
            },

            {
                data: 'Rating'
            },

            {
                data: 'Slug'
            },

            {
                data: 'Status',
                render: function(data, type, row) {

                    var checked = data == 1 ? 'checked' : '';

                    return '<label class="switch">' +
                        '<input onclick="changeStatus(\'service\', \'' + row.ID + '\')" type="checkbox" ' + checked + '>' +
                        '<span class="slider round"></span>' +
                        '</label>';
                }
            },

            {
                data: 'ID',
                render: function(data, type, row) {

                    return `
                        <div class="ms-auto">

                            <a href="javascript:void(0);"
                                onclick="edit('service','${data}','md')"
                                class="btn btn-primary btn-xs sharp me-1">
                                <i class="fas fa-pencil-alt"></i>
                            </a>

                            <a href="javascript:void(0);"
                                onclick="destroy('service','${data}')"
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

        $('input[aria-controls="blogs-table"]').keyup(function() {
            var searchValue = $(this).val();
            table.search(searchValue).draw();
        });
    });


</script>

<?php
include ($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/footer-bottom.php');
?>