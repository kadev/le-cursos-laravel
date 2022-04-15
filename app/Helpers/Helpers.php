<?php

namespace App\Helpers;

class Helper {

    public static function getURL() {
        // return 'This works';

        $req_uri = $_SERVER['REQUEST_URI'];
        $path = substr($req_uri,0,strrpos($req_uri,'horizontal-light-menu'));

        return $path . "horizontal-light-menu";
    }

    public static function setTitle($page_name) {

        // echo $page_name;

        $admin_name = '| CORK - Multipurpose Bootstrap Dashboard Template';

        if ($page_name === 'analytics') :
            echo 'CORK Admin - Multipurpose Bootstrap Dashboard Template';
        elseif ($page_name === 'sales') :
            echo 'Sales Admin ' . $admin_name;

        // Apps
        elseif ($page_name === 'calendar') :
            echo 'Fullcalendar Drag and Drop Event ' . $admin_name;
        elseif ($page_name === 'chat') :
            echo 'Chat Application ' . $admin_name;
        elseif ($page_name === 'contacts') :
            echo 'Contact Profile ' . $admin_name;
        elseif ($page_name === 'invoice') :
            echo 'Invoice ' . $admin_name;
        elseif ($page_name === 'mailbox') :
            echo 'Mailbox ' . $admin_name;
        elseif ($page_name === 'notes') :
            echo 'Notes ' . $admin_name;
        elseif ($page_name === 'scrumboard') :
            echo 'Scrum Task Board ' . $admin_name;
        elseif ($page_name === 'todo-list') :
            echo 'Todo List ' . $admin_name;

        // Authendication
        elseif ($page_name === 'auth_boxed') :
            echo '';
        elseif ($page_name === 'auth_default') :
            echo '';

        // Charts
        elseif ($page_name === 'charts') :
            echo 'Apex Chart '. $admin_name;

        // Components
        elseif ($page_name === 'accordions') :
            echo 'Accordions ' . $admin_name;
        elseif ($page_name === 'blockui') :
            echo 'Block UI ' . $admin_name;
        elseif ($page_name === 'bootstrap_carousel') :
            echo 'Bootstrap Carousel ' . $admin_name;
        elseif ($page_name === 'cards') :
            echo 'Card ' . $admin_name;
        elseif ($page_name === 'countdown') :
            echo 'Countdown ' . $admin_name;
        elseif ($page_name === 'counter') :
            echo 'Counter ' . $admin_name;
        elseif ($page_name === 'lightbox') :
            echo 'Lightbox ' . $admin_name;
        elseif ($page_name === 'list_group') :
            echo 'List Group ' . $admin_name;
        elseif ($page_name === 'media_object') :
            echo 'Media Object ' . $admin_name;
        elseif ($page_name === 'modals') :
            echo 'Modals ' . $admin_name;
        elseif ($page_name === 'pricing_table') :
            echo 'Pricing Tables ' . $admin_name;
        elseif ($page_name === 'session_timeout') :
            echo 'Session Timeout ' . $admin_name;
        elseif ($page_name === 'notifications') :
            echo 'Notifications ' . $admin_name;
        elseif ($page_name === 'sweet_alerts') :
            echo 'SweetAlert ' . $admin_name;
        elseif ($page_name === 'tabs') :
            echo 'Tabs ' . $admin_name;
        elseif ($page_name === 'timeline') :
            echo 'Timeline ' . $admin_name;

        // Drag And Drop
        elseif ($page_name === 'drag_n_drop') :
            echo 'Dragula Drag and Drop ' . $admin_name;

        // Elements
        elseif ($page_name === 'alerts') :
            echo 'Alerts ' . $admin_name;
        elseif ($page_name === 'avatars') :
            echo 'Avatar ' . $admin_name;
        elseif ($page_name === 'badges') :
            echo 'Badge ' . $admin_name;
        elseif ($page_name === 'breadcrumbs') :
            echo 'Breadcrumb ' . $admin_name;
        elseif ($page_name === 'button_group') :
            echo 'Button Group ' . $admin_name;
        elseif ($page_name === 'buttons') :
            echo 'Bootstrap Buttons ' . $admin_name;
        elseif ($page_name === 'color_library') :
            echo 'Color Library ' . $admin_name;
        elseif ($page_name === 'dropdown') :
            echo 'Dropdown ' . $admin_name;
        elseif ($page_name === 'infobox') :
            echo 'Infobox ' . $admin_name;
        elseif ($page_name === 'jumbotron') :
            echo 'Jumbotron ' . $admin_name;
        elseif ($page_name === 'loaders') :
            echo 'Loaders ' . $admin_name;
        elseif ($page_name === 'pagination') :
            echo 'Pagination ' . $admin_name;
        elseif ($page_name === 'popovers') :
            echo 'Popovers ' . $admin_name;
        elseif ($page_name === 'progress_bar') :
            echo 'Bootstrap Progress Bar ' . $admin_name;
        elseif ($page_name === 'search') :
            echo 'Search ' . $admin_name;
        elseif ($page_name === 'tooltips') :
            echo 'Tooltips ' . $admin_name;
        elseif ($page_name === 'treeview') :
            echo 'Tree View ' . $admin_name;
        elseif ($page_name === 'typography') :
            echo 'Typography ' . $admin_name;
        elseif ($page_name === 'font_icons') :
            echo 'Font Icon ' . $admin_name;

        // Forms
        elseif ($page_name === 'form_bootstrap_basic') :
            echo 'Bootstrap Forms ' . $admin_name;
        elseif ($page_name === 'bootstrap_select') :
            echo 'Bootstrap Select ' . $admin_name;
        elseif ($page_name === 'touchspin') :
            echo 'Bootstrap Touchspin ' . $admin_name;
        elseif ($page_name === 'checkbox_radio') :
            echo 'Checkbox and Radio ' . $admin_name;
        elseif ($page_name === 'clipboard') :
            echo 'Clipboard ' . $admin_name;
        elseif ($page_name === 'date_range_picker') :
            echo 'Date and Time picker ' . $admin_name;
        elseif ($page_name === 'file_upload') :
            echo 'File Upload ' . $admin_name;
        elseif ($page_name === 'input_group') :
            echo 'Input Group ' . $admin_name;
        elseif ($page_name === 'input_mask') :
            echo 'Input Mask ' . $admin_name;
        elseif ($page_name === 'layouts') :
            echo 'Form Layouts ' . $admin_name;
        elseif ($page_name === 'markdown') :
            echo 'Markdown Editor ' . $admin_name;
        elseif ($page_name === 'maxlength') :
            echo 'Bootstrap Maxlength ' . $admin_name;
        elseif ($page_name === 'quill') :
            echo 'Quill Editor ' . $admin_name;
        elseif ($page_name === 'select2') :
            echo 'Select2 ' . $admin_name;
        elseif ($page_name === 'switches') :
            echo 'Switches ' . $admin_name;
        elseif ($page_name === 'typeahead') :
            echo 'Typeahead ' . $admin_name;
        elseif ($page_name === 'validation') :
            echo 'Bootstrap Form Validation ' . $admin_name;
        elseif ($page_name === 'wizards') :
            echo 'Wizards ' . $admin_name;

        // Maps
        elseif ($page_name === 'maps') :
            echo 'jVector Maps ' . $admin_name;

        // Pages
        elseif ($page_name === 'comming_soon') :
            echo 'Coming Soon ' . $admin_name;
        elseif ($page_name === 'contact_us') :
            echo 'Contact Form ' . $admin_name;
        elseif ($page_name === 'error404') :
            echo 'Error 404 ' . $admin_name;
        elseif ($page_name === 'error500') :
            echo 'Error 500 ' . $admin_name;
        elseif ($page_name === 'error503') :
            echo 'Error 503 ' . $admin_name;
        elseif ($page_name === 'faq') :
            echo 'FAQ Landing Page ' . $admin_name;
        elseif ($page_name === 'faq2') :
            echo 'FAQs ' . $admin_name;
        elseif ($page_name === 'helpdesk') :
            echo 'Helpdesk ' . $admin_name;
        elseif ($page_name === 'maintenence') :
            echo 'Maintenence HTML Template ' . $admin_name;
        elseif ($page_name === 'privacy') :
            echo 'Privacy Policy ' . $admin_name;
        elseif ($page_name === 'alt_menu') :
            echo 'Alternate Menu ' . $admin_name;

        // Starter Kit
        elseif ($page_name === 'blank_page') :
            echo 'Blank Page ' . $admin_name;
        elseif ($page_name === 'boxed') :
            echo 'Boxed ' . $admin_name;
        elseif ($page_name === 'breadcrumb') :
            echo 'Breadcrumbs ' . $admin_name;

        // Tables
        elseif ($page_name === 'bootstrap_basic_table') :
            echo 'Bootstrap Tables ' . $admin_name;
        elseif ($page_name === 'alternative_pagination') :
            echo 'DataTables Alternative pagination ' . $admin_name;
        elseif ($page_name === 'basic-light') :
            echo 'DataTables Basic Light ' . $admin_name;
        elseif ($page_name === 'basic') :
            echo 'DataTables Basic ' . $admin_name;
        elseif ($page_name === 'custom') :
            echo 'Custom DataTables ' . $admin_name;
        elseif ($page_name === 'html5') :
            echo 'DataTables HTML5 Export ' . $admin_name;
        elseif ($page_name === 'live_dom_ordering') :
            echo 'DataTables Live Dom Ordering ' . $admin_name;
        elseif ($page_name === 'miscellaneous') :
            echo 'Miscellaneous DataTables ' . $admin_name;
        elseif ($page_name === 'multi-column_ordering') :
            echo 'DataTables Multi-column Ordering ' . $admin_name;
        elseif ($page_name === 'multiple_tables') :
            echo 'Multiple DataTables ' . $admin_name;
        elseif ($page_name === 'ordering_sorting') :
            echo 'DataTables Default Order Sorting ' . $admin_name;
        elseif ($page_name === 'range_search') :
            echo 'DataTables Range Search ' . $admin_name;

        // User
        elseif ($page_name === 'account_settings') :
            echo 'Account Settings ' . $admin_name;
        elseif ($page_name === 'profile') :
            echo 'User Profile ' . $admin_name;

        // Widgets
        elseif ($page_name === 'widgets') :
            echo 'Widgets ' . $admin_name;
        endif;
    }

