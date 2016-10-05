<?php

namespace Omnipay\PayOnline\Message;

/**
 * PayOnline rebill request.
 */
class RebillRequest extends AbstractRequest
{
    /**
     * @inheritdoc
     */
    protected function createResponse($data)
    {
        return $this->response = new RebillResponse($this, $data);
    }

    /**
     * @inheritdoc
     */
    public function getData()
    {
        return [
            'MerchantId' => $this->getMerchantId(),
            'RebillAnchor' => $this->getToken(),
            'OrderId' => $this->getOrderId(),
            'Amount' => $this->getAmount(),
            'Currency' => $this->getCurrency(),
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
            'RebillAnchor' => $this->getToken(),
            'OrderId' => $this->getOrderId(),
            'Amount' => $this->getAmount(),
            'Currency' => $this->getCurrency(),
        ];
    }

    public function getEndpoint()
    {
        return "$this->liveEndpoint/payment/transaction/rebill/";
    }
}
