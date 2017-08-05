<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LinksLabelsModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'emtii_links_labels';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the label detail data associated
     * with the links label ids.
     */
    public function labels()
    {
        $this->hasMany('App\Models\LabelsModel');
    }
}
