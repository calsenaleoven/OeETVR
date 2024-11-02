<script src="<?php echo e(asset('templates/plugins/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('templates/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="<?php echo e(asset('templates/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('templates/plugins/chart.js/Chart.min.js')); ?>"></script>
<script src="<?php echo e(asset('templates/plugins/sparklines/sparkline.js')); ?>"></script>
<script src="<?php echo e(asset('templates/plugins/jqvmap/jquery.vmap.min.js')); ?>"></script>
<script src="<?php echo e(asset('templates/plugins/jqvmap/maps/jquery.vmap.usa.js')); ?>"></script>
<script src="<?php echo e(asset('templates/plugins/jquery-knob/jquery.knob.min.js')); ?>"></script>
<script src="<?php echo e(asset('templates/plugins/moment/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('templates/plugins/daterangepicker/daterangepicker.js')); ?>"></script>
<script src="<?php echo e(asset('templates/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')); ?>"></script>
<script src="<?php echo e(asset('templates/plugins/summernote/summernote-bs4.min.js')); ?>"></script>
<script src="<?php echo e(asset('templates/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')); ?>"></script>
<script src="<?php echo e(asset('templates/dist/js/adminlte.js')); ?>"></script>
<script src="<?php echo e(asset('templates/dist/js/pages/dashboard.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script src="<?php echo e(asset('templates/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('templates/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('templates/plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('templates/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('templates/plugins/datatables-buttons/js/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('templates/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('templates/plugins/pdfmake/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(asset('templates/plugins/jszip/jszip.min.js')); ?>"></script>
<script src="<?php echo e(asset('templates/plugins/pdfmake/vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(asset('templates/plugins/datatables-buttons/js/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('templates/plugins/datatables-buttons/js/buttons.print.min.js')); ?>"></script>
<script src="<?php echo e(asset('templates/plugins/datatables-buttons/js/buttons.colVis.min.js')); ?>"></script>

<script src="<?php echo e(asset('templates/dist/js/ph-location.js')); ?>"></script>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": [{
                    extend: 'csv',
                    exportOptions: {
                        columns: ':visible:not(.no-export)'
                    }
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: ':visible:not(.no-export)'
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: ':visible:not(.no-export)'
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: ':visible:not(.no-export)'
                    }
                },
                {
                    extend: 'colvis',
                    columns: ':not(.no-export)'
                }
            ]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>


<script>
    $(function() {

        function getProjectManagerData() {
            return $.ajax({
                url: '/api/project-managers-data',
                method: 'GET',
                dataType: 'json',
            });
        }

        function initializeDoughnutChart(canvas, data, options) {
            new Chart(canvas, {
                type: 'doughnut',
                data: data,
                options: options
            });
        }
        getProjectManagerData().done(function(projectManagerData) {
            console.log('Project Manager Data:', projectManagerData);
            var labels = projectManagerData.map(manager => manager.manager_name);
            var data = projectManagerData.map(manager => manager.done_projects_count);
            var colors = projectManagerData.map(manager => manager.color);

            var donutChartCanvas = $('#donutChart').get(0).getContext('2d');
            var donutData = {
                labels: labels,
                datasets: [{
                    data: data,
                    backgroundColor: colors,
                }]
            };
            var donutOptions = {
                maintainAspectRatio: false,
                responsive: true,
            };

            initializeDoughnutChart(donutChartCanvas, donutData, donutOptions);
        });


        //chart 2 best employee tasks accomplished

        function getEmployeeData() {
            return $.ajax({
                url: '/api/employee-data',
                method: 'GET',
                dataType: 'json',
            });
        }

        getEmployeeData().done(function(employeeData) {
            console.log('Employee Data:', employeeData);

            // Extracting relevant information for Chart.js
            var labels = employeeData.map(employee => employee.employee_name);
            var data = employeeData.map(employee => employee.done_tasks_count);
            var colors = employeeData.map(employee => employee.color);

            var donutChartCanvas = $('#donutChart1').get(0).getContext('2d');
            var donutData = {
                labels: labels,
                datasets: [{
                    data: data,
                    backgroundColor: colors,
                }]
            };
            var donutOptions = {
                maintainAspectRatio: false,
                responsive: true,
            };

            initializeDoughnutChart(donutChartCanvas, donutData, donutOptions);
        });
    })
</script>



<script>
    $('#project_type_dd').on('change', function() {
    var type = $(this).val();
    if (type === "Horizontal Type") {
        // If horizontal type, hide storey dropdown and show length input
        $('#for-storey').addClass('d-none');
        $('#for-length').removeClass('d-none');

        $('#selected_category_val')
            .empty()
            .append('<option value="Kalsada">Kalsada</option>')
            .append('<option value="Highway">Highway</option>')
            .append('<option value="Bridge">Bridge</option>');
    } else if (type === "Vertical Type") {
        // If vertical type, hide length input and show storey dropdown
        $('#for-storey').removeClass('d-none');
        $('#length_id').addClass('d-none');
        $('#for-length').addClass('d-none');
        $('#selected_category_val')
            .empty()
            .append('<option value="House">House</option>')
            .append('<option value="Condominium">Condominium</option>')
            .append('<option value="Apartment">Apartment</option>')
            .append('<option value="Government Facilities">Government Facilities</option>');

        var maxStoreys = 100;
        $('#storey-dropdown').empty();
        for (var i = 1; i <= maxStoreys; i++) {
            var optionText = i + ' Storey';
            var optionValue = 'Storey ' + i;
            $('#storey-dropdown').append('<option value="' + optionValue + '">' + optionText + '</option>');
        }
    }
});
</script>


<script>
    $(document).ready(function() {

        function initializeAddRowFunctionality(table) {

            function calculateGrandTotal() {
                var grandTotal = 0;
                table.find('.amount').each(function() {
                    var amount = parseFloat($(this).val().replace(/,/g, '')) ||
                    0;
                    grandTotal += amount;
                });
                table.find('#grand_total').val(grandTotal.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g,
                ","));
            }


            function calculateRowTotal(row) {
                var qty = parseFloat(row.find('.qty').val()) || 0;
                var rate = parseFloat(row.find('.rate').val()) || 0;
                var rowTotal = qty * rate;
                row.find('.amount').val(rowTotal.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g,
                ","));
                return rowTotal;
            }


            function updateNumberField() {
                table.find('#product_tbody tr').each(function(index) {
                    $(this).find('.number').val(index + 1);
                });
            }


            table.on('input', '.qty, .rate', function() {
                var row = $(this).closest('tr');
                calculateRowTotal(row);
                calculateGrandTotal();
            });


            table.find('#btn-add-row').click(function() {
                var newRow = '<tr>' +
                    '<td><input type="text" readonly name="number[]" class="form-control number"></td>' +
                    '<td><input type="text" required name="description[]" class="form-control description"></td>' +
                    '<td><input type="text" required name="qty[]" class="form-control qty"></td>' +
                    '<td><input type="text" required name="unit[]" class="form-control unit"></td>' +
                    '<td><input type="text" required name="rate[]" class="form-control rate"></td>' +
                    '<td><input type="text" required name="amount[]" class="form-control amount"></td>' +
                    '<td><input type="button" value="x" class="btn btn-danger btn-sm btn-row-remove"></td>' +
                    '</tr>';
                table.find('#product_tbody').append(newRow);
                updateNumberField();
            });


            table.on('click', '.btn-row-remove', function() {
                $(this).closest('tr').remove();
                calculateGrandTotal();
                updateNumberField();
            });


            calculateGrandTotal();
            updateNumberField();
        }


        initializeAddRowFunctionality($('#first_table'));


        $('#generateNewTableBtn').click(function() {
            var newHeaderText = $('#newHeaderText').val().trim();
            if (newHeaderText !== "") {
                var clonedTable = $('#first_table').clone();
                var newTableHeader = $('<h5 class="text-primary mt-2 table_name">' + newHeaderText +
                '</h5>');
                $('#multiple_table').append(newTableHeader);
                $('#multiple_table').append(
                clonedTable);
                initializeAddRowFunctionality(
                clonedTable);
                $('#headerModal').modal('hide');

                $('#newHeaderText').val('');

                $('#addNewTableBtn').remove();


                $('#multiple_table').append(
                    '<div class="d-flex float-right mt-3"><button type="button" class="btn btn-primary" id="addNewTableBtn" data-toggle="modal" data-target="#headerModal">Add New Table</button></div>'
                );
            }
        });

    });
</script>





<script>
    $(document).ready(function() {
        $('#pdfForm').submit(function(event) {
            event.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                url: '<?php echo e(route('admin.print-pdf')); ?>',
                method: 'POST',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                success: function(response) {
                    console.log(response)
                    // var blob = new Blob([response], { type: 'application/pdf' });
                    // var link = document.createElement('a');
                    // link.href = window.URL.createObjectURL(blob);
                    // link.download = 'bill_of_quantities.pdf';
                    // link.click();
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>
<?php /**PATH /home/u382238056/domains/constructflow-oetvr.com/public_html/resources/views/components/js-components.blade.php ENDPATH**/ ?>