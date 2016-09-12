<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\MyMail as MyMail;
use App\Http\Requests;
use Input;
use \App\Alert as Alert;

class MailController extends Controller
{
	public function contact_form()
	{
		
		// retrieve form data
		$name = Input::get('name');
		$subject = Input::get('subject');
		$content = Input::get('message');
		$email = Input::get('email');
		
		// set title manually
		$title = 'Contatto dal sito forumAscolto';
		
		// send mail
		$send_mail = MyMail::contact_mail($name, $subject, $content, $email, $title);
		// success message
		Alert::success('Messaggio inviato correttamente');
		// return redirect base url
		return redirect('/');
	}
}
