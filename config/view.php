<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View File Storage
    |--------------------------------------------------------------------------
    |
    | This option determines where the view files are stored. By default, we
    | will store them in the "resources/views" directory, which is located
    | inside your application. You can change this if needed.
    |
    */

    'paths' => [
        resource_path('views'),  // ตั้งค่าตำแหน่งของ views
    ],

    /*
    |--------------------------------------------------------------------------
    | View Cache Path
    |--------------------------------------------------------------------------
    |
    | This option determines where all of the compiled Blade views are stored
    | for your application. Typically, this is inside the "storage" folder
    | in your application. You may change this path if needed.
    |
    */

    'compiled' => realpath(storage_path('framework/views')),
];
