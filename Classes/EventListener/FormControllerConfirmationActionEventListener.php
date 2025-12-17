<?php

namespace Clickstorm\CsPowermailGdpr\EventListener;

use In2code\Powermail\Events\FormControllerConfirmationActionEvent;
use TYPO3\CMS\Core\Attribute\AsEventListener;

#[AsEventListener(
    identifier: 'csPowermailGdprFormControllerConfirmationActionEventListener',
)]
class FormControllerConfirmationActionEventListener
{
    public function __invoke(FormControllerConfirmationActionEvent $event): void
    {
        $mail = $event->getMail();
        if (!$mail->getForm()->isTxCspowermailgdprHidden() && !$mail->isTxCspowermailgdprAccepted()) {
            $request = $event->getFormController()->getRequest();
            $mail->setTxCspowermailgdprAccepted(
                FormControllerCreateActionBeforeRenderViewEventListener::checkParam($request)
            );
        }
    }
}
