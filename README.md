# Multi-Factor

Designed to be a vendor-agnostic implementation of various Two-Factor 
Authentication solutions.

Fork of [paragonie/multi_factor](https://github.com/paragonie/multi_factor).
Initially developed by [Paragon Initiative Enterprises](https://paragonie.com)
for use in their own projects. Forked to support PHP 8+ since the original project
wasn't being maintained.

Released under a dual license: GPL and MIT. As with all dual-licensed projects,
feel free to choose the license that fits your needs.

## Requirements

* PHP 8.1+

## Installing

```sh
composer require theodorejb/multi-factor
```

## Example Usage

### Display QR code

```php
<?php
use ParagonIE\MultiFactor\Vendor\GoogleAuth;

$seed = random_bytes(20);
$auth = new GoogleAuth($seed);
$auth->makeQRCode(null, 'php://output', 'email@example.com', 'Issuer', 'Label');
```

### Validate two-factor code

```php
<?php
use ParagonIE\MultiFactor\OneTime;
use ParagonIE\MultiFactor\OTP\TOTP;

// You can use TOTP or HOTP
$otp = new OneTime($seed, new TOTP());

if (\password_verify($_POST['password'], $storedHash)) {
    if ($otp->validateCode($_POST['2facode'], time())) {
        // Login successful    
    }
}
```
