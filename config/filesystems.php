<?php

return [

    /*
     * Расширение файла конфигурации app/config/filesystems.php
     * добавляет локальные диски для хранения лого сайтов
     */

    'dummies' => [
        'driver' => 'local',
        'root' => storage_path('app/public/dummies/'),
        'url' => env('APP_URL').'/storage/dummies/',
        'visibility' => 'public',
    ],

];
