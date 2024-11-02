</div>
<!-- /.content-wrapper -->

<footer class="footer text-center mt-4 p-3" style="background-color: #6A9C89; color: #E9EFEC; padding-bottom: 70px;">
    <div class="container">
        <p class="mb-0">Copyright &copy; {{ date('Y') }} ETVR Construction and Trading. All Rights Reserved.</p>
        <small>Designed and Maintained by ConstrucFlow Team</small>
    </div>
</footer>
<style>
    .footer {
        clear: both;
        font-size: 15px;
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: #6A9C89;
        color: #E9EFEC;
        padding: 1rem;
    }
</style>

<x-js-components />


<script>
    $(document).ready(function() {

    // Handle change event for project type
    $('#project_type').on('change', function() {
        var type = $(this).val();
        if (type === "Horizontal Type") {
            // If horizontal type, hide storey dropdown and show length input
            $('#for-storey').addClass('d-none');
            $('#length_id').removeClass('d-none');
            // Update category options
            $('#selected_category_val')
                .empty()
                .append('<option value="Kalsada">Kalsada</option>')
                .append('<option value="Highway">Highway</option>')
                .append('<option value="Bridge">Bridge</option>');
        } else if (type === "Vertical Type") {
            // If vertical type, hide length input and show storey dropdown
            $('#for-storey').removeClass('d-none');
            $('#length_id').addClass('d-none');
            // Update category options
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

        $('#projectMembersSelect').select2({
            placeholder: 'Select project members',
            width: "100%"
        });
        $('.summernote').summernote({
            height: 150,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript',
                    'subscript', 'clear'
                ]],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ol', 'ul', 'paragraph', 'height']],
                ['table', ['table']],
                ['view', ['undo', 'redo', 'fullscreen', 'codeview', 'help']]
            ]
        })
        // var map = L.map('map', {
        //     zoomControl: false
        // }).setView([12.8797, 121.7740], 6);

        // L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        //     attribution: '© OpenStreetMap contributors'
        // }).addTo(map);

        // var marker;
        // map.on('click', function(e) {
        //     document.getElementById('latitude').value = e.latlng.lat.toFixed(6);
        //     document.getElementById('longitude').value = e.latlng.lng.toFixed(6);
        //     if (marker) {
        //         map.removeLayer(marker);
        //     }

        //     marker = L.marker(e.latlng).addTo(map);
        // });


    });
</script>
<script>
    $(document).ready(function(){
      $('#projectForm').submit(function(e){
        e.preventDefault(); // Prevent form submission
        $('#details_statis').removeClass('d-none')
        // Get input values
        var projectName = $('#projectName').val();
        var totalArea = parseFloat($('#totalArea').val());

        // Perform calculations
        var bareTypeCost = totalArea * 25000;
        var standardTypeCost = totalArea * 35000;
        var luxuryTypeCost = totalArea * 45000;

        $('#project_name').text('Cost Breakdown for '+ projectName)
        $('#first_amount').text('₱ ' + bareTypeCost.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}))
        $('#second_amount').text('₱ ' + standardTypeCost.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}))
        $('#third_amount').text('₱ ' + luxuryTypeCost.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}))
      });
    });
</script>
@if (session('showModaladd'))
    <script>
        $(document).ready(function() {
            $('#addNewTask').modal('show');
        });
    </script>
@endif

</body>

</html>
