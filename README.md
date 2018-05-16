# [clickstorm] GDPR powermail checkbox

This extension extends each powermail form with a checkbox. This checkbox is placed before each submit button and 
linked to your privacy policy. The user has to accept your privacy policy to submit a form. The validation is 
also done by the server. The value is stored  in the database. You can disable this checkbox for each form 
individually.

Feel free to test and give feedback. 

## configuration

Set your privacy policy page with a TypoScript constant.
```
plugin.tx_powermail.settings.privacyPid =
```

Override language labels.

```php
$GLOBALS['TYPO3_CONF_VARS']['SYS']['locallangXMLOverride']['EXT:cs_powermail_gdpr/Resources/Private/Language/locallang.xlf'][] = 
    'EXT:myext/Resources/Private/Language/locallang.xlf';
```

Then you can override `tx_cspowermailgdpr.checkbox.label`. `###` will be replaces by the link, e.g.:

```
I accept the ###privacy policy###.
```

becomes

```html
I accept the <a href="privacypolicy" target="_blank" title="Show privacy policy">privacy policy</a>.
```