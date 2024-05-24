<?php

namespace Sudoim\CTWing\Aep;

use Sudoim\CTWing\Kernel\ServiceContainer;

/**
 * @property \Sudoim\CTWing\Aep\Kernel\Timestamp $timestamp
 * @property \Sudoim\CTWing\Aep\Kernel\Signature $signature
 * @property \Sudoim\CTWing\Aep\DeviceCommand\Client $deviceCommand
 * @property \Sudoim\CTWing\Aep\DeviceManagement\Client $deviceManagement
 * @property \Sudoim\CTWing\Aep\NbDeviceManagement\Client $nbDeviceManagement
 * @property \Sudoim\CTWing\Aep\EdgeGateway\Client $edgeGateway
 * @property \Sudoim\CTWing\Aep\StandardManagement\Client $standardManagement
 * @property \Sudoim\CTWing\Aep\ProductManagement\Client $productManagement
 * @property \Sudoim\CTWing\Aep\SubscribeNorth\Client $subscribeNorth
 * @property \Sudoim\CTWing\Aep\DeviceGroupManagement\Client $deviceGroupManagement
 * @property \Sudoim\CTWing\Aep\FirmwareManagement\Client $firmwareManagement
 * @property \Sudoim\CTWing\Aep\UpgradeManagement\Client $upgradeManagement
 * @property \Sudoim\CTWing\Aep\RuleEngine\Client $ruleEngine
 * @property \Sudoim\CTWing\Aep\SoftwareUpgradeManagement\Client $softwareUpgradeManagement
 * @property \Sudoim\CTWing\Aep\ModbusDeviceManagement\Client $modbusDeviceManagement
 * @property \Sudoim\CTWing\Aep\SoftwareManagement\Client $softwareManagement
 * @property \Sudoim\CTWing\Aep\DeviceEvent\Client $deviceEvent
 * @property \Sudoim\CTWing\Aep\DeviceStatus\Client $deviceStatus
 * @property \Sudoim\CTWing\Aep\DeviceModel\Client $deviceModel
 * @property \Sudoim\CTWing\Aep\DeviceControl\Client $deviceControl
 * @property \Sudoim\CTWing\Aep\DeviceCommandLwmProfile\Client $deviceCommandLwmProfile
 * @property \Sudoim\CTWing\Aep\CommandModbus\Client $commandModbus
 * @property \Sudoim\CTWing\Aep\MqSub\Client $mqSub
 * @property \Sudoim\CTWing\Aep\Usr\Client $usr
 * @property \Sudoim\CTWing\Aep\GatewayPosition\Client $gatewayPosition
 * @property \Sudoim\CTWing\Aep\TenantDeviceStatistics\Client $tenantDeviceStatistics
 * @property \Sudoim\CTWing\Aep\TenantAppStatistics\Client $tenantAppStatistics
 */
class Application extends ServiceContainer
{
    protected array $providers = [
        Kernel\Providers\TimestampServiceProvider::class,
        Kernel\Providers\SignatureServiceProvider::class,
        Timestamp\ServiceProvider::class,
        DeviceCommand\ServiceProvider::class,
        DeviceManagement\ServiceProvider::class,
        NbDeviceManagement\ServiceProvider::class,
        EdgeGateway\ServiceProvider::class,
        StandardManagement\ServiceProvider::class,
        ProductManagement\ServiceProvider::class,
        SubscribeNorth\ServiceProvider::class,
        DeviceGroupManagement\ServiceProvider::class,
        FirmwareManagement\ServiceProvider::class,
        UpgradeManagement\ServiceProvider::class,
        RuleEngine\ServiceProvider::class,
        SoftwareUpgradeManagement\ServiceProvider::class,
        ModbusDeviceManagement\ServiceProvider::class,
        SoftwareManagement\ServiceProvider::class,
        DeviceEvent\ServiceProvider::class,
        DeviceStatus\ServiceProvider::class,
        DeviceModel\ServiceProvider::class,
        DeviceControl\ServiceProvider::class,
        DeviceCommandLwmProfile\ServiceProvider::class,
        CommandModbus\ServiceProvider::class,
        MqSub\ServiceProvider::class,
        Usr\ServiceProvider::class,
        GatewayPosition\ServiceProvider::class,
        TenantDeviceStatistics\ServiceProvider::class,
        TenantAppStatistics\ServiceProvider::class
    ];

    protected array $defaultConfig = [
        'http' => [
            'timeout'  => 10,
            'base_uri' => 'https://ag-api.ctwing.cn/'
        ]
    ];
}