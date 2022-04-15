
<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{ asset('student/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('student/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('student/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{asset('plugins/sweetalerts/sweetalert2.min.js')}}"></script>
<script src="{{asset('plugins/notification/snackbar/snackbar.min.js')}}"></script>
<script src="{{ asset('student/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('student/assets/js/app.js') }}"></script>
<script src="{{asset('plugins/blockui/jquery.blockUI.min.js')}}"></script>

<script>
    $(document).ready(function() {
        App.init();
    });
</script>
<script src="{{ asset('student/assets/js/custom.js') }}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS
<script src="{{ asset('student/plugins/apex/apexcharts.min.js') }}"></script>
<script src="{{ asset('student/assets/js/dashboard/dash_1.js') }}"></script>

BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

@switch($page_name)
    @case('course_details')
        <script src="{{asset('plugins/select2/select2.min.js')}}"></script>
        <script src="{{asset('assets/js/components/ui-accordions.js')}}"></script>
    @break
    @case('see_course')
        <script src="{{asset('assets/js/components/ui-accordions.js')}}"></script>
        <script src="{{asset('plugins/pdfobject/pdfobject.js')}}"></script>
        <script src="{{ asset('assets/js/countdown/jquery.countdown.min.js') }}"></script>
    @break
    @case('sales')
        {{-- Dashboard 2 --}}
        <script src="{{asset('plugins/apex/apexcharts.min.js')}}"></script>
        <script src="{{asset('assets/js/dashboard/dash_1.js')}}"></script>
    @break
    @case('manage_payments')
        <script src="{{asset('plugins/select2/select2.min.js')}}"></script>
    @break
    @case('edit_profile')
        {{-- User Account Setting  --}}
        <script src="{{asset('plugins/file-upload/file-upload-with-preview.min.js')}}"></script>
        <script src="{{asset('plugins/select2/select2.min.js')}}"></script>
    @break
    @case('update_profile')

    @break
@endswitch

@stack('custom-scripts')

@livewireScripts
