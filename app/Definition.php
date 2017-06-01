<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Definition extends Model
{
    
    protected $fillable = ['text'];
    
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
        return $this->hasMany('App\Vote');
    }

    public function getTextAttribute($value)
    {
        $value = preg_replace("/[\n\s\r]/", "\n\r", $value);
        $value = preg_replace("/[\r\n]{2,}/", "\n\n", $value);
        return $value;
    }
}
