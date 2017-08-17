<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class NewsFeed extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'newsfeeds';

    /**
     * Indicates if the model is timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
}
