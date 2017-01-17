<?php

namespace Omnipay\PayOnline\Exception;

/**
 * PayOnline protocol errors english localization.
 */
abstract class LocalizedError
{
    const UNKNOWN_ERROR = 'Unknown PayOnline error.';

    protected static $errors = [
    ];

    /**
     * @param string $code
     * @return string
     */
    final public static function findMessage($code)
    {
        $code = self::getExistingCode($code);
        return !$code ? static::UNKNOWN_ERROR : self::$errors[$code];
    }

    /**
     * @param $code
     * @return string
     */
    private static function getExistingCode($code)
    {
        if (!self::errorExists($code)) {
            $code = $code[0] . '000';
            if (!self::errorExists($code)) {
                return '';
            }
        }
        return $code;
    }

    private static function errorExists($code)
    {
        return array_key_exists($code, self::$errors);
    }
}
