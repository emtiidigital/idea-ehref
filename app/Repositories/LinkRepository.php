<?php

namespace App\Repositories;

use App\Entities\Label;
use App\Entities\Link;
use App\Entities\LinkDetails;
use App\Entities\LinkFqdn;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

/**
 * Class LinkRepository
 *
 * @package App\Repositories
 */
class LinkRepository
{
    const LINK_JOIN_TABLES = [
            'details',
            'fqdn',
            'labels'
        ];

    const LINKS_PER_PAGE = 30;

    /**
     * Get all Links from Database.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllLinks(): Collection
    {
        return Link::with(
            self::LINK_JOIN_TABLES
        )->get();
    }


    /**
     * Get link by external id.
     *
     * @param $id
     * @return Collection|\Illuminate\Database\Eloquent\Model|null|static|static[]
     */
    public function getLinkByExternalId($id)
    {
        return LinkDetails::where(
            'external_link_id',
            '=',
            $id
        )->exists();
    }

    /**
     * Get Links from Database, paginated by simple Paginate of Laravel.
     *
     * @return \Illuminate\Contracts\Pagination\Paginator
     */
    public function getPaginatedLinks(): Paginator
    {
        return Link::with(
            self::LINK_JOIN_TABLES
        )->orderByDesc('published_at')
         ->simplePaginate(self::LINKS_PER_PAGE, ['*'], 'p');
    }

    /**
     * Save new link to Database with all given relations by
     * use of an transaction as we have to respect more than
     * one relation between Models.
     *
     * @param Link $link
     * @param LinkDetails $linkDetails
     * @param LinkFqdn $linkFqdn
     * @param Label $labels
     *
     * @return mixed
     */
    public function saveNewLink(
        Link $link,
        LinkDetails $linkDetails,
        LinkFqdn $linkFqdn,
        Label $labels
    ) {
        DB::transaction(function () use (
            $link,
            $linkDetails,
            $linkFqdn,
            $labels
        ) {
            $link->save();
            Link::find($link->id)->details()->save($linkDetails);
            Link::find($link->id)->fqdn()->save($linkFqdn);
            Link::find($link->id)->labels()->save($labels);
        });
    }
}
