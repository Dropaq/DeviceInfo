<?php
/**
 * device-info.
 *
 * @author Andrei Dantsiger <dropaq@dropaq.com>
 */

namespace Dropaq\DeviceInfo;

interface DeviceInfoExtractorInterface
{
    /**
     * @param string $userAgent
     *
     * @return DeviceInfoObjectInterface
     */
    public function extractDeviceInfo(string $userAgent = ''): DeviceInfoObjectInterface;
}
