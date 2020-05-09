<?php
return [
    'default' => [
        'app_key' => env('JPUSH_APP_KEY', ''),
        'master_secret' => env('JPUSH_MASTER_SECRET', ''),
        'apns_production' => env('JPUSH_APNS_PRODUCTION', false),
        'log_file' => env('JPUSH_LOG_FILE')
    ],
    'patient' => [
        'app_key' => env('JPUSH_PATIENT_APP_KEY'),
        'secret_key' => env('JPUSH_PATIENT_SECRET_KEY'),
        'apns_production' => env('JPUSH_PATIENT_APNS_PRODUCTION', false),
        'log_file' => env('JPUSH_PATIENT_LOG_FILE')
    ],
    'doctor' => [
        'app_key' => env('JPUSH_DOCTOR_APP_KEY'),
        'secret_key' => env('JPUSH_DOCTOR_SECRET_KEY'),
        'apns_production' => env('JPUSH_DOCTOR_APNS_PRODUCTION', false),
        'log_file' => env('JPUSH_DOCTOR_LOG_FILE')
    ]
];