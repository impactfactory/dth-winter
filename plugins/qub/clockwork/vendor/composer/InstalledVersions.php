<?php











namespace Composer;

use Composer\Autoload\ClassLoader;
use Composer\Semver\VersionParser;






class InstalledVersions
{
private static $installed = array (
  'root' => 
  array (
    'pretty_version' => '1.0.0+no-version-set',
    'version' => '1.0.0.0',
    'aliases' => 
    array (
    ),
    'reference' => NULL,
    'name' => 'qub/clockwork',
  ),
  'versions' => 
  array (
    'bennothommo/wn-meta-plugin' => 
    array (
      'replaced' => 
      array (
        0 => 'v1.1.0',
      ),
    ),
    'bennothommo/wn-urlnormaliser-plugin' => 
    array (
      'replaced' => 
      array (
        0 => 'v1.2.0',
      ),
    ),
    'clue/stream-filter' => 
    array (
      'replaced' => 
      array (
        0 => 'v1.5.0',
      ),
    ),
    'composer/installers' => 
    array (
      'replaced' => 
      array (
        0 => 'dev-main',
      ),
    ),
    'composer/semver' => 
    array (
      'replaced' => 
      array (
        0 => '3.2.4',
      ),
    ),
    'doctrine/cache' => 
    array (
      'replaced' => 
      array (
        0 => '1.10.2',
      ),
    ),
    'doctrine/dbal' => 
    array (
      'replaced' => 
      array (
        0 => '2.13.0',
      ),
    ),
    'doctrine/deprecations' => 
    array (
      'replaced' => 
      array (
        0 => 'v0.5.3',
      ),
    ),
    'doctrine/event-manager' => 
    array (
      'replaced' => 
      array (
        0 => '1.1.1',
      ),
    ),
    'doctrine/inflector' => 
    array (
      'replaced' => 
      array (
        0 => '2.0.3',
      ),
    ),
    'doctrine/lexer' => 
    array (
      'replaced' => 
      array (
        0 => '1.2.1',
      ),
    ),
    'dragonmantank/cron-expression' => 
    array (
      'replaced' => 
      array (
        0 => 'v2.3.1',
      ),
    ),
    'egulias/email-validator' => 
    array (
      'replaced' => 
      array (
        0 => '2.1.25',
      ),
    ),
    'erusev/parsedown' => 
    array (
      'replaced' => 
      array (
        0 => '1.7.4',
      ),
    ),
    'erusev/parsedown-extra' => 
    array (
      'replaced' => 
      array (
        0 => '0.8.1',
      ),
    ),
    'guzzlehttp/promises' => 
    array (
      'replaced' => 
      array (
        0 => '1.4.1',
      ),
    ),
    'guzzlehttp/psr7' => 
    array (
      'replaced' => 
      array (
        0 => '1.8.1',
      ),
    ),
    'http-interop/http-factory-guzzle' => 
    array (
      'replaced' => 
      array (
        0 => '1.0.0',
      ),
    ),
    'illuminate/auth' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.20.23',
      ),
    ),
    'illuminate/broadcasting' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.20.23',
      ),
    ),
    'illuminate/bus' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.20.23',
      ),
    ),
    'illuminate/cache' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.20.23',
      ),
    ),
    'illuminate/config' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.20.23',
      ),
    ),
    'illuminate/console' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.20.23',
      ),
    ),
    'illuminate/container' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.20.23',
      ),
    ),
    'illuminate/contracts' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.20.23',
      ),
    ),
    'illuminate/cookie' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.20.23',
      ),
    ),
    'illuminate/database' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.20.23',
      ),
    ),
    'illuminate/encryption' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.20.23',
      ),
    ),
    'illuminate/events' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.20.23',
      ),
    ),
    'illuminate/filesystem' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.20.23',
      ),
    ),
    'illuminate/hashing' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.20.23',
      ),
    ),
    'illuminate/http' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.20.23',
      ),
    ),
    'illuminate/log' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.20.23',
      ),
    ),
    'illuminate/mail' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.20.23',
      ),
    ),
    'illuminate/notifications' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.20.23',
      ),
    ),
    'illuminate/pagination' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.20.23',
      ),
    ),
    'illuminate/pipeline' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.20.23',
      ),
    ),
    'illuminate/queue' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.20.23',
      ),
    ),
    'illuminate/redis' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.20.23',
      ),
    ),
    'illuminate/routing' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.20.23',
      ),
    ),
    'illuminate/session' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.20.23',
      ),
    ),
    'illuminate/support' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.20.23',
      ),
    ),
    'illuminate/translation' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.20.23',
      ),
    ),
    'illuminate/validation' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.20.23',
      ),
    ),
    'illuminate/view' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.20.23',
      ),
    ),
    'itsgoingd/clockwork' => 
    array (
      'pretty_version' => 'v1.14.5',
      'version' => '1.14.5.0',
      'aliases' => 
      array (
      ),
      'reference' => '55ec557cc8cc60944de0eefbe27f905d538a8f70',
    ),
    'jean85/pretty-package-versions' => 
    array (
      'replaced' => 
      array (
        0 => '2.0.3',
      ),
    ),
    'laravel/framework' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.20.23',
      ),
    ),
    'laravel/tinker' => 
    array (
      'replaced' => 
      array (
        0 => 'v2.6.1',
      ),
    ),
    'league/commonmark' => 
    array (
      'replaced' => 
      array (
        0 => '1.5.8',
      ),
    ),
    'league/csv' => 
    array (
      'replaced' => 
      array (
        0 => '9.7.1',
      ),
    ),
    'league/flysystem' => 
    array (
      'replaced' => 
      array (
        0 => '1.1.3',
      ),
    ),
    'league/mime-type-detection' => 
    array (
      'replaced' => 
      array (
        0 => '1.7.0',
      ),
    ),
    'linkorb/jsmin-php' => 
    array (
      'replaced' => 
      array (
        0 => '1.0.0',
      ),
    ),
    'monolog/monolog' => 
    array (
      'replaced' => 
      array (
        0 => '2.2.0',
      ),
    ),
    'nesbot/carbon' => 
    array (
      'replaced' => 
      array (
        0 => '2.46.0',
      ),
    ),
    'nikic/php-parser' => 
    array (
      'replaced' => 
      array (
        0 => 'v4.10.4',
      ),
    ),
    'opis/closure' => 
    array (
      'replaced' => 
      array (
        0 => '3.6.2',
      ),
    ),
    'paragonie/random_compat' => 
    array (
      'replaced' => 
      array (
        0 => 'v9.99.99',
      ),
    ),
    'php-http/client-common' => 
    array (
      'replaced' => 
      array (
        0 => '2.3.0',
      ),
    ),
    'php-http/discovery' => 
    array (
      'replaced' => 
      array (
        0 => '1.13.0',
      ),
    ),
    'php-http/httplug' => 
    array (
      'replaced' => 
      array (
        0 => '2.2.0',
      ),
    ),
    'php-http/message' => 
    array (
      'replaced' => 
      array (
        0 => '1.11.0',
      ),
    ),
    'php-http/message-factory' => 
    array (
      'replaced' => 
      array (
        0 => 'v1.0.2',
      ),
    ),
    'php-http/promise' => 
    array (
      'replaced' => 
      array (
        0 => '1.1.0',
      ),
    ),
    'phpoption/phpoption' => 
    array (
      'replaced' => 
      array (
        0 => '1.7.5',
      ),
    ),
    'psr/container' => 
    array (
      'replaced' => 
      array (
        0 => '1.1.1',
      ),
    ),
    'psr/http-client' => 
    array (
      'replaced' => 
      array (
        0 => '1.0.1',
      ),
    ),
    'psr/http-factory' => 
    array (
      'replaced' => 
      array (
        0 => '1.0.1',
      ),
    ),
    'psr/http-message' => 
    array (
      'replaced' => 
      array (
        0 => '1.0.1',
      ),
    ),
    'psr/log' => 
    array (
      'replaced' => 
      array (
        0 => '1.1.3',
      ),
    ),
    'psr/simple-cache' => 
    array (
      'replaced' => 
      array (
        0 => '1.0.1',
      ),
    ),
    'psy/psysh' => 
    array (
      'replaced' => 
      array (
        0 => 'v0.10.8',
      ),
    ),
    'qub/clockwork' => 
    array (
      'pretty_version' => '1.0.0+no-version-set',
      'version' => '1.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => NULL,
    ),
    'ralouphie/getallheaders' => 
    array (
      'replaced' => 
      array (
        0 => '3.0.3',
      ),
    ),
    'ramsey/uuid' => 
    array (
      'replaced' => 
      array (
        0 => '3.9.3',
      ),
    ),
    'scssphp/scssphp' => 
    array (
      'replaced' => 
      array (
        0 => 'v1.4.1',
      ),
    ),
    'sentry/sdk' => 
    array (
      'replaced' => 
      array (
        0 => '2.2.0',
      ),
    ),
    'sentry/sentry' => 
    array (
      'replaced' => 
      array (
        0 => '2.5.2',
      ),
    ),
    'sentry/sentry-laravel' => 
    array (
      'replaced' => 
      array (
        0 => '1.9.0',
      ),
    ),
    'swiftmailer/swiftmailer' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.2.7',
      ),
    ),
    'symfony/console' => 
    array (
      'replaced' => 
      array (
        0 => 'v4.4.21',
      ),
    ),
    'symfony/css-selector' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.2.4',
      ),
    ),
    'symfony/debug' => 
    array (
      'replaced' => 
      array (
        0 => 'v4.4.20',
      ),
    ),
    'symfony/deprecation-contracts' => 
    array (
      'replaced' => 
      array (
        0 => 'v2.2.0',
      ),
    ),
    'symfony/error-handler' => 
    array (
      'replaced' => 
      array (
        0 => 'v4.4.21',
      ),
    ),
    'symfony/event-dispatcher' => 
    array (
      'replaced' => 
      array (
        0 => 'v4.4.20',
      ),
    ),
    'symfony/event-dispatcher-contracts' => 
    array (
      'replaced' => 
      array (
        0 => 'v1.1.9',
      ),
    ),
    'symfony/finder' => 
    array (
      'replaced' => 
      array (
        0 => 'v4.4.20',
      ),
    ),
    'symfony/http-client' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.2.6',
      ),
    ),
    'symfony/http-client-contracts' => 
    array (
      'replaced' => 
      array (
        0 => 'v2.3.1',
      ),
    ),
    'symfony/http-foundation' => 
    array (
      'replaced' => 
      array (
        0 => 'v4.4.20',
      ),
    ),
    'symfony/http-kernel' => 
    array (
      'replaced' => 
      array (
        0 => 'v4.4.21',
      ),
    ),
    'symfony/mime' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.2.6',
      ),
    ),
    'symfony/options-resolver' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.2.4',
      ),
    ),
    'symfony/polyfill-ctype' => 
    array (
      'replaced' => 
      array (
        0 => 'v1.22.1',
      ),
    ),
    'symfony/polyfill-iconv' => 
    array (
      'replaced' => 
      array (
        0 => 'v1.22.1',
      ),
    ),
    'symfony/polyfill-intl-idn' => 
    array (
      'replaced' => 
      array (
        0 => 'v1.22.1',
      ),
    ),
    'symfony/polyfill-intl-normalizer' => 
    array (
      'replaced' => 
      array (
        0 => 'v1.22.1',
      ),
    ),
    'symfony/polyfill-mbstring' => 
    array (
      'replaced' => 
      array (
        0 => 'v1.22.1',
      ),
    ),
    'symfony/polyfill-php72' => 
    array (
      'replaced' => 
      array (
        0 => 'v1.22.1',
      ),
    ),
    'symfony/polyfill-php73' => 
    array (
      'replaced' => 
      array (
        0 => 'v1.22.1',
      ),
    ),
    'symfony/polyfill-php80' => 
    array (
      'replaced' => 
      array (
        0 => 'v1.22.1',
      ),
    ),
    'symfony/polyfill-uuid' => 
    array (
      'replaced' => 
      array (
        0 => 'v1.22.1',
      ),
    ),
    'symfony/process' => 
    array (
      'replaced' => 
      array (
        0 => 'v4.4.20',
      ),
    ),
    'symfony/routing' => 
    array (
      'replaced' => 
      array (
        0 => 'v4.4.20',
      ),
    ),
    'symfony/service-contracts' => 
    array (
      'replaced' => 
      array (
        0 => 'v2.2.0',
      ),
    ),
    'symfony/translation' => 
    array (
      'replaced' => 
      array (
        0 => 'v4.4.21',
      ),
    ),
    'symfony/translation-contracts' => 
    array (
      'replaced' => 
      array (
        0 => 'v2.3.0',
      ),
    ),
    'symfony/var-dumper' => 
    array (
      'replaced' => 
      array (
        0 => 'v4.4.21',
      ),
    ),
    'symfony/yaml' => 
    array (
      'replaced' => 
      array (
        0 => 'v3.4.47',
      ),
    ),
    'themattharris/tmhoauth' => 
    array (
      'replaced' => 
      array (
        0 => '0.8.3',
      ),
    ),
    'tijsverkoyen/css-to-inline-styles' => 
    array (
      'replaced' => 
      array (
        0 => '2.2.3',
      ),
    ),
    'tinify/tinify' => 
    array (
      'replaced' => 
      array (
        0 => '1.5.2',
      ),
    ),
    'twig/twig' => 
    array (
      'replaced' => 
      array (
        0 => 'v2.14.4',
      ),
    ),
    'vlucas/phpdotenv' => 
    array (
      'replaced' => 
      array (
        0 => 'v3.6.8',
      ),
    ),
    'wikimedia/composer-merge-plugin' => 
    array (
      'replaced' => 
      array (
        0 => 'v2.0.1',
      ),
    ),
    'wikimedia/less.php' => 
    array (
      'replaced' => 
      array (
        0 => 'v3.1.0',
      ),
    ),
    'winter/storm' => 
    array (
      'replaced' => 
      array (
        0 => 'dev-develop',
      ),
    ),
    'winter/wn-backend-module' => 
    array (
      'replaced' => 
      array (
        0 => 'dev-develop',
      ),
    ),
    'winter/wn-blog-plugin' => 
    array (
      'replaced' => 
      array (
        0 => 'dev-main',
      ),
    ),
    'winter/wn-cms-module' => 
    array (
      'replaced' => 
      array (
        0 => 'dev-develop',
      ),
    ),
    'winter/wn-pages-plugin' => 
    array (
      'replaced' => 
      array (
        0 => 'dev-main',
      ),
    ),
    'winter/wn-sentry-plugin' => 
    array (
      'replaced' => 
      array (
        0 => 'dev-main',
      ),
    ),
    'winter/wn-sitemap-plugin' => 
    array (
      'replaced' => 
      array (
        0 => 'dev-main',
      ),
    ),
    'winter/wn-system-module' => 
    array (
      'replaced' => 
      array (
        0 => 'dev-develop',
      ),
    ),
    'winter/wn-tinypng-plugin' => 
    array (
      'replaced' => 
      array (
        0 => 'dev-main',
      ),
    ),
    'winter/wn-translate-plugin' => 
    array (
      'replaced' => 
      array (
        0 => 'dev-main',
      ),
    ),
    'winter/wn-twitter-plugin' => 
    array (
      'replaced' => 
      array (
        0 => 'dev-main',
      ),
    ),
    'winter/wn-user-plugin' => 
    array (
      'replaced' => 
      array (
        0 => 'dev-main',
      ),
    ),
  ),
);
private static $canGetVendors;
private static $installedByVendor = array();







