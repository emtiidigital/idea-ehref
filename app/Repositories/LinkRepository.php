<?php

namespace App\Repositories;

use App\Entities\Link;

/**
 * Class LinkRepository
 *
 * @package App\Repositories
 */
class LinkRepository implements LinkInterface
{
    const LINK_JOIN_TABLES = [
            'details',
            'fqdn',
            'label'
        ];

    public function getAllLinks()
    {
        return Link::with(
            self::LINK_JOIN_TABLES
        )->get();
    }

    public function getPaginatedLinks()
    {
        return Link::with(
            self::LINK_JOIN_TABLES
        )->simplePaginate(30);
    }
}
