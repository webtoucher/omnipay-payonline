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
        $this->response = new CompletePurchaseResponse($this, $data);
    }

    /**
     * @inheritdoc
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function getData()
    {
        if ($this->getResult()) {
            throw new ProtocolException($this->getErrorCode());
        }
        $data = $this->getSignatureParams();
        $data['SecurityKey'] = $this->generateSignature();
        if ($data['SecurityKey'] !== $this->getPublicKey()) {
            throw new InvalidRequestException('Invalid public key was received.');
        }
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
