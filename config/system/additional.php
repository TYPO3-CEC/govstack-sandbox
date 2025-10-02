<?php

(static function (): void {

    if (getenv('IS_DDEV_PROJECT') == 'true') {
        $GLOBALS['TYPO3_CONF_VARS']['BE']['sessionTimeout'] = 28800;
        $GLOBALS['TYPO3_CONF_VARS']['BE']['debug'] = true;

        // FE
        $GLOBALS['TYPO3_CONF_VARS']['FE']['debug'] = true;

        $GLOBALS['TYPO3_CONF_VARS']['SYS']['devIPmask'] = '*';

        // SYS
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['sitename'] .= ' 💻LOCAL (DDEV)';

        // Error and exception handling
        // https://maximivanov.github.io/php-error-reporting-calculator/
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['displayErrors'] = 1;
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['exceptionalErrors'] = 28674;
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['errorHandlerErrors'] = 30466;
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['belogErrorReporting'] = 30711;
        $GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport_sendmail_command'] = '/usr/local/bin/mailpit sendmail -t --smtp-addr 127.0.0.1:1025';
    }

    unset($GLOBALS['TYPO3_CONF_VARS']['SYS']['fal']['processors']['DeferredBackendImageProcessor']);
})();
