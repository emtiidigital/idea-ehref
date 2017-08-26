<?php

namespace App\Feed\FileLoader;

use SimpleXMLElement;

class XmlFeedFileLoader implements FeedFileLoaderInterface
{
    /** @var SimpleXMLElement $xml */
    private $xml;

    public function __construct($path)
    {
        if ($path instanceof SimpleXMLElement) {
            $this->xml = $path;
        } else {
            $this->xml = simplexml_load_file($path);
        }
    }

    public function getField($name)
    {
        return $this->xml->xpath($name);
    }

    public function getNode($name)
    {
        return new static($this->xml->xpath($name));
    }
}
