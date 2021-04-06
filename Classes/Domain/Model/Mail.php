<?php

namespace Clickstorm\CsPowermailGdpr\Domain\Model;

/**
 * Class Mail
 */
class Mail extends \In2code\Powermail\Domain\Model\Mail
{
    /**
     * @var bool
     */
    protected $txCspowermailgdprAccepted;

    /**
     * @return bool
     */
    public function isTxCspowermailgdprAccepted()
    {
        return $this->txCspowermailgdprAccepted;
    }

    /**
     * @param bool $txCspowermailgdprAccepted
     */
    public function setTxCspowermailgdprAccepted($txCspowermailgdprAccepted)
    {
        $this->txCspowermailgdprAccepted = $txCspowermailgdprAccepted;
    }
}
