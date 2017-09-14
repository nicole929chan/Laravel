<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Thread;

class Reply extends Model
{
	use Favoritable, RecordsActivity;

	protected $guarded = [];

	protected $with = ['owner', 'favorites'];
	
    public function owner()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function thread()
    {
    	return $this->belongsTo(Thread::class);
    }
        

     
        
        
        
        
}
