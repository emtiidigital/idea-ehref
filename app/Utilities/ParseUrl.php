<?php

namespace App\Utilities;

/**
 * Class ParseUrl
 * @package App\Utilities
 */
class ParseUrl
{
    /** @var $url */
    public $url;

    /**
     * ParseUrl constructor.
     *
     * @param $url string
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getUrlScheme(): string
    {
        return parse_url($this->url, PHP_URL_SCHEME);
    }

    /**
     * @return string
     */
    public function getUrlUser(): string
    {
        return parse_url($this->url, PHP_URL_USER);
    }

    /**
     * @return string
     */
    public function getUrlPass(): string
    {
        return parse_url($this->url, PHP_URL_PASS);
    }

    /**
     * @return string
     */
    public function getUrlHost(): string
    {
        return parse_url($this->url, PHP_URL_HOST);
    }

    /**
     * @return string
     */
    public function getUrlPort(): string
    {
        return parse_url($this->url, PHP_URL_PORT);
    }

    /**
     * @return string
     */
    public function getUrlPath(): string
    {
        return parse_url($this->url, PHP_URL_PATH);
    }

    /**
     * @return string
     */
    public function getUrlQuery(): string
    {
        return parse_url($this->url, PHP_URL_QUERY);
    }

    /**
     * @return string
     */
    public function getUrlFragment(): string
    {
        return parse_url($this->url, PHP_URL_FRAGMENT);
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }
}
