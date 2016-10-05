<?php

namespace Omnipay\PayOnline\Exception;

use Exception;
use Omnipay\Common\Exception\InvalidRequestException;

/**
 * PayOnline protocol Exception.
 * Thrown when an error is caught from the PayOnline side.
 */
class ProtocolException extends InvalidRequestException
{
    private static $_errors = [
        '1000' => 'Technical failure in the system.',
        '2000' => 'Operation was locked by security system.',
        '3000' => 'Technical failure on the bank side.',
        '4004' => 'Incorrect card number.',
        '4005' => 'Incorrect card holder name.',
        '4006' => 'Incorrect card verification code.',
        '4007' => 'Incorrect card expiration date.',
        '4008' => 'Incorrect country.',
        '4009' => 'Incorrect city.',
        '4010' => 'Incorrect state.',
        '4011' => 'Incorrect zip code.',
        '4012' => 'Incorrect address.',
        '4013' => 'Incorrect bank issuer name.',
        '4014' => 'Card expired.',
        '4015' => 'Incorrect card type.',
        '4016' => 'Order already paid.',
        '4017' => 'Incorrect e-mail.',
        '4018' => 'Incorrect ip-address.',
        '4019' => 'Incorrect phone.',
        '4021' => 'Incorrect RebillAnchor.',
        '4022' => 'Rebill not allowed.',
        '4024' => 'Incorrect security key.',
        '4025' => 'Incorrect order ID.',
        '4026' => 'Incorrect currency.',
        '4027' => 'Incorrect merchant.',
        '4028' => 'Incorrect valid until.',
        '4029' => 'Incorrect transaction ID.',
        '4030' => 'Incorrect IData.',
        '4032' => 'Incorrect phone number.',
        '4033' => 'Incorrect phone number format.',
        '4300' => 'Incorrect params.',
        '5201' => 'Account not found.',
        '5204' => 'Unable to process.',
        '5205' => 'Insufficient funds.',
        '5301' => 'Card expired or incorrect date.',
        '5302' => 'Declined by issuer.',
        '5303' => 'Unsupported transaction.',
        '5304' => 'Financial institution prohibited.',
        '5305' => 'Lost or stolen card.',
        '5306' => 'Incorrect card status.',
        '5307' => 'Limited card.',
        '5308' => 'Unable to authorize.',
        '5309' => 'Card activity limit exceeded.',
        '5310' => 'Card amount limit exceeded.',
        '5320' => 'Unsupported card.',
        '5333' => 'Format error.',
        '5334' => 'Processing timeout.',
        '5396' => 'Processing server error.',
        '5401' => 'Call issuer.',
        '5410' => 'Incorrect 3D-Secure data.',
        '5411' => 'Incorrect CVV2/CVC2.',
        '5501' => 'Card expired—must eliminate.',
        '5502' => 'Declined by issuer—must eliminate.',
        '5809' => 'Gateway server error.',
        '6000' => 'Additional authentication is required.',
    ];

    public function __construct($code, Exception $previous = null)
    {
        parent::__construct('', $code, $previous);
        $this->message = self::findMessage($this->getDetectedCode());
    }

    /**
     * @return string|boolean
     */
    public function getDetectedCode()
    {
        $code = (string) $this->getCode();
        if (!self::errorExists($code)) {
            $code = $code[0] . '000';
            if (!self::errorExists($code)) {
                return false;
            }
        }
        return $code;
    }

    /**
     * @param string $code
     * @return string
     * @throws \CException
     */
    private static function findMessage($code)
    {
        return !$code ? 'Unknown PayOnline error.' : self::$_errors[$code];
    }

    private static function errorExists($code)
    {
        return array_key_exists($code, self::$_errors);
    }
}
