<?php

namespace Medidex\Libraries;

/**
 * A helper class which prepares http response headers
 * This class has the basic idea from Phalcon HeadersInterface
 *
 * @author Dimitris Bouzikas
 * @copyright 2017 Medidex Inc.
 */
class Headers
{
    protected $headers = array();

    /**
     * Sets a header to be sent at the end of the request
     *
     * @param string $name
     * @param string $value
     */
    public function set($name, $value)
    {
        $this->headers[$name] = $value;
    }

    /**
     * Gets a header value from the internal bag
     *
     * @param string $name
     * @return string|bool
     */
    public function get($name)
    {
        $headers = $this->headers;

        if (array_key_exists($name, $headers)) {
            return $headers[$name];
        }

        return false;
    }

    /**
     * Sets a raw header to be sent at the end of the request
     *
     * @param string $header
     */
    public function setRaw($header)
    {
        $this->headers[$header] = null;
    }

    /**
     * Sends the headers to the client
     *
     * @return bool
     */
    public function send()
    {
        if (!headers_sent()) {
            foreach ($this->headers as $header => $value) {
                if (!empty($value)) {
                    header($header . ": " . $value, true);
                } else {
                    header($header, true);
                }
            }
            return true;
        }

        return false;
    }

    /**
     * Returns the current headers as an array
     */
    public function toArray()
    {
        return $this->headers;
    }
}
