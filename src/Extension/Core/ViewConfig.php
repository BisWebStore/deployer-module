<?php

/**
 * @copyright Tim Bischoff - Software Developer
 * @link https://bisweb.de
 * @author Tim Bischoff - Software Developer <tim.bischoff@bisweb.de>
 */

declare(strict_types=1);

namespace BisWeb\Deployer\Extension\Core;

use OxidEsales\Eshop\Core\Registry;

class ViewConfig extends ViewConfig_parent
{
    public function getModuleUrl($sModule, $sFile = '') {
        $sUrl = parent::getModuleUrl($sModule, $sFile);

        // Workaround Assets CSS/JS Files Module URLs
        if(str_contains($sUrl, 'releases')) {
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
            $sReleasesDir = substr($sModulePath, strpos($sModulePath, 'releases/'), 23);
            $sModulePath = str_replace($sReleasesDir, 'current', $sModulePath);

            $sUrl = str_replace(
                $sShopDir,
                $shopUrl,
                $sModulePath
            );
        }

        return $sUrl;
    }
}
