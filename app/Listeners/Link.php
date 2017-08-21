<?php

namespace App\Listeners;

use App\Events\ProcessNewsFeedsEvent;
use App\Repositories\LinkRepository;
use Illuminate\Support\Facades\Storage;

/**
 * Class Link
 * @package App\Listeners
 */
class Link
{
    const PATH_TO_FILE = './newsfeeds/';

    private $feedName;
    private $event;
    private $linkRepository;
    private $prefix;

    public function __construct(
        $feedName,
        $event
    ) {
        // set properties of instance
        $this->feedName = $feedName;
        $this->event = $event;

        // set link repository to instance
        $this->linkRepository = new LinkRepository();

        // set config values;
        $this->setPrefix(
            $this->getFeedName()
        );

        // start process of adding a new link
        $this->process();
    }

    public function process(): bool
    {
        $success = false;

        $xml = $this->getFeed(
            $this->getEvent()
                ->newsfeed->getAttributeValue('local_file')
        );

        /**
         * if we do have an SimpleXMLObject we have to iterate
         * over those items, map the fields and save new links
         * to our database.
         */
        if ($xml !== null) {
            /** @var SimpleXMLElement $item */
            foreach ($xml->channel->item as $item) {
                $external_id = (string) $this->getPrefix() . $item->{'post-id'};

                $linkInDb = $this->getLinkRepository()
                                 ->getLinkByExternalId($external_id);

                if ($linkInDb !== true) {
                    $mapper = $this->getMapper($item);
                    $success = $this->saveNewLink($mapper);
                }
            }
        }

        return $success;
    }

    private function saveNewLink(LinkMapper $mapper): bool
    {
        $success = $this->getLinkRepository()
            ->saveNewLink(
                $mapper->getMappedLink(),
                $mapper->getMappedLinkDetails(),
                $mapper->getMappedLinkFqdn()
            );

        return $success;
    }

    private function getLinkRepository(): LinkRepository
    {
        return $this->linkRepository;
    }

    private function getFeed(string $file): \SimpleXMLElement
    {
        //@TODO: Refactor to found library
        return simplexml_load_string(
            $this->getFileFromStorage($file)
        );
    }

    private function getFileFromStorage(string $filename): Storage
    {
        return Storage::get($this->getPathToFile() . $filename);
    }

    private function getFeedName(): string
    {
        return $this->feedName;
    }

    private function getEvent(): ProcessNewsFeedsEvent
    {
        return $this->event;
    }

    public function getPrefix(): string
    {
        return $this->prefix;
    }

    private function setPrefix($feedname)
    {
        $this->prefix = $feedname . '-';
    }

    private function getPathToFile(): string
    {
        return self::PATH_TO_FILE;
    }
}
