<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subtype extends Model
{
	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = [
		'name', 
		'type_id'
	];
	/**
	* The attributes that should be hidden for arrays.
	*
	* @var array
	*/
	protected $hidden = [

	];

	/*
	  RELATIONS
	*/
	  
	public function type()
	{
		return $this->belongsTo('\App\Type');
	}

}
