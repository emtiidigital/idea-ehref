<?php

namespace App\Feed\FileLoader;

interface FeedFileLoaderInterface
{
    public function getField($name);
    public function getNode($name);
}
