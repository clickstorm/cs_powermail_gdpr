# [clickstorm] GDPR powermail checkbox

This extension extends each powermail form with a checkbox. This checkbox is placed before each submit button and
linked to your privacy policy. The user has to accept your privacy policy to submit a form. The validation is
also done by the server. The value is stored  in the database. You can disable this checkbox for each form
individually.

Feel free to test and give feedback.

## configuration

### Privacy Pid

Set your privacy policy page with a TypoScript constant.
```
plugin.tx_powermail.settings.privacyPid =
```

### Override language labels

You can override the language labels via TypoScript

```
plugin.tx_powermail._LOCAL_LANG.en.tx_cspowermailgdpr.checkbox.label = I accept the ###privacyPolicy###.
```

or in an extra locallang file

```php
$GLOBALS['TYPO3_CONF_VARS']['SYS']['locallangXMLOverride']['EXT:powermail/Resources/Private/Language/locallang.xlf'][10] =
    'EXT:myext/Resources/Private/Language/locallang.xlf';
```

There you can override `tx_cspowermailgdpr.checkbox.label` and `tx_cspowermailgdpr.checkbox.label.linkLabel`.
`###privacyUrl###` will be replaces by the link labeled by `tx_cspowermailgdpr.checkbox.label.linkLabel`, e.g.:

```
I accept the ###privacyPolicy###.
```

becomes

```html
I accept the <a href="privacypolicy" target="_blank" title="Show privacy policy">privacy policy</a>.
```
