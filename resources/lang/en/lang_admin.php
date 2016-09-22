<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */
    'homepage' => [
        'title_admin' => 'Booking Ticket',
        'dashboard' => 'Dashboard',
        'cinema' => 'Cinema',
        'hd' => 'HD',
        'control_panel' => 'Control panel',
        'home' => 'Home',
        'more_info' => 'More info',
        'user_registrations' => 'User Registrations',
        'unique_visitors' => 'Unique Visitors',
        'sharing' => 'Sharing',
        'toggle_navigation' => 'Toggle navigation',
        'you_messages' => 'You have 0 messages',
        'see_all_messages' => 'See All Messages',
        'you_notifications' => 'You have 0 notifications',
        'view_all' => 'View all',
        'you_tasks' => 'You have 0 tasks',
        'view_all_tasks' => 'View all tasks',
        'profile' => 'Profile',
        'change_pass' => 'Change Password',
        'sign_out' => 'Sign out',
        'member_signin' => 'Member since Nov. 2016',
        'online' => 'Online',
        'statistical' => 'Statistical',
        'create_acc' => 'Create Account',
        'user_manager' => 'Manage Users',
        'list_users' => 'List Users',
        'list_booking' => 'List Booking',
        'manage_film' => 'Manage Films',
        'film' => 'Films',
        'category' => 'Categories',
        'manage_booking' => 'Manage Booking',
        'manage_ads' => 'Manage Advertisements',
        'manage_comment' => 'Manage Comments',
        'manage_schedule' => 'Manage Schedule',
        'type_manager' => 'Type Manager',
        'list_types' => 'List Types',
        'copyright' => 'Copyright &copy; 2016-2020',
        'almsaeed_studio' => 'HDcinema Ltd',
        'reserved' => 'All rights reserved.',
        'link_page' => 'http://hdcinema.app/',
    ],
    'login' => [
        'title' => 'Login | Admin',
        'login' => 'Login',
        'register' => 'Register',
        'forgot_pass' => 'Forgot Password?',
        'register' => 'Register Now',
        'log_in' => 'Log In',
    ],
    'user' => [
        'title_manage_user' => 'Manage Users',
        'list_user' => 'Users List',
        'no' => 'No.',
        'full_name' => 'Fullname',
        'tel' => 'Tel',
        'address' => 'Address',
        'title_delete' => 'Delete User',
        'confirm' => 'Do you want delete this User ?',
        'danger' => 'Danger :',
        'success' => 'Successful :',
        'no_user' => 'Not found user',
        'title_edit_user' => 'Edit User',
        'edit_user' => 'Edit User',
        'image' => 'Choose Image',
        'admin' => 'Update By: ',
        'fullname_pattern' => '[A-Za-z \t]{3,100}*\p{L}+',
        'fullname_notice' => 'firstname lastname. Ex: Quang Tran. And 3->100 characters',
        'tel_pattern' => '\d{10,14}',
        'tel_notice' => 'Must contain 10->14 number',
        'address_pattern' => '[.,\-\/A-Za-z0-9 \t]{6,100}*\p{L}+',
        'address_notice' => 'Address must 6-100 characters,no special characters,except .,-/',
        'edit_fail' => 'Edit user is failed! Try Again.',
        'edit_success' => 'Edit user is successful!',
        'username_pattern' => '[A-Za-z0-9_]{3,20}',
        'username_notice' => 'must contain 3->20 character (A-Za-z0-9_),no special characters',
        'password_pattern' => '.{6,100}',
        'password_notice' => 'Password must 6-100 characters',
        'password' => 'Password',
        'username' => 'Username',
        'title_create_user' => 'Create User',
        'create_user' => 'Create User',
        'create_success' => 'Created User Successful',
        'create_error' => 'Create Fail ! Check again.',
        'block_default' => 0,
        'linked_user' => 'http://hdcinema.app/admin/user/',
        'user_has_booking' => 'Can\'t delete ! User has booking.',
        'delete_success' => 'Delete Successful !',
        'delete_fail' => 'Delete Failed ! Try again.',
        'booking_empty' => 0
        
    ],
    'film' => [
        'title_manage_film' => 'Manage Films',
        'list_films' => 'Films List',
        'no' => 'No.',
        'name' => 'Name',
        'genre' => 'Genre',
        'actor' => 'Actor',
        'duration' => 'Duration',
        'starttime' => 'Starttime',
        'linked_film' => 'http://hdcinema.app/admin/film/',
        'title_delete' => 'Delete Film',
        'confirm' => 'Do you want delete this Film ?',
        'create_film' => 'Create Film',
        'title_edit_film' => 'Edit Film',
        'edit_film' => 'Edit Film',
        'type_film' => 'Type Film',
        'trailer' => 'Trailer',
        'hide' => 'Display',
        'category' => 'Category',
        'director' => 'Director',
        'image' => 'Choose Image',
        'admin' => 'Update by: ',
        'name_pattern' => '[.,-:\'\"A-Za-z0-9_\s\u00C0-\u1EF3]{2,100}$',
        'name_notice' => 'must contain 2->100 character (A-Za-z0-9_,.:-)',
        'genre_pattern' => '[.,-:\'\"A-Za-z0-9_\s\u00C0-\u1EF3]{3,100}$',
        'genre_notice' => 'must contain 3->100 character (A-Za-z0-9_,.:-)',
        'actor_pattern' => '[.,-:\'\"A-Za-z0-9_\s\u00C0-\u1EF3]{3,100}$',
        'actor_notice' => 'must contain 3->100 character (A-Za-z0-9_,.:-)',
        'director_pattern' => '[.,-:\'\"A-Za-z0-9_\s\u00C0-\u1EF3]{3,100}$',
        'director_notice' => 'must contain 3->100 character (A-Za-z0-9_,.:-)',
        'duration_pattern' => '([0]?[0-3]):([0-5][0-9]):([0-5][0-9])',
        'duration_notice' => 'hh:mm:ss',
        'starttime_pattern' => '\d{4}-\d{1,2}-\d{1,2}',
        'starttime_notice' => 'YYYY-mm-dd',
        'trailer_pattern' => '[^<>]{10,100}$',
        'trailer_notice' => 'must contain 10->100 character,no special characters <>',
        'edit_success' => 'Edit Film Successful !',
        'edit_fail' => 'Edit Failed ! Try again.',
        'no_film' => 'The Film not found !',
        'create_success' => 'Created Film Successful',
        'create_error' => 'Create Fail ! Check again.',
        'title_create_film' => 'Create Film',
        'delete_success' => 'Delete Successful !',
        'delete_fail' => 'Delete Failed ! Try again.',
        'film_in_use' => 'Film in use ! Please check Booking, Schedule table and try again.'
    ],
    'schedule' => [
        'linked_schedule' => 'http://hdcinema.app/admin/schedule/',
        'confirm' => 'Do you want delete this Schedule ?',
        'title_delete' => 'Delete Schedule',
        'title_manage_schedule' => 'Manage Schedule',
        'schedule' => 'Schedules',
        'create_schedule' => 'Create Schedule',
        'check_room' => 'Check Room',
        'day_default' => '1',
        'cinema_default' => '1',
        'day' => 'Day: ',
        'cinema' => 'Cinema: ',
        'film' => 'Film',
        'room' => 'Room',
        'room_empty' => 'Phòng trống'

    ]
];
