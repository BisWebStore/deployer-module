<?php

/**
 * @copyright Tim Bischoff - Software Developer
 * @link https://bisweb.de
 * @author Tim Bischoff - Software Developer <tim.bischoff@bisweb.de>
 */

declare(strict_types=1);

namespace BisWeb\Deployer\Settings\Service;

use OxidEsales\EshopCommunity\Internal\Framework\Module\Facade\ModuleSettingServiceInterface;

/**
 * @extendable-class
 */
readonly class ModuleSettingsService implements ModuleSettingsServiceInterface
{
    public function __construct(
        private ModuleSettingServiceInterface $moduleSettingService,
    ) {
    }
    public function getSearchValue(): string
    {
        return $this->moduleSettingService->getString('bisweb_deployer_Search', 'bisweb_deployer')->trim()->toString();
    }

    public function getReplaceValue(): string
    {
        return $this->moduleSettingService->getString('bisweb_deployer_Replace', 'bisweb_deployer')->trim()->toString();
    }

    public function getSearchReplaceMode(): string
    {
        $mode = $this->moduleSettingService->getString('bisweb_deployer_SearchReplaceMode', 'bisweb_deployer')->trim()->toString();
        return (!empty($mode) && in_array($mode, ['deployer', 'ionos'])) ? $mode : 'deployer';
    }
}