<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    /**
     * Get the definitions of the entry.
     */
    public function definitions()
    {
        return $this->hasMany('App\Definition');
    }
    
    /**
     * Get the user that owns the entry.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
