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