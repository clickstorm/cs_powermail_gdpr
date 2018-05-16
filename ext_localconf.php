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