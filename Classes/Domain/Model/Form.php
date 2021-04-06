<?php

namespace Clickstorm\CsPowermailGdpr\Domain\Model;

/**
 * Class Form
 */
class Form extends \In2code\Powermail\Domain\Model\Form
{
    /**
     * @var bool
     */
    protected $txCspowermailgdprHidden;

    /**
     * @return bool
     */
    public function isTxCspowermailgdprHidden()
    {
        return $this->txCspowermailgdprHidden;
    }

    /**
     * @param bool $txCspowermailgdprHidden
     */
    public function setTxCspowermailgdprHidden($txCspowermailgdprHidden)
    {
        $this->txCspowermailgdprHidden = $txCspowermailgdprHidden;
    }
}
