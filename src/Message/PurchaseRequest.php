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
        $this->response = new PurchaseResponse($this, $data);
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
        return "$this->liveEndpoint/{$this->getLanguage()}/payment/";
    }
}
