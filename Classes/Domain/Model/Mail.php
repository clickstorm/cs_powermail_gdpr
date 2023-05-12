<?php

namespace Clickstorm\CsPowermailGdpr\Domain\Model;

class Mail extends \In2code\Powermail\Domain\Model\Mail
{
    protected bool $txCspowermailgdprAccepted = false;

    public function isTxCspowermailgdprAccepted(): bool
    {
        return $this->txCspowermailgdprAccepted;
    }

    public function setTxCspowermailgdprAccepted(bool $txCspowermailgdprAccepted): void
    {
        $this->txCspowermailgdprAccepted = $txCspowermailgdprAccepted;
    }
}
