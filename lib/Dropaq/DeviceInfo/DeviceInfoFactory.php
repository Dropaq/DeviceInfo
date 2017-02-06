<?php
/**
 * device-info.
 *
 * @author Andrei Dantsiger <dropaq@dropaq.com>
 */

namespace Dropaq\DeviceInfo;

use Dropaq\DeviceInfo\Exception\DeviceInfoException;

class DeviceInfoFactory implements DeviceInfoFactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function createDeviceInfoObject(string $type, string $operatingSystem): DeviceInfoObjectInterface
    {
        switch (false) {
            case array_key_exists($type, DeviceInfoObjectInterface::AVAILABLE_TYPES):
                throw new DeviceInfoException('Malformed type');
            case array_key_exists($operatingSystem, DeviceInfoObjectInterface::AVAILABLE_OPERATING_SYSTEMS):
                throw new DeviceInfoException('Malformed operating system');
        }

        return new DeviceInfoObject($type, $operatingSystem);
    }
}
