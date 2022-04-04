<?php


use IvanoMatteo\LaravelDeviceTracking\DeviceHijackingDetectorDefault;

return [
    // if user_model is null, will be probed: App\Model\User and then App\User
    'user_model' => 'App\User',

    'detect_on_login' => true,

    // the device identifier cookie
    'device_cookie' => 'kpacit-u-rf',

    'session_key' => 'kpacit-device-tracking',

    // must implement: IvanoMatteo\LaravelDeviceTracking\DeviceHijackingDetector
    'hijacking_detector' => DeviceHijackingDetectorDefault::class,
];
