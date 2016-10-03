<?php

namespace Omnipay\PayOnline\Message;

use Omnipay\Common\Message\AbstractResponse;

/**
 * PayOnline rebill response.
 */
class RebillResponse extends AbstractResponse
{
    /**
     * @inheritdoc
     */
    public function isSuccessful()
    {
        if (!array_key_exists('Result', $this->data)) {
            return false;
        }
        return $this->data['Result'] === 'OK';
    }
}
