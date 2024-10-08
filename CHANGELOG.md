# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).


## [2.0.0] - 2024-09-22
### Changed
- Updated [BaconQrCode] dependency to v3.
- PHP 8.1+ is now required.

### Removed
- [HiddenString](https://github.com/paragonie/hidden-string) dependency.


## [1.0.1] - 2021-06-11
### Added
- Native property type declarations.

### Changed
- PHP 7.4+ is now required.
- Unified internal code for HOTP value generation.
- Resolved all level one static analysis errors.
- `GoogleAuth::getQRCode()` method now uses an explicit nullable type for optional `Writer` parameter.

### Removed
- Unused internal `rawOutput` option.


## [1.0.0] - 2021-01-14
### Added
- Support for PHP 8.
- `GoogleAuth::getQRCode()` and `GoogleAuth::makeQRCodeMessage()` methods.
- HiddenString support for secret key.
- `GoogleAuth->defaultQRCodeSize` property (replaces the removed width and height properties).

### Changed
- PHP 7.2+ is now required.
- Renamed `FIDOU2F` class to `OneTime`.
- Updated [BaconQrCode] dependency to v2.
  This version has a slightly different API for rendering QR code images.
- Test files are now excluded from Composer package.

### Removed
- `GoogleAuth->defaultQRCodeWidth` and `GoogleAuth->defaultQRCodeHeight` properties.


## [0.2.2] - 2016-06-17
### Changed
- Appended HTTP query string in QR code.


## [0.2.1] - 2016-06-17
### Changed
- `TOTP` and `HOTP` classes now implement `OTPInterface`.


## [0.2.0] - 2016-06-16
### Added
- Support for HOTP and Google Authenticator.
- Range check to ensure that code length is between 1 and 10.

### Changed
- Replaced giant switch statement with `**` operator.
- Improved readme.


## [0.1.0] - 2016-06-13
- Initial pre-release


[2.0.0]: https://github.com/theodorejb/multi-factor/compare/v1.0.1...v2.0.0
[1.0.1]: https://github.com/theodorejb/multi-factor/compare/v1.0.0...v1.0.1
[1.0.0]: https://github.com/theodorejb/multi-factor/compare/v0.2.2...v1.0.0
[0.2.2]: https://github.com/theodorejb/multi-factor/compare/v0.2.1...v0.2.2
[0.2.1]: https://github.com/theodorejb/multi-factor/compare/v0.2.0...v0.2.1
[0.2.0]: https://github.com/theodorejb/multi-factor/compare/v0.1.0...v0.2.0
[0.1.0]: https://github.com/theodorejb/multi-factor/tree/v0.1.0
[BaconQrCode]: https://github.com/Bacon/BaconQrCode
