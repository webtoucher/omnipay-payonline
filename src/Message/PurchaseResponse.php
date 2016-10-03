<?php

namespace Omnipay\PayOnline\Message;

use Omnipay\Common\Message\AbstractResponse;

/**
 * PayOnline purchase response.
 */
class PurchaseResponse extends AbstractResponse
{
    /**
     * @inheritdoc
     */
    public function isSuccessful()
    {
        return true;
    }
}
