<?php
namespace Clickstorm\CsPowermailGdpr\Domain\Validator;

use In2code\Powermail\Domain\Model\Mail;
use In2code\Powermail\Domain\Validator\AbstractValidator;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Error\Error;
use TYPO3\CMS\Extbase\Error\Result;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016 Marc Hirdes <hirdes@clickstorm.de>, clickstorm GmbH
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

class GdprAcceptedValidator extends AbstractValidator
{
    /**
     * validate
     *
     * @param Mail $mail
     * @return Result
     */
    public function validate($mail)
    {
        $result = GeneralUtility::makeInstance(Result::class);

        // throw error
        if(!$mail->getForm()->isTxCspowermailgdprHidden()) {
            $params = GeneralUtility::_GPmerged('tx_powermail_pi1');
            if(!$params['field']['tx_cspowermailgdpr_accepted'] && !$mail->isTxCspowermailgdprAccepted()) {
                $errorMarker = LocalizationUtility::translate('tx_cspowermailgdpr.checkbox.marker', 'cs_powermail_gdpr') . ':';
				$result->addError(new Error($errorMarker, 123009282, [], 'Error tx_cspowermailgdpr'));
            }
        }

        return $result;
    }
}
