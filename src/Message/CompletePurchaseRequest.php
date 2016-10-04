<?php

namespace Omnipay\PayOnline\Message;

use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\PayOnline\Exception\ProtocolException;

/**
 * PayOnline complete purchase request
 */
class CompletePurchaseRequest extends AbstractRequest
{
    /**
     * @inheritdoc
     * @throws \Omnipay\PayOnline\Exception\ProtocolException
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function sendData($data)
    {
        if ($this->getResult()) {
            throw new ProtocolException($this->getErrorCode());
        }
        if ($data['SecurityKey'] !== $this->getPublicKey()) {
            throw new InvalidRequestException('Invalid public key was received.');
        }
        return $this->createResponse($data);
    }

    /**
     * @inheritdoc
     */
    protected function createResponse($data)
    {
        return $this->response = new CompletePurchaseResponse($this, $data);
    }

    /**
     * @inheritdoc
     */
    public function getData()
    {
        $data = $this->getSignatureParams();
        $data['SecurityKey'] = $this->generateSignature();
        $data['RebillAnchor'] = $this->getToken();
        $data['Card'] = $this->getCard();
        return $data;
    }

    /**
     * @inheritdoc
     */
    protected function getSignatureParams()
    {
        return [
            'DateTime' => $this->getDatetime(),
            'TransactionID' => $this->getTransactionId(),
            'OrderId' => $this->getOrderId(),
            'Amount' => $this->getAmount(),
            'Currency' => $this->getCurrency(),
        ];
    }

    public function getEndpoint()
    {
        return "$this->liveEndpoint/{$this->getLanguage()}/payment/";
    }
}
