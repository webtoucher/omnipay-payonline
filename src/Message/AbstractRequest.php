<?php

namespace Omnipay\PayOnline\Message;

use Guzzle\Http\Message\Response;
use Omnipay\Common\Message\ResponseInterface;

/**
 * PayOnline Abstract Request.
 */
abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    const API_VERSION = '1.0.3';

    protected $liveEndpoint = 'https://secure.payonlinesystem.com';

    /**
     * @var Response
     */
    private $httpResponse;

    public function getCurrencyDecimalPlaces()
    {
        return 2;
    }

    public function getMerchantId()
    {
        return $this->getParameter('merchant_id');
    }

    public function setMerchantId($value)
    {
        return $this->setParameter('merchant_id', $value);
    }

    public function getSecretKey()
    {
        return $this->getParameter('secret_key');
    }

    public function setSecretKey($value)
    {
        return $this->setParameter('secret_key', $value);
    }

    public function getBaseEndpoint()
    {
        return $this->getParameter('base_endpoint') ?: $this->liveEndpoint;
    }

    public function setBaseEndpoint($value)
    {
        return $this->setParameter('base_endpoint', $value);
    }

    public function getLanguage()
    {
        return strtolower($this->getParameter('language'));
    }

    public function setLanguage($value)
    {
        return $this->setParameter('language', $value);
    }

    public function getOrderId()
    {
        return $this->getParameter('order_id');
    }

    public function setOrderId($value)
    {
        return $this->setParameter('order_id', $value);
    }

    public function getUser()
    {
        return $this->getParameter('user');
    }

    public function setUser($value)
    {
        return $this->setParameter('user', $value);
    }

    public function getEmail()
    {
        return $this->getParameter('email');
    }

    public function setEmail($value)
    {
        return $this->setParameter('email', $value);
    }

    public function getDatetime()
    {
        return $this->getParameter('datetime');
    }

    public function setDatetime($value)
    {
        return $this->setParameter('datetime', $value);
    }

    public function getCardNumber()
    {
        return $this->getParameter('card_number');
    }

    public function setCardNumber($value)
    {
        return $this->setParameter('card_number', $value);
    }

    public function getPublicKey()
    {
        return $this->getParameter('public_key');
    }

    public function setPublicKey($value)
    {
        return $this->setParameter('public_key', $value);
    }

    public function getErrorCode()
    {
        return $this->getParameter('error_code');
    }

    public function setErrorCode($value)
    {
        return $this->setParameter('error_code', $value);
    }

    public function getResult()
    {
        return $this->getParameter('result');
    }

    public function setResult($value)
    {
        return $this->setParameter('result', $value);
    }

    /**
     * @param array $params
     * @return string
     */
    public function generateSignature($params = null)
    {
        if (null === $params) {
            $params = $this->getSignatureParams();
        }
        $params['PrivateSecurityKey'] = $this->getSecretKey();
        $parts = [];
        foreach (array_filter($params) as $var => $value) {
            $parts[] = "$var=$value";
        }
        return md5(implode('&', $parts));
    }

    /**
     * @inheritdoc
     */
    public function sendData($data)
    {
        $httpRequest = $this->httpClient->get($this->getEndpoint() . '?' . http_build_query($data, '', '&'));
        $this->httpResponse = $httpRequest->send();
        parse_str($this->httpResponse->getBody(), $result);

        return $this->createResponse($result);
    }

    public function getHttpResponse()
    {
        return $this->httpResponse;
    }

    /**
     * @return array
     */
    abstract protected function getSignatureParams();

    /**
     * @return string
     */
    abstract public function getEndpoint();

    /**
     * @param mixed $data
     * @return ResponseInterface
     */
    abstract protected function createResponse($data);
}
