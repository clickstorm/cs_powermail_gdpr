<?php

namespace Clickstorm\CsPowermailGdpr\EventListener;

use In2code\Powermail\Domain\Model\Field;
use In2code\Powermail\Events\CustomValidatorEvent;
use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Core\Attribute\AsEventListener;
use TYPO3\CMS\Core\Utility\ArrayUtility;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

#[AsEventListener(
    identifier: 'cs-powermail-gdpr/gdprAcceptedValidator',
)]
class GdprAcceptedValidator
{
    protected ?ServerRequestInterface $request;

    public function __invoke(CustomValidatorEvent $event): void
    {
        $this->request = $event->getCustomValidator()->getRequest();
        $mail = $event->getMail();
        // throw error
        if (!$mail->getForm()->isTxCspowermailgdprHidden()) {
            $params = $event->getCustomValidator()->getRequest()->getQueryParams()['tx_powermail_pi1'] ?? [];

            if ($params['action'] != 'optinConfirm') {
                ArrayUtility::mergeRecursiveWithOverrule($params, $this->request->getParsedBody()['tx_powermail_pi1'] ?? []);

                if (!isset($params['field']['tx_cspowermailgdpr_accepted'])
                    || isset($params['field']['tx_cspowermailgdpr_accepted'])
                    && !$params['field']['tx_cspowermailgdpr_accepted']
                    && !$mail->isTxCspowermailgdprAccepted()
                ) {
                    $errorMarker = LocalizationUtility::translate('tx_cspowermailgdpr.checkbox.marker', 'CsPowermailGdpr');
                    $field = new Field();
                    $field->setMarker('tx_cspowermailgdpr_accepted_' . $event->getMail()->getForm()->getUid());
                    $event->getCustomValidator()->setErrorAndMessage($field, $errorMarker);
                }
            }
        }
    }
}
