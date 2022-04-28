<?php
namespace Clickstorm\CsPowermailGdpr\ViewHelpers\Iterator;

use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\Variables\VariableProviderInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3\CMS\Core\Resource\FileCollectionRepository;

/**
 * Explodes a string by $glue.
 *
 */
class ExplodeViewHelper extends AbstractViewHelper
{
    protected $escapeOutput = false;

    public function initializeArguments(): void
    {
        parent::initializeArguments();
        $this->registerArgument(
            'glue',
            'string',
            'String "glue" that separates values. If you need a constant (like PHP_EOL), use v:const to read it.',
            false,
            ','
        );
        $this->registerArgument(
            'content',
            'string',
            'The content to explode',
            false,
            ','
        );
        $this->registerArgument(
            'limit',
            'int',
            'If limit is set and positive, the returned array will contain a maximum of limit elements with the last ' .
            'element containing the rest of string. If the limit parameter is negative, all components except the ' .
            'last-limit are returned. If the limit parameter is zero, then this is treated as 1.',
            false,
            PHP_INT_MAX
        );
        $this->registerArgument(
            'as',
            'string',
            'Template variable name to assign; if not specified the ViewHelper returns the variable instead.'
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
        $content = !empty($arguments['as']) ? $arguments['content'] : ($arguments['content'] ?? $renderChildrenClosure());
        $glue = $arguments['glue'];
        $limit = isset($arguments['limit']) ? $arguments['limit'] : PHP_INT_MAX;
        $output = explode($glue, $content, $limit);
        return static::renderChildrenWithVariableOrReturnInputStatic(
            $output,
            $arguments['as'],
            $renderingContext,
            $renderChildrenClosure
        );
    }

    /**
     * @param string $variable
     *
     * @return mixed
     */
    protected function renderChildrenWithVariableOrReturnInput($variable = null)
    {
        $as = $this->arguments['as'];
        if (true === empty($as)) {
            return $variable;
        } else {
            $variables = [$as => $variable];
            $content = $this->renderChildrenWithVariables($variables);
        }
        return $content;
    }

    /**
     * @param mixed $variable
     * @param string $as
     * @param \TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface $renderingContext
     * @param \Closure $renderChildrenClosure
     * @return mixed
     */
    protected static function renderChildrenWithVariableOrReturnInputStatic(
        $variable,
        $as,
        RenderingContextInterface $renderingContext,
        \Closure $renderChildrenClosure
    ) {
        if (true === empty($as)) {
            return $variable;
        } else {
            $variables = [$as => $variable];
            $content = static::renderChildrenWithVariablesStatic(
                $variables,
                $renderingContext->getVariableProvider(),
                $renderChildrenClosure
            );
        }
        return $content;
    }

    /**
     * Renders tag content of ViewHelper and inserts variables
     * in $variables into $variableContainer while keeping backups
     * of each existing variable, restoring it after rendering.
     * Returns the output of the renderChildren() method on $viewHelper.
     *
     * @param array $variables
     * @param VariableProviderInterface $templateVariableContainer
     * @param \Closure $renderChildrenClosure
     * @return mixed
     */
    protected static function renderChildrenWithVariablesStatic(
        array $variables,
              $templateVariableContainer,
              $renderChildrenClosure
    ) {
        $backups = static::backupVariables($variables, $templateVariableContainer);
        $content = $renderChildrenClosure();
        static::restoreVariables($variables, $backups, $templateVariableContainer);
        return $content;
    }

    /**
     * @param array $variables
     * @param VariableProviderInterface $templateVariableContainer
     * @return array
     */
    private static function backupVariables(array $variables, $templateVariableContainer)
    {
        $backups = [];
        foreach ($variables as $variableName => $variableValue) {
            if (true === $templateVariableContainer->exists($variableName)) {
                $backups[$variableName] = $templateVariableContainer->get($variableName);
                $templateVariableContainer->remove($variableName);
            }
            $templateVariableContainer->add($variableName, $variableValue);
        }
        return $backups;
    }

    /**
     * @param array $variables
     * @param array $backups
     * @param VariableProviderInterface $templateVariableContainer
     * @return void
     */
    private static function restoreVariables(array $variables, array $backups, $templateVariableContainer)
    {
        foreach ($variables as $variableName => $variableValue) {
            $templateVariableContainer->remove($variableName);
            if (true === isset($backups[$variableName])) {
                $templateVariableContainer->add($variableName, $variableValue);
            }
        }
    }
}
?>
