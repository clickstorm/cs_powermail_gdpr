<?php

declare(strict_types=1);

return [
    \In2code\Powermail\Domain\Model\Form::class => [
        'subclasses' => [
            0 => \Clickstorm\CsPowermailGdpr\Domain\Model\Form::class
        ]
    ],
    \In2code\Powermail\Domain\Model\Mail::class => [
        'subclasses' => [
            0 => \Clickstorm\CsPowermailGdpr\Domain\Model\Mail::class
        ]
    ],
    \Clickstorm\CsPowermailGdpr\Domain\Model\Form::class => [
        'tableName' => 'tx_powermail_domain_model_form'
    ],
    \Clickstorm\CsPowermailGdpr\Domain\Model\Mail::class => [
        'tableName' => 'tx_powermail_domain_model_mail'
    ],
];
