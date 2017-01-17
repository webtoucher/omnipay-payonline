<?php

namespace Omnipay\PayOnline\Exception;

use Exception;
use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\PayOnline\Exception\en\SystemError;

/**
 * PayOnline protocol Exception.
 * Thrown when an error is caught from the PayOnline side.
 */
class ProtocolException extends InvalidRequestException
{
    public function __construct($code, Exception $previous = null)
    {
        parent::__construct('', $code, $previous);
        $this->message = SystemError::findMessage($code);
    }

    /**
     * @param string $language
     * @return bool|string
     */
    public function getSystemMessage($language)
    {
        /** @var LocalizedError $class */
        $class = "\\Omnipay\\PayOnline\\Exception\\$language\\SystemError";
        return $class::findMessage($this->getCode());
    }

    /**
     * @param string $language
     * @return bool|string
     */
    public function getHumanMessage($language)
    {
        /** @var LocalizedError $class */
        $class = "\\Omnipay\\PayOnline\\Exception\\$language\\HumanError";
        return $class::findMessage($this->getCode());
    }
}
