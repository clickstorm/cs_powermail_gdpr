<?php
namespace Clickstorm\CsPowermailGdpr\ViewHelpers;

use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * ViewHelper for php str_replace function
 */
class StrReplaceViewHelper extends AbstractViewHelper
{
    protected $escapeOutput = false;

    public function initializeArguments(): void
    {
        parent::initializeArguments();
        $this->registerArgument(
            'search',
            'string|array',
            'String "search" to search for in subject.',
            true
        );
        $this->registerArgument(
            'replace',
            'string|array',
            'String "replace" which replaces the search string when found',
            true
        );
        $this->registerArgument(
            'subject',
            'string',
            'String "subject" to perform str_replace() on',
            false,
            ''
        );
    }

    public function render(): string
    {
        $search = $this->arguments['search'] ?? '';
        $replace = $this->arguments['replace'] ?? '';
        $subject = $this->arguments['subject'] ?: $this->renderChildren();

        return str_replace($search, $replace, $subject);
    }
}
