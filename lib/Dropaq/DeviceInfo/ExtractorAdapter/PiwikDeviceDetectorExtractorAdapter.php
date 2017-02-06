<?php
/**
 * device-info.
 *
 * @author Andrei Dantsiger <dropaq@dropaq.com>
 */

namespace Dropaq\DeviceInfo\ExtractorAdapter;

use DeviceDetector\DeviceDetector;
use Dropaq\DeviceInfo\DeviceInfoObjectInterface;

class PiwikDeviceDetectorExtractorAdapter implements ExtractorAdapterInterface
{
    /**
     * {@inheritdoc}
     */
    public function extractType(string $userAgent): string
    {
        $dd = $this->createDeviceDetectorInstance($userAgent);

        switch (true) {
            case $dd->isTablet():
                return DeviceInfoObjectInterface::TYPE_TABLET;
            case $dd->isPhablet():
                return DeviceInfoObjectInterface::TYPE_PHABLET;
            case $dd->isFeaturePhone():
            case $dd->isSmartphone():
                return DeviceInfoObjectInterface::TYPE_PHONE;
            case $dd->isDesktop():
                return DeviceInfoObjectInterface::TYPE_DESKTOP;
            default:
                return DeviceInfoObjectInterface::TYPE_UNKNOWN;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function extractOperatingSystem(string $userAgent): string
    {
        $dd = $this->createDeviceDetectorInstance($userAgent);

        switch (strtolower($dd->getOs()['name'])) {
            case 'android':
            case 'cyanogenmod':
                return DeviceInfoObjectInterface::OS_ANDROID;
            case 'blackberry os':
            case 'blackberry tablet os':
                return DeviceInfoObjectInterface::OS_BLACKBERRY;
            case 'ios':
                return DeviceInfoObjectInterface::OS_IOS;
            case 'maemo':
            case 'arch linux':
            case 'vectorlinux':
            case 'debian':
            case 'knoppix':
            case 'mint':
            case 'ubuntu':
            case 'kubuntu':
            case 'xubuntu':
            case 'lubuntu':
            case 'fedora':
            case 'red hat':
            case 'mandriva':
            case 'gentoo':
            case 'sabayon':
            case 'slackware':
            case 'suse':
            case 'centos':
            case 'backtrack':
                return DeviceInfoObjectInterface::OS_LINUX;
            case 'mac':
                return DeviceInfoObjectInterface::OS_MAC;
            case 'symbian^3':
            case 'symbian os series 40':
            case 'symbian os series 60':
            case 'symbian os':
            case 'symbian':
                return DeviceInfoObjectInterface::OS_SYMBIAN;
            case 'windows':
                return DeviceInfoObjectInterface::OS_WINDOWS;
            case 'windows phone':
            case 'windows ce':
            case 'windows mobile':
            case 'windows rt':
                return DeviceInfoObjectInterface::OS_WINDOWS_MOBILE;
            default:
                return DeviceInfoObjectInterface::OS_UNKNOWN;
        }
    }

    /**
     * @param string $userAgent
     *
     * @return DeviceDetector
     */
    protected function createDeviceDetectorInstance(string $userAgent): DeviceDetector
    {
        $deviceDetector = new DeviceDetector($userAgent);
        $deviceDetector->parse();

        return $deviceDetector;
    }
}
