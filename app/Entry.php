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
    
    /**
     * Get the votes of the entry.
     */
    public function votes()
    {
        return $this->hasMany('App\Vote');
    }
    
    public function setTextAttribute($text)
    {
        $this->attributes['text'] = trim($text);
    }

    public function getIpAddressAttribute($ipAddress)
    {
        return substr($ipAddress, 0, -3) . "♥♥♥";
    }
}