    public static function set_breadcrumb($page_name, $category_name) {

        $category = ucfirst($category_name);

        $removeUnderscore = str_replace('_', ' ', $page_name);

        $removeDash = str_replace('-', ' ', $removeUnderscore);

        $page = ucwords($removeDash);

        if ($page_name === 'analytics') :
            // echo 'CORK Admin - Multipurpose Bootstrap Dashboard Template';
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'sales') :
            // echo 'Sales Admin ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';

        // Apps
        elseif ($page_name === 'calendar') :
            // echo 'Fullcalendar Drag and Drop Event ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'chat') :
            // echo 'Chat Application ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'contacts') :
            // echo 'Contact Profile ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'invoice') :
            // echo 'Invoice ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'mailbox') :
            // echo 'Mailbox ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'notes') :
            // echo 'Notes ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'scrumboard') :
            // echo 'Scrum Task Board ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'todo-list') :
            // echo 'Todo List ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';

        // Charts
        elseif ($page_name === 'charts') :
            // echo 'Apex Chart '. $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>Apex</span></li>';

        // Components
        elseif ($page_name === 'accordions') :
            // echo 'Accordions ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'blockui') :
            // echo 'Block UI ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'bootstrap_carousel') :
            // echo 'Bootstrap Carousel ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'cards') :
            // echo 'Card ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'countdown') :
            // echo 'Countdown ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'counter') :
            // echo 'Counter ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'lightbox') :
            // echo 'Lightbox ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'list_group') :
            // echo 'List Group ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'media_object') :
            // echo 'Media Object ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'modals') :
            // echo 'Modals ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'pricing_table') :
            // echo 'Pricing Tables ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'session_timeout') :
            // echo 'Session Timeout ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'notifications') :
            // echo 'Notifications ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'sweet_alerts') :
            // echo 'SweetAlert ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'tabs') :
            // echo 'Tabs ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'timeline') :
            // echo 'Timeline ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';

