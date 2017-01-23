<?php

namespace Omnipay\PayOnline\Exception\en;

use Omnipay\PayOnline\Exception\LocalizedError;

/**
 * PayOnline protocol errors english localization.
 */
class HumanError extends LocalizedError
{
    protected static $_errors = [
        '1000' => 'Technical error. This transaction cannot be treated. Thank you for trying again in a moment or please contact our technical support service.',
        '2000' => 'The transaction has been rejected by the security system.',
        '2300' => 'The transaction has been rejected by the banking security system.',
        '3000' => 'Technical error on the bank side. This transaction cannot be treated. Thank you for trying again in a moment or please contact our technical support service.',
        '4000' => 'Incorrect data specified.',
        '4001' => 'Technical error. This transaction cannot be treated. Thank you for trying again in a moment or please contact our technical support service.',
        '4002' => 'Technical error. This transaction cannot be treated. Thank you for trying again in a moment or please contact our technical support service.',
        '4003' => 'Technical error. This transaction cannot be treated. Thank you for trying again in a moment or please contact our technical support service.',
        '4022' => 'Technical error. This transaction cannot be treated. Thank you for trying again in a moment or please contact our technical support service.',
        '4023' => 'Technical error. This transaction cannot be treated. Thank you for trying again in a moment or please contact our technical support service.',
        '4400' => 'Technical error. This transaction cannot be treated. Thank you for trying again in a moment or please contact our technical support service.',
        '4401' => 'Technical error. This transaction cannot be treated. Thank you for trying again in a moment or please contact our technical support service.',
        '5000' => 'Technical error. This transaction cannot be treated. Thank you for trying again in a moment or please contact our technical support service.',
        '5205' => 'Insufficient funds.',
        '5301' => 'Transaction is rejected by the issuer of bank card.',
        '5302' => 'Transaction is rejected by the issuer of bank card.',
        '5303' => 'Transaction is rejected by the issuer of bank card.',
        '5304' => 'Transaction is rejected by the issuer of bank card.',
        '5305' => 'Transaction is rejected by the issuer of bank card.',
        '5306' => 'Transaction is rejected by the issuer of bank card.',
        '5307' => 'The limit of the card is exceeded.',
        '5308' => 'Transaction is rejected by the issuer of bank card.',
        '5309' => 'The limit of the card is exceeded for this operation.',
        '5310' => 'The limit of the card is exceeded for this operation.',
        '5320' => 'Transaction is rejected by the issuer of bank card.',
        '5333' => 'Transaction is rejected by the issuer of bank card.',
        '5334' => 'Transaction is rejected by the issuer of bank card.',
        '5396' => 'Transaction is rejected by the issuer of bank card.',
        '5401' => 'Transaction is rejected by the issuer of bank card.',
        '5410' => 'Transaction is rejected by the issuer of bank card.',
        '5411' => 'Transaction is rejected by the issuer of bank card.',
        '5412' => 'Transaction is rejected by the issuer of bank card.',
        '5501' => 'Transaction is rejected by the issuer of bank card.',
        '5502' => 'Transaction is rejected by the issuer of bank card.',
        '6000' => 'Transaction is rejected by the issuer of bank card.',
        '6001' => 'Transaction rejected by the issuer of the credit card - authentification of 3D Secure.',
        '6002' => 'Transaction rejected by the issuer of the credit card - authentification of 3D Secure.',
        '6003' => 'Transaction rejected by the issuer of the credit card - authentification of 3D Secure.',
        '6004' => 'Transaction rejected by the issuer of the credit card - authentification of 3D Secure.',
        '6100' => 'Transaction rejected by the issuer of the credit card - authentification of 3D Secure.',
        '6101' => 'Transaction rejected by the issuer of the credit card - authentification of 3D Secure.',
        '6110' => 'Transaction rejected by the issuer of the credit card - authentification of 3D Secure.',
    ];
}
