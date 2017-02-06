<?php
/**
 * device-info.
 *
 * @author Andrei Dantsiger <dropaq@dropaq.com>
 */

namespace Dropaq\DeviceInfo\ExtractorAdapter;

interface ExtractorAdapterInterface
{
    /**
     * Returns one of the constants TYPE_*.
     *
     * @param string $userAgent
     *
     * @return string
     */
    public function extractType(string $userAgent): string;

    /**
     * Returns one of the constants OS_*.
     *
     * @param string $userAgent
     *
     * @return string
     */
    public function extractOperatingSystem(string $userAgent): string;
}
