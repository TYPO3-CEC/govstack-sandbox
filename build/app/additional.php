<?php
declare(strict_types=1);

use TYPO3\CMS\Core\Utility\GeneralUtility;

$env = static function (string $k, $d = null) {
    $v = getenv($k);
    return $v === false ? $d : $v;
};
$GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default'] = [
    'driver' => 'mysqli',
    'host' => $env('DB_HOST', 'mysql'),
    'port' => (int)$env('DB_PORT', 3306),
    'dbname' => $env('DB_NAME', 'typo3'),
    'user' => $env('DB_USER', 'typo3'),
    'password' => $env('DB_PASSWORD', ''),
    'charset' => 'utf8mb4',
    'defaultTableOptions' => ['charset' => 'utf8mb4', 'collation' => $env('DB_COLLATION', 'utf8mb4_unicode_ci')],
];
$trusted = trim((string)$env('TRUSTED_HOSTS_PATTERN', ''));
if ($trusted !== '') {
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['trustedHostsPattern'] = $trusted;
}
$GLOBALS['TYPO3_CONF_VARS']['SYS']['reverseProxyHeaderMultiValue'] = 'first';
if ($ips = trim((string)$env('TRUSTED_PROXY_IPS', ''))) {
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['reverseProxyIP'] = GeneralUtility::trimExplode(',', $ips, true);
}
if ($env('REDIS_HOST')) {
    $redis = ['hostname' => $env('REDIS_HOST'), 'port' => (int)$env('REDIS_PORT', 6379), 'database' => (int)$env('REDIS_DB', 0)];
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['cache_pages']['backend'] = \TYPO3\CMS\Core\Cache\Backend\RedisBackend::class;
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['cache_pages']['options'] = $redis;
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['cache_hash']['backend'] = \TYPO3\CMS\Core\Cache\Backend\RedisBackend::class;
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['cache_hash']['options'] = $redis;
}
$GLOBALS['TYPO3_CONF_VARS']['GFX']['processor'] = 'ImageMagick';
$GLOBALS['TYPO3_CONF_VARS']['GFX']['processor_enabled'] = true;
$GLOBALS['TYPO3_CONF_VARS']['GFX']['processor_path'] = '/usr/bin/';
putenv('TYPO3_CONTEXT=' . $env('TYPO3_CONTEXT', 'Production'));
