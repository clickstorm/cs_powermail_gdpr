<?php

namespace Clickstorm\CsPowermailGdpr\Domain\Model;

class Form extends \In2code\Powermail\Domain\Model\Form
{
    protected bool $txCspowermailgdprHidden = false;

    public function isTxCspowermailgdprHidden(): bool
    {
        return $this->txCspowermailgdprHidden;
    }

    public function setTxCspowermailgdprHidden(bool $txCspowermailgdprHidden): void
    {
        $this->txCspowermailgdprHidden = $txCspowermailgdprHidden;
    }
}
