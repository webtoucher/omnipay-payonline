<?php

namespace Omnipay\PayOnline;

use Guzzle\Http\Client as HttpClient;
use Omnipay\Common\AbstractGateway;

/**
 * PayOnline gateway class.
 * https://payonline.ru/rel/doc/merchant/payonline_gateway_api_reference_vers._1.0.3_eng.pdf
 */
class Gateway extends AbstractGateway
{
    public function getName()
    {
        return 'PayOnline';
    }

    public function getDefaultParameters()
    {
        return array(
            'language' => 'en',
        );
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
        return $this->getParameter('base_endpoint');
    }

    public function setBaseEndpoint($value)
    {
        return $this->setParameter('base_endpoint', $value);
    }

    public function getLanguage()
    {
        return $this->getParameter('language');
    }

    public function setLanguage($value)
    {
        return $this->setParameter('language', $value);
    }

    /**
     * @param array $parameters
     * @return \Omnipay\PayOnline\Message\PurchaseRequest
     */
    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\PayOnline\Message\PurchaseRequest', $parameters);
    }

    /**
     * @param array $parameters
     * @return \Omnipay\PayOnline\Message\CompletePurchaseRequest
     */
    public function completePurchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\PayOnline\Message\CompletePurchaseRequest', $parameters);
    }

    /**
     * @param array $parameters
     * @return \Omnipay\PayOnline\Message\RebillRequest
     */
    public function rebill(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\PayOnline\Message\RebillRequest', $parameters);
    }

    /**
     * @inheritdoc
     */
    protected function getDefaultHttpClient()
    {
        return new HttpClient('', [
            'curl.options' => [
                CURLOPT_CONNECTTIMEOUT => 60,
                CURLOPT_TIMEOUT => 15,
                CURLINFO_HEADER_OUT => 1,
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_FOLLOWLOCATION => 0,
            ],
        ]);
    }
}
