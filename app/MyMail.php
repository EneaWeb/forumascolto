<?php

namespace App;

use Mail;
use Auth;
use Alert;
use Config;
use App\Option as Option;

class MyMail
{
	
	public static function get_address_array($value) {
		if (substr($value, -1) == ';')
			$value = substr($value, 0, -1);
		$value = preg_replace('/\s+/', '', $value);
		$returned = explode(";", $value);
		return $returned;
	}

	public static function contact_mail($name, $subject, $content, $email, $title)
	{
		
		$app_domain = Config::get('app.domain');
		$app_url = Config::get('app.url');
		
		// get email addresses from Options (array formatted)
		$admin_mail_string = Option::where('name', 'contact_form_receiver')->value('value');
		
		// transform admin_mail_string to array within get_address_array function
		$admin_mails = MyMail::get_address_array($admin_mail_string);
		
		// prepare data
		$data = [
		   'title' => $title,
		   'name' => $name,
		   'email' => $email,
		   'subject' => $subject,
		   'content' => $content,
		   'app_url' => $app_url
		]; 
		
		// send mail
		Mail::send('email.template1', $data, function($message) use ($admin_mails, $app_domain, $email, $title, $app_url)
		{
		$message->subject($title);
		$message->from('no-reply@'.$app_domain);
		$message->to($admin_mails);
		//$message->bcc();
		$message->replyTo($email);
		});
	}
}