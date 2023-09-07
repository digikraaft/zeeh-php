# Convenient PHP wrapper to the Zeeh API
![run-tests](https://github.com/digikraaft/zeeh-php/workflows/run-tests/badge.svg)
[![Build Status](https://travis-ci.com/digikraaft/zeeh-php.svg?token=6YhB5FxJsF7ENdMM7Mzz&branch=master)](https://travis-ci.com/digikraaft/zeeh-php)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/digikraaft/zeeh-php/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/digikraaft/zeeh-php/?branch=master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/digikraaft/zeeh-php/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)
[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](https://opensource.org/licenses/MIT)

This package provides an expressive and convenient way to interact with the [Zeeh API](https://www.zeeh.africa/).

## Installation

You can install the package via composer:

```bash
composer require digikraaft/zeeh-php
```

## Usage
All APIs documented in Zeeh's [API Reference](https://zeehdocs.zeeh.africa/) are currently supported by this package.

### Authentication
Before using any of the available methods, ensure to set the public and private keys of your app. You can get this from the [Zeeh's dashboard](https://dash.zeeh.africa/).

```
<?php 

include_once('vendor/autoload.php');


use Digikraaft\Zeeh\Zeeh;


Zeeh::setPrivateKey('privk_1234abcd');
Zeeh::setPublicKey('pubk_1234abcd');

```

### Available Methods
A list of the available methods are documented below:
#### Account
* `all() : Array|Object` - Gets all accounts available for a particular institution
* `authorize(string $accountId) : Array|Object` - Authorize a Customer for transactions
* `details(string $accountId) : Array|Object` - Gets a particular account in a financial institution
* `identity(string $accountId) : Array|Object` - Obtains customer details
* `sync(string $accountId) : Array|Object` - Make a request for a data sync operation

#### Bvn
* `advancedLookUp(string $bvn) : Array|Object` - Generates user data from BVN
* `simpleLookUp(string $bvn) : Array|Object` - Generates user data from BVN

#### Cac
* `advancedLookUp(string $rcNumber) : Array|Object` - Fetch and verify SMEs, corporate organizations and individuals using Corporate Affairs Commission (CAC)
* `simpleLookUp(string $rcNumber) : Array|Object` - Fetch and verify SMEs, corporate organizations and individuals using Corporate Affairs Commission (CAC)

#### DriverLicense
* `lookUp(string $licenseNumber) : Array|Object` - Lookup and verify Driving License

#### Nin
* `lookUp(string $nin) : Array|Object` - Fetch and verify customers details using National Identification Number NIN
* `verifySelfie(string, $nin, string $base64ImageString) : Array|Object` - Perform selfie verification using NIN

#### Nuban
* `lookUp(string $bankAccountNumber) : Array|Object` - Generate user data from the Nuban

#### Passport
* `lookUp(string $passportNumber, string $lastName, string $firstName, string $dateOfBirth) : Array|Object` - Verify an international passport

#### PhoneNumber
* `advancedLookUp(string $phoneNumber) : Array|Object` - Get advanced details of a phone number
* `simpleLookUp(string $phoneNumber) : Array|Object` - Get details of a phone number

#### Tin
* `lookUp(string $taxIdentificationNumber) : Array|Object` - Verify Tax Identification Number

#### Transaction
* `list(string $accountId) : Array|Object` - Fetch transactions connected to an account
* `fetchStatement(string $accountId, int $period) : Array|Object` - Fetch transactions connected to an account filtered by period

#### Vin
* `lookUp(string $vin, string $state, string $lastName) : Array|Object` - Verify Voter's Identification Number

#### Zeeh
* `getPrivateKey(): string`
* `getPublicKey() : string`
* `setPrivateKey(string $privateKey)` - Set your Zeeh Private Key
* `setPublicKey(string $publicKey)` - Set your Zeeh Public Key
* `walletBalance() : Array|Object` - Fetch current balance in your Zeeh wallet

This package returns the exact response from the Zeeh's API but as the `stdClass` type.

## Testing

``` bash
composer test
```

## More Good Stuff
Check [here](https://github.com/digikraaft) for more awesome free stuff!

## Changelog
Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing
Contributions are welcome! Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security
If you discover any security related issues, please email hello@digikraaft.ng instead of using the issue tracker.

## Credits

- [Tim Oladoyinbo](https://github.com/timoladoyinbo)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
