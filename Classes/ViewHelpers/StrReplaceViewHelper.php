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
            false
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
        $search = $arguments['search'];
        $replace = $arguments['replace'];
        $subject = $arguments['subject'] ?: $renderChildrenClosure();
        return str_replace($search, $replace, $subject);
    }
}
