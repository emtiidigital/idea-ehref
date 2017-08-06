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
    public function getAllLinks()
    {
        return Link::with(
            [
                'details',
                'fqdn',
                'label'
            ]
        )->get();
    }
}
