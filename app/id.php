<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class id extends Model
{
	public $table = "ids";

      protected $fillable = [
        'sender',
        'msg'
    ];

    public function test(id)
    {
    	return $id;
    }
    
}
