<?php

/**
 * @copyright Tim Bischoff - Software Developer
 * @link https://bisweb.de
 * @author Tim Bischoff - Software Developer <tim.bischoff@bisweb.de>
 */

$sMetadataVersion = '2.1';

$aModule = [
    'id' => 'bisweb_deployer',
    'title' => 'BisWeb.de - Deployer',
    'description' => [
        'de' => 'Korrigiert zum Beispiel das Assets Verzeichnis für Module.',
        'en' => 'For example, fix the module assets directory.'
    ],
    'lang' => 'de',
    'thumbnail' => 'logo.png',
    'version' => '1.0.0',
    'author' => 'Tim Bischoff - Softwareentwickler',
    'url' => 'https://bisweb.de',
    'email' => 'tim.bischoff@bisweb.de',
    'extend' => [
        \OxidEsales\Eshop\Core\ViewConfig::class => BisWeb\Deployer\Extension\Core\ViewConfig::class,
    ],
    'controllers' => [],
    'settings' => [
        [
            'group' => 'bisweb_deployer_settings',
            'name'  => 'bisweb_deployer_Search',
            'type'  => 'str',
            'value' => 'releases'
        ],
        [
            'group' => 'bisweb_deployer_settings',
            'name'  => 'bisweb_deployer_Replace',
            'type'  => 'str',
            'value' => 'current'
        ],
    ],
    'events' => [],
];
