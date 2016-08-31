<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal_Tag extends Model
{
	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	
	protected $table = 'proposal_tag';
	
	protected $fillable = [
		'proposal_id',
		'tag_id'
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
