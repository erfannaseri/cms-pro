<?php


use App\Article;
use App\Comment;
use App\Jobs\SendEmailVerify;
use App\User;

Auth::routes(['verify' => true]);

/********************** REGISTER & LOGIN & LOGOUT *******************************/

//Route::get('/register','Auth\RegisterController@showRegistrationForm')->name('user.register');
//Route::post('/register','Auth\RegisterController@register')->name('register');
//Route::get('login','Auth\LoginController@showLoginForm')->name('user.login');
//Route::post('login','Auth\LoginController@login')->name('login');
//Route::post('/logout','Auth\LoginController@logout')->name('logout');

/************************************************************************************/



/************************************ BACK_END *************************************/

Route::group(['middleware'=>['auth','checkadmin'],'prefix'=>'admin'],function (){
    Route::get('','Back\AdminController@index')->name('admin.index');
    Route::get('/users','Back\UserController@index')->name('admin.user.index');
    Route::get('/change.role/{user}','Back\UserController@changeRole')->name('admin.user.changeRole');
    Route::get('/change.status/{user}','Back\UserController@changeStatus')->name('admin.user.changeStatus');
    Route::delete('/delete/{user}','Back\UserController@deleteUser')->name('admin.user.deleteUser');
});

Route::group(['middleware'=>['auth','checkadmin'],'prefix'=>'admin/categories'],function (){
    Route::get('','Back\CategoryController@index')->name('admin.categories.index');
    Route::get('/create','Back\CategoryController@create')->name('admin.category.create');
    Route::Post('/','Back\CategoryController@store')->name('admin.category.store');
    Route::get('/{slug}/edit','Back\CategoryController@edit')->name('admin.category.edit');
    Route::put('/{category}','Back\CategoryController@update')->name('admin.category.update');
    Route::delete('{category}','Back\CategoryController@destroy')->name('admin.category.delete');
});

Route::group(['middleware'=>['auth','checkadmin'],'prefix'=>'admin/articles'],function (){
    Route::get('','Back\ArticleController@index')->name('admin.articles.index');
    Route::get('/create','Back\ArticleController@create')->name('admin.articles.create');
    Route::Post('/','Back\ArticleController@store')->name('admin.articles.store');
    Route::get('{slug}','Back\ArticleController@show')->name('admin.articles.show');
    Route::get('/{slug}/edit','Back\ArticleController@edit')->name('admin.articles.edit');
    Route::put('/{article}','Back\ArticleController@update')->name('admin.articles.update');
    Route::delete('{article}','Back\ArticleController@destroy')->name('admin.articles.delete');
    Route::get('status/{article}','Back\ArticleController@status')->name('admin.articles.status');
});


Route::group(['middleware'=>['auth','checkadmin'],'prefix'=>'admin/comments'],function (){
    Route::get('','Back\CommentController@index')->name('admin.comments.index');
    Route::get('{comment}','Back\CommentController@show')->name('admin.comments.show');
    Route::get('/{comment}/edit','Back\CommentController@edit')->name('admin.comments.edit');
    Route::put('/{comment}','Back\CommentController@update')->name('admin.comments.update');
    Route::delete('{comment}','Back\CommentController@destroy')->name('admin.comments.delete');
    Route::get('status/{comment}','Back\CommentController@status')->name('admin.comments.status');
});
Route::get('/{slug}/comments','Back\CommentController@comments')
    ->middleware(['auth','checkadmin'])->name('admin.comments.comments');

Route::group(['middleware'=>['auth','checkadmin'],'prefix'=>'admin/portfolios'],function (){
    Route::get('','Back\PortfolioController@index')->name('admin.portfolios.index');
    Route::get('/create','Back\PortfolioController@create')->name('admin.portfolios.create');
    Route::Post('/','Back\PortfolioController@store')->name('admin.portfolios.store');
    Route::get('{portfolio}','Back\PortfolioController@show')->name('admin.portfolios.show');
    Route::get('/{portfolio}/edit','Back\PortfolioController@edit')->name('admin.portfolios.edit');
    Route::put('/{portfolio}','Back\PortfolioController@update')->name('admin.portfolios.update');
    Route::delete('{portfolio}','Back\PortfolioController@destroy')->name('admin.portfolios.delete');
    Route::get('status/{portfolio}','Back\PortfolioController@status')->name('admin.portfolios.status');
});

/*****************************************END_BACK_END & START_FRONT_END***********************/

Route::get('/', 'Front\HomeController@index')->name('home');

Route::prefix('articles')->group(function (){
    Route::get('/','Front\ArticleController@index')->name('articles.index')->middleware('verified');
    Route::get('/{slug}','Front\ArticleController@show')->name('articles.show');
});
Route::post('/comment','Front\CommentController@store')->name('comment.store');

Route::group(['prefix'=>'profile','middleware'=>['auth','checkuser']], function () {
    Route::get('/{name}','Front\UserController@show')->name('user.show');
    Route::get('/{name}/edit','Front\UserController@edit')->name('user.edit');
    Route::put('/{user}','Front\UserController@update')->name('user.update');
});

//Route::get('/error.404', function () {
//    return view('errors.404');
//});
/*********************************** END_FRONT_END ******************************/


Route::get('/get', function () {
//    $user=User::find(1);
////$article=Article::where(['slug'=>'php Programming'])->first();
//    return sha1($user->email);
    $comment=Comment::find(1);

    SendEmailVerify::dispatch($comment);

});
