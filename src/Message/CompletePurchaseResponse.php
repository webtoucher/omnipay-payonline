<?php

namespace Omnipay\PayOnline\Message;

use Omnipay\Common\Message\AbstractResponse;

/**
 * PayOnline complete purchase response.
 */
class CompletePurchaseResponse extends AbstractResponse
{
    /**
     * @inheritdoc
     */
    public function isSuccessful()
    {
        if (!array_key_exists('result', $this->data)) {
            return false;
        }
        return $this->data['result'] === '1';
    }
}
