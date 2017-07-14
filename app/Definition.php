<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Definition extends Model
{
    
    protected $fillable = ['text', 'ups', 'downs'];
    
    /**
     * Get the entry that owns the definition.
     */
    public function entry()
    {
        return $this->belongsTo('App\Entry');
    }
    
    /**
     * Get the user that owns the definition.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the votes of the definition.
     */
    public function votes()
    {
        return $this->morphMany('App\Vote', 'votable');
    }

    public function getTextAttribute($value)
    {
        return preg_replace("/[\r\s*\n]{3,}/", "\n\n", $value);
    }
}
