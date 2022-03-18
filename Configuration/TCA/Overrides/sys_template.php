<?php

defined('TYPO3') || die('Access denied.');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    'cs_powermail_gdpr',
    'Configuration/TypoScript',
    'Powermail GDPR checkbox'
);
