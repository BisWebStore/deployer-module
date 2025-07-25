<?php

/**
 * @copyright Tim Bischoff - Software Developer
 * @link https://bisweb.de
 * @author Tim Bischoff - Software Developer <tim.bischoff@bisweb.de>
 */

declare(strict_types=1);

namespace BisWeb\Deployer\Settings\Service;

interface ModuleSettingsServiceInterface
{
    public function getSearchValue(): string;

    public function getReplaceValue(): string;
}