        // Drag And Drop
        elseif ($page_name === 'drag_n_drop') :
            // echo 'Dragula Drag and Drop ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">Drag and Drop</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>Dragula</span></li>';

        // Elements
        elseif ($page_name === 'alerts') :
            // echo 'Alerts ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'avatars') :
            // echo 'Avatar ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'badges') :
            // echo 'Badge ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'breadcrumbs') :
            // echo 'Breadcrumb ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'button_group') :
            // echo 'Button Group ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'buttons') :
            // echo 'Bootstrap Buttons ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'color_library') :
            // echo 'Color Library ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'dropdown') :
            // echo 'Dropdown ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'infobox') :
            // echo 'Infobox ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'jumbotron') :
            // echo 'Jumbotron ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'loaders') :
            // echo 'Loaders ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'pagination') :
            // echo 'Pagination ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'popovers') :
            // echo 'Popovers ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'progress_bar') :
            // echo 'Bootstrap Progress Bar ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'search') :
            // echo 'Search ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'tooltips') :
            // echo 'Tooltips ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'treeview') :
            // echo 'Tree View ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'typography') :
            // echo 'Typography ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'font_icons') :
            // echo 'Font Icon ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $page .'</a></li>';

        // Forms
        elseif ($page_name === 'form_bootstrap_basic') :
            // echo 'Bootstrap Forms ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'bootstrap_select') :
            // echo 'Bootstrap Select ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'touchspin') :
            // echo 'Bootstrap Touchspin ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'checkbox_radio') :
            // echo 'Checkbox and Radio ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>Checkbox and Radio</span></li>';
        elseif ($page_name === 'clipboard') :
            // echo 'Clipboard ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'date_range_picker') :
            // echo 'Date and Time picker ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>Date and Range Picker</span></li>';
        elseif ($page_name === 'file_upload') :
            // echo 'File Upload ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'input_group') :
            // echo 'Input Group ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'input_mask') :
            // echo 'Input Mask ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'layouts') :
            // echo 'Form Layouts ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'markdown') :
            // echo 'Markdown Editor ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .' Editor</span></li>';
        elseif ($page_name === 'maxlength') :
            // echo 'Bootstrap Maxlength ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'quill') :
            // echo 'Quill Editor ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .' Editor</span></li>';
        elseif ($page_name === 'select2') :
            // echo 'Select2 ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'switches') :
            // echo 'Switches ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'typeahead') :
            // echo 'Typeahead ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'validation') :
            // echo 'Bootstrap Form Validation ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'wizards') :
            // echo 'Wizards ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';

