<link href="{{asset('student/plugins/sweetalerts/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('student/plugins/sweetalerts/sweetalert.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('student/plugins/notification/snackbar/snackbar.min.css')}}" rel="stylesheet" type="text/css" />

<link href="{{asset('student/assets/css/elements/popover.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('student/assets/css/elements/breadcrumb.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('student/assets/css/elements/alert.css')}}" rel="stylesheet" type="text/css" />

@switch($page_name)
    @case('profile')
        {{-- User Profile --}}
        <link href="{{asset('student/assets/css/users/user-profile.css')}}" rel="stylesheet" type="text/css" />
    @break
    @case('edit_profile')
        {{-- User Account Settings --}}
        <link href="{{asset('plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('student/assets/css/users/account-setting.css')}}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="{{asset('plugins/select2/select2.min.css')}}">
    @break
    @case('my_courses')
        <link href="{{asset('assets/css/elements/infobox.css')}}" rel="stylesheet" type="text/css">
    @break
    @case('see_course')
        <link href="{{asset('assets/css/components/tabs-accordian/custom-accordions.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('student/assets/css/components/custom-countdown.css')}}" rel="stylesheet" type="text/css">
    @break
@endswitch


@livewireStyles
