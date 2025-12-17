<?php

namespace Clickstorm\CsPowermailGdpr\EventListener;

use In2code\Powermail\Events\FormControllerCreateActionBeforeRenderViewEvent;
use TYPO3\CMS\Core\Attribute\AsEventListener;
use TYPO3\CMS\Extbase\Mvc\RequestInterface;

#[AsEventListener(
    identifier: 'csPowermailGdprFormControllerCreateActionBeforeRenderViewEventListener',
)]
class FormControllerCreateActionBeforeRenderViewEventListener
{
    public function __invoke(FormControllerCreateActionBeforeRenderViewEvent $event): void
    {
        $mail = $event->getMail();
        if (!$mail->getForm()->isTxCspowermailgdprHidden() && !$mail->isTxCspowermailgdprAccepted()) {
            $request = $event->getFormController()->getRequest();
            $mail->setTxCspowermailgdprAccepted(self::checkParam($request));
        }
    }

    public static function checkParam(RequestInterface $request): bool
    {
        $params = $request->getParsedBody()['tx_powermail_pi1']
            ?? $request->getQueryParams()['tx_powermail_pi1']
            ?? null;
        return !empty($params['field']['tx_cspowermailgdpr_accepted']);
    }
}
