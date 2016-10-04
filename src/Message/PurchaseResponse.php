<?php

namespace Omnipay\PayOnline\Message;

use Omnipay\Common\Message\AbstractResponse;

/**
 * PayOnline purchase response.
 *
 * @property PurchaseRequest $request
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

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->request->getUrl();
    }
}
