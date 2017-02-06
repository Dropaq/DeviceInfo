<?php
/**
 * device-info.
 *
 * @author Andrei Dantsiger <dropaq@dropaq.com>
 */

namespace Dropaq\UnitTest\DeviceInfo;

use Dropaq\DeviceInfo\DeviceInfoFactory;
use Dropaq\DeviceInfo\DeviceInfoFactoryInterface;
use Dropaq\DeviceInfo\DeviceInfoObject;
use Dropaq\DeviceInfo\Exception\DeviceInfoException;

class DeviceInfoFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DeviceInfoFactoryInterface
     */
    private $deviceInfoFactory;

    protected function setUp()
    {
        $this->deviceInfoFactory = new DeviceInfoFactory();
    }

    public function testCreateDeviceInfoObject()
    {
        $deviceInfoObject = $this->deviceInfoFactory->createDeviceInfoObject('phone', 'Android');

        static::assertInstanceOf(DeviceInfoObject::class, $deviceInfoObject);
        static::assertEquals('phone', $deviceInfoObject->getType());
        static::assertEquals('Android', $deviceInfoObject->getOperatingSystem());
    }

    public function testCreateDeviceInfoObjectWithMalformedData()
    {
        static::expectException(DeviceInfoException::class);

        $this->deviceInfoFactory->createDeviceInfoObject('type', 'os');
    }
}
