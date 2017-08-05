<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LinksModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'emtii_links';

    /**
     * Get the labels associated with the link.
     */
    public function labels()
    {
        $this->hasMany(
            'App\Models\LinksLabelsModel',
            'link_id'
        );
    }

    /**
     * Get the details associated with the link.
     */
    public function detail()
    {
        $this->hasOne(
            'App\Models\LinksDetailsModel',
            'link_id'
        );
    }

    /**
     * Get the fully qualified domain name data
     * associated with the link.
     */
    public function fqdn()
    {
        $this->hasOne(
            'App\Models\LinksFqdnModel',
            'link_id'
        );
    }
}
