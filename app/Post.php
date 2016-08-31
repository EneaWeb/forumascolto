<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = [
		'user_id',
		'title',
		'content',
		'picture'
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

}
