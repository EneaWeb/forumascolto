<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = [
		'name', 
		'description', 
		'hex',
		'icon'
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
	  
	public static function array_with_icons()
	{
		$types = \App\Type::orderBy('name')->get();
		$return = array();
		foreach ($types as $type)
		{
			// $icon = ($type->icon != '') ? '&#x'.$type->icon.'; ' : '&#xf192; ';
			$return[$type->id] = strtoupper($type->name);
			//$return[$type->id] = $icon.$type->name;
		}
		return $return;
	}
	
	public function subtypes()
	{
		return $this->hasMany('\App\Subtype');
	}

}
