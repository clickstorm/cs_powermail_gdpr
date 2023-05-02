<?php

namespace Clickstorm\CsPowermailGdpr\EventListener;

use Clickstorm\CsPowermailGdpr\Domain\Model\Mail;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use In2code\Powermail\Controller\FormControllerCreateActionBeforeRenderViewEvent;

class FormControllerCreateActionBeforeRenderViewEventListener
{
    public function __invoke(FormControllerCreateActionBeforeRenderViewEvent $event)
    {
        $mail = $event->getMail();
        if (!$mail->isTxCspowermailgdprAccepted()) {
            $mail->setTxCspowermailgdprAccepted(self::checkParam());
        }
    }

    public static function checkParam(): int
    {
        $params = GeneralUtility::_GP('tx_powermail_pi1');

        return $params['field']['tx_cspowermailgdpr_accepted'] ? 1 : 0;
    }
}
