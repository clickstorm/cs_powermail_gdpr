<?php

namespace Clickstorm\CsPowermailGdpr\EventListener;

use Clickstorm\CsPowermailGdpr\Domain\Model\Mail;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use In2code\Powermail\Events\FormControllerCreateActionBeforeRenderViewEvent;

class FormControllerCreateActionBeforeRenderViewEventListener
{
    public function __invoke(FormControllerCreateActionBeforeRenderViewEvent $event): void
    {
        $mail = $event->getMail();
        if (!$mail->getForm()->isTxCspowermailgdprHidden() && !$mail->isTxCspowermailgdprAccepted()) {
            $mail->setTxCspowermailgdprAccepted(self::checkParam());
        }
    }

    public static function checkParam(): int
    {
        $params = $GLOBALS['TYPO3_REQUEST']->getParsedBody()['tx_powermail_pi1'] ?? $GLOBALS['TYPO3_REQUEST']->getQueryParams()['tx_powermail_pi1'] ?? null;

        return !empty($params['field']['tx_cspowermailgdpr_accepted']) ? 1 : 0;
    }
}
