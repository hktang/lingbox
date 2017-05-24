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
    
    /**
     * Get the votes of the definition.
     */
    public function votes()
    {
        return $this->hasMany('App\Vote');
    }
}
