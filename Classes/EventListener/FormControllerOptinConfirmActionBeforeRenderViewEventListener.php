<?php

namespace Clickstorm\CsPowermailGdpr\EventListener;

use Clickstorm\CsPowermailGdpr\Domain\Model\Mail;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use In2code\Powermail\Events\FormControllerOptinConfirmActionBeforeRenderViewEvent;

class FormControllerOptinConfirmActionBeforeRenderViewEventListener
{
    public function __invoke(FormControllerOptinConfirmActionBeforeRenderViewEvent $event)
    {
        $mail = $event->getMail();
        $mail->setTxCspowermailgdprAccepted($this->checkParam());
    }
}
