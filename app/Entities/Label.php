<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Label extends Model
{
    /**
     * Indicates if the model is timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Many label can belong to one link.
     *
     * @return BelongsToMany
     */
    public function links(): BelongsToMany
    {
        return $this->belongsToMany(Link::class);
    }
}
