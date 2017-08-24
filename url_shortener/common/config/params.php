<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,
    // url Shortener
    'urlShortener' => [
        'max_length' => 5,
        'expireDate' => 15,
        'allowed_chars' => '0123456789abcdefghijklmnopqrstuvwxyz',
    ]
];
