<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{

    protected $fillable = [ 'value' ];

    public function votable()
    {
        return $this->morphTo();
    }

    /**
     * Get the definition that the vote is casted on.
     */
    public function Definition()
    {
        return $this->belongsTo('App\Definition');
    }
    
    /**
     * Get the entry that the vote is casted on.
     */
    public function Entry()
    {
        return $this->belongsTo('App\Entry');
    }

    /**
     * Get the user that the vote is casted on.
     */
    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
