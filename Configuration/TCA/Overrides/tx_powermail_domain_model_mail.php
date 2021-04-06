<?php

defined('TYPO3_MODE') || die('Access denied.');

// define new fields
$tempColumns = [
    'tx_cspowermailgdpr_accepted' => [
        'label' => 'LLL:EXT:cs_powermail_gdpr/Resources/Private/Language/locallang_db.xlf:tx_powermail_domain_model_mail.tx_cspowermailgdpr_accepted',
        'exclude' => 1,
        'config' => [
            'type' => 'check',
            'readOnly' => 1
        ]
    ]
];

// add new fields
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_powermail_domain_model_mail', $tempColumns);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'tx_powermail_domain_model_mail',
    'tx_cspowermailgdpr_accepted',
    '',
    'after:feuser'
);
