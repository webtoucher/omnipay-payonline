# Omnipay: PayOnline
PayOnline payment processing driver for the Omnipay PHP payment processing library.

[![Latest Stable Version](https://poser.pugx.org/webtoucher/omnipay-payonline/v/stable)](https://packagist.org/packages/webtoucher/omnipay-payonline)
[![Total Downloads](https://poser.pugx.org/webtoucher/omnipay-payonline/downloads)](https://packagist.org/packages/webtoucher/omnipay-payonline)
[![Daily Downloads](https://poser.pugx.org/webtoucher/omnipay-payonline/d/daily)](https://packagist.org/packages/webtoucher/omnipay-payonline)
[![Latest Unstable Version](https://poser.pugx.org/webtoucher/omnipay-payonline/v/unstable)](https://packagist.org/packages/webtoucher/omnipay-payonline)
[![License](https://poser.pugx.org/webtoucher/omnipay-payonline/license)](https://packagist.org/packages/webtoucher/omnipay-payonline)

## Installation

The preferred way to install this library is through [composer](http://getcomposer.org/download/).

Either run

```
$ php composer.phar require webtoucher/omnipay-payonline "*"
```

or add

```
"webtoucher/omnipay-payonline": "*"
```

to the ```require``` section of your `composer.json` file.

## Usage

The following gateways are provided by this package:

* PayOnline

```php
    $gateway = \Omnipay\Omnipay::create('PayOnline');
    $gateway->setMerchantId('[MERCHANT_ID]');
    $gateway->setApiKey('[API_PRIVATE_KEY]');
    $gateway->setLanguage('ru'); // default - en
```

Then you should create payment url (for redirecting or using iframe).

```php
    try {
        $request = $this->gateway->purchase([
            'order_id' => 123,
            'amount' => 10,
            'currency' => 'EUR',
            'description' => 'Test payment',
            'user' => 1234,
            'email' => 'test@test.com',
            'return_url' => 'https://your.domain.com/success/',
            'cancel_url' => 'https://your.domain.com/fail/',,
        ]);

        $response = $request->send();

        if ($response->isSuccessful()) {
            $url = $response->getUrl();
            // Use this url as iframe source or for redirect
        }
    } catch (\Omnipay\Common\Exception\OmnipayException $e) {
        throw new ApplicationException($e->getMessage());
    }
```

Catch PayOnline callback:

```php
    try {
        $request = $this->gateway->completePurchase([
            'result' => $result,
            'datetime' => $DateTime,
            'transaction_id' => $TransactionID,
            'order_id' => $OrderId,
            'amount' => $Amount,
            'currency' => $Currency,
            'token' => $RebillAnchor,
            'card' => new \Omnipay\Common\CreditCard(['number' => $CardNumber]),
            'user' => $User,
            'error_code' => isset($Code) ? $Code : $ErrorCode,
        ]);

        $response = $request->send();

        $success = $response->isSuccessful();
    } catch (\Omnipay\Common\Exception\OmnipayException $e) {
        $success = false;
        // throw new ApplicationException($e->getMessage());
    }
```

For general usage instructions, please see the main [Omnipay](https://github.com/thephpleague/omnipay)
repository.

## Support

If you are having general issues with Omnipay, we suggest posting on
[Stack Overflow](http://stackoverflow.com/). Be sure to add the
[omnipay tag](http://stackoverflow.com/questions/tagged/omnipay) so it can be easily found.

If you want to keep up to date with release anouncements, discuss ideas for the project,
or ask more detailed questions, there is also a [mailing list](https://groups.google.com/forum/#!forum/omnipay) which
you can subscribe to.

If you believe you have found a bug, please report it using the [GitHub issue tracker](https://github.com/webtoucher/omnipay-payonline/issues).