<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    
    protected $fillable   = ['text'];
    
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
    
    public function setTextAttribute($value)
    {
        $this->attributes['text'] = trim($value);
    }
    
    public function getIpAddressAttribute($value)
    {
        return substr($value, 0, -3) . "♥♥♥";
    }
}
