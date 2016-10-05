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

## Configure your PayOnline MID

Ask PayOnline support for switching off ok/fail page if you need it. So you will be redirected to your return/fail URL immediately.
Then check your MID settings:
- CallbackUrl method: POST
- Callback Url for approved transactions: https://your.domain.com/your-callback/?result=1
- Callback Url for declined transactions: https://your.domain.com/your-callback/?result=0
- Enable Callback on approved transactions: ON
- Enable Callback on declined transactions: ON

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
            'return_url' => 'https://your.domain.com/your-callback/?result=1',
            'cancel_url' => 'https://your.domain.com/your-callback/?result=0',,
        ]);

        $response = $request->send();

        if ($response->isSuccessful()) {
            $url = $response->getUrl();
            // Use this url as iframe source or for redirect
        }
    } catch (\Omnipay\Common\Exception\OmnipayException $e) {
        // Your handler
    }
```

Create controller's action for catching PayOnline callbacks. Remember that you must use the same action for successful/unsuccessful callbacks (POST-requests) and as return/fail URL (GET-requests). Check type of request to know what should you do.

```php
    if (/* is post request */) {
        try {
            $request = $this->gateway->completePurchase([
                'result' => $result,
                'datetime' => $DateTime,
                'transaction_id' => $TransactionID,
                'order_id' => $OrderId,
                'amount' => $Amount,
                'currency' => $Currency,
                'token' => $RebillAnchor,
                'card_number' => $CardNumber,
                'user' => $User,
                'error_code' => isset($Code) ? $Code : $ErrorCode,
            ]);

            $response = $request->send();

            $success = $response->isSuccessful();
        } catch (\Omnipay\Common\Exception\OmnipayException $e) {
            $success = false;
            // Your handler
        }
        // Your logic
    } else {
        // Your logic for return/fail URL
    }
```

Remember that PayOnline send rebill tokens for ssl-connection only. You can extract masked card number and token and save these into your system.

```php
    $cardNumber = $request->getCardNumber();
    $token = $request->getToken();
    // Your logic
```

Use rebill request for recurring payments.

```php
    try {
        $request = $this->gateway->rebill([
            'token' => $token,
            'order_id' => 124,
            'amount' => 10,
            'currency' => 'EUR',
        ]);

        $response = $request->send();

        $success = $response->isSuccessful();
    } catch (\Omnipay\Common\Exception\OmnipayException $e) {
        $success = false;
        // Your handler
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