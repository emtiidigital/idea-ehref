<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LinkFqdn extends Model
{
    protected $table = 'link_fqdn';

    /**
     * The attributes that are allowed for mass assignment.
     *
     * @var array
     */
    protected $fillable = ['scheme', 'host', 'deeplink', 'full_qualified_link'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * A fully qualified domainname belongs to one link.
     *
     * @return BelongsTo
     */
    public function link(): BelongsTo
    {
        return $this->belongsTo(Link::class);
    }
}
