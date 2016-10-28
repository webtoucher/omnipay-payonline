<?php

namespace Omnipay\PayOnline\Message;

/**
 * PayOnline purchase request.
 */
class PurchaseRequest extends AbstractRequest
{
    /**
     * @inheritdoc
     */
    public function sendData($data)
    {
        return $this->createResponse($data);
    }

    /**
     * @inheritdoc
     */
    protected function createResponse($data)
    {
        return $this->response = new PurchaseResponse($this, $data);
    }

    /**
     * @inheritdoc
     */
    public function getData()
    {
        return [
            'MerchantId' => $this->getMerchantId(),
            'OrderId' => $this->getOrderId(),
            'Amount' => $this->getAmount(),
            'Currency' => $this->getCurrency(),
            'OrderDescription' => $this->getDescription(),
            'User' => $this->getUser(),
            'Email' => $this->getEmail(),
            'ReturnUrl' => $this->getReturnUrl(),
            'FailUrl' => $this->getCancelUrl(),
            'SecurityKey' => $this->generateSignature(),
        ];
    }

    /**
     * Build URL for redirect or iframe source.
     *
     * @return string
     */
    public function getUrl()
    {
        $httpRequest = $this->httpClient->get($this->getEndpoint() . '?' . http_build_query($this->getData(), '', '&'));
        return $httpRequest->getUrl();
    }

    /**
     * @inheritdoc
     */
    protected function getSignatureParams()
    {
        return [
            'MerchantId' => $this->getMerchantId(),
            'OrderId' => $this->getOrderId(),
            'Amount' => $this->getAmount(),
            'Currency' => $this->getCurrency(),
            'OrderDescription' => $this->getDescription(),
        ];
    }

    public function getEndpoint()
    {
        return "{$this->getBaseEndpoint()}/{$this->getLanguage()}/payment/";
    }
}
