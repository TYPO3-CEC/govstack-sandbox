<?php

defined('TYPO3') || die();


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    '*',
    'FILE:EXT:sitepackage/Configuration/FlexForms/MenuCard.xml',
    'menu_card_list'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    '*',
    'FILE:EXT:sitepackage/Configuration/FlexForms/MenuCard.xml',
    'menu_card_dir'
);
