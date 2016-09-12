<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = [
		'user_id',
		'type_id',
		'title',
		'description_short',
		'description_long',
		'picture',
		'status', // da vedere // da verificare // non approvata // approvata //
		'likes'
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
	  
	public function tags()
	{
		return $this->belongsToMany('\App\Tag', 'proposal_tag');
	}
	
	public function user()
	{
		return $this->belongsTo('\App\User');
	}
	
	public function type()
	{
		return $this->belongsTo('\App\Type');
	}
	
	public function subtype()
	{
		return $this->belongsTo('\App\Subtype');
	}
	
	public function votes()
	{
		return $this->hasMany('\App\Vote');
	}

}
