 <link href="{{asset('assets/css/loader.css')}}" rel="stylesheet" type="text/css" />
<script src="{{asset('assets/js/loader.js')}}"></script>

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
<link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

 <link href="{{asset('plugins/sweetalerts/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
 <link href="{{asset('plugins/sweetalerts/sweetalert.css')}}" rel="stylesheet" type="text/css" />
 <link href="{{asset('plugins/notification/snackbar/snackbar.min.css')}}" rel="stylesheet" type="text/css" />

 <link href="{{asset('assets/css/elements/popover.css')}}" rel="stylesheet" type="text/css" />
 <link href="{{asset('assets/css/elements/breadcrumb.css')}}" rel="stylesheet" type="text/css" />
 <link href="{{asset('assets/css/elements/alert.css')}}" rel="stylesheet" type="text/css" />


 @if ($page_name != 'coming_soon' && $page_name != 'contact_us' && $page_name != 'error404' && $page_name != 'error500' && $page_name != 'error503' && $page_name != 'faq' && $page_name != 'helpdesk' && $page_name != 'maintenence' && $page_name != 'privacy' && $page_name != 'auth_boxed' && $page_name != 'auth_default')
    <link href="{{asset('assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
 @endif
<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
@switch($page_name)
    @case('add_course')
    @case('edit_course')
        <link rel="stylesheet" type="text/css" href="{{asset('plugins/select2/select2.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('plugins/tagsinput/tagsinput.css')}}">
        <link href="{{asset('assets/css/components/tabs-accordian/custom-tabs.css')}}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="{{asset('plugins/spectrum/spectrum.min.css')}}">
        <link href="{{asset('plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('plugins/flatpickr/flatpickr.css')}}" rel="stylesheet" type="text/css">
    @break
    @case('config_class')
        <link rel="stylesheet" type="text/css" href="{{asset('plugins/select2/select2.min.css')}}">
        <link href="{{asset('plugins/flatpickr/flatpickr.css')}}" rel="stylesheet" type="text/css">
    @break
    @case('course_details')
        <link rel="stylesheet" type="text/css" href="{{asset('plugins/select2/select2.min.css')}}">
        <link href="{{asset('assets/css/components/tabs-accordian/custom-accordions.css')}}" rel="stylesheet" type="text/css">
    @break
    @case('sales')
      {{-- Dashboard 2 --}}
        <link href="{{asset('plugins/apex/apexcharts.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/css/dashboard/dash_1.css')}}" rel="stylesheet" type="text/css" />
      @break
    @case('manage_payments')
        <link rel="stylesheet" type="text/css" href="{{asset('plugins/select2/select2.min.css')}}">
    @break
    @case('manage_prospects')
        <link rel="stylesheet" type="text/css" href="{{asset('plugins/select2/select2.min.css')}}">
    @break
    @case('add_prospect') @case('edit_prospect')
        <link rel="stylesheet" type="text/css" href="{{asset('plugins/select2/select2.min.css')}}">
    @break
    @case('events')
        <link href="{{asset('plugins/animate/animate.css')}}" rel="stylesheet" type="text/css" />
        <script src="{{asset('plugins/sweetalerts/promise-polyfill.js')}}"></script>
    @break
    @case('add_event') @case('edit_event')
        <link rel="stylesheet" type="text/css" href="{{asset('plugins/select2/select2.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('plugins/spectrum/spectrum.min.css')}}">
        <link href="{{asset('plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css" />
    @break
    @case('event_details')
        <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/datatables.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt-global_style.css')}}">
        <link href="{{asset('plugins/flatpickr/flatpickr.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('plugins/flatpickr/custom-flatpickr.css')}}" rel="stylesheet" type="text/css">
    @break
    @case('edit_message_prospects')
        <link rel="stylesheet" type="text/css" href="{{asset('plugins/editors/quill/quill.snow.css')}}">
    @break
    @case('users')

    @break
    @case('edit_profile')
      {{-- User Account Settings --}}
        <link href="{{asset('plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/users/account-setting.css')}}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="{{asset('plugins/select2/select2.min.css')}}">
    @break
    @case('profile')
      {{-- User Profile --}}
      <link href="{{asset('assets/css/users/user-profile.css')}}" rel="stylesheet" type="text/css" />
      @break
    @case('system_options')
        <link rel="stylesheet" type="text/css" href="{{asset('plugins/select2/select2.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('plugins/spectrum/spectrum.min.css')}}">
        <link href="{{asset('plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css" />
    @break
@endswitch

 @livewireStyles
<!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
