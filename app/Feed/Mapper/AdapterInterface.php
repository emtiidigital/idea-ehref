<?php

namespace App\Feed\Mapper;

interface AdapterInterface
{
    public function getExternalId();
    public function getName();
    public function getHref();
    public function getLabels();
    public function getPublishedAt();
}
