<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Link extends Model
{
    /**
     * The attributes that are allowed for mass assignment.
     *
     * @var array
     */
    protected $fillable = ['published_at'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'published_at'
    ];

    /**
     * A link has one link detail.
     * @return HasOne
     */
    public function details(): HasOne
    {
        return $this->hasOne(
            LinkDetails::class
        );
    }

    /**
     * A link has one fully qualified domain name.
     * @return HasOne
     */
    public function fqdn(): HasOne
    {
        return $this->hasOne(
            LinkFqdn::class
        );
    }

    /**
     * A link can belong to many labels.
     * @return BelongsToMany
     */
    public function labels(): BelongsToMany
    {
        return $this->belongsToMany(
            Label::class,
            'link_label'
        );
    }
}
