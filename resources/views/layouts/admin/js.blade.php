        <script src="{{ asset('backend/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('backend/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('backend/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('backend/libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ asset('backend/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('backend/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('backend/libs/feather-icons/feather.min.js') }}"></script>

          <!-- dataTables.bootstrap5 -->
        <script src="{{ asset('backend/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('backend/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>

        <!-- buttons.colVis -->
        <script src="{{ asset('backend/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
        <script src="{{ asset('backend/libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
        <script src="{{ asset('backend/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('backend/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>

        <!-- buttons.bootstrap5 -->
        <script src="{{ asset('backend/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>

        <!-- dataTables.keyTable -->
        <script src="{{ asset('backend/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
        <script src="{{ asset('backend/libs/datatables.net-keytable-bs5/js/keyTable.bootstrap5.min.js') }}"></script>

        <!-- dataTable.responsive -->
        <script src="{{ asset('backend/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('backend/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>

        <!-- dataTables.select -->
        <script src="{{ asset('backend/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
        <script src="{{ asset('backend/libs/datatables.net-select-bs5/js/select.bootstrap5.min.js') }}"></script>

        <!-- Datatable Demo App Js -->
        <script src="{{ asset('backend/js/pages/datatable.init.js') }}"></script>

        <!-- Apexcharts JS -->
        <script src="{{ asset('backend/libs/apexcharts/apexcharts.min.js') }}"></script>

        <!-- for basic area chart -->
        <script src="https://apexcharts.com/samples/assets/stock-prices.js"></script>

        <!-- Widgets Init Js -->
        <script src="{{ asset('backend/js/pages/analytics-dashboard.init.js') }}"></script>

        <!-- App js-->
        <script src="{{ asset('backend/js/app.js') }}"></script>
         <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
         <script>
 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;

    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;

    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;

    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break; 
 }
 @endif 
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> 
 <script src="{{ asset('backend/js/code.js') }}"></script>
