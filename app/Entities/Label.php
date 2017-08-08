<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'emtii_labels';

    /**
     * Indicates if the model is timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Return link label data associated with this model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function link()
    {
        return $this->hasOne(
            'App\Entities\LinkLabel'
        );
    }
}
