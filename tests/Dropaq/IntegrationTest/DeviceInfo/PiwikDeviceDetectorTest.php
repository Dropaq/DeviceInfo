<?php
/**
 * device-info.
 *
 * @author Andrei Dantsiger <dropaq@dropaq.com>
 */

namespace Dropaq\IntegrationTest\DeviceInfo;

use Dropaq\DeviceInfo\DeviceInfoFactory;
use Dropaq\DeviceInfo\DeviceInfoExtractor;
use Dropaq\DeviceInfo\DeviceInfoExtractorInterface;
use Dropaq\DeviceInfo\DeviceInfoObject;
use Dropaq\DeviceInfo\ExtractorAdapter\PiwikDeviceDetectorExtractorAdapter;

class PiwikDeviceDetectorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DeviceInfoExtractorInterface
     */
    private $deviceInfoExtractor;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->deviceInfoExtractor = new DeviceInfoExtractor(
            new PiwikDeviceDetectorExtractorAdapter(),
            new DeviceInfoFactory()
        );
    }

    /**
     * @param string $userAgent
     * @param string $expectedType
     * @param string $expectedOperatingSystem
     *
     * @dataProvider extractDeviceInfoDataProvider
     */
    public function testExtractDeviceInfo($userAgent, $expectedType, $expectedOperatingSystem)
    {
        $expectedDeviceInfo = new DeviceInfoObject(
            $expectedType,
            $expectedOperatingSystem
        );

        static::assertEquals(
            $expectedDeviceInfo,
            $this->deviceInfoExtractor->extractDeviceInfo($userAgent)
        );
    }

    /**
     * @return array
     */
    public function extractDeviceInfoDataProvider()
    {
        return [
            'iPad' => [
                $userAgent = 'Mozilla/5.0 (iPad; U; CPU OS 3_2_1 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Mobile/7B405',
                $expectedType = 'tablet',
                $expectedOS = 'iOS',
            ],
            'Mac' => [
                $userAgent = 'Mozilla/5.0 (Macintosh; Intel Mac OS X x.y; rv:42.0) Gecko/20100101 Firefox/42.0',
                $expectedType = 'desktop',
                $expectedOS = 'Mac',
            ],
        ];
    }
}
