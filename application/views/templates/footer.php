            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Rifki Imanudin Maulana <?= date('Y'); ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap core JavaScript-->
            <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
            <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>


            <script src="<?= base_url('assets/'); ?>js/jquery.dataTables.js"></script>
            <script src="<?= base_url('assets/'); ?>js/dataTables.bootstrap4.js"></script>
            <script src="<?= base_url('assets/'); ?>js/dataTables.responsive.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>



            <script type="text/javascript">
                $.extend(true, $.fn.dataTable.defaults, {
                    "searching": true,
                    "ordering": true,
                    paging: true
                });
                $(document).ready(function() {
                    $('#pelanggan').dataTable({
                        "lengthMenu": [5, 10, 15, 20, 25, 30, 35, 50, 75, 100],
                        dom: 'Bfrtip',
                        buttons: [{
                                extend: 'excelHtml5',
                                text: '<i class="fas fa-file-excel nav-icon"> Export Excel</i>',
                                className: 'btn bg-gradient-success btn-sm text-black',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5]
                                }
                            },
                            {
                                extend: 'print',
                                text: '<i class="fas fa-print nav-icon"> Cetak Data</i>',
                                className: 'btn bg-gradient-warning btn-sm text-black',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5]
                                },
                                customize: function(win) {
                                    $(win.document.body)
                                        .css('font-size', '10pt')

                                    $(win.document.body).find('table')
                                        .addClass('compact')
                                        .css('font-size', 'inherit');
                                }
                            }
                        ],
                        "responsive": true,
                        "columnDefs": [{
                                responsivePriority: 1,
                                targets: 0
                            },
                            {
                                responsivePriority: 2,
                                targets: 1
                            },
                            {
                                responsivePriority: 3,
                                targets: 2
                            }
                        ]
                    });
                });

                $(document).ready(function() {
                    $('#pendaftaran').dataTable({
                        "lengthMenu": [5, 10, 15, 20, 25, 30, 35, 50, 75, 100],
                        dom: 'Bfrtip',
                        buttons: [{
                                extend: 'excelHtml5',
                                text: '<i class="fas fa-file-excel nav-icon"> Export Excel</i>',
                                className: 'btn bg-gradient-success btn-sm text-black',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 8]
                                }
                            },
                            {
                                extend: 'print',
                                text: '<i class="fas fa-print nav-icon"> Cetak Data</i>',
                                className: 'btn bg-gradient-warning btn-sm text-black',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 8]
                                },
                                customize: function(win) {
                                    $(win.document.body)
                                        .css('font-size', '10pt')

                                    $(win.document.body).find('table')
                                        .addClass('compact')
                                        .css('font-size', 'inherit');
                                }
                            }
                        ],
                        "responsive": true,
                        "columnDefs": [{
                                responsivePriority: 1,
                                targets: 0
                            },
                            {
                                responsivePriority: 2,
                                targets: 1
                            },
                            {
                                responsivePriority: 3,
                                targets: 2
                            }
                        ]
                    });
                });

                $(document).ready(function() {
                    $('#calonpelanggan').dataTable({
                        "lengthMenu": [5, 10, 15, 20, 25, 30, 35, 50, 75, 100],
                        dom: 'Bfrtip',
                        buttons: [{
                                extend: 'excelHtml5',
                                text: '<i class="fas fa-file-excel nav-icon"> Export Excel</i>',
                                className: 'btn bg-gradient-success btn-sm text-black',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5]
                                }
                            },
                            {
                                extend: 'print',
                                text: '<i class="fas fa-print nav-icon"> Cetak Data</i>',
                                className: 'btn bg-gradient-warning btn-sm text-black',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5]
                                },
                                customize: function(win) {
                                    $(win.document.body)
                                        .css('font-size', '10pt')

                                    $(win.document.body).find('table')
                                        .addClass('compact')
                                        .css('font-size', 'inherit');
                                }
                            }
                        ],
                        "responsive": true,
                        "columnDefs": [{
                                responsivePriority: 1,
                                targets: 0
                            },
                            {
                                responsivePriority: 2,
                                targets: 1
                            },
                            {
                                responsivePriority: 3,
                                targets: 2
                            }
                        ]
                    });
                });

                $(document).ready(function() {
                    $('#pembayaran').dataTable({
                        "lengthMenu": [5, 10, 15, 20, 25, 30, 35, 50, 75, 100],
                        dom: 'Bfrtip',
                        buttons: [{
                                extend: 'excelHtml5',
                                text: '<i class="fas fa-file-excel nav-icon"> Export Excel</i>',
                                className: 'btn bg-gradient-success btn-sm text-black',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4]
                                }
                            },
                            {
                                extend: 'print',
                                text: '<i class="fas fa-print nav-icon"> Cetak Data</i>',
                                className: 'btn bg-gradient-warning btn-sm text-black',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4]
                                },
                                customize: function(win) {
                                    $(win.document.body)
                                        .css('font-size', '10pt')

                                    $(win.document.body).find('table')
                                        .addClass('compact')
                                        .css('font-size', 'inherit');
                                }
                            }
                        ],
                        "responsive": true,
                        "columnDefs": [{
                                responsivePriority: 1,
                                targets: 0
                            },
                            {
                                responsivePriority: 2,
                                targets: 1
                            },
                            {
                                responsivePriority: 3,
                                targets: 2
                            }
                        ]
                    });
                });

                $(document).ready(function() {
                    $('#detail').dataTable({
                        "lengthMenu": [5, 10, 15, 20, 25, 30, 35, 50, 75, 100],
                        dom: 'Bfrtip',
                        buttons: [{
                                extend: 'excelHtml5',
                                text: '<i class="fas fa-file-excel nav-icon"> Export Excel</i>',
                                className: 'btn bg-gradient-success btn-sm text-black',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4]
                                }
                            },
                            {
                                extend: 'print',
                                text: '<i class="fas fa-print nav-icon"> Cetak Data</i>',
                                className: 'btn bg-gradient-warning btn-sm text-black',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4]
                                },
                                customize: function(win) {
                                    $(win.document.body)
                                        .css('font-size', '10pt')

                                    $(win.document.body).find('table')
                                        .addClass('compact')
                                        .css('font-size', 'inherit');
                                }
                            }
                        ],
                        "responsive": true,
                        "columnDefs": [{
                                responsivePriority: 1,
                                targets: 0
                            },
                            {
                                responsivePriority: 2,
                                targets: 1
                            },
                            {
                                responsivePriority: 3,
                                targets: 2
                            }
                        ]
                    });
                });

                $(document).ready(function() {
                    $('#lap').dataTable({
                        "lengthMenu": [5, 10, 15, 20, 25, 30, 35, 50, 75, 100],
                        dom: 'Bfrtip',
                        buttons: [{
                                extend: 'excelHtml5',
                                text: '<i class="fas fa-file-excel nav-icon"> Export Excel</i>',
                                className: 'btn bg-gradient-success btn-sm text-black',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6]
                                }
                            },
                            {
                                extend: 'print',
                                text: '<i class="fas fa-print nav-icon"> Cetak Data</i>',
                                className: 'btn bg-gradient-warning btn-sm text-black',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6]
                                },
                                customize: function(win) {
                                    $(win.document.body)
                                        .css('font-size', '10pt')

                                    $(win.document.body).find('table')
                                        .addClass('compact')
                                        .css('font-size', 'inherit');
                                }
                            }
                        ],
                        "responsive": true,
                        "columnDefs": [{
                                responsivePriority: 1,
                                targets: 0
                            },
                            {
                                responsivePriority: 2,
                                targets: 1
                            },
                            {
                                responsivePriority: 3,
                                targets: 2
                            }
                        ]
                    });
                });
            </script>

            <script>
                $('.custom-file-input').on('change', function() {
                    let fileName = $(this).val().split('\\').pop();
                    $(this).next('.custom-file-label').addClass("selected").html(fileName);
                });



                $('.form-check-input').on('click', function() {
                    const menuId = $(this).data('menu');
                    const roleId = $(this).data('role');

                    $.ajax({
                        url: "<?= base_url('admin/changeaccess'); ?>",
                        type: 'post',
                        data: {
                            menuId: menuId,
                            roleId: roleId
                        },
                        success: function() {
                            document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
                        }
                    });

                });
            </script>

            </body>

            </html>