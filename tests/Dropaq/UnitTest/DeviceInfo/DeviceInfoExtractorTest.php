<?php
/**
 * device-info.
 *
 * @author Andrei Dantsiger <dropaq@dropaq.com>
 */

namespace Dropaq\UnitTest\DeviceInfo;

use Dropaq\DeviceInfo\DeviceInfoFactoryInterface;
use Dropaq\DeviceInfo\DeviceInfoExtractor;
use Dropaq\DeviceInfo\DeviceInfoExtractorInterface;
use Dropaq\DeviceInfo\ExtractorAdapter\ExtractorAdapterInterface;

class DeviceInfoExtractorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DeviceInfoExtractorInterface
     */
    private $deviceInfoExtractor;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|DeviceInfoFactoryInterface
     */
    private $deviceInfoFactoryMock;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|ExtractorAdapterInterface
     */
    private $extractorAdapterMock;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->deviceInfoFactoryMock = $this->createMock(DeviceInfoFactoryInterface::class);
        $this->extractorAdapterMock = $this->createMock(ExtractorAdapterInterface::class);

        $this->deviceInfoExtractor = new DeviceInfoExtractor(
            $this->extractorAdapterMock,
            $this->deviceInfoFactoryMock
        );
    }

    public function testExtractDeviceInfo()
    {
        $this->extractorAdapterMock
            ->expects(static::once())
            ->method('extractOperatingSystem')
            ->with('type-os')
            ->willReturn('os');

        $this->extractorAdapterMock
            ->expects(static::once())
            ->method('extractType')
            ->with('type-os')
            ->willReturn('type');

        $this->deviceInfoFactoryMock
            ->expects(static::once())
            ->method('createDeviceInfoObject')
            ->with('type', 'os');

        $this->deviceInfoExtractor->extractDeviceInfo('type-os');
    }
}
