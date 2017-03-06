<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model{
	protected $fillable = ['name'];
	protected $hidden = ['created_at'];

	public function setNameAttribute($value){
		$this->attributes['name'] = ucfirst(strtolower($value));
	}
}
