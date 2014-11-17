<?php
/**
 * A PHP library for checking if a server is up.
 *
 * This library allows users to check if a server is up.
 *
 * Can be installed using Composer.
 *
 * @package SiteUpChecker
 */

namespace SiteUpChecker;

/**
 * The SiteUpChecker class is a class for checking if a server is up.
 *
 * The constructor of the PushWoosh class does not take any parameters.
 * @category library
 * @package SiteUpChecker
 * @license http://opensource.org/licenses/MIT
 * @example <br />
 *  $checker = new SiteUpChecker();<br />
 *  $checker->checkSite($site);
 * @version 0.0.1
 * @since 2014-11-17
 * @author Matthew Daly matthewbdaly@gmail.com
 */

class SiteUpChecker
{
    /**
     * Tries to connect to the appropriate port
     *
     * @return boolean Returns true or false
     * @since 2014-11-17
     * @author Matthew Daly matthewbdaly@gmail.com
     */
    public function checkSite($url)
    {
        // Break up the URL data
        $url_data = parse_url($url);
        $scheme = $url_data['scheme'];
        $host = $url_data['host'];

        // Get port for URL
        $port = getservbyname($scheme, 'tcp');

        // Try to connect to it
        $fp = @fsockopen($host, $port, $errno, $errstr, 10);
        $status = $fp ? true : false;
        if ($fp)
        {
            fclose($fp);
        }
        unset($fp);

        // Return response
        return $status;
    }
}
