<?php

namespace Omnipay\PayOnline\Exception;

/**
 * PayOnline protocol errors english localization.
 */
abstract class LocalizedError
{
    const UNKNOWN_ERROR = 'Unknown PayOnline error.';

    protected static $_errors = [
    ];

    /**
     * @param string $code
     * @return string
     */
    final public static function findMessage($code)
    {
        $code = self::getExistingCode((string) $code);
        return !$code ? static::UNKNOWN_ERROR : static::$_errors[$code];
    }

    /**
     * @param string $code
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

    /**
     * @param string $code
     * @return boolean
     */
    private static function errorExists($code)
    {
        return array_key_exists($code, static::$_errors);
    }
}
