<?php

$EM_CONF[$_EXTKEY] = [
    'title' => '[clickstorm] GDPR powermail checkbox',
    'description' => '',
    'category' => 'plugin',
    'author' => 'Marc Hirdes',
    'author_email' => 'hirdes@clickstorm.de',
    'author_company' => 'clickstorm GmbH',
    'state' => 'beta',
    'clearCacheOnLoad' => 0,
    'version' => '2.0.2-dev',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.0-10.4.99',
            'powermail' => '8.1.0-8.99.99',
            'vhs' => '4.0.0-6.99.99'
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
];
