<?php

defined('TYPO3') or die();

// encapsulate all locally defined variables
(function () {
    $servicePageDoktype = 200;
    $serviceIconClass = 'sitepackage-service-page';

    // Add the new doktype to the page type selector
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
        'pages',
        'doktype',
        [
            'label' => 'LLL:EXT:sitepackage/Resources/Private/Language/backend.xlf:page.type.service',
            'value' => $servicePageDoktype,
            'icon'  => $serviceIconClass,
            'group' => 'default',
        ],
    );
    // Add the icon to the icon class configuration
    $GLOBALS['TCA']['pages']['ctrl']['typeicon_classes'][$servicePageDoktype] = $serviceIconClass;

    $serviceExternalPageDoktype = 210;
    $serviceExternalIconClass = 'sitepackage-service-page';

    // Add the new doktype to the page type selector
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
        'pages',
        'doktype',
        [
            'label' => 'LLL:EXT:sitepackage/Resources/Private/Language/backend.xlf:page.type.service.external',
            'value' => $serviceExternalPageDoktype,
            'icon'  => $serviceIconClass,
            'group' => 'default',
        ],
    );
    // Add the icon to the icon class configuration
    $GLOBALS['TCA']['pages']['ctrl']['typeicon_classes'][$serviceExternalPageDoktype] = $serviceExternalIconClass;
    $GLOBALS['TCA']['pages']['types']['210'] = $GLOBALS['TCA']['pages']['types']['3'];
})();
