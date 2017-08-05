<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LabelsModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'emtii_labels';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
