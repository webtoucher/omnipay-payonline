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
        '1000' => 'Internal server error.',
        '1001' => 'Internal server database error.',
        '1100' => 'General filter error.',
        '1101' => 'Filter load error.',
        '1200' => 'Gateway not set.',
        '1201' => 'Gateway load error.',
        '1202' => 'Gateway communication error.',
        '1203' => 'Gateway certificate load error.',
        '1204' => 'Gateway settings error.',
        '2000' => 'Operation was locked by security system.',
        '2300' => 'External Fraud Advice.',
        '3000' => 'Technical failure on the bank side..',
        '4000' => 'Invalid input data.',
        '4001' => 'Merchant account is not active.',
        '4002' => 'Call back url not set.',
        '4003' => 'Security key not set.',
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
        '4018' => 'Incorrect ip address.',
        '4019' => 'Incorrect phone.',
        '4020' => 'Incorrect client id.',
        '4021' => 'Incorrect RebillAnchor.',
        '4022' => 'Rebill not allowed.',
        '4023' => 'Security mode not supported.',
        '4024' => 'Incorrect security key.',
        '4025' => 'Incorrect order ID.',
        '4026' => 'Incorrect currency.',
        '4027' => 'Incorrect merchant.',
        '4028' => 'Incorrect valid until.',
        '4029' => 'Incorrect transaction ID.',
        '4030' => 'Incorrect IData.',
        '4031' => 'Incorrect account id.',
        '4032' => 'Incorrect phone number.',
        '4033' => 'Incorrect phone number format.',
        '4034' => 'Incorrect order description.',
        '4300' => 'Incorrect params.',
        '4400' => 'Operation not permitted.',
        '4401' => 'Incorrect transaction state.',
        '5001' => 'Unsupported version.',
        '5002' => 'Unsupported language.',
        '5003' => 'Unsupported command.',
        '5004' => 'Authentication error.',
        '5005' => 'Message parse error.',
        '5006' => 'Gateway system error.',
        '5007' => 'Cryptography error.',
        '5008' => 'Gateway timeout.',
        '5009' => 'Incorrect params count.',
        '5010' => 'Zero amount.',
        '5201' => 'Account not found.',
        '5202' => 'Incorrect transaction.',
        '5203' => 'Incorrect amount.',
        '5204' => 'Unable to process.',
        '5205' => 'Insufficient funds.',
        '5206' => 'Incorrect payment information.',
        '5207' => 'Incorrect TerminalId.',
        '5208' => 'Original transaction not found.',
        '5209' => 'Unable to process void or refund.',
        '5210' => 'Issuer unavailable.',
        '5211' => 'Duplicate transaction.',
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
        '5412' => 'PIN Verification Error.',
        '5501' => 'Card expired - must eliminate.',
        '5502' => 'Declined by issuer - must eliminate.',
        '5809' => 'Gateway server error.',
        '5888' => 'Invalid session id.',
        '5889' => 'Invalid merchant.',
        '5890' => 'Max Void attempts exceeded.',
        '6000' => 'Additional authentication is required.',
        '6001' => '3D-Secure required.',
        '6002' => '3D-Secure authentication error.',
        '6003' => '3D-Secure failed.',
        '6004' => '3D-Secure unavailable.',
        '6100' => 'Authentication required.',
        '6101' => 'Authentication in progress.',
        '6110' => 'Authentication failed.',
        '6201' => 'Account not found.',
        '6202' => 'Incorrect transaction.',
        '6203' => 'Incorrect amount.',
        '6204' => 'Unable to process.',
        '6205' => 'Insufficient funds.',
        '6206' => 'Incorrect payment information.',
        '6207' => 'Incorrect TerminalId.',
        '6208' => 'Original transaction not found.',
        '6209' => 'Unable to process void or refund.',
        '6210' => 'Issuer unavailable.',
        '6211' => 'Duplicate transaction.',
        '6301' => 'Card expired or incorrect date.',
        '6302' => 'Declined by issuer.',
        '6303' => 'Unsupported transaction.',
        '6304' => 'Financial institution prohibited.',
        '6305' => 'Lost or stolen card.',
        '6306' => 'Incorrect card status.',
        '6307' => 'Limited card.',
        '6308' => 'Unable to authorize.',
        '6309' => 'Card activity limit exceeded.',
        '6310' => 'Card amount limit exceeded.',
        '6320' => 'Unsupported card.',
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
