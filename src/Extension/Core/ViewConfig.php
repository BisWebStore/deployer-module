<?php

/**
 * @copyright Tim Bischoff - Software Developer
 * @link https://bisweb.de
 * @author Tim Bischoff - Software Developer <tim.bischoff@bisweb.de>
 */

declare(strict_types=1);

namespace BisWeb\Deployer\Extension\Core;

use BisWeb\Deployer\Core\BisWebDeployerLogger;
use BisWeb\Deployer\Settings\Service\ModuleSettingsServiceInterface;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\EshopCommunity\Core\Di\ContainerFacade;
use Psr\Log\LogLevel;

class ViewConfig extends ViewConfig_parent
{
    public function getModuleUrl($sModule, $sFile = '') {
        $sUrl = parent::getModuleUrl($sModule, $sFile);

        $c = Registry::getConfig();
        $sShopDir = $c->getConfigParam('sShopDir');
        $sShopDir = rtrim($sShopDir, '/');

        $shopUrl = $c->getCurrentShopUrl();
        $shopUrl = str_replace('admin', '', $shopUrl);
        $shopUrl = rtrim($shopUrl, '/');

        $sModulePath = $this->getModulePath($sModule, $sFile);

        // Workaround Assets CSS/JS Files Module URLs
        $moduleSettings = ContainerFacade::get(ModuleSettingsServiceInterface::class);
        $blLogging = $moduleSettings->isLoggingEnabled();
        $sSearchReplaceMode = $moduleSettings->getSearchReplaceMode();

        if ($blLogging) {
            $logger = (new BisWebDeployerLogger())->getLogger();
            $logger->info('------------------------------------');
            $logger->info('The URL before the fix is: {url}', ['url' => $sUrl]);
            $logger->info('Search Shop Directory: {shopDir}', ['shopDir' => $sShopDir]);
            $logger->info('Replace Shop URL: {shopUrl}', ['shopDir' => $shopUrl]);
            $logger->info('Module Path: {modulePath}', ['modulePath' => $sModulePath]);
        }

        if ($sSearchReplaceMode == 'deployer') {
            $sBisWebDeployerSearch = $moduleSettings->getSearchValue();
            $sBisWebDeployerReplace = $moduleSettings->getReplaceValue();

            // replace
            // /var/www/html/releases/20250716130017/source
            // with
            // /var/www/html/current/source
            if ($sBisWebDeployerSearch != '' && str_contains($sUrl, $sBisWebDeployerSearch)) {
                $sReleasesDir = substr($sModulePath, strpos($sModulePath, $sBisWebDeployerSearch.'/'), 23);
                $sModulePath = str_replace($sReleasesDir, $sBisWebDeployerReplace, $sModulePath);
            }
        } elseif ($sSearchReplaceMode == 'ionos') {
            // replace
            // /kunden/homepages
            // with
            // /homepages
            $sShopDir = str_replace('/kunden/homepages', '/homepages', $sShopDir);
        }

        $sUrl = str_replace(
            $sShopDir,
            $shopUrl,
            $sModulePath
        );

        if ($blLogging) {
            $logger->info('The URL after the fix is: {url}', ['url' => $sUrl]);
            $logger->info('Search Shop Directory: {shopDir}', ['shopDir' => $sShopDir]);
            $logger->info('Replace Shop URL: {shopUrl}', ['shopDir' => $shopUrl]);
            $logger->info('Module Path: {modulePath}', ['modulePath' => $sModulePath]);
            $logger->info('------------------------------------');
        }

        return $sUrl;
    }
}
