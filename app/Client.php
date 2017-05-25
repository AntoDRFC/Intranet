<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['client_name'];

	public function details()
	{
		return $this->hasMany('App\ClientDetail');
	}
}
