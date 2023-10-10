<?php

defined('TYPO3') || die();

(function () {
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['locallangXMLOverride']['EXT:powermail/Resources/Private/Language/locallang.xlf'][]
        = 'EXT:cs_powermail_gdpr/Resources/Private/Language/locallang.xlf';

    // use XClasses instead of sublcasses
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\In2code\Powermail\Domain\Model\Mail::class] = [
        'className' => \Clickstorm\CsPowermailGdpr\Domain\Model\Mail::class,
    ];
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\In2code\Powermail\Domain\Model\Form::class] = [
        'className' => \Clickstorm\CsPowermailGdpr\Domain\Model\Form::class,
    ];
})();
