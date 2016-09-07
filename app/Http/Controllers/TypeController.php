<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Input;
use \App\Type as Type;
use App\Http\Requests;

class TypeController extends Controller
{
	public function get_subtypes()
	{
		$type_id = Input::get('type_id');
		
		$result = '<h3 class="fs-title">Seleziona <br>un<span class="colored-blue"> hashtag</span> di riferimento.</h3>';
		foreach (Type::find($type_id)->subtypes()->get() as $subtype) {
			$result .= '<input type="radio" class="subtypes subtypes-label" name="subtype" id="'.$subtype->id.'-option" value="'.$subtype->id.'"><label for="'.$subtype->id.'-option" class="subtypes-label" ># '.$subtype->name.'</label> ';
		}
		
		return $result;
	}
}
