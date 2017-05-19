<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Definition extends Model
{
    /**
     * Get the entry that owns the definition.
     */
    public function entry()
    {
        return $this->belongsTo('App\Entry');
    }
}
