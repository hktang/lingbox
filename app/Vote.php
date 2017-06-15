<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{

    protected $fillable = ['definition_id', 'vote', 'ip_address', 'user_id'];

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
}
