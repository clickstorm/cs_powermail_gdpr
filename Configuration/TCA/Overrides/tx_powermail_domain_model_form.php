<?php

defined('TYPO3') || die('Access denied.');

// define new fields
$tempColumns = [
    'tx_cspowermailgdpr_hidden' => [
        'label' => 'LLL:EXT:cs_powermail_gdpr/Resources/Private/Language/locallang_db.xlf:tx_powermail_domain_model_form.tx_cspowermailgdpr_hidden',
        'exclude' => 1,
        'l10n_mode' => 'exclude',
        'config' => [
            'type' => 'check',
        ]
    ]
];

// add new fields
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_powermail_domain_model_form', $tempColumns);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'tx_powermail_domain_model_form',
    'tx_cspowermailgdpr_hidden',
    '',
    'after:css'
);
