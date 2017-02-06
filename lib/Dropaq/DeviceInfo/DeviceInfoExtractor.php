<?php
/**
 * device-info.
 *
 * @author Andrei Dantsiger <dropaq@dropaq.com>
 */

namespace Dropaq\DeviceInfo;

use Dropaq\DeviceInfo\ExtractorAdapter\ExtractorAdapterInterface;

class DeviceInfoExtractor implements DeviceInfoExtractorInterface
{
    /**
     * @var ExtractorAdapterInterface
     */
    protected $extractorAdapter;

    /**
     * @var DeviceInfoFactoryInterface
     */
    protected $deviceInfoFactory;

    /**
     * DeviceInfoExtractor constructor.
     *
     * @param ExtractorAdapterInterface  $extractorAdapter
     * @param DeviceInfoFactoryInterface $deviceInfoFactory
     */
    public function __construct(
        ExtractorAdapterInterface $extractorAdapter,
        DeviceInfoFactoryInterface $deviceInfoFactory
    ) {
        $this->extractorAdapter = $extractorAdapter;
        $this->deviceInfoFactory = $deviceInfoFactory;
    }

    /**
     * @param string $userAgent
     *
     * @return DeviceInfoObjectInterface
     */
    public function extractDeviceInfo(string $userAgent = ''): DeviceInfoObjectInterface
    {
        return $this->deviceInfoFactory->createDeviceInfoObject(
            $this->extractorAdapter->extractType($userAgent),
            $this->extractorAdapter->extractOperatingSystem($userAgent)
        );
    }
}
