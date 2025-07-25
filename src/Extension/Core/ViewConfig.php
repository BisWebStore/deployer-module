<?php

/**
 * @copyright Tim Bischoff - Software Developer
 * @link https://bisweb.de
 * @author Tim Bischoff - Software Developer <tim.bischoff@bisweb.de>
 */

declare(strict_types=1);

namespace BisWeb\Deployer\Extension\Core;

use BisWeb\Deployer\Settings\Service\ModuleSettingsServiceInterface;
use OxidEsales\Eshop\Core\Registry;

class ViewConfig extends ViewConfig_parent
{
    public function getModuleUrl($sModule, $sFile = '') {
        $sUrl = parent::getModuleUrl($sModule, $sFile);

        // Workaround Assets CSS/JS Files Module URLs
        $moduleSettings = $this->getService(ModuleSettingsServiceInterface::class);
        $sBisWebDeployerSearch = $moduleSettings->getSearchValue();
        $sBisWebDeployerReplace = $moduleSettings->getReplaceValue();
        if ($sBisWebDeployerSearch != '' && str_contains($sUrl, $sBisWebDeployerSearch)) {
            $c = Registry::getConfig();
            $sShopDir = $c->getConfigParam('sShopDir');
            $sShopDir = rtrim($sShopDir, '/');

            $shopUrl = $c->getCurrentShopUrl();
            $shopUrl = str_replace('admin', '', $shopUrl);
            $shopUrl = rtrim($shopUrl, '/');

            // replace
            // /var/www/html/releases/20250716130017/source
            // with
            // /var/www/html/current/source
            $sModulePath = $this->getModulePath($sModule, $sFile);
            $sReleasesDir = substr($sModulePath, strpos($sModulePath, $sBisWebDeployerSearch.'/'), 23);
            $sModulePath = str_replace($sReleasesDir, $sBisWebDeployerReplace, $sModulePath);

            $sUrl = str_replace(
                $sShopDir,
                $shopUrl,
                $sModulePath
            );
        }

        return $sUrl;
    }
}
