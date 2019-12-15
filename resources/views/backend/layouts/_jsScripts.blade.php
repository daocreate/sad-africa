<!-- Jquery JS-->
<script src="{{ asset('admin/vendor/jquery-3.2.1.min.js') }}"></script>
<!-- Bootstrap JS-->
<script src="{{ asset('admin/vendor/bootstrap-4.1/popper.min.js') }}"></script>
<script src="{{ asset('admin/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
<!-- Vendor JS       -->
<script src="{{ asset("admin/vendor/slick/slick.min.js") }}"></script>
<script src="{{asset("admin/vendor/wow/wow.min.js")}}"></script>
<script src="{{ asset("admin/vendor/animsition/animsition.min.js") }}"></script>
<script src="{{ asset("admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js") }}"></script>
<script src="{{ asset("admin/vendor/counter-up/jquery.waypoints.min.js") }}"></script>
<script src="{{ asset("admin/vendor/counter-up/jquery.counterup.min.js") }}"></script>
<script src="{{ asset('admin/vendor/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<script src="{{ asset("admin/vendor/circle-progress/circle-progress.min.js") }}"></script>
<script src="{{ asset("admin/vendor/perfect-scrollbar/perfect-scrollbar.js") }}"></script>
<script src="{{ asset('admin/vendor/chartjs/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('admin/vendor/select2/select2.min.js') }}"></script>
<!-- Main JS-->
<script src="{{ asset('admin/js/main.js') }}"></script>
{{-- bootstrap switch--}}
<script src="{{ asset('admin/vendor/bootstrap-switch/js/bootstrap-switch.js') }}" type="text/javascript"></script>

<script>
    $(document).ready( function () {
        $('#myTab').DataTable()
    });
</script>
{{-- Script to change user state--}}
<script>
    $(function() {
        $('.toggle-class').change(function() {
            var state = $(this).prop('checked') == true ? 1 : 0;
            var user_id = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "json",
                url: '/changeStatus',
                data: {'state': state, 'user_id': user_id},
                success: function(data){
                    console.log(data.success)
                }
            });
        })
    })
</script>