        // Maps
        elseif ($page_name === 'maps') :
            // echo 'jVector Maps ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>jVector</span></li>';

        // Pages
        elseif ($page_name === 'comming_soon') :
            // echo 'Coming Soon ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'contact_us') :
            // echo 'Contact Form ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'error404') :
            // echo 'Error 404 ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'error500') :
            // echo 'Error 500 ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'error503') :
            // echo 'Error 503 ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'faq') :
            // echo 'FAQ Landing Page ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'faq2') :
            // echo 'FAQs ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>FAQs</span></li>';
        elseif ($page_name === 'helpdesk') :
            // echo 'Helpdesk ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'maintenence') :
            // echo 'Maintenence HTML Template ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'privacy') :
            // echo 'Privacy Policy ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'alt_menu') :
            // echo 'Alternate Menu ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">Starter Kit</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>Alternate Menu</span></li>';

        // Starter Kit
        elseif ($page_name === 'blank_page') :
            // echo 'Blank Page ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">Blank Page</a></li>';
        elseif ($page_name === 'boxed') :
            // echo 'Boxed ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">Starter Kit</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'breadcrumb') :
            // echo 'Breadcrumbs ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">Starter Kit</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';

        // Tables
        elseif ($page_name === 'bootstrap_basic_table') :
            // echo 'Bootstrap Tables ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>Basic</span></li>';
        elseif ($page_name === 'alternative_pagination') :
            // echo 'DataTables Alternative pagination ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">DataTables</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'basic-light') :
            // echo 'DataTables Basic Light ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">DataTables</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>Light</span></li>';
        elseif ($page_name === 'basic') :
            // echo 'DataTables Basic ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">DataTables</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'custom') :
            // echo 'Custom DataTables ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">DataTables</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'html5') :
            // echo 'DataTables HTML5 Export ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">DataTables</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>HTML5 Export</span></li>';
        elseif ($page_name === 'live_dom_ordering') :
            // echo 'DataTables Live Dom Ordering ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">DataTables</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>Live Dom Ordering</span></li>';
        elseif ($page_name === 'miscellaneous') :
            // echo 'Miscellaneous DataTables ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">DataTables</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'multi-column_ordering') :
            // echo 'DataTables Multi-column Ordering ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">DataTables</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>Multi-column</span></li>';
        elseif ($page_name === 'multiple_tables') :
            // echo 'Multiple DataTables ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">DataTables</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>Multiple</span></li>';
        elseif ($page_name === 'ordering_sorting') :
            // echo 'DataTables Default Order Sorting ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">DataTables</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>Order Sorting</span></li>';
        elseif ($page_name === 'range_search') :
            // echo 'DataTables Range Search ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">DataTables</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';

