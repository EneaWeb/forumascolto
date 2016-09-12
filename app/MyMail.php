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
		Mail::send('email.template1', $data, function($message) use ($data, $admin_mails, $app_domain, $email, $title, $app_url)
		{
		$message->subject($title);
		$message->from('no-reply@'.$app_domain);
		$message->to($admin_mails);
		//$message->bcc();
		$message->replyTo($email);
		});
	}

	public static function proposal_sent(\App\Proposal $proposal)
	{
		
		$app_domain = Config::get('app.domain');
		$app_url = Config::get('app.url');
		
		$user_email = $proposal->user->email;

		// get email addresses from Options (array formatted)
		$admin_mail_string = Option::where('name', 'contact_form_receiver')->value('value');
		// transform admin_mail_string to array within get_address_array function
		$admin_mails = MyMail::get_address_array($admin_mail_string);

		$title = 'Grazie!';

		// prepare data
		$data = [
		   'title' => $title,
		   'content' => 'La tua proposta è stata caricata correttamente.<br>Entro 72 ore la valuteremo e ti invieremo <b>una mail</b> di risposta.
		   				<br><br>Da parte del Gruppo a2a, un sincero grazie per aver deciso di partecipare al <b>forumAscolto</b>.',
		   'app_url' => $app_url
		]; 
		
		// send mail
		Mail::send('email.template2', $data, function($message) use ($data, $user_email, $admin_mails, $app_domain, $title)
		{
		$message->subject($title);
		$message->from('no-reply@'.$app_domain);
		$message->to($admin_mails);
		//$message->bcc();
		//$message->replyTo($email);
		});
	}

	public static function proposal_confirmed(\App\Proposal $proposal)
	{
		
		$app_domain = Config::get('app.domain');
		$app_url = Config::get('app.url');
		
		$user_email = $proposal->user->email;

		// get email addresses from Options (array formatted)
		$admin_mail_string = Option::where('name', 'contact_form_receiver')->value('value');
		// transform admin_mail_string to array within get_address_array function
		$admin_mails = MyMail::get_address_array($admin_mail_string);

		$title = 'Complimenti!';

		// prepare data
		$data = [
		   'title' => $title,
		   'content' => 'La tua proposta è online sul sito web di forumAscolto!<br>Fai conoscere la tua proposta ad amici e contatti, condividendola su Facebook.<br><br>span style="font-size:16px; line-height:20px;"><i>Ti ricordiamo che le proposte più votate entro il 4 Novembre 2016 saranno presentate durante il “forumAscolto Milano” a Novembre 2016.</i></span>',
		   'app_url' => $app_url
		]; 
		
		// send mail
		Mail::send('email.template2', $data, function($message) use ($data, $user_email, $admin_mails, $app_domain, $title)
		{
		$message->subject($title);
		$message->from('no-reply@'.$app_domain);
		$message->to($admin_mails);
		//$message->bcc();
		//$message->replyTo($email);
		});
	}

	public static function proposal_denied(\App\Proposal $proposal)
	{
		
		$app_domain = Config::get('app.domain');
		$app_url = Config::get('app.url');
		
		$user_email = $proposal->user->email;

		// get email addresses from Options (array formatted)
		$admin_mail_string = Option::where('name', 'contact_form_receiver')->value('value');
		// transform admin_mail_string to array within get_address_array function
		$admin_mails = MyMail::get_address_array($admin_mail_string);

		$title = 'Ci dispiace!';

		// prepare data
		$data = [
		   'title' => $title,
		   'content' => 'La tua proposta non è stata pubblicata sul sito web di forumAscolto, perché non è coerente con il <a href="http://forumascoltoa2a.eu/regolamento"><u>regolamento</u></a><br><br><b>Non tutto è vano!</b><br>Anche se la tua proposta non è stata pubblicata, ti invitiamo a proporre nuove idee, continuare a seguirci, esprimere le tue preferenze, e restare aggiornato tramite la nostra pagina Facebook.',
		   'app_url' => $app_url
		]; 
		
		// send mail
		Mail::send('email.template2', $data, function($message) use ($data, $user_email, $admin_mails, $app_domain, $title)
		{
		$message->subject($title);
		$message->from('no-reply@'.$app_domain);
		$message->to($admin_mails);
		//$message->bcc();
		//$message->replyTo($email);
		});
	}


}