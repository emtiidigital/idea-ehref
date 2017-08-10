<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class LinkDetails extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'emtii_link_details';

    /**
     * The attributes that are allowed for mass assignment.
     *
     * @var array
     */
    protected $fillable = ['name', 'locale', 'external_link_id'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Associate reverse relationship with model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function link()
    {
        return $this->belongsTo('App\Entities\Link');
    }
}