        // User
        elseif ($page_name === 'account_settings') :
            // echo 'Account Settings ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';
        elseif ($page_name === 'profile') :
            // echo 'User Profile ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $category .'</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>' . $page .'</span></li>';

        // Widgets
        elseif ($page_name === 'widgets') :
            // echo 'Widgets ' . $admin_name;
            echo '<li class="breadcrumb-item"><a href="javascript:void(0);">'. $page .'</a></li>';
        endif;


    }

    public static function setAppDropdownText($page_name) {

        // Apps
        if ($page_name === 'calendar') :
            echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg><span>Calendar</span>';
        elseif ($page_name === 'chat') :
            echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg><span>Chat</span>';
        elseif ($page_name === 'contacts') :
            echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg><span>Contacts</span>';
        elseif ($page_name === 'invoice') :
            echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg><span>Invoice List</span>';
        elseif ($page_name === 'mailbox') :
            echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg><span>Mailbox</span>';
        elseif ($page_name === 'notes') :
            echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg><span>Notes</span>';
        elseif ($page_name === 'scrumboard') :
            echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-plus"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="12" y1="18" x2="12" y2="12"></line><line x1="9" y1="15" x2="15" y2="15"></line></svg><span>Scrumboard</span>';
        elseif ($page_name === 'todo-list') :
            echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg><span>Todo List </span>';
        else :
        echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-crosshair"><circle cx="12" cy="12" r="10"></circle><line x1="22" y1="12" x2="18" y2="12"></line><line x1="6" y1="12" x2="2" y2="12"></line><line x1="12" y1="6" x2="12" y2="2"></line><line x1="12" y1="22" x2="12" y2="18"></line></svg><span>Apps</span>';
        endif;
    }

    public static function scrollspy($offset) {
        echo 'data-target="#navSection" data-spy="scroll" data-offset="'. $offset . '"';
    }

    public static function getCountries() {
        $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canadá", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "México", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
        return $countries;
    }

    public static function getMonthsInES(){
        return array(
            0 => 'Enero',
            1 => 'Febrero',
            2 => 'Marzo',
            3 => 'Abril',
            4 => 'Mayo',
            5 => 'Junio',
            6 => 'Julio',
            7 => 'Agosto',
            8 => 'Septiembre',
            9 => 'Octubre',
            10 => 'Noviembre',
            11 => 'Diciembre'
        );
    }

    public static function removeAccents($string) {
        if ( !preg_match('/[\x80-\xff]/', $string) )
            return $string;

        $chars = array(
            // Decompositions for Latin-1 Supplement
            chr(195).chr(128) => 'A', chr(195).chr(129) => 'A',
            chr(195).chr(130) => 'A', chr(195).chr(131) => 'A',
            chr(195).chr(132) => 'A', chr(195).chr(133) => 'A',
            chr(195).chr(135) => 'C', chr(195).chr(136) => 'E',
            chr(195).chr(137) => 'E', chr(195).chr(138) => 'E',
            chr(195).chr(139) => 'E', chr(195).chr(140) => 'I',
            chr(195).chr(141) => 'I', chr(195).chr(142) => 'I',
            chr(195).chr(143) => 'I', chr(195).chr(145) => 'N',
            chr(195).chr(146) => 'O', chr(195).chr(147) => 'O',
            chr(195).chr(148) => 'O', chr(195).chr(149) => 'O',
            chr(195).chr(150) => 'O', chr(195).chr(153) => 'U',
            chr(195).chr(154) => 'U', chr(195).chr(155) => 'U',
            chr(195).chr(156) => 'U', chr(195).chr(157) => 'Y',
            chr(195).chr(159) => 's', chr(195).chr(160) => 'a',
            chr(195).chr(161) => 'a', chr(195).chr(162) => 'a',
            chr(195).chr(163) => 'a', chr(195).chr(164) => 'a',
            chr(195).chr(165) => 'a', chr(195).chr(167) => 'c',
            chr(195).chr(168) => 'e', chr(195).chr(169) => 'e',
            chr(195).chr(170) => 'e', chr(195).chr(171) => 'e',
            chr(195).chr(172) => 'i', chr(195).chr(173) => 'i',
            chr(195).chr(174) => 'i', chr(195).chr(175) => 'i',
            chr(195).chr(177) => 'n', chr(195).chr(178) => 'o',
            chr(195).chr(179) => 'o', chr(195).chr(180) => 'o',
            chr(195).chr(181) => 'o', chr(195).chr(182) => 'o',
            chr(195).chr(182) => 'o', chr(195).chr(185) => 'u',
            chr(195).chr(186) => 'u', chr(195).chr(187) => 'u',
            chr(195).chr(188) => 'u', chr(195).chr(189) => 'y',
            chr(195).chr(191) => 'y',
            // Decompositions for Latin Extended-A
            chr(196).chr(128) => 'A', chr(196).chr(129) => 'a',
            chr(196).chr(130) => 'A', chr(196).chr(131) => 'a',
            chr(196).chr(132) => 'A', chr(196).chr(133) => 'a',
            chr(196).chr(134) => 'C', chr(196).chr(135) => 'c',
            chr(196).chr(136) => 'C', chr(196).chr(137) => 'c',
            chr(196).chr(138) => 'C', chr(196).chr(139) => 'c',
            chr(196).chr(140) => 'C', chr(196).chr(141) => 'c',
            chr(196).chr(142) => 'D', chr(196).chr(143) => 'd',
            chr(196).chr(144) => 'D', chr(196).chr(145) => 'd',
            chr(196).chr(146) => 'E', chr(196).chr(147) => 'e',
            chr(196).chr(148) => 'E', chr(196).chr(149) => 'e',
            chr(196).chr(150) => 'E', chr(196).chr(151) => 'e',
            chr(196).chr(152) => 'E', chr(196).chr(153) => 'e',
            chr(196).chr(154) => 'E', chr(196).chr(155) => 'e',
            chr(196).chr(156) => 'G', chr(196).chr(157) => 'g',
            chr(196).chr(158) => 'G', chr(196).chr(159) => 'g',
            chr(196).chr(160) => 'G', chr(196).chr(161) => 'g',
            chr(196).chr(162) => 'G', chr(196).chr(163) => 'g',
            chr(196).chr(164) => 'H', chr(196).chr(165) => 'h',
            chr(196).chr(166) => 'H', chr(196).chr(167) => 'h',
            chr(196).chr(168) => 'I', chr(196).chr(169) => 'i',
            chr(196).chr(170) => 'I', chr(196).chr(171) => 'i',
            chr(196).chr(172) => 'I', chr(196).chr(173) => 'i',
            chr(196).chr(174) => 'I', chr(196).chr(175) => 'i',
            chr(196).chr(176) => 'I', chr(196).chr(177) => 'i',
            chr(196).chr(178) => 'IJ',chr(196).chr(179) => 'ij',
            chr(196).chr(180) => 'J', chr(196).chr(181) => 'j',
            chr(196).chr(182) => 'K', chr(196).chr(183) => 'k',
            chr(196).chr(184) => 'k', chr(196).chr(185) => 'L',
            chr(196).chr(186) => 'l', chr(196).chr(187) => 'L',
            chr(196).chr(188) => 'l', chr(196).chr(189) => 'L',
            chr(196).chr(190) => 'l', chr(196).chr(191) => 'L',
            chr(197).chr(128) => 'l', chr(197).chr(129) => 'L',
            chr(197).chr(130) => 'l', chr(197).chr(131) => 'N',
            chr(197).chr(132) => 'n', chr(197).chr(133) => 'N',
            chr(197).chr(134) => 'n', chr(197).chr(135) => 'N',
            chr(197).chr(136) => 'n', chr(197).chr(137) => 'N',
            chr(197).chr(138) => 'n', chr(197).chr(139) => 'N',
            chr(197).chr(140) => 'O', chr(197).chr(141) => 'o',
            chr(197).chr(142) => 'O', chr(197).chr(143) => 'o',
            chr(197).chr(144) => 'O', chr(197).chr(145) => 'o',
            chr(197).chr(146) => 'OE',chr(197).chr(147) => 'oe',
            chr(197).chr(148) => 'R',chr(197).chr(149) => 'r',
            chr(197).chr(150) => 'R',chr(197).chr(151) => 'r',
            chr(197).chr(152) => 'R',chr(197).chr(153) => 'r',
            chr(197).chr(154) => 'S',chr(197).chr(155) => 's',
            chr(197).chr(156) => 'S',chr(197).chr(157) => 's',
            chr(197).chr(158) => 'S',chr(197).chr(159) => 's',
            chr(197).chr(160) => 'S', chr(197).chr(161) => 's',
            chr(197).chr(162) => 'T', chr(197).chr(163) => 't',
            chr(197).chr(164) => 'T', chr(197).chr(165) => 't',
            chr(197).chr(166) => 'T', chr(197).chr(167) => 't',
            chr(197).chr(168) => 'U', chr(197).chr(169) => 'u',
            chr(197).chr(170) => 'U', chr(197).chr(171) => 'u',
            chr(197).chr(172) => 'U', chr(197).chr(173) => 'u',
            chr(197).chr(174) => 'U', chr(197).chr(175) => 'u',
            chr(197).chr(176) => 'U', chr(197).chr(177) => 'u',
            chr(197).chr(178) => 'U', chr(197).chr(179) => 'u',
            chr(197).chr(180) => 'W', chr(197).chr(181) => 'w',
            chr(197).chr(182) => 'Y', chr(197).chr(183) => 'y',
            chr(197).chr(184) => 'Y', chr(197).chr(185) => 'Z',
            chr(197).chr(186) => 'z', chr(197).chr(187) => 'Z',
            chr(197).chr(188) => 'z', chr(197).chr(189) => 'Z',
            chr(197).chr(190) => 'z', chr(197).chr(191) => 's'
        );

        $string = strtr($string, $chars);

        return $string;
    }
}












