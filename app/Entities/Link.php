<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'emtii_links';

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
     * Return details associated with this model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function details()
    {
        return $this->hasOne('App\Entities\LinkDetails');
    }

    /**
     * Return full qualified domain name data
     * associated with this model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function fqdn()
    {
        return $this->hasOne('App\Entities\LinkFqdn');
    }

    /**
     * Return label data associated with this model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function label()
    {
        return $this->hasOne('App\Entities\LinkLabel');
    }
}
