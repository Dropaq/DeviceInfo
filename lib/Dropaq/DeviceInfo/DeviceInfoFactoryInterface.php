<?php
/**
 * device-info.
 *
 * @author Andrei Dantsiger <dropaq@dropaq.com>
 */

namespace Dropaq\DeviceInfo;

interface DeviceInfoFactoryInterface
{
    /**
     * @param string $type
     * @param string $operatingSystem
     *
     * @return DeviceInfoObjectInterface
     */
    public function createDeviceInfoObject(string $type, string $operatingSystem): DeviceInfoObjectInterface;
}
