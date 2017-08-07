<?php

namespace App\Repositories;

/**
 * Interface LinkInterface, sets methods in our link repository.
 *
 * @package App\Repositories
 */
interface LinkInterface
{
    /**
     * Get all Links from Database.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllLinks();

    /**
     * Get Links from Database, paginated by simple Paginate of Laravel.
     *
     * @return \Illuminate\Contracts\Pagination\Paginator
     */
    public function getPaginatedLinks();
}
