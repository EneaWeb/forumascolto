<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = [
		'user_id',
		'proposal_id'
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

}
