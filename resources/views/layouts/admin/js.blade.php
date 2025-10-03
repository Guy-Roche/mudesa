        <script src="{{ asset('backend/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('backend/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('backend/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('backend/libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ asset('backend/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('backend/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('backend/libs/feather-icons/feather.min.js') }}"></script>

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
