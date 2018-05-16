<?php
namespace Clickstorm\CsPowermailGdpr\Domain\Model;

use In2code\Powermail\Domain\Repository\FormRepository;
use In2code\Powermail\Utility\ConfigurationUtility;
use In2code\Powermail\Utility\ObjectUtility;
use In2code\Powermail\Utility\StringUtility;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Class Form
 */
class Form extends \In2code\Powermail\Domain\Model\Form
{
    /**
     * @var boolean
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
