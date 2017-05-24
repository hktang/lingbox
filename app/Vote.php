<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    /**
     * Get the definition that the vote is casted on.
     */
    public function Definition()
    {
        return $this->belongsTo('App\Definition');
    }
}
