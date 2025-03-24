<?php

namespace Clickstorm\CsPowermailGdpr\Domain\Validator;

use In2code\Powermail\Domain\Model\Mail;
use In2code\Powermail\Domain\Validator\AbstractValidator;
use TYPO3\CMS\Core\Utility\ArrayUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Error\Error;
use TYPO3\CMS\Extbase\Error\Result;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

class GdprAcceptedValidator extends AbstractValidator
{
    /**
     * validate
     *
     * @param Mail $mail
     */
    public function isValid(mixed $value): void
    {
        $result = GeneralUtility::makeInstance(Result::class);

        // throw error
        if(!$value->getForm()->isTxCspowermailgdprHidden()) {
            $params = $GLOBALS['TYPO3_REQUEST']->getQueryParams()['tx_powermail_pi1'] ?? [];

            if ($params['action'] != "optinConfirm") {
                ArrayUtility::mergeRecursiveWithOverrule($params, $GLOBALS['TYPO3_REQUEST']->getParsedBody()['tx_powermail_pi1'] ?? []);

                if(isset($params['field']['tx_cspowermailgdpr_accepted'])
                    && !$params['field']['tx_cspowermailgdpr_accepted']
                    && !$value->isTxCspowermailgdprAccepted()
                ) {
                    $errorMarker = LocalizationUtility::translate('tx_cspowermailgdpr.checkbox.marker', 'CsPowermailGdpr') . ':';
                    $this->result->addError(new Error($errorMarker, 123009282, [], 'Error tx_cspowermailgdpr'));
                }
            }
        }
    }
}
