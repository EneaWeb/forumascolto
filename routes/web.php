<?php

Route::get('/', 'ProposalController@homepage');

Route::get('/privacy', 'PageController@privacy');
Route::get('/regolamento', 'PageController@regolamento');
Route::get('/informativa', 'PageController@informativa');
Route::get('/liberatoria', 'PageController@liberatoria');
Route::get('/session', function(){ return dd(Session::all());});
Route::get('/baseurl', function(){ return dd(Config::get('app.domain'));});
Route::get('/user', function(){ return dd(Auth::user());});
Route::get('/news', 'PostController@index');
Route::get('/news/{id}', 'BlogController@from_id');
Route::get('/form-upload', function() { return redirect('/'); });
Route::get('/proposta-preview/{id}', 'ProposalController@preview');
Route::get('/admin', 'PostController@lists');
Route::get('/admin/posts', 'PostController@lists');
Route::get('/admin/proposals', 'ProposalController@lists');
Route::get('/admin/proposals/da-vedere', 'ProposalController@da_vedere');
Route::get('/admin/proposals/approvate', 'ProposalController@approvate');
Route::get('/admin/proposals/non-approvate', 'ProposalController@non_approvate');
Route::get('/admin/proposals/confirm/{id}', 'ProposalController@confirm');
Route::get('/admin/proposals/deactivate/{id}', 'ProposalController@deactivate');
Route::get('/admin/users', 'UserController@lists');
Route::get('/progetti', 'ProposalController@index');
Route::get('/proposte', 'ProposalController@index');
Route::get('/progetto/{id}', 'ProposalController@single');
Route::get('/proposta/{id}', 'ProposalController@single');
Route::get('/area/{id}', 'ProposalController@area');
Route::get('/tag/{id}', 'ProposalController@tag');
Route::get('/no-results', 'ProposalController@noresults');


Route::get('/login-success', function(){
	App\Alert::success('Bentornato, '.Auth::user()->name);
	return redirect('/');
});
Route::get('/logout', function(){
	Auth::logout();
	App\Alert::success('Utente scollegato');
	return redirect('/');
});

Route::post('search-form', 'ProposalController@search');
Route::post('/admin/post/edit', 'PostController@edit');
Route::post('/modals/edit-post', 'PostController@modal');
Route::post('/modals/show-proposal', 'ProposalController@modal');
Route::post('/login', 'Auth\LoginController@ajax_login');
Route::post('/form-upload', 'ProposalController@upload');
Route::post('/facebook-login', 'Auth\LoginController@facebook_login');
Route::post('/contact-form/send', 'MailController@contact_form');
Route::post('/admin/posts/create', 'PostController@create');
Route::post('/get-subtypes', 'TypeController@get_subtypes');

	Route::post('/minimize-maximize', function()
	{ // menu minimize-maximize session variable
		$x = 'minimized';
		if (!Session::has($x))
			Session::put($x, '1');
		else {
			if (Session::get($x) == '1')
				Session::forget($x);
			else 
				Session::put($x, '1');
		}
	});