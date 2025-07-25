<?php

/**
 * @copyright Tim Bischoff - Software Developer
 * @link https://bisweb.de
 * @author Tim Bischoff - Software Developer <tim.bischoff@bisweb.de>
 */

$sLangName = 'English';

$aLang = [
    'charset' => 'UTF-8', // Supports german language specific chars like: ä, ö. ß, etc.
    'SHOP_MODULE_GROUP_bisweb_deployer_settings' => 'Settings',
    'SHOP_MODULE_bisweb_deployer_Search' => 'Search for path section to be replaced',
    'HELP_SHOP_MODULE_bisweb_deployer_Search' => 'Often, the server setting for the path does not match the specification <code>$this->sShopDir</code> in <code>config.inc.php</code>.',
    'SHOP_MODULE_bisweb_deployer_Replace' => 'Replace path section with',
    'HELP_SHOP_MODULE_bisweb_deployer_Replace' => 'One example is replacing <code>/var/www/html/releases/20250716130017/source</code> with the symlink <code>/var/www/html/current/source</code>.',
    'SHOP_MODULE_bisweb_deployer_SearchReplaceMode' => 'Is Deployer being used, or is it an IONOS server?',
    'SHOP_MODULE_bisweb_deployer_SearchReplaceMode_deployer' => 'Deployer',
    'SHOP_MODULE_bisweb_deployer_SearchReplaceMode_ionos' => 'IONOS Server',
    'HELP_SHOP_MODULE_bisweb_deployer_SearchReplaceMode' => 'Deployer setting corrects <code>$sModulePath</code>, IONOS server corrects <code>$this->sShopDir</code> for loading module assets.',

];