<?php

namespace Omnipay\PayOnline\Message;

use Omnipay\Common\Message\AbstractResponse;

/**
 * PayOnline complete purchase response.
 *
 * @property CompletePurchaseRequest $request
 */
class CompletePurchaseResponse extends AbstractResponse
{
    /**
     * @inheritdoc
     */
    public function isSuccessful()
    {
        return true;
    }
}
