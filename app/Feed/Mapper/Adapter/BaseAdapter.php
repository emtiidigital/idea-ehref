<?php

namespace App\Feed\Mapper\Adapter;

use App\Feed\FileLoader\FeedFileLoaderInterface;
use App\Feed\Mapper\AdapterInterface;

class BaseAdapter implements AdapterInterface
{
    /**
     * @var FeedFileLoaderInterface $file
     */
    protected $file;

    public function __construct(
        FeedFileLoaderInterface $file
    ) {
        $this->file = $file;
    }

    public function getExternalId()
    {
        return $this->file->getField('external_id');
    }

    public function getName()
    {
        return $this->file->getField('name');
    }

    public function getHref()
    {
        return $this->file->getField('href');
    }

    public function getLabels()
    {
        return $this->file->getField('labels');
    }

    public function getPublishedAt()
    {
        return $this->file->getField('published_at');
    }
}
