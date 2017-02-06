<?php
/**
 * device-info.
 *
 * @author Andrei Dantsiger <dropaq@dropaq.com>
 */

namespace Dropaq\DeviceInfo;

class DeviceInfoObject implements DeviceInfoObjectInterface
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $operatingSystem;

    /**
     * DeviceInfoObject constructor.
     *
     * @param string $type
     * @param string $operatingSystem
     */
    public function __construct(string $type, string $operatingSystem)
    {
        $this->type            = $type;
        $this->operatingSystem = $operatingSystem;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getOperatingSystem(): string
    {
        return $this->operatingSystem;
    }
}
