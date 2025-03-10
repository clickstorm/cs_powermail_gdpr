<?php

namespace Clickstorm\CsPowermailGdpr\ViewHelpers;

use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * ViewHelper for php str_replace function
 */
class IsGdprCheckboxCheckedViewHelper extends AbstractViewHelper
{
    protected $escapeOutput = false;

    public function initializeArguments(): void
    {
        parent::initializeArguments();
        $this->registerArgument(
            'property',
            'string',
            'Property name of the powermail gdpr field',
            true
        );
    }

    public function render(): bool
    {
        if (isset($_POST['tx_powermail_pi1']['field'][$this->arguments['property']])) {
            $checked = (bool)$_POST['tx_powermail_pi1']['field'][$this->arguments['property']][0];
        }
        return $checked ?? false;
    }
}
