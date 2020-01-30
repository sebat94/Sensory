<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

/*
|--------------------------------------------------------------------------
| Bórrame
|--------------------------------------------------------------------------
*/
Route::post('/loginProvisional', function(Request $req){
    if($req->email == "agomis@umh.es" && $req->password == "prueba123"){
        session([
            'email' => 'agoims@umh.es'
        ]);
    } else {
        Session::flash('error', 'Username or password wrong.');
    }

    return redirect::to('/index');
});

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/




Route::get('/index.php/index', function(){
    return view('index');
});
Route::get('/', function () {
    return redirect('/index.php/index');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/researches', 'ResearchController@readAll');

Route::get('/members', 'MembersController@readAll');

Route::get('/news', 'NewsController@readAll');

Route::get('/contact', function () {
    return view('contact');
});

Route::post('/contact', function(Request $request){
    $data = array(
        'name' => $request->input('nombre'),
        'email' => $request->input('email'),
        'subject' => $request->input('asunto'),
        'msg' => $request->input('mensaje'),
    );

    Mail::send('emails.contact', $data, function ($message) {

        $message->from('madstodolist1@gmail.com', 'SENSORY');

        $message->to('agomis@umh.es')->subject('Nuevo mensaje desde la web');

    });

    return "Mensaje enviado correctamente";
});

Route::get('/publications', 'PublicationsController@readAll');

Route::get('/legal', function () {
    return view('legal');
});

/*
|--------------------------------------------------------------------------
| BackOffice Routes
|--------------------------------------------------------------------------
*/



/*
|--------------------------------------------------------------------------
| Research BackOffice Routes
|--------------------------------------------------------------------------
*/
Route::get('bo/research', 'BOResearchController@readAll');

Route::get('/bo/new/research', 'BOResearchController@createView');

Route::post('/bo/new/research', 'BOResearchController@create');

Route::post('/bo/new/paragraph/research/{research}', 'BOResearchController@createParagraph');

Route::get('/bo/research/{id}', 'BOResearchController@read');

Route::get('/bo/edit/research/{id}', 'BOResearchController@edit');

Route::post('/bo/edit/title/research/{id}', 'BOResearchController@updateTitle');

Route::post('/bo/delete/photo/research/{photo}', 'BOResearchController@deletePhoto');

Route::post('/bo/delete/paragraph/research/{para}', 'BOResearchController@deleteParagraph');

Route::post('/bo/edit/paragraph/research/{para}', 'BOResearchController@updateParagraph');

Route::delete('/bo/research/{id}', 'BOResearchController@delete');

/*
|--------------------------------------------------------------------------
| News BackOffice Routes
|--------------------------------------------------------------------------
*/
Route::get('bo/news', 'BONewsController@readAll');

Route::get('/bo/new/news', 'BONewsController@createView');

Route::post('/bo/new/news', 'BONewsController@create');

Route::get('/bo/news/{id}', 'BONewsController@read');

Route::delete('/bo/news/{id}', 'BONewsController@delete');

Route::get('/bo/edit/news/{id}', 'BONewsController@edit');

Route::post('/bo/edit/data/news/{id}', 'BONewsController@editData');

Route::post('/bo/new/paragraph/news/{id}', 'BONewsController@createParagraph');

Route::post('/bo/edit/paragraph/news/{id}', 'BONewsController@updateParagraph');

Route::post('/bo/delete/paragraph/news/{id}', 'BONewsController@deleteParagraph');
/*
|--------------------------------------------------------------------------
| Publications BackOffice Routes
|--------------------------------------------------------------------------
*/
Route::get('bo/publications', 'BOPublicationsController@readAll');

Route::get('/bo/new/publications', 'BOPublicationsController@createView');

Route::post('/bo/new/publications', 'BOPublicationsController@create');

Route::get('/bo/publications/{id}', 'BOPublicationsController@read');

Route::delete('/bo/publications/{id}', 'BOPublicationsController@delete');

Route::get('/bo/edit/publications/{id}', 'BOPublicationsController@editView');

Route::post('/bo/edit/publications/{id}', 'BOPublicationsController@edit');

/*
|--------------------------------------------------------------------------
| Members BackOffice Routes
|--------------------------------------------------------------------------
*/
Route::get('/bo/members', 'BOMembersController@readAll');

Route::get('/bo/new/member', 'BOMembersController@createView');

Route::post('/bo/new/member', 'BOMembersController@create');

Route::get('/bo/members/{id}', 'BOMembersController@read');

Route::get('/bo/edit/members/{id}', 'BOMembersController@edit');

Route::post('/bo/edit/member/{id}', 'BOMembersController@editData');

Route::post('/bo/edit/photo/member/{id}', 'BOMembersController@updatePic');

Route::delete('/bo/members/{id}', 'BOMembersController@delete');

Route::get('/bo/categories/new', 'BOMembersController@newCategory');

Route::post('/bo/categories/new', 'BOMembersController@newCategoryPost');

Route::delete('/bo/categories/{id}', 'BOMembersController@deleteCategory');

Route::get('/bo/edit/categories/{id}', 'BOMembersController@editCategory');

Route::post('/bo/edit/categories/{id}', 'BOMembersController@editCategoryPost');

// Authentication Routes...
Route::get('/bo', 'HomeController@index')->name('home');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
/*Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');*/

// Password Reset Routes...
/*Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
