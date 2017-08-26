<?php

namespace App\Feed\FileLoader;

use SimpleXMLElement;

class RssFeedFileLoader
{
    /** @var SimpleXMLElement $rss */
    private $rss;

    public function __construct($path)
    {
        if ($path instanceof SimpleXMLElement) {
            $this->rss = $path;
        } else {
            $this->rss = simplexml_load_file($path);
        }
    }

    public function getField($name)
    {
        return $this->rss->xpath($name);
    }

    public function getNode($name)
    {
        return new static($this->rss->xpath($name));
    }
}
