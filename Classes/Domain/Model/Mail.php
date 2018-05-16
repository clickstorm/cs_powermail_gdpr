<?php
namespace Clickstorm\CsPowermailGdpr\Domain\Model;

use In2code\Powermail\Utility\ArrayUtility;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Class Mail
 */
class Mail extends \In2code\Powermail\Domain\Model\Mail
{
    /**
     * @var boolean
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