public static function getInstalledPackages()
{
$packages = array();
foreach (self::getInstalled() as $installed) {
$packages[] = array_keys($installed['versions']);
}


if (1 === \count($packages)) {
return $packages[0];
}

return array_keys(array_flip(\call_user_func_array('array_merge', $packages)));
}









public static function isInstalled($packageName)
{
foreach (self::getInstalled() as $installed) {
if (isset($installed['versions'][$packageName])) {
return true;
}
}

return false;
}














public static function satisfies(VersionParser $parser, $packageName, $constraint)
{
$constraint = $parser->parseConstraints($constraint);
$provided = $parser->parseConstraints(self::getVersionRanges($packageName));

return $provided->matches($constraint);
}










public static function getVersionRanges($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

$ranges = array();
if (isset($installed['versions'][$packageName]['pretty_version'])) {
$ranges[] = $installed['versions'][$packageName]['pretty_version'];
}
if (array_key_exists('aliases', $installed['versions'][$packageName])) {
$ranges = array_merge($ranges, $installed['versions'][$packageName]['aliases']);
}
if (array_key_exists('replaced', $installed['versions'][$packageName])) {
$ranges = array_merge($ranges, $installed['versions'][$packageName]['replaced']);
}
if (array_key_exists('provided', $installed['versions'][$packageName])) {
$ranges = array_merge($ranges, $installed['versions'][$packageName]['provided']);
}

return implode(' || ', $ranges);
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getVersion($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

if (!isset($installed['versions'][$packageName]['version'])) {
return null;
}

return $installed['versions'][$packageName]['version'];
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getPrettyVersion($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

if (!isset($installed['versions'][$packageName]['pretty_version'])) {
return null;
}

return $installed['versions'][$packageName]['pretty_version'];
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getReference($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

if (!isset($installed['versions'][$packageName]['reference'])) {
return null;
}

return $installed['versions'][$packageName]['reference'];
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getRootPackage()
{
$installed = self::getInstalled();

return $installed[0]['root'];
}







public static function getRawData()
{
return self::$installed;
}



















public static function reload($data)
{
self::$installed = $data;
self::$installedByVendor = array();
}




private static function getInstalled()
{
if (null === self::$canGetVendors) {
self::$canGetVendors = method_exists('Composer\Autoload\ClassLoader', 'getRegisteredLoaders');
}

$installed = array();

if (self::$canGetVendors) {
foreach (ClassLoader::getRegisteredLoaders() as $vendorDir => $loader) {
if (isset(self::$installedByVendor[$vendorDir])) {
$installed[] = self::$installedByVendor[$vendorDir];
} elseif (is_file($vendorDir.'/composer/installed.php')) {
$installed[] = self::$installedByVendor[$vendorDir] = require $vendorDir.'/composer/installed.php';
}
}
}

$installed[] = self::$installed;

return $installed;
}
}
