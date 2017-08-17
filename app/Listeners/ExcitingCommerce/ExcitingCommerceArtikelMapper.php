<?php

namespace App\Listeners\Kassenzone;

use App\Entities\Link;
use App\Entities\LinkDetails;
use App\Entities\LinkFqdn;
use App\Entities\LinkLabel;
use DateTime;
use SimpleXMLElement;
use App\Utilities\ParseUrl;

/**
 * Class ExcitingCommerceArtikelMapper
 * @package App\Listeners\Kassenzone
 */
class ExcitingCommerceArtikelMapper
{
    /**
     * We need this prefix to make sure
     * this feed has its own number
     */
    const PREFIX_EXTERNAL_ID = 'excitingcommerce_artikel-';

    /** @var SimpleXMLElement */
    private $item;

    /** @var ParseUrl */
    private $url;

    /**
     * KassenzoneArtikelMapper constructor.
     *
     * @param SimpleXMLElement $item
     */
    public function __construct(
        SimpleXMLElement $item
    ) {
        $this->item = $item;
        $this->url = new ParseUrl($item->link);
    }

    /**
     * Get mapped link.
     *
     * @return Link
     */
    public function getMappedLink(): Link
    {
        // given by pubDate => string(31) "Sat, 05 Aug 2017 07:15:48 +0000"
        // need for eloquent timestamp => 2017-08-09 21:54:39

        $timestamp = $this->item->pubDate;
        $unix = DateTime::createFromFormat('D, d M Y H:i:s O', $timestamp)
                        ->getTimestamp();

        return new Link([
            'published_at' => $unix
        ]);
    }

    /**
     * Get mapped link details.
     *
     * @return LinkDetails
     */
    public function getMappedLinkDetails(): LinkDetails
    {
         return new LinkDetails([
            'name' => $this->item->title,
            'locale' => 'de_DE',
            'external_link_id' => self::PREFIX_EXTERNAL_ID . $this->item->{'post-id'}
         ]);
    }

    /**
     * Get mapped link fqdn.
     *
     * @return LinkFqdn
     */
    public function getMappedLinkFqdn(): LinkFqdn
    {
        return new LinkFqdn([
            'scheme' => $this->url->getUrlScheme(),
            'host' => $this->url->getUrlHost(),
            'deeplink' => $this->url->getUrlPath(),
            'full_qualified_link' => $this->url->getUrl()
        ]);
    }

    /**
     * Get mapped link label.
     *
     * @return LinkLabel
     */
    public function getMappedLinkLabel(): LinkLabel
    {
        // @TODO: implement createIfNotExists for given feed as general util
        // @TODO: implement relation to correct label id
        $labelId = 0;

        return new LinkLabel([
            'label_id' => $labelId
        ]);
    }
}
