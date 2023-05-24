<?php

namespace Clickstorm\CsPowermailGdpr\Hook;

use Clickstorm\CsPowermailGdpr\Domain\Model\Mail;
use TYPO3\CMS\Core\Utility\GeneralUtility;

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

class FormController
{
    /**
     * Manipulate message object short before powermail send the mail
     *
     * @param Mail $mail
     * @param string $hash
     * @param \In2code\Powermail\Controller\FormController $formController
     */
    public function manipulateForm($mail, $hash, $formController)
    {
        if (!$mail->isTxCspowermailgdprAccepted()) {
            $mail->setTxCspowermailgdprAccepted($this->checkParam());
        }
    }

    /**
     * Manipulate message object short before powermail send the mail
     *
     * @param Mail $mail
     * @param \In2code\Powermail\Controller\FormController $formController
     */
    public function manipulateFormForConfirmation($mail, $formController)
    {
        $mail->setTxCspowermailgdprAccepted($this->checkParam());
    }

    /**
     * @return int
     */
    protected function checkParam()
    {
        $params = GeneralUtility::_GP('tx_powermail_pi1');
        return !empty($params['field']['tx_cspowermailgdpr_accepted']);
    }
}
