<?php

namespace App\Repositories;

use App\Entities\Link;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

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

    const LINKS_PER_PAGE = 30;

    /**
     * @inheritdoc
     */
    public function getAllLinks(): Collection
    {
        return Link::with(
            self::LINK_JOIN_TABLES
        )->get();
    }

    /**
     * @inheritdoc
     */
    public function getPaginatedLinks(): Paginator
    {
        return Link::with(
            self::LINK_JOIN_TABLES
        )->simplePaginate(self::LINKS_PER_PAGE, ['*'], 'p');
    }
}
