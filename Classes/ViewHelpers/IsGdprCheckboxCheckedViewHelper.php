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

    /**
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param RenderingContextInterface $renderingContext
     * @return mixed
     */
    public static function renderStatic(
        array $arguments,
        \Closure $renderChildrenClosure,
        RenderingContextInterface $renderingContext
    ) {
        if(isset($_POST['tx_powermail_pi1']['field'][$arguments['property']])) {
            $checked = $_POST['tx_powermail_pi1']['field'][$arguments['property']][0] ? true : false;
        }
        return $checked ?? false;
    }
}
