<?php
defined('TYPO3_MODE') || die('Access denied.');

/** @var \TYPO3\CMS\Extbase\SignalSlot\Dispatcher $signalSlotDispatcher */
$signalSlotDispatcher = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
    \TYPO3\CMS\Extbase\SignalSlot\Dispatcher::class
);

$signalSlotDispatcher->connect(
    'In2code\Powermail\Controller\FormController',
    'createActionBeforeRenderView',
    'Clickstorm\CsPowermailGdpr\Hook\FormController',
    'manipulateForm',
    FALSE
);

$signalSlotDispatcher->connect(
    'In2code\Powermail\Controller\FormController',
    'confirmationActionBeforeRenderView',
    'Clickstorm\CsPowermailGdpr\Hook\FormController',
    'manipulateFormForConfirmation',
    FALSE
);

$GLOBALS['TYPO3_CONF_VARS']['SYS']['locallangXMLOverride']['EXT:powermail/Resources/Private/Language/locallang.xlf'][]
    = 'EXT:cs_powermail_gdpr/Resources/Private/Language/locallang.xlf';

// Migration for Deprecation: #86270 - config.tx_extbase.objects and plugin.tx_%plugin%.objects
$extbaseObjectContainer  = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\Container\Container::class);
$extbaseObjectContainer->registerImplementation(
	\In2code\Powermail\Domain\Factory\FileFactory::class,
	\Clickstorm\CsPowermailGdpr\Domain\Factory\FileFactory::class
);
$extbaseObjectContainer->registerImplementation(
	\In2code\Powermail\Domain\Model\Form::class,
	\Clickstorm\CsPowermailGdpr\Domain\Model\Form::class
);
$extbaseObjectContainer->registerImplementation(
	\In2code\Powermail\Domain\Model\Mail::class,
	\Clickstorm\CsPowermailGdpr\Domain\Model\Mail::class
);