<?php
/**
 * device-info
 *
 * @author Andrei Dantsiger <dropaq@dropaq.com>
 */


namespace Dropaq\DeviceInfo;


interface DeviceInfoObjectInterface
{
    const TYPE_UNKNOWN = 'unknown';
    const TYPE_TABLET = 'tablet';
    const TYPE_PHABLET = 'phablet';
    const TYPE_PHONE = 'phone';
    const TYPE_DESKTOP = 'desktop';

    const OS_UNKNOWN = 'unknown';
    const OS_ANDROID = 'Android';
    const OS_BLACKBERRY = 'BlackBerry';
    const OS_IOS = 'iOS';
    const OS_LINUX = 'Linux';
    const OS_MAC = 'Mac';
    const OS_SYMBIAN = 'Symbian';
    const OS_WINDOWS = 'Windows';
    const OS_WINDOWS_MOBILE = 'WindowsMobile';

    public const AVAILABLE_TYPES = [
        self::TYPE_UNKNOWN => null,
        self::TYPE_TABLET => null,
        self::TYPE_PHABLET => null,
        self::TYPE_PHONE => null,
        self::TYPE_DESKTOP => null,
    ];

    public const AVAILABLE_OPERATING_SYSTEMS = [
        self::OS_UNKNOWN => null,
        self::OS_ANDROID => null,
        self::OS_BLACKBERRY => null,
        self::OS_IOS => null,
        self::OS_LINUX => null,
        self::OS_MAC => null,
        self::OS_SYMBIAN => null,
        self::OS_WINDOWS => null,
        self::OS_WINDOWS_MOBILE => null,
    ];

    /**
     * Returns one of the constants TYPE_*
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Returns one of the constants OS_*
     *
     * @return string
     */
    public function getOperatingSystem(): string;
}