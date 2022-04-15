<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{asset('assets/js/libs/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('plugins/sweetalerts/sweetalert2.min.js')}}"></script>
<script src="{{asset('plugins/notification/snackbar/snackbar.min.js')}}"></script>
<script src="{{asset('plugins/sweetalerts/custom-sweetalert.js')}}"></script>
<script src="{{asset('assets/js/elements/popovers.js')}}"></script>
<script src="{{asset('plugins/blockui/jquery.blockUI.min.js')}}"></script>


@if ($page_name != 'coming_soon' && $page_name != 'contact_us' && $page_name != 'error404' && $page_name != 'error500' && $page_name != 'error503' && $page_name != 'faq' && $page_name != 'helpdesk' && $page_name != 'maintenence' && $page_name != 'privacy' && $page_name != 'auth_boxed' && $page_name != 'auth_default')
    <script src="{{asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{asset('assets/js/scrollspyNav.js')}}"></script>
    <script src="{{asset('plugins/highlight/highlight.pack.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
@endif
<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
@switch($page_name)
    @case('add_course') @case('edit_course')
        <script src="{{asset('plugins/select2/select2.min.js')}}"></script>
        <script src="{{asset('plugins/tagsinput/tagsinput.js')}}"></script>
        <script src="{{asset('plugins/file-upload/file-upload-with-preview.min.js')}}"></script>
        <script src="{{asset('plugins/spectrum/spectrum.min.js')}}"></script>
        <script src="{{asset('plugins/ckeditor5/ckeditor.js')}}"></script>
        <script src="{{asset('plugins/flatpickr/flatpickr.js')}}"></script>
    @break
    @case('config_class')
        <script src="{{asset('plugins/select2/select2.min.js')}}"></script>
        <script src="{{asset('plugins/ckeditor5/ckeditor.js')}}"></script>
        <script src="{{asset('plugins/flatpickr/flatpickr.js')}}"></script>
    @break
    @case('course_details')
        <script src="{{asset('plugins/select2/select2.min.js')}}"></script>
        <script src="{{asset('assets/js/components/ui-accordions.js')}}"></script>
    @break
    @case('sales')
      {{-- Dashboard 2 --}}
      <script src="{{asset('plugins/apex/apexcharts.min.js')}}"></script>
      <script src="{{asset('assets/js/dashboard/dash_1.js')}}"></script>
      @break
    @case('manage_payments')
        <script src="{{asset('plugins/select2/select2.min.js')}}"></script>
    @break
    @case('manage_prospects')
        <script src="{{asset('plugins/select2/select2.min.js')}}"></script>
    @break
    @case('add_prospect') @case('edit_prospect')
        <script src="{{asset('plugins/select2/select2.min.js')}}"></script>
    @break
    @case('add_event') @case('edit_event')
        <script src="{{asset('plugins/select2/select2.min.js')}}"></script>
        <script src="{{asset('plugins/file-upload/file-upload-with-preview.min.js')}}"></script>
        <script src="{{asset('plugins/spectrum/spectrum.min.js')}}"></script>
        <script src="{{asset('plugins/ckeditor5/ckeditor.js')}}"></script>
    @break
    @case('event_details')
        <script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
        <script src="{{asset('plugins/flatpickr/flatpickr.js')}}"></script>
        <script src="{{asset('plugins/flatpickr/custom-flatpickr.js')}}"></script>
    @break
    @case('edit_message_prospects')
        <script src="{{asset('plugins/editors/quill/quill.js')}}"></script>
    @break
    @case('users')
    @break
    @case('auth_boxed')
      {{-- Auth Lockscreen Boxed --}}
      <script src="{{asset('assets/js/authentication/form-2.js')}}"></script>
      @break

    @case('auth_default')
      {{-- Auth Lockscreen --}}
      <script src="{{asset('assets/js/authentication/form-1.js')}}"></script>
      @break
    @case('sweet_alerts')
      {{-- Components Sweetalerts --}}
      <script src="{{asset('assets/js/scrollspyNav.js')}}"></script>
      <script src="{{asset('plugins/sweetalerts/sweetalert2.min.js')}}"></script>
      <script src="{{asset('plugins/sweetalerts/custom-sweetalert.js')}}"></script>
      @break
    @case('edit_profile')
      {{-- User Account Setting  --}}
        <script src="{{asset('plugins/file-upload/file-upload-with-preview.min.js')}}"></script>
        <script src="{{asset('assets/js/users/account-settings.js')}}"></script>
        <script src="{{asset('plugins/select2/select2.min.js')}}"></script>
      @break
    @case('update_profile')

    @break
    @case('system_options')
        <script src="{{asset('plugins/select2/select2.min.js')}}"></script>
        <script src="{{asset('plugins/file-upload/file-upload-with-preview.min.js')}}"></script>
        <script src="{{asset('plugins/spectrum/spectrum.min.js')}}"></script>
    @break
@endswitch

@stack('custom-scripts')

@livewireScripts
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
