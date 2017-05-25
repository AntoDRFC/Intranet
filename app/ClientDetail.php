<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientDetail extends Model
{
    protected $fillable = ['client_id', 'type_id', 'url', 'description', 'username', 'password'];

	public function client()
	{
		return $this->belongsTo('App\Client');
	}

	public function type()
	{
		return $this->belongsTo('App\Type');
	}
}
