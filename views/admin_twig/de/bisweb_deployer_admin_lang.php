<?php

/**
 * @copyright Tim Bischoff - Software Developer
 * @link https://bisweb.de
 * @author Tim Bischoff - Software Developer <tim.bischoff@bisweb.de>
 */

$sLangName = 'Deutsch';

$aLang = [
    'charset' => 'UTF-8', // Supports german language specific chars like: ä, ö. ß, etc.
    'SHOP_MODULE_GROUP_bisweb_deployer_settings' => 'Einstellungen',
    'SHOP_MODULE_bisweb_deployer_Search' => 'Suche nach Pfad Abschnitt welcher ersetzt werden soll',
    'HELP_SHOP_MODULE_bisweb_deployer_Search' => 'Häufig stimmt die Server-Einstellung des Pfads nicht mit der Angabe <code>$this->sShopDir</code> in der <code>config.inc.php</code> überein.',
    'SHOP_MODULE_bisweb_deployer_Replace' => 'Pfad Abschnitt ersetzen mit',
    'HELP_SHOP_MODULE_bisweb_deployer_Replace' => 'Ein Beispiel ist <code>/var/www/html/releases/20250716130017/source</code> mit dem Symlink <code>/var/www/html/current/source</code> zu ersetzen.',
    'SHOP_MODULE_bisweb_deployer_SearchReplaceMode' => 'Kommt Deployer zum Einsatz oder handelt sich um einen IONOS Server?',
    'SHOP_MODULE_bisweb_deployer_SearchReplaceMode_deployer' => 'Deployer',
    'SHOP_MODULE_bisweb_deployer_SearchReplaceMode_ionos' => 'IONOS Server',
    'HELP_SHOP_MODULE_bisweb_deployer_SearchReplaceMode' => 'Einstellung Deployer korrigiert <code>$sModulePath</code>, IONOS Server korrigiert <code>$this->sShopDir</code> für das Laden der Modul Assets.',
    'SHOP_MODULE_bisweb_deployer_LoggerEnabled' => 'Logger einschalten',
    'HELP_SHOP_MODULE_bisweb_deployer_LoggerEnabled' => 'Logdatei liegt unter <code>/source/log/biswebdeployerlogger.log</code>',
];