<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = [
		'name',
		'surname',
		'birthdate',
		'gender',
		'address',
		'city',
		'province',
		'region',
		'state',
		'telephone'
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
	  
	public function user()
	{
		return $this->belongsTo('\App\User');
	}
	
	public function name_surname()
	{
		return $this->name.' '.$this->surname;
	}

}
