<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactType extends Model
{
	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	
	protected $table = 'contact_types';
	protected $fillable = [
		'name'
